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

	echo "<a href='find_page.html'>Find Book and Save</a><br>";

	$mostPages = "SELECT * FROM savedBook WHERE 
 	pages = (SELECT MAX(pages) FROM savedBook)";
 	$result = mysqli_query($conn, $mostPages);
 	if ($row = mysqli_fetch_assoc($result)) {
 		echo "BOOK WITH THE MOST NUMBER OF PAGES <br>";
 		echo "<img src= ". $row['cover'] ." width = 200 height = 250><br>";
 		echo "TITLE: " . $row['title'] . "<br>";
 		echo " PUBLISHER: " . $row['publisher'] . "<br>";
 		echo " AUTHORS: " . $row['authors'] . "<br>";
 		echo " PAGES: " . $row['pages'] . "<br>";
 		echo " DATE PUBLISHED: " . $row['date'] . "<br>";
 	}

 	echo "<br>";
 	echo "BOOKS WITH COMMON PUBLISHER <br>";
 	$commonPublisher = "SELECT * FROM savedBook WHERE publisher IN (SELECT publisher FROM savedBook 
 	GROUP BY publisher
	HAVING COUNT(publisher) > 1)";
 	$result2 = mysqli_query($conn, $commonPublisher);
 	while ($row = mysqli_fetch_assoc($result2)) {
 		echo "<img src= ".$row['cover']." width = 200 height = 250><br>";
 		echo "TITLE: " . $row['title'] . "<br>";
 		echo " PUBLISHER: " . $row['publisher'] . "<br>";
 		echo " AUTHORS: " . $row['authors'] . "<br>";
 		echo " PAGES: " . $row['pages'] . "<br>";
 		echo " DATE PUBLISHED: " . $row['date'] . "<br>";
 		echo "<br>";
 	}
	mysqli_close($conn);
?>