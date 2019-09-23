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
              <p class="card-text">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                  
                  <div class="form-row">
                    <div class="form-group col">
                      <label for="firstName">First Name</label>
                      <input type="text" class="form-control <?php if (isset($error)) {?>
                        is-invalid <?php }?> " name="firstName" placeholder="First Name">
                        <div class="error">
                          <?php if (isset($error)){
                            echo $error;
                          }?>
                        </div>
                    </div>
                    <div class="form-group col">
                      <label for="lastName">Last Name</label>
                      <input type="text" class="form-control <?php if (isset($error)) {?>
                        is-invalid <?php }?> " name="lastName" placeholder="Last Name">
                      <div class="error">
                        <?php if (isset($error)){
                            echo $error;
                          }?>
                      </div>
                    </div>
                  </div>
                  

                  <div class="form-row">
                    <div class="form-group col">
                      <label for="email">Email</label>
                      <input type="text" class="form-control <?php if (isset($error)) {?>
                        is-invalid <?php }?> " name="email" placeholder="email@example.com">
                        <div class="error">
                          <?php if (isset($error)){
                            echo $error;
                          }?>
                        </div>
                      </div>
                    <div class="form-group col">
                      <label for="phoneNumber">Phone Number</label>
                      <input type="text" class="form-control <?php if (isset($error)) {?>
                        is-invalid <?php }?> " name="phoneNumber">
                        <div class="error">
                          <?php if (isset($error)){
                            echo $error;
                          }?>
                        </div>
                      </div>
                  </div>

                  <div class="row">
                    <div class="form-group col">
                      <label for="nights">Number of Nights</label>
                      <input type="number" name="nights" class="form-control <?php if (isset($error)) {?>
                        is-invalid <?php }?> " min="1" max="100">
                        <div class="error">
                          <?php if (isset($error)){
                            echo $error;
                          }?>
                        </div>
                      </div>
                    <div class="col">
                      <label for="nights">Gender</label><br>
                      <!-- <div class="form-check form-check-inline">
                        <label for="male"><input class="form-check-input" type="radio" name="male" >Male </label>
                      </div> -->
                      <!-- <div class="form-check form-check-inline">
                        <label for="female"><input class="form-check-input" type="radio" name="female" >Female </label>
                      </div> -->
                      <select name="gender" id="" class="form-control <?php if (isset($error)) {?>
                        is-invalid <?php }?>">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Custom">Custom</option>
                      </select>
                      <div class="error">
                          <?php if (isset($error)){
                            echo $error;
                          }?>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col">
                      <label for="address">Residential Address</label>
                      <textarea class="form-control <?php if (isset($error)) {?>
                        is-invalid <?php }?> " name="address" placeholder="Address" cols="30" rows="5"></textarea>
                        <div class="error">
                          <?php if (isset($error)){
                            echo $error;
                          }?>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" name="proceed">Proceed to Payment</button>
                  </div>

                    
                    <?php if (!empty($success)) {?>
                      <div class="success"><?php if (isset($success)) echo $success; ?></div>
                    <?php } ?>

                </form>
              </p>
            </div><!-- end of card-body -->
          </div><!-- end of card h-100-->
        </div><!--end of col-lg-8-->
      </div> <!-- end of row -->
    </div> <!-- end of container -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>