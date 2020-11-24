<?php
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$host = "database-1.c7mdfiikfgpx.us-east-1.rds.amazonaws.com";
	$username ="admin";
	$password ="myawsdatabase20!";
	$dbname = "studentdb";

	$conn = mysqli_connect($host, $username, $password, $dbname);
	if (mysqli_connect_error()) {
		die('Failed');
	}
	$select = "SELECT * FROM bookAccount WHERE username = '$user'";
	$results = mysqli_query($conn, $select);
  	if (mysqli_num_rows($results) > 0) {
  	  header("Location: find_page.html");	
	}
	else {
  	  header("Location: create_page.html");
  	}
	mysqli_close($conn);
?>