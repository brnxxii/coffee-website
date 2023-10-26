<?php
	$dbhost = "localhost:3306";
	$dbuser = "root";
	$dbpass = "dwac8897";
	$dbname = "webprog_proj";
	$conn=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	
	if ($conn->connect_error) {
		die("Connection failed: " 
			. $conn->connect_error);
	}
?>