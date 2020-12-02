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
	
 	$commonPublisher = "SELECT title, authors, publisher, pages, date FROM savedBook WHERE publisher IN (SELECT publisher FROM savedBook 
 	GROUP BY publisher
	HAVING COUNT(publisher) > 1)";
 	$result2 = mysqli_query($conn, $commonPublisher);
 	while ($row = mysqli_fetch_assoc($result2)) {
 		$title = $row['title'];
 		$authors = $row['authors'];
 		$publisher = $row['publisher'];
 		$pages = $row['pages'];
 		$date = $row['date'];
 		response($title, $authors, $publisher, $pages, $date);
 	}

	function response($title, $authors, $publisher, $pages, $date) {
		$response['title'] = $title;
		$response['authors'] = $authors;
		$response['publisher'] = $publisher;
		$response['pages'] = $pages;
		$response['date'] = $date;
		$json = json_encode($response);
		echo $json;
	}
?>