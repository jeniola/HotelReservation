<?php ob_start(); ?>
<?php session_start(); ?>

<?php 

	$_SESSION['userFirstname'] = null;
	$_SESSION['userImage'] = null;
	$_SESSION['userRole'] = null;

header("Location:../index.php")



 ?>
