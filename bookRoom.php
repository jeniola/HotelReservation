<?php include 'includes/function.php'; ?>
<?php include 'includes/bookRoomHeader.php'; ?>

    <!-- Navigation -->
    <?php include 'includes/bookRoomNavigation.php'; ?>
    
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">SiBlis
        <small>Hotel</small>
      </h1>

      <div class="row">
        <div class="col-lg-8 portfolio-item">
          <div class="card h-100">
            <!-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
            <div class="card-body">
              <h4 class="card-title">
                <p class="text-center text-primary personal">Personal Information</p>
              </h4>
              <?php if (!empty($error)) {?>
                      <div class="alert alert-danger" role="alert"><?php if (isset($error)) echo $error; ?></div>
              <?php } ?>
              <p class="card-text">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                  
                  <div class="form-row">
                    <div class="form-group col">
                      <label for="firstName">First Name</label>
                      <input type="text" class="form-control <?php form($firstName) ?> " name="firstName" placeholder="First Name" value="<?php if(isset($firstName)){echo $firstName;} ?>">
                       
                    </div>
                    <div class="form-group col">
                      <label for="lastName">Last Name</label>
                      <input type="text" class="form-control <?php form($lastName) ?> " name="lastName" placeholder="Last Name" value="<?php if(isset($lastName)){echo $lastName;} ?>">
                    </div>
                  </div>
                  
                  <div class="form-row">
                    <div class="form-group col">
                      <label for="email">Email</label>
                      <input type="text" class="form-control <?php form($eMail) ?>" name="eMail" placeholder="email@example.com" value="<?php if(isset($eMail)){echo $eMail;} ?>" >
                    </div>
                    <div class="form-group col">
                      <label for="phoneNumber">Phone Number</label>
                      <input type="text" class="form-control <?php form($phoneNumber) ?> " name="phoneNumber" value="<?php if(isset($phoneNumber)){echo $phoneNumber;} ?>" >
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col">
                      <label for="check-in">Check-in Date</label>
                      <input type="date"  name="checkInDate" class="form-control <?php form($checkInDate) ?>" value="<?php if(isset($checkInDate)){echo $checkInDate;} ?>" >
                    </div>
                    <div class="form-group col">
                      <label for="check-out">Check-out Date</label>
                      <input type="date" name="checkOutDate" class="form-control <?php form($checkOutDate) ?>" value="<?php if(isset($checkOutDate)){echo $checkOutDate;} ?>" >
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col">
                      <label for="country">Country</label>
                      <input type="text" name="country" class="form-control <?php form($country) ?>" value="<?php if(isset($country)){echo $country;} ?>" >
                    </div>
                    <div class="col">
                      <label for="gender">Gender</label>
                      <select name="gender" id="" class="form-control <?php form($gender) ?>" value="<?php if(isset($gender)) echo $gender; ?>">
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
                      <input type="text" class="form-control <?php form($residentialAddress) ?> " name="residentialAddress" value="<?php if(isset($residentialAddress)){echo $residentialAddress;} ?>" placeholder="Address">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary form-control">
                  </div>
                </form>
              </p>
            </div><!-- end of card-body -->
          </div><!-- end of card h-100-->
        </div><!--end of col-lg-8-->
      </div> <!-- end of row -->
    </div> <!-- end of container -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>