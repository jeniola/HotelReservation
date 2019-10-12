<?php include 'includes/header.php';?>

    <!-- carousel -->

    <!-- Navigation -->
      <?php include 'includes/navigation.php';?>
    <!-- Page Content -->
    <div class="container">
        <h1 class="my-4"></h1>
        <div class="row">
            <div class="col-3">
                <div id="googleMap" style="width:100%;height:400px;"></div>
            </div>
            <div class="col-6">
                <br>
                <?php
                    if (isset($_POST['submit'])) {

                        $fullname = $_POST['fullname'];
                        $email = $_POST['email'];
                        $subject = $_POST['subject'];
                        $message = $_POST['message'];

                        foreach ($_POST as $key => $value) {
                            if (empty($_POST[$key])) {
                                $error = "All fields are required";
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

                <div class="card">
                    <div class="card-body text-center contact">Contact Us</div>
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
                                <input type="text" class="form-control form-control-lg" name="fullname" placeholder="Full Name" value="<?php if(isset($fullname)){echo $fullname;}?>" >
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" name="email" placeholder="Email" value="<?php if(isset($email)){echo $email;}?>" >
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" name="subject" placeholder="Subject" value="<?php if(isset($subject)){echo $subject;}?>" >
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-lg message" name="message" id="" cols="" rows="3" placeholder="Leave a Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary" name="submit">
                            </div>
                        </form>
                     </div>
                </div>
                <!-- end of card -->
            </div>
            <!-- end of col -->
            <div class="col-3"></div>
        </div>
        <!-- end of row -->
    </div>
      <!-- end of container  -->
      <!-- Footer -->
      <br><br>
      <?php include 'includes/loginFooter.php'; ?>

