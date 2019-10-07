<?php include 'includes/bookingRoomHeader.php'; ?>

    <!-- Navigation -->
    <?php include 'includes/bookingRoomNavigation.php'; ?>
    
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">name here
        <small>Hotel</small>
      </h1>

      <div class="row">
        <div class="col-lg-8">
            <?php 

                if (isset($_GET['roomId'])) {
                    $roomId = $_GET['roomId'];
                    include 'includes/bookRoom.php';
                }else{
                    header("Location:index.php");

                }

                
                
            ?>

       
        </div><!--end of col-lg-8-->
      </div> <!-- end of row -->
      <div class="row">
      <p></p>
      </div>
    </div> <!-- end of container -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>