<?php include 'includes/header.php';?>

    <!-- carousel -->

    <!-- Navigation -->
      <?php include 'includes/navigation.php';?>
    <!-- Page Content -->
<div class="container 1">

      <!-- Page Heading -->
      <h1 class="my-4">Name here
        <small>Hotel</small>
      </h1>

  <div class="row 1">
    <div class="col-lg-8">
      <h4>Something here</h4>
    </div>
  </div> <!--end of row 1 -->      
</div> <!-- container 1 -->
  
  <!-- Start of Container -->
  <div class="container">
    
    <div class="col-md-8">
      <p class="text-center text-primary availableRooms">Available Rooms<hr class="hr"></p>
      <hr>
    </div>    
    <!-- Start row two -->
    
    <?php
        $query = "SELECT * FROM allRooms WHERE roomStatus =  'available' ";
        $result = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($result)){
          $roomId = $row['roomId'];
          $roomType = $row['roomType'];
          $roomDetails = $row['roomDetails'];
          $roomImage = $row['roomImage'];
          $roomPrice = $row['roomPrice'];
          $roomStatus = $row['roomStatus'];
          $roomAvailable = $row['roomAvailable'];
          
        ?>
          

    <div class="row two 2">
      <div class="col-md-8">
        <!-- <hr> -->
        <!-- start of row content -->
        <div class="row">
          <div class="col-5">
            <p><img src="images/<?php echo $roomImage; ?>" alt="image"></p>
          </div> 
          <div class="col-7">
            <h4 class=""><?php echo $roomType;?></h4>
            <p class="detail"><?php echo $roomDetails; ?></p>
            <p class="price">&#8358;<?php echo $roomPrice . "/Night"; ?>
              <?php
                if ($roomAvailable==1) {
                  echo "<i style='font-size:14px;' class='text-danger textRoom'>($roomAvailable room left!)</i>";
                }elseif ($roomAvailable ==2) {
                  echo "<i style='font-size:14px;' class='text-danger textRoom'>($roomAvailable rooms left!)</i>";
                }elseif ($roomAvailable !=0 && $roomAvailable <5) {
                  echo "<i style='font-size:14px;' class='text-warning textRoom'>($roomAvailable rooms left)</i>";      
                }
              ?>              
            </p>
            <!-- <p> -->
              <a href="bookRoom.php?roomId=<?php echo $roomId; ?>" class="btn btn-primary ">Reserve Room</a>
            <!-- </p> -->
          </div> 
        </div>
        <!-- end of row content -->
        <hr>
      </div>
      <!-- end of col-md-8 content -->
    </div>
    <!-- end of class two 2 -->    
  <?php }?>
  </div>
  <!-- end of Container-->    

        
      
      
      <!-- Footer -->
      <?php include 'includes/footer.php'; ?>

