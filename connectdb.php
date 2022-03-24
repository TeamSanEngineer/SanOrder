<?php
	$servername = "localhost";
	$username = "root";
	$password = "123456";
	$db="order_db";
	$con= mysqli_connect($servername, $username, $password,$db) or die("Error: " . mysqli_error($con));
	mysqli_query($con, "SET NAMES 'utf8' ");
	error_reporting( error_reporting() & ~E_NOTICE );
	date_default_timezone_set('Asia/Bangkok');
?>