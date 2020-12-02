<?php
	header("Content-Type:application/json");
	$host = "database-1.c7mdfiikfgpx.us-east-1.rds.amazonaws.com";
	$username ="admin";
	$password ="myawsdatabase20!";
	$dbname = "studentdb";

	$conn = mysqli_connect($host, $username, $password, $dbname);
	if (mysqli_connect_error()) {
		die('Failed');
	}
	
	$mostPages = "SELECT * FROM savedBook WHERE 
 	pages = (SELECT MAX(pages) FROM savedBook)";
 	$result = mysqli_query($conn, $mostPages);
 	if($row = mysqli_fetch_assoc($result)){
 		$title = $row['title'];
 		$authors = $row['authors'];
 		$publisher = $row['publisher'];
 		$pages = $row['pages'];
 		$date = $row['date'];
 		$cover = $row['cover'];
 		response($title, $authors, $publisher, $pages, $date, $cover);
 	}


	function response($title, $authors, $publisher, $pages, $date, $cover) {
		$response['title'] = $title;
		$response['authors'] = $authors;
		$response['publisher'] = $publisher;
		$response['pages'] = $pages;
		$response['date'] = $date;
		$response['cover'] = $cover;
		$json = json_encode($response);
		echo $json;
	}
?>