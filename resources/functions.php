<?php
	
function redirect($location){
	header("Location: ${location}");
}

function query($sql){
	global $conn;
	return msqli_query($conn,$sql);
}

function confirm($result){
	global $conn;
	if(!$result){
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