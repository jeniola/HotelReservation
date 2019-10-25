<?php 

// include 'db.php';
	

if (isset($_POST['payNow'])) {
	
	
	$roomTypeId = $_POST['roomTypeId'];
	$firstName = secureInput($_POST['firstName']);
	$lastName = secureInput($_POST['lastName']);
	$eMail = secureInput($_POST['eMail']);
	$phoneNumber = secureInput($_POST['phoneNumber']);
	$checkInDate = $_POST['checkInDate'];
	$checkOutDate = $_POST['checkOutDate'];
	$country = secureInput($_POST['country']);
	$gender = secureInput($_POST['gender']);
	$residentialAddress = secureInput($_POST['residentialAddress']);

	$checkIn = date_create($_POST['checkInDate']);
	$checkOut = date_create($_POST['checkOutDate']);
	
	$nightDifference = date_diff($checkIn, $checkOut);	
	$nights = $nightDifference->format("%a");
	
	


	foreach ($_POST as $key => $value) {
		if (empty($_POST[$key])) {
			$error = "Please fill out all  fields";
			break;
		}
	}


	if (empty($error)) {
		if (!filter_var($eMail, FILTER_VALIDATE_EMAIL)) {
			$error = "Invalid email";
		}
	}

	if (empty($error)) {
		if (!is_numeric($phoneNumber)) {
			$error = "Phone number must be digits";
		}
	}


	if (empty($error)) {
		$roomTypeQuery = "SELECT * FROM allrooms WHERE roomId = '{$roomTypeId}' ";
		$sendQuery = mysqli_query($connection, $roomTypeQuery);
		
		while ($row = (mysqli_fetch_assoc($sendQuery))) {
			$theRoomTypeId = $row['roomId'];
			$roomType = $row['roomType'];
			$roomPrice = $row['roomPrice'];
		}

		$amount = $roomPrice * $nights ;
		
		$referenceId = "LEX" . time();

		// $query="INSERT INTO reservations (roomType, referenceId, bookingTime, firstName, lastName, eMail, phoneNumber, checkInDate, checkOutDate, nights, country, gender, residentialAddress, amount) ";
		// $query.= "VALUES ('$roomType', '$referenceId', now(), '$firstName', '$lastName', '$eMail',  '$phoneNumber', '$checkInDate', '$checkOutDate', '$nights', '$country', '$gender', '$residentialAddress', '$amount')";
		// confirmQuery($query);
		
		// after payment, update payment status, amount paid
		/** Amount paid should be  */
	}

}
 ?>
