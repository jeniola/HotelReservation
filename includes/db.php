<?php 

$db['host'] = 'localhost';
$db['user'] = 'root';
$db['password'] = '';
$db['name'] = 'hotel';


	foreach ($db as $key => $value) {
		define(strtoupper($key), $value);
	}
		
	$connection = mysqli_connect(HOST, USER, PASSWORD, NAME);
	if (!$connection) {
		die("QUERY FAILED " . mysqli_error($connection));
	}



 ?>