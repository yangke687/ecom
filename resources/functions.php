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
		
	}
}