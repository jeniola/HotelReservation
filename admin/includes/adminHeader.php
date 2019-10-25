<?php
ob_start();
  include '../includes/db.php';
  include 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>  Admin
  <?php
                if (isset($_GET['source'])) {
                  $title = $_GET['source'];
                }else{
                   $title = "" ;
                }
                switch ($title) {
                  case 'currentReservation':
                    echo "Admin &middot; Current Reservation";
                    break;
                  
                  case 'addUser';
                    echo "Admin &middot; Add User";
                    break;
                  
                  case 'addRoom';
                    echo "Admin &middot; Add Room";
                    break;

                  case 'editRoom';
                    echo "Admin &middot; Edit Room";
                    break;
                  
                  case 'editUser';
                    echo "Admin &middot; Edit User";
                    break;


                  default:
                    echo "Admin";
                    break;
                }
              
              ?>                

  </title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/index.css">

</head>

<body id="page-top">
