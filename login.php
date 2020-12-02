<?php
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$host = "database-1.c7mdfiikfgpx.us-east-1.rds.amazonaws.com";
	$username ="admin";
	$password ="myawsdatabase20!";
	$dbname = "studentdb";

//taking username from $user and setting it to the value of the cookie, cookie expires in 30 days
	$cookie_name = "user";
	$cookie_value = $user;
	// 86400 = 1 day
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 


	$conn = mysqli_connect($host, $username, $password, $dbname);
	if (mysqli_connect_error()) {
		die('Failed');
	}
	$select = "SELECT * FROM bookAccount WHERE username = '$user'";
	$results = mysqli_query($conn, $select);
  	if (mysqli_num_rows($results) > 0) {
  	  header("Location: user_home_page.html");	
	}
	else {
  	  header("Location: create_page.html");
  	}
	mysqli_close($conn);
?>

<html>
<body>

<?php
//this will allow us to check whether the cookie has been set
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

</body>
</html>
