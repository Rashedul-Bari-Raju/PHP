<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$db_name = "login";

	$conn = mysqli_connect($server,$username,$password,$db_name);

	if(!$conn){
		die("Connection failed !"."<br>".mysqli_connect_error());
	}
	else{
//		echo "Connection successful !";
	}
?>