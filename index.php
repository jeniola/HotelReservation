<?php include 'includes/header.php';?>

    <!-- carousel -->

    <!-- Navigation -->
      <?php include 'includes/navigation.php';?>

    <!-- Page Content -->
    <div class="container 1">
          <!-- Page Heading -->
          <!-- <h1 class="my-4">Name here
            <small>Hotel</small>
          </h1> -->

      <div class="row 1">
        <div class="col-lg-8">
          <!-- <img src="images/home 1.jpg" alt=""> -->
        </div>
      </div> <!--end of row 1 -->      
    </div> <!-- container 1 -->
    
    <!-- Start of Container -->
    <div class="container ">
      <div class="col-md-8">
        <p class="text-center text-primary availableRooms">Available Rooms</p>
        <hr class="hr">
        <hr class="col-auto"> 
      </div>    
      
      <!-- Start row two -->
      <?php
          $query = "SELECT * FROM allrooms WHERE roomStatus =  'available' ";
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
          <div class="row">
            <div class="col-auto">
              <img class="image-index" src="images/<?php echo $roomImage; ?>" alt="room image" title="<?php echo $roomType; ?>" width="" height="">
            </div> 
            <div class="col-auto">
              <h5 class=""><?php echo $roomType;?></h5>
              <h6 class="detail"><?php echo $roomDetails; ?></h6>
              <p class="price">&#8358;<?php echo $roomPrice . "/Night"; ?>
                <?php
                  // if ($roomAvailable==1) {
                  //   echo "<i style='font-size:14px;' class='text-danger textRoom'>($roomAvailable room left!)</i>";
                  // }elseif ($roomAvailable ==2) {
                  //   echo "<i style='font-size:14px;' class='text-danger textRoom'>($roomAvailable rooms left!)</i>";
                  // }elseif ($roomAvailable !=0 && $roomAvailable <5) {
                  //   echo "<i style='font-size:14px;' class='text-warning textRoom'>($roomAvailable rooms left)</i>";      
                  // }
                ?>             
                <br>
              <a class="btn btn-primary" href="bookingRoom.php?roomId=<?php echo $roomId; ?> ">Reserve Room</a>
              </p>

            </div>
            <!-- end of col-7 -->
          </div>
          <!-- end of row -->
          <hr>
        </div>
        <!-- end of col-md-8 content -->
      </div>
      <!-- end of class row two 2 -->    
      <?php }  ?>
    </div>
    <!-- end of Container-->    
    <br>
    <!-- Contact  -->
    <!-- Start of Container 3 -->
    <div class="container-fluid contact">
      <div class="container">
        <div class="row">
          <div class="col-1"></div>
          <div class="col-10">
            <p id="contact" class="getInTouch">Get in Touch</p>
            <p class="fas fa-map-marker-alt address"></p>
            <p class="description"> Bayan Gari, Beside Abubakar Tafawa Balewa Stadium, Bauchi </p>
            <div class="card contact" style="width:100%">
             
              <!-- Form Validation -->
              <?php
                if (isset($_POST['send'])) {

                  $fullname = $_POST['fullname'];
                  $email = $_POST['email'];
                  $subject = $_POST['subject'];
                  $message = $_POST['message'];

                  foreach ($_POST as $key => $value) {
                      if (empty($_POST[$key])) {
                          $error = "Please fill out all fields";
                          break;
                      }
                  }

                  if (empty($error)) {
                      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                          $error = "Invalid Email Format";
                      }
                  }

                  if(empty($error)){
                      $to = "eniolajohn3@outlook.com";
                      $from = $email;
                      $header = "From: " . $from . "\r\n" ;
                      $sendMail = mail($to, $subject, $message, $header);

                      if($sendMail){?>
                          <div class="alert alert-success" role="alert">Thank you for contacting us</div>

                      <?php }else{ ?>
                          <div class="alert alert-danger" role="alert">Your message was not sent</div>
                      <?php }
                  }
                }
            ?>
                <?php
                if (isset($error)) {?>
                    <div id="contact" class="form-group alert alert-danger">
                <?php if(isset($error)){  echo $error;  } ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }  ?>             

                  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <p>We'll love to hear from you...</p>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg" name="fullname" placeholder="Full Name" value="<?php if(isset($fullname)){echo $fullname;}?>" >
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg" name="email" placeholder="Email Address" value="<?php if(isset($email)){echo $email;}?>" >
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg" name="subject" placeholder="Subject" value="<?php if(isset($subject)){echo $subject;}?>" >
                    </div>

                    <div class="form-group">
                      <textarea class="form-control form-control-lg message" name="message" id="" cols="" rows="3" placeholder="Leave a Message"></textarea>
                    </div>

                    <div class="form-group">
                      <input type="submit" class=" btn btn-primary " name="send" value="Send">
                    </div>

                  </form>
            </div>
            <!-- end of card -->
          </div>
          <!-- end of col-10 -->
          <div class="col-1"></div>

        </div>
        <!-- end  of row -->
      </div>
      <!-- end of container -->
    </div>
    <!-- End of Container 3 -->

    





    <!-- Footer -->
        <?php include 'includes/footer.php'; ?>

