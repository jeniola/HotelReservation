<?php include 'function.php'; ?>
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Express  Hotel 
      <?php $url = $_SERVER['REQUEST_URI'];
        switch ($url) {
          case '/hotel/index.php':
            echo "&middot; Home";
            break;
          
          case '/hotel/about.php':
            echo "&middot; About";
            break;
          
          case '/hotel/contact.php':
            echo "&middot; Contact";
            break;
          
          case '/hotel/login.php':
            echo "&middot; Login";
            break;
          
          
          default:
            # code...
            break;
        }
      
      
      
      ?>

    
     </title>

    <!-- Bootstrap-4.3.1 core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/2-col-portfolio.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/index.css">

  </head>

  <body>
