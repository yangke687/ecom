<?php
	require_once "../resources/config.php";

	if(isset($_GET['id'])){

		$query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['id']) . " ");
		while($row=fetch_array($query)){
			if(!$_SESSION['product_'.$_GET['id']])
					$_SESSION['product_'.$_GET['id']] = 0;
			if( $row['product_quantity'] > $_SESSION['product_'.$_GET['id']] ){
				// using session to store product quantity
				$_SESSION['product_'.$_GET['id']] += 1;
			}
			else {
				set_message("${row['product_title']}, we have only " . $row['product_quantity'] . " " . " availabel !");
			}
			redirect("checkout.php");
		}
	}

	// minus item from cart
	if(isset($_GET['remove'])){
		if( $_SESSION['product_'.$_GET['remove']]<1 ){
			redirect('checkout.php');
		}
		else{
			$_SESSION['product_'.$_GET['remove']]--;
		}
		redirect('checkout.php');
	}

	// delete all items in cart
	if(isset($_GET['delete'])){
		$_SESSION['product_'.$_GET['delete']] = '0';
		redirect('checkout.php');
	}

	function cart(){

		$total = 0;

		foreach( $_SESSION as $name => $value ){
			if($value>0){
				if(substr($name,0,strlen('product_'))=='product_'){
					$length = strlen($name-strlen('product_'));
					$id = substr($name,strlen('product_'),$length);
					// query
					$query = query("SELECT * FROM products WHERE product_id=".escape_string($id)."");
					confirm($query);
					while( $row=fetch_array($query) ){
						$sub = $row['product_price'] * $value;
$prod = <<< DELIMETER
<tr>
	<td>${row['product_title']}</td>
	<td>&#36; ${row['product_price']}</td>
	<td>${value}</td>
	<td>&#36; ${sub}</td>
	<td>
		<a class="btn btn-warning" href="cart.php?remove=${row['product_id']}">
			<span class="glyphicon glyphicon-minus"></span>
		</a>
		<a href="cart.php?id=${row['product_id']}" class="btn btn-success">
			<span class="glyphicon glyphicon-plus"></span>
		</a>
		<a class="btn btn-danger" href="cart.php?delete=${row['product_id']}">
			<span class="glyphicon glyphicon-remove"></span>
		</a>
	</td>
</tr>
DELIMETER;
	echo $prod;
		}
		$_SESSION['item_total'] = $total += $sub;
				}
			}
		}
	}

