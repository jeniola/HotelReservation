<?php include 'includes/header.php';?>

    <!-- carousel -->

    <!-- Navigation -->
      <?php include 'includes/navigation.php';?>
    <!-- Page Content -->
<div class="container 1">

      <!-- Page Heading -->
      <h1 class="my-4">SiBliss
        <small>Hotel</small>
      </h1>

  <div class="row 1">
    <div class="col-lg-8">
      <h4>Something here</h4>
    </div>
  </div> <!--end of row 1 -->      
</div> <!-- container 1 -->
<div class="container-fluid">
  <div class="container 2">
      <p class="text-center text-primary availableRooms">Available Rooms<hr class="hr"></p>
      <!-- <hr class="hr"> -->
    <div class="row two 2">
      <?php
        $query = "SELECT * FROM rooms WHERE roomStatus =  'Available' ";
        $result = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($result)){
          $roomId = $row['roomId'];
          $roomImage = $row['roomImage'];
          $roomType = $row['roomType'];
          $roomDetails = $row['roomDetails'];
          $roomPrice = $row['roomPrice'];
        
      ?>
      <div class="col-md-4">   
        <div class="card border-light " style="width: 23rem; height:; ">
          <img class="card-img-top" src="images/<?php echo $roomImage;?>" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title"><?php echo $roomType;?></h4>
            <p class="card-text text-center"><?php echo $roomDetails;?></p>
            <p class="card-text text-center price">&#8358;<?php echo "$roomPrice/Night";?>
            <br><a href="bookRoom.php" class="btn btn-primary ">View More</a>
            </p>
          </div>
        </div>
      </div><!--end of col-md-4 -->
      
      <?php }?>
      
    </div> <!--end of row 2 -->
    <div class="row 3">
      <p></p>
    </div><!--end of row 2 -->
  </div><!-- end of container 2-->
</div>



    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

