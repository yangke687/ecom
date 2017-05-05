<?php 
	require_once "../resources/config.php"; 
	include(TEMPLATE_FRONT . DS . "header.php");
?>

<?php 
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
			confirm($query);

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

