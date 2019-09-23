<?php include 'includes/register_header.php'; ?>
<?php include 'db.php'; ?>
<?php include 'process/signup_process.php'; ?>


    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>
    
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
      </h1>

      <div class="row">
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <!-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Next of Kin Information </a>
              </h4>
              <p class="card-text">
 
                   
            </p>
            </div>
          </div>
        </div>


        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <!-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Personal Information</a>
              </h4>
              <p class="card-text">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                    <?php if (!empty($error)) {?>
                      <div class="error"><?php if (isset($error)) echo $error; ?></div>
                    <?php } ?>

                    <?php if (!empty($success)) {?>
                      <div class="success"><?php if (isset($success)) echo $success; ?></div>
                    <?php } ?>

                    <div class="form-group">
                      <p>Username*<input class="form-control" type="text" name="username" value="<?php if(isset($username)) echo $username;?>"></p>
                    </div>
                    <div class="form-group">
                      <p>First Name*<input class="form-control" type="text" name="firstname" value="<?php if(isset($firstname)) echo $firstname;?>"></p>
                    </div>
                    <div class="form-group">
                      <p>Last Name*<input class="form-control" type="text" name="lastname" value="<?php if(isset($lastname)) echo $lastname;?>"></p>
                    </div>
                    <div class="form-group">
                      <p>Phone Number*<input class="form-control" type="text" name="number" value="<?php if(isset($number)) echo $number;?>"></p>
                    </div>
                    <div class="form-group">
                      <p>Email* <input class="form-control" type="text" name="email" value="<?php if(isset($email)) echo $email;?>"></p>
                    </div>
                    <div class="form-group">
                      <p>Gender*<br>

                      <input type="radio" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender']=="Male") {?>checked <?php }?> value="Male">Male

                      <input type="radio" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender']=="Female"){?> checked <?php } ?> value="Female">Female</p>
                    </div>

                    <div class="form-group">
                      <input type="checkbox" name="terms"> I accept Terms and Conditions 
                      <input class="btn btn-primary form-control" type="submit" name="register" value="Register">
                      
                    </div>
                </form>
              </p>
            </div>
          </div>
        </div>

        
        
        <!--  -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>