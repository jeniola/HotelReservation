<?php include 'includes/header.php';?>

    <!-- carousel -->

    <!-- Navigation -->
      <?php include 'includes/navigation.php';?>
    <!-- Page Content -->
    <div class="container">
        <h1 class="my-4"></h1>
        <div class="row">
            <div class="col-4">
                <!-- <div id="googleMap" style="width:100%;height:400px;"></div> -->
            </div>
            <div class="col-4">
                <br><br>
                <?php
                    if (isset($_POST['submit'])) {

                        foreach ($_POST as $key => $value) {
                            if (empty($_POST[$key])) {
                                $error = "All fields are required";
                                break;
                            }
                        }

                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        
                        $username = secureInput($username);
                        $password = secureInput($password);
                        


                        if(empty($error)){
                            echo $username;
                            echo $password;

                        }
                        
                    }
                ?>

                <div class="card">
                    <div class="card-body text-center login">Login</div>
                    <div class="card-body">
                    <?php
                        if (isset($error)) {?>
                            <div class="form-group alert alert-danger">
                                <?php if(isset($error)) {echo $error; } ?>

                            </div>
                        <?php }

                    ?>

                        <form action="" class="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" value="<?php if(isset($username)){echo $username;}?>" >
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" value="<?php if(isset($password)){echo $password;}?>" >
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary" name="submit" value="Sign in">
                            </div>
                        </form>
                     </div>
                </div>
                <!-- end of card -->
            </div>
            <!-- end of col-6 -->
            <div class="col-4">
            </div>
        </div>
        <!-- end of row -->
    </div>
      <!-- end of container  -->
      <!-- Footer -->

      <?php include 'includes/loginFooter.php'; ?>

