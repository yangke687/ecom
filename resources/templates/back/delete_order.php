<?php
	require_once "../../config.php";

	if( isset($_GET['order_id']) ){

		$query = query("DELETE FROM orders WHERE order_id = ". escape_string($_GET['order_id']) ." ");
		confirm($query);
		set_message("order deleted!");
	}

	redirect("../../../public/admin/index.php?orders");