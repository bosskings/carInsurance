<?php 



	// connecting sql to php
	$username = 'root';
	$password = '';
	$server = 'localhost';
	$db = 'policy_db';

	$conn =  mysqli_connect($server,$username,$password,$db);

	if(!$conn) {
		die("connection failed --".mysqli_connect_error());
	}else{
		
	}




?>