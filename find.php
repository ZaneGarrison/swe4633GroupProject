<?php
	$url = 'https://api2.isbndb.com/book/9780134093413';  
	$restKey = '44806_64e2b0edda6ff530bad3f0b4afeed66e';  
	 
	$headers = array(  
		"Content-Type: application/json",  
		"Authorization: " . $restKey  
	);  
	 
	$rest = curl_init();  
	curl_setopt($rest,CURLOPT_URL,$url);  
	curl_setopt($rest,CURLOPT_HTTPHEADER,$headers);  
	curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
	 
	$response = curl_exec($rest);  
	$js = json_decode($response);
	echo $response;  
	print_r($response);
	curl_close($rest);
 ?>