
          <div class="card h-100">
            <!-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
            <div class="card-body">
              <h4 class="card-title">
                <p class="text-center text-primary personal">Personal Information</p>
              </h4>
              <?php if (!empty($error)) {?>
                      <div class="alert alert-danger " role="alert"><?php if (isset($error)) echo $error; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
              <?php  } ?>
              <p class="card-text">
                <form class="users" action="" method="post" autocomplete="off">
                <!-- <form class="users" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> -->
                <?php 
                  if(isset($_GET['roomId'])){ $theRoomId = $_GET['roomId']; ?>
                    

                  <?php 
                    $roomTypeQuery = "SELECT * FROM  allrooms WHERE roomId = '{$theRoomId}' ";
                    $sendQuery = confirmQuery($roomTypeQuery);

                    while ($row = mysqli_fetch_assoc($sendQuery)) {
                      $theRoomType = $row['roomType'];
                    }

                  }
                
                ?>
                  <div class="row">
                    <div class="form-group col">
                      <label for="firstName">First Name</label>
                      <input type="text" class=" form-control form-control-lg " name="firstName" placeholder="First Name" value="<?php if(isset($firstName)){echo $firstName;} ?>">
                       
                    </div>
                    <div class="form-group col">
                      <label for="lastName">Last Name</label>
                      <input type="text" class="form-control form-control-lg " name="lastName" placeholder="Last Name" value="<?php if(isset($lastName)){echo $lastName;} ?>">
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="form-group col">
                      <label for="email">Email</label>
                      <input type="text" class="form-control form-control-lg" name="eMail" placeholder="you@domain.com" value="<?php if(isset($eMail)){echo $eMail;} ?>" >
                    </div>
                    <div class="form-group col">
                      <label for="phoneNumber">Phone Number</label>
                      <input type="text" class="form-control form-control-lg" name="phoneNumber" value="<?php if(isset($phoneNumber)){echo $phoneNumber;} ?>"placeholder="Phone Number" >
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col">
                    <?php $currentDate = date("Y-m-d");
                          $tomorrow = strtotime("tomorrow");
                          $tomorrowDate = date("Y-m-d", $tomorrow);
                    
                    ?>
                      <label for="check-in">Check-in Date</label>
                      <input type="date"  name="checkInDate" class="form-control form-control-lg" value="<?php if(isset($checkInDate)){echo $checkInDate;} ?>" min="<?php echo $currentDate; ?>">
                    </div>
                    <div class="form-group col">
                      <label for="check-out">Check-out Date</label>
                      <input type="date" name="checkOutDate" class="form-control form-control-lg" value="<?php if(isset($checkOutDate)){echo $checkOutDate;} ?>" min="<?php echo $tomorrowDate; ?>" >
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col autocomplete">
                      <label for="country">Country</label>
                      <input id="countries" type="text" name="country" class="form-control form-control-lg"  value="<?php if(isset($country)){echo $country;} ?>" placeholder="Country">
                    </div>
                    <div class="col">
                      <label for="gender">Gender</label>
                      <select name="gender" id="" class="form-control form-control-lg" value="<?php if(isset($gender)) echo $gender; ?>">
                        <option value="">Choose</option>
                        <option <?php if(isset($gender) && $gender=="Male"){?> selected <?php } ?> value="Male">Male</option>
                        <option <?php if(isset($gender) && $gender=="Female"){ ?> selected <?php } ?> value="Female">Female</option>
                        <option <?php if(isset($gender) && $gender=="Custom"){ ?> selected <?php } ?> value="Custom">Custom</option>
                      </select>
                    </div>                    
                  </div>

                  <div class="row">
                    <div class="form-group col">
                      <label for="residentialAddress">Residential Address</label>
                      <input type="text" class="form-control form-control-lg ddress)" name="residentialAddress" value="<?php if(isset($residentialAddress)){echo $residentialAddress;} ?>" placeholder="Address">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="payNow" class="btn btn-primary form-control" value="Reserve Room">
                  </div>
                </form>
              </p>
            </div><!-- end of card-body -->
          </div><!-- end of card h-100-->
    