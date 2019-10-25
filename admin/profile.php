<?php
  include 'includes/adminHeader.php';
?>

<!-- Page Wrapper -->
  <div id="wrapper">

  <!-- Sidebar -->
    <?php include  'includes/sideBar.php'; ?>
    <!-- End of Sidebar -->

    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" >

      <!-- Main Content -->
      <div id="content" >
          <!-- Topbar -->
            <?php include 'includes/TopNavBar.php'; ?>            
          <!-- End of Topbar -->
        
        <!-- Begin Page Content -->
        <div class="container-fluid" style="background-color:white;">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile </h1>
          </div>
            <hr>


          <!-- Content Row -->
          <div class="row">

            <!-- Content Column col-lg-6 mb-4-->
            <div class="col-lg">    
            <?php
    if (isset($_POST['updateProfile'])) {
        
        foreach ($_POST as $key => $value) {
            if (empty($_POST[$key])) {
                $error = "Please fill out all fields";
                break;
            }
        }
        
        $userFirstname = secureInput($_POST['userFirstname']);
        $userLastname = secureInput($_POST['userLastname']);
        $userEmail = secureInput($_POST['userEmail']);
        $userPassword = secureInput($_POST['userPassword']);
        $userRole = $_POST['userRole'];

        if(empty($error)){
            if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
                $error = "Invalid Email Format";
            }
        }

        
        
        
        if(empty($error)){
            $userPassword = hashPassword($userPassword);
            $insertQuery = "INSERT INTO users (userFirstname, userLastname, userEmail, userPassword, userRole) ";
            $insertQuery.= "VALUES ('$userFirstname', '$userLastname', '$userEmail', '$userPassword', '$userRole') ";
            $sendInsertQuery = mysqli_query($connection, $insertQuery);
            if (!$sendInsertQuery) {
                die("QUERY FAILED " . mysqli_error($connection));
            }else{
                $success = "Profile Updated";
            }

        }

        
    }

?>


<form action="" method="post" enctype="multipart/form-data">
    <?php
        if (!empty($error)) {?>
            <div class="alert alert-danger" role="alert">
                <?php if(isset($error)){ echo $error; } ?>
            </div>

<?php   }    ?>

<?php
        if (isset($success)) {?>
            <div class="alert alert-success" role="alert">
                <?php if(isset($success)){ echo $success; } ?>
            </div>

<?php    }    ?>

            <?php 
                $query = "SELECT * FROM users ";
                $selectAll = confirmQuery($query);

                while ($row = mysqli_fetch_assoc($selectAll)) {
                    $userFirstname = $row['userFirstname'];
                    $userLastname = $row['userLastname'];
                    $userEmail = $row['userEmail'];
                    $userPassword = $row['userPassword'];
                    $userRole = $row['userRole'];
                }


            
            ?>

    <div class="form-group">
        <label class="text-dark" for="userFirstname">First Name</label>
        <input type="text" class="form-control" name="userFirstname" placeholder="First Name"   value="<?php if(isset($userFirstname)){ echo $userFirstname; } ?>">    
    </div>
    <div class="form-group">
        <label class="text-dark" for="userLastname">Last Name</label>
        <input type="text" class="form-control" name="userLastname" placeholder="Last Name"   value="<?php if(isset($userLastname)){ echo $userLastname; } ?>">
    </div>    
    <div class="form-group">
        <label class="text-dark" for="userPassword">Password</label> <br>
        <input type="password" class="form-control" name="userPassword" placeholder="Password" value="<?php if(isset($userPassword)){ echo $userPassword; } ?>">
    </div>
    <div class="form-group">
        <label class="text-dark" for="userEmail">Email</label>
        <input type="text" class="form-control" name="userEmail" placeholder="you@domain.com" value="<?php if(isset($userEmail)){ echo $userEmail; } ?>">
    </div>
    <div class="form-group">
        <label class="text-dark" for="userRole">Role</label>
        <select class="form-control" name="userRole" id="">
        <option value="<?php echo $userRole; ?>"><?php echo $userRole; ?></option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="updateProfile" value="Update Profile">
    </div>
</form>                
              
            </div>

          
          </div>
          <!-- End of Content Row -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include 'includes/adminFooter.php'; ?>