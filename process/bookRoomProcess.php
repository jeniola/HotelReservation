<?php 

	include 'db.php';
	

if (isset($_POST['submit'])) {
	
	$firstName = secureInput($_POST['firstName']);
	$lastName = secureInput($_POST['lastName']);
	$eMail = secureInput($_POST['eMail']);
	$phoneNumber = secureInput($_POST['phoneNumber']);
	$checkInDate = secureInput($_POST['checkInDate']);
	$checkOutDate = secureInput($_POST['checkOutDate']);
	$country = secureInput($_POST['country']);
	$gender = secureInput($_POST['gender']);
	$residentialAddress = secureInput($_POST['residentialAddress']);

	$checkIn = date_create($_POST['checkInDate']);
	$checkOut = date_create($_POST['checkOutDate']);
	
	$nights = date_diff($checkIn, $checkOut);	
	$nights->format("%a");
	// $query="INSERT INTO reservation (firstName, lastName, eMail, phoneNumber, checkInDate, checkOutDate, nights ,country, gender, residentialAddress, bookingTime)";
	//confirmQuery($query);


	foreach ($_POST as $key => $value) {
		if (empty($_POST[$key])) {
			$error = "All fields are required";
			break;
		}
	}


	if (empty($error)) {
		if (!filter_var($eMail, FILTER_VALIDATE_EMAIL)) {
			$error = "Invalid email";
		}
	}

}
 ?>
