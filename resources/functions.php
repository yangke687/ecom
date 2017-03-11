<?php
	
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
	mysql_real_escape_string($conn,$string);
}

function fetch_array($send_query){
	return mysqli_fetch_array($send_query);
}

function get_products(){
	$query = query("SELECT * FROM products");
	confirm($query);

	while($row=fetch_array($query)){

$product = <<<DELIMETER
<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <img src="${row['product_image']}" alt="">
        <div class="caption">
            <h4 class="pull-right">&#36;${row['product_price']}</h4>
            <h4><a href="product.html">${row['product_title']}</a>
            </h4>
            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
           	<a class="btn btn-primary" href="item.php?id=${row['product_id']}">Add to cart</a>
        </div>
    </div>
</div>
DELIMETER;
		echo $product;
	}
}