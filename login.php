<?php 
    include 'includes/header.php';
?>

    <!-- carousel -->

    <!-- Navigation -->
      <?php include 'includes/navigation.php';?>
    <!-- Page Content -->
    <div class="container">
        <h1 class="my-4"></h1>
        <div class="row">
            <div class="col-3">
                <!-- <div id="googleMap" style="width:100%;height:400px;"></div> -->
            </div>
            <div class="col-6">
                <br><br>
                <?php
                    if (isset($_POST['submit'])) {

                        foreach ($_POST as $key => $value) {
                            if (empty($_POST[$key])) {
                                $error = "Please fill out all fields";
                                break;
                            }
                        }

                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        
                        $username = secureInput($username);
                        $password = secureInput($password);
                        
                        // $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10)); 
                        if(empty($error)){

                            $query = "SELECT * FROM users ";
                            $sendQuery = confirmQuery($query);
                            // $2y$10$7yRb4fx8t2gamrij6t0en.IJFgsHTOJpQ/kW/1ArHAOZ5AR1TK6LO

                            
                            while($row = mysqli_fetch_assoc($sendQuery)){
                                $db_username = $row['userEmail'];
                                $db_password = $row['userPassword'];
                                $db_userFirstname = $row ['userFirstname'];
                                $db_userImage = $row ['userImage'];
                                $db_userRole = $row ['userRole'];
                            }


                            if ($username == $db_username && $password == $db_password) {
                                $_SESSION['userFirstname'] = $db_userFirstname;
                                $_SESSION['userImage'] = $db_userImage;
                                $_SESSION['userRole'] = $db_userRole;
                                
                                
                                header("Location:admin");
                            
                                // $userImage = $_SESSION['userImage'];

                            }else{
                                $error = "Invalid username or password";
                            }
                            // echo $username;
                            // echo $password;

                        }
                        
                    }
                ?>

                <div class="card">
                    <div class="card-body text-center login">Login</div>
                    <div class="card-body">
                    <?php
                        if (isset($error)) {?>
                            <div class="form-group alert alert-danger alert-dismissible fade show" role="alert">
                                <?php if(isset($error)) {echo $error; } ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>  
                                </button>

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
            <!-- end of col-4 -->
            <div class="col-3">
            </div>
        </div>
        <!-- end of row -->
    </div>
      <!-- end of container  -->
      <!-- Footer -->

      <?php include 'includes/loginFooter.php'; ?>
