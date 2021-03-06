<?php

function set_message($msg){
	if(!empty($msg)){
		$_SESSION['message'] = $msg;
	}
}

function display_message(){
	if(isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

function has_message(){
	return isset($_SESSION['message']) && $_SESSION['message'];
}
	
function redirect($location){
	header("Location: ${location}");
}

function query($sql){
	global $conn;
	return mysqli_query($conn,$sql);
}

function confirm($send_query){
	global $conn;
	if(!$send_query){
		die("QUERY FAILED " . mysqli_error($conn));
	}
}

function escape_string($string){
	global $conn;
	return mysqli_real_escape_string($conn,$string);
}

function fetch_array($send_query){
	return mysqli_fetch_array($send_query);
}

function get_products(){
	$query = query("SELECT * FROM products");
	confirm($query);

	while($row=fetch_array($query)){
$product_display_iamge = display_image( $row['product_image'] );
$product = <<<DELIMETER
<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <img src="../resources/${product_display_iamge}" alt="">
        <div class="caption">
            <h4 class="pull-right">&#36;${row['product_price']}</h4>
            <h4><a href="item.php?id=${row['product_id']}">${row['product_title']}</a>
            </h4>
            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
           	<a class="btn btn-primary" href="cart.php?id=${row['product_id']}">Add to cart</a>
        </div>
    </div>
</div>
DELIMETER;
		echo $product;
	}
}

function get_categories(){
	$query = query("SELECT * FROM categories WHERE cat_stat=1");
	confirm($query);

	while($row=fetch_array($query)){
$cat = <<< DELIMETER
<a href="category.php?id=${row['cat_id']}" class="list-group-item">${row['cat_title']}</a>
DELIMETER;
	echo $cat;
	}
}

function get_products_in_cat_page(){
	$sql = "SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id']) ." ";
	$query = query($sql);
	confirm($query);
	while($row=fetch_array($query)){
		$display_product_image = display_image($row['product_image']);
$product = <<<DELIMETER
<div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
        <img src="../resources/${display_product_image}" alt="">
        <div class="caption">
            <h3>${row['product_title']}</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>
                <a href="../public/cart.php?id=${row['product_id']}" class="btn btn-primary">Buy Now!</a><a href="item.php?id=${row['product_id']}" class="btn btn-default">More Info</a>
            </p>
        </div>
    </div>
</div>
DELIMETER;
	echo $product;
	}
}

function get_products_in_shop_page(){
	$query = query("SELECT * FROM products WHERE 1");
	confirm($query);
	while($row=fetch_array($query)){
		$display_product_image = display_image($row['product_image']);
$product = <<<DELIMETER
<div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
        <img src="../resources/${display_product_image}" alt="">
        <div class="caption">
            <h3>${row['product_title']}</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>
                <a href="../public/cart.php?id=${row['product_id']}" class="btn btn-primary">Buy Now!</a><a href="item.php?id=${row['product_id']}" class="btn btn-default">More Info</a>
            </p>
        </div>
    </div>
</div>
DELIMETER;
	echo $product;
	}	
}

function login_user(){
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = query("SELECT * FROM users WHERE username='${username}' AND password='${password}' ");

		if(mysqli_num_rows($query)==0){
			set_message("Your password or username are incorrect!");
			redirect("login.php");
		}
		else{
			$_SESSION['username'] = $username;
			set_message("Welcome to Admin ${username}");
			redirect("admin");
		}
	}
}

function send_message(){
	if(isset($_POST['submit'])){
		$from_name 	= $_POST['name'];
		$subject 	= $_POST['subject'];
		$email 		= $_POST['email'];
		$message 	= $_POST['message'];

		$to = "yourEmailAddr@gmail.com";
		$headers = "From: ${from_name} ${email}";
		$ret = mail($to, $subject, $message, $headers);
		if(!$ret){
			echo "error";
		}
		else{
			//echo "sent";
			set_message("Your Message has been sent!");
		}
	}

}

function last_id(){
	global $conn;
	return mysqli_insert_id($conn);
}

function add_product(){
	if(isset($_POST['publish'])){
		$prod_title = escape_string($_POST['product_title']);
		$prod_cat_id = escape_string($_POST['product_category_id']);
		$prod_price = escape_string($_POST['product_price']);
		$prod_desc = escape_string($_POST['product_description']);
		$prod_short_desc = escape_string($_POST['product_short_desc']);
		$prod_quantity = escape_string($_POST['product_quantity']);
		$prod_image = escape_string($_FILES['file']['name']);
		$image_temp_location = escape_string($_FILES['file']['tmp_name']); 

		// upload file
		if( $image_temp_location ){
			move_uploaded_file($image_temp_location,UPLOAD_DIRECTORY . DS . $prod_image);
		}

		// insert query
		$query = query("INSERT INTO products(product_title, product_category_id, product_price, product_description, short_desc, product_quantity, product_image) VALUES('${prod_title}','${prod_cat_id}','${prod_price}','${prod_desc}','${prod_short_desc}','${prod_quantity}','${prod_image}')");
		confirm($query);
		$last_id = last_id();

		set_message("A New Product with id ${last_id} was Added!");
		redirect("index.php?products");
	}
}

function update_product(){
	if( isset($_POST['update']) && isset($_GET['id']) ){
		$prod_title = escape_string($_POST['product_title']);
		$prod_cat_id = escape_string($_POST['product_category_id']);
		$prod_price = escape_string($_POST['product_price']);
		$prod_desc = escape_string($_POST['product_description']);
		$prod_short_desc = escape_string($_POST['product_short_desc']);
		$prod_quantity = escape_string($_POST['product_quantity']);
		$prod_image = escape_string($_FILES['file']['name']);
		$image_temp_location = escape_string($_FILES['file']['tmp_name']); 

		// upload file
		if( $image_temp_location ){
			move_uploaded_file($image_temp_location,UPLOAD_DIRECTORY . DS . $prod_image);
		}

		// update query
		$query = "UPDATE products SET ";
		$query .= "product_title 		= '${prod_title}', ";
		if( $prod_cat_id )
			$query .= "product_category_id 	= '${prod_cat_id}', ";
		$query .= "product_price 		= '${prod_price}', ";
		$query .= "product_description 	= '${prod_desc}', ";
		$query .= "short_desc 			= '${prod_short_desc}', ";
		if( $prod_image )
			$query .= "product_image 		= '${prod_image}', ";
		$query .= "product_quantity 	= '${prod_quantity}' ";
		$query .= " WHERE product_id = ".escape_string($_GET['id']);

		$send_update_query = query($query);
		confirm($send_update_query);
		
		set_message("Product has been updated!");
		redirect("index.php?products");
	}
}

function show_categories($product_cat_id=null){
	$query = query("SELECT * FROM categories WHERE cat_stat = 1");
	confirm($query);

	while($row=fetch_array($query)){
		
		$selected = ( $row['cat_id'] == $product_cat_id ) ? 'selected' : '';

$cat = <<< DELIMETER
 <option value="${row['cat_id']}" ${selected}>${row['cat_title']}</option>
DELIMETER;


	echo $cat;
	}
}

function display_image( $picture ){
	return "uploads" .DS . $picture;
}

function show_categories_in_admin(){
	$query = query("SELECT * FROM categories WHERE cat_stat = 1");
	confirm($query);

	while($row=fetch_array($query)){
$cat = <<<DELIMETER
<tr>
	<td>${row['cat_id']}</td>
	<td>${row['cat_title']}</td>
	<td>
		<a href="../../resources/templates/back/delete_category.php?id=${row['cat_id']}" class="btn btn-danger">
			<span class="glyphicon glyphicon-trash"></span>
			Delete
		</a>
	</td>
</tr>
DELIMETER;
		echo $cat;
	}
}

function add_category(){
	if( isset($_POST['add_category']) ){
		$cat_title = $_POST['category_title'];
		if( ! $cat_title ) die("category title can not be empty!");
		$query = query("INSERT INTO  categories(cat_title) VALUES('${cat_title}')");
		confirm($query);

		//
		set_message("Add category successfully!");
	}
}

function display_users(){
	$query = query("SELECT * FROM users");
	confirm($query);

	while($row=fetch_array($query)){
		$user_id = $row['user_id'];
		$username = $row['username'];
		$email = $row['email'];
		$password = $row['password'];
$user = <<< DELIMETER
<tr>
	<td>${user_id}</td>
	<td>${username}</td>
	<td>${email}</td>
	<td>
		<a href="../../resources/templates/back/delete_user.php?id=${user_id}" class="btn btn-danger">
			<span class="glyphicon glyphicon-trash"></span> Delete
		</a>
	</td>
</tr>
DELIMETER;
		echo $user;
	}
}

function add_user(){
	if(isset($_POST['add_user'])){
		$username = escape_string($_POST['username']);
		$email = escape_string($_POST['email']);
		$password = escape_string($_POST['password']);
		$user_photo = escape_string($_FILES['file']['name']);
		$user_photo_temp = escape_string($_FILES['file']['tmp_name']);

		move_uploaded_file($user_photo_temp, UPLOAD_DIRECTORY . DS . $user_photo);

		$query = query("INSERT INTO users(username,email,password,user_photo) VALUES('${username}','${email}','${password}','${user_photo}') ");
		confirm($query);

		//
		set_message("User created!");
		redirect("index.php?users");
	}
}

function display_reports(){
	$query = query("SELECT * FROM reports");
	confirm($query);

	while( $row=  fetch_array($query) )  {
$report = <<< DELIMETER
<tr>
	<td>${row['report_id']}</td>
	<td>${row['product_id']}</td>
	<td>${row['order_id']}</td>
	<td>${row['product_price']}</td>
	<td>${row['product_title']}</td>
	<td>${row['product_quantity']}</td>
	<td>
		<a class="btn btn-danger" href="../../resources/templates/back/delete_report.php?id=${row['report_id']}">
			<span class="glyphicon glyphicon-trash"></span> Delete
		</a>
	</td>
</tr>
DELIMETER;
		echo $report;
	}
}




