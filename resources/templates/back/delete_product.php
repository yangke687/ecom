<?php
	require_once "../../config.php";

	if( isset($_GET['product_id']) ){

		$query = query("DELETE FROM products WHERE product_id = ". escape_string($_GET['product_id']) ." ");
		confirm($query);
		set_message("product deleted!");
	}

	redirect("../../../public/admin/index.php?products");