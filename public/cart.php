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
				redirect("checkout.php");
			}
		}
	}