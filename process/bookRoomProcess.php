<?php 

if (isset($_POST['proceed'])) {
	
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$phoneNumber = $_POST['phoneNumber'];
	$nights = $_POST['nights'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];


	foreach ($_POST as $key => $value) {
		if (empty($_POST[$key])) {
			$error = "This field is required";
		}
	}
	
	/** Validate Email */
	if(!isset($error)){
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Invalid email";
		}
	}








	/*Terms and Condition validation*/
	// if (!isset($error)) {
	// 	if (!isset($_POST['terms'])) {
	// 		$error = "Accept terms and Condition to Register";
	// 	}
	// }

}
 ?>
