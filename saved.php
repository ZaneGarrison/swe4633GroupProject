<?php
	echo "<a href='find_page.html'>Find Book and Save</a><br>";
	echo "<br>";
	$url = 'http://localhost:8888/api/commonPublisher.php';
	$headers = array(  
		"Content-Type: application/json"
	);  
	$rest = curl_init();  

	curl_setopt($rest,CURLOPT_URL,$url);  
	curl_setopt($rest,CURLOPT_HTTPHEADER,$headers);  
	curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  

	$response = curl_exec($rest);
	$data = json_decode($response);
	echo "BOOKS WITH COMMON PUBLISHER <br>";
	print_r($response);
	
	/*$title = $data['title'];
	$publisher = $data['publisher'];
	$authors = $data['authors'];
	$pages = $data['pages'];
	$date = $data['date'];
	$cover = $data['cover'];*/

	curl_close($rest);

	$url2 = 'http://localhost:8888/api/mostPages.php';
	$headers = array(  
		"Content-Type: application/json"
	);  
	$rest2 = curl_init();  

	curl_setopt($rest2,CURLOPT_URL,$url2);  
	curl_setopt($rest2,CURLOPT_HTTPHEADER,$headers);  
	curl_setopt($rest2,CURLOPT_RETURNTRANSFER, true);  

	$response2 = curl_exec($rest2);
	$data2 = json_decode($response);
	echo "<br>";
	echo "<br>";
	echo "BOOKS WITH MOST PAGES <br>";
	print_r($response2);
	
	/*$title = $data['title'];
	$publisher = $data['publisher'];
	$authors = $data['authors'];
	$pages = $data['pages'];
	$date = $data['date'];
	$cover = $data['cover'];*/

	curl_close($rest2);

$currentUsername = $_COOKIE["user"];

$url3 = 'http://localhost:8888/api/usersaved.php?username={$currentUsername}';
$headers = array(
    "Content-Type: application/json"
);
$rest3 = curl_init();

curl_setopt($rest3,CURLOPT_URL,$url3);
curl_setopt($rest3,CURLOPT_HTTPHEADER,$headers);
curl_setopt($rest3,CURLOPT_RETURNTRANSFER, true);

$response3 = curl_exec($rest3);
$data3 = json_decode($response);
echo "<br>";
echo "<br>";
echo "Books Saved By Current User <br>";
print_r($response3);

curl_close($rest3);

	/*$mostPages = "SELECT * FROM savedBook WHERE 
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
	mysqli_close($conn);*/
?>
