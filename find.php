<?php
$isbn = $_POST["isbn"];
$url = 'https://api2.isbndb.com/book/';
$finalurl = $url .= $isbn;
$restKey = '44806_64e2b0edda6ff530bad3f0b4afeed66e';

$headers = array(
    "Content-Type: application/json",
    "Authorization: " . $restKey
);

$rest = curl_init();
curl_setopt($rest,CURLOPT_URL,$finalurl);
curl_setopt($rest,CURLOPT_HTTPHEADER,$headers);
curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($rest);
$data = json_decode($response,true);
$title = $data['book']['title'];
$publisher = $data['book']['publisher'];
$authors = $data['book']['authors'][0] ." and " . $data['book']['authors'][1];
$pages = $data['book']['pages'];
$cover = $data['book']['image'];
$date = $data['book']['date_published'];


curl_close($rest);

$user = $_POST["user"];
$pass = $_POST["pass"];
/*
$host = ;
$username = ;
$password =;
$dbname = ;
*/

$conn = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_error()) {
    die('Failed');
}

$currentUser = $_COOKIE["user"];

$insert = "INSERT INTO savedBook (title, publisher, authors, pages, cover, date, username) VALUES ('$title', '$publisher', '$authors', '$pages', '$cover', '$date', '$currentUser')";
if (mysqli_query($conn, $insert)) {
    echo '<script>alert("Book has been saved.")</script>';
    echo "<a href='saved.php'>View Saved Books</a>";
    echo "<br>";
    echo "<img src= ".$cover." width = 200 height = 250>";
    echo "<br>";
    echo "TITLE: " . $title;
    echo "<br>";
    echo "PUBLISHER: " . $publisher;
    echo "<br>";
    echo "AUTHORS: " . $authors;
    echo "<br>";
    echo "PAGES: " . $pages;
    echo "<br>";
    echo "DATE PUBLISHED: " . $date;
    echo "<br>";
    echo "USERNAME: " . $currentUser;

}
mysqli_close($conn);
?>