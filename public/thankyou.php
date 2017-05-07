<?php 
	require_once "../resources/config.php"; 
	include(TEMPLATE_FRONT . DS . "header.php");
?>

<?php 
	
	function report($order_id){
		if(!$order_id) die("order id was not found!");
		//$total = 0;
		$item_quantity = 0 ;

		foreach( $_SESSION as $name => $value ){
			if($value>0){
				if(substr($name,0,strlen('product_'))=='product_'){

					$length = strlen($name-strlen('product_'));
					$id = substr($name,strlen('product_'),$length);
					// query
					$query = query("SELECT * FROM products WHERE product_id=".escape_string($id)."");
					confirm($query);
					while( $row=fetch_array($query) ){
						$prod_title = $row['product_title'];
						$prod_price = $row['product_price'];
						$sub = $prod_price * $value;
						$item_quantity += $value;

						$insert = query("INSERT INTO reports(product_id,order_id,product_title,product_price,product_quantity) VALUES('${id}','${order_id}','${prod_title}','${prod_price}','${value}')");
						confirm($insert);

					}
				}
			}
		}
	}

	if( isset($_GET['tx']) ){
		if(isset($_GET['amt'])) 
			$amount = $_GET['amt'];
		if(isset($_GET['cc'])) 
			$currency = $_GET['cc'];
		if(isset($_GET['tx'])) 
			$trans = $_GET['tx']; // transaction
		if(isset($_GET['st'])) 
			$stat = $_GET['st'];

		// insert order info into database
		if( isset($amount) && 
			isset($currency) && 
			isset($trans) && 
			isset($stat)){
			$query = query("INSERT INTO  orders (order_amount,order_transaction,order_status,order_currency) VALUES('${amount}','${trans}','${stat}','${currency}')");
			$last_id = last_id(); // defined in functions.php

			//
			report($last_id);

			//
			session_destroy();
		}
	}
	else{
		redirect('index.php');
	}
?>

<div class="container">
	<h1 class="text-center">Thank You</h1>
</div>

<?php include(TEMPLATE_FRONT . DS . 'footer.php'); ?>

