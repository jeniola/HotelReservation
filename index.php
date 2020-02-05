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
        <p class="text-center text-primary availableRooms">Available Rooms</p>
        <hr class="hr">
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
              <p><img width="100%" src="images/<?php echo $roomImage; ?>" alt="image"></p>
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

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    View More
                  </button>

                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalCenterTitle">
                            <?php 
                                echo $roomPrice;
                            ?>
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                            <?php
                                $fetchImagequery = "SELECT * FROM roomFeatures WHERE roomImageId = '{$roomType}' ";
                                $fetchImageResult = confirmQuery($fetchImagequery);
                                while ($row = mysqli_fetch_assoc($fetchImageResult)) {
                                  $roomWardrobe = $row['roomWardrobe'];
                                  $roomToilet = $row['roomToilet'];
                                  $roomTowel = $row['roomTowel'];
                                  $roomToiletries = $row['roomToiletries'];
                                  $roomBathroom = $row['roomBathroom'];
                                  $roomTV = $row['roomTV'];
                                  $roomKitchen = $row['roomKitchen'];
                                  
                                  ?>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="images/<?php echo $roomWardrobe; ?>" class="d-block w-100" alt="Wardrobe" width="500" height="380" title="Wardrobe">
                              </div>
                              <div class="carousel-item ">
                                <img src="images/<?php echo $roomToilet; ?>" class="d-block w-100" alt="Toilet" width="500" height="380" title="Toilet">
                              </div>
                              <div class="carousel-item">
                                <img src="images/<?php echo $roomTowel; ?>" class="d-block w-100" alt="Towel" width="500" height="380" title="Towel">
                              </div>
                              <div class="carousel-item">
                                <img src="images/<?php echo $roomToiletries; ?>" class="d-block w-100" alt="Toiletries" width="500" height="380" title="Toiletries">
                              </div>
                              <div class="carousel-item">
                                <img src="images/<?php echo $roomBathroom; ?>" class="d-block w-100" alt="Bathroom" width="500" height="380" title="Bathroom">
                              </div>
                              <div class="carousel-item">
                                <img src="images/<?php echo $roomTV; ?>" class="d-block w-100" alt="TV" width="500" height="380" title="TV">
                              </div>
                              <div class="carousel-item">
                                <img src="images/<?php echo $roomKitchen; ?>" class="d-block w-100" alt="Kitchen" width="500" height="380" title="Kitchen">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>

                                <?php } ?>                        
                            </div> <!-- end carousel-inner-->

                            <div class="modal-footer">
                                <a href="bookingRoom.php?roomId=<?php echo $roomId; ?>" class="btn btn-primary ">Select Room</a>
                            </div>

                        </div>
                        <!-- end of modal-body -->
                      </div>
                    </div>
                  </div>
                  <!-- end of modal fade -->
           </div>
           <!-- end of col-7 -->
          </div>
          <!-- end of row -->
          
          <!-- end of row content -->
          <hr>
        </div>
        <!-- end of col-md-8 content -->
      </div>
      <!-- end of class two 2 -->    
    <?php }  ?>
    </div>
    <!-- end of Container-->    

                 
        
        <!-- Footer -->
        <br><br><br><br>
        <?php include 'includes/footer.php'; ?>

