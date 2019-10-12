<?php
    if (isset($_GET['userId'])) {
        $theUserId = $_GET['userId'];
        // echo $theUserId;
    }
    if (isset($_POST['editUser'])) {
        
        foreach ($_POST as $key => $value) {
            if (empty($_POST[$key])) {
                $error = "All Fields are required";
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
            $updateQuery = "UPDATE users SET ";
            $updateQuery.= "userFirstname = '{$userFirstname}', ";
            $updateQuery.= "userLastname = '{$userLastname}', ";
            $updateQuery.= "userEmail = '{$userEmail}', ";
            $updateQuery.= "userPassword = '{$userPassword}', ";
            $updateQuery.= "userRole = '{$userRole}' ";
            $updateQuery.= "WHERE userId =  '{$theUserId}' ";
            
            $sendInsertQuery = mysqli_query($connection, $updateQuery);
            if (!$sendInsertQuery) {
                die("QUERY FAILED " . mysqli_error($connection));
            }else{
                $success = "User Updated: <a href='users.php'>View Users</a> ";
            }

        }

        
    }

?>


<form action="" method="post">
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
            $selectQuery = "SELECT * FROM users ";
            $sendQuery = confirmQuery($selectQuery);

            while ($row = mysqli_fetch_assoc($sendQuery)) {
                $userId = $row['userId'];
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
        <label class="text-dark" for="userEmail">Email</label>
        <input type="text" class="form-control" name="userEmail" placeholder="you@domain.com" value="<?php if(isset($userEmail)){ echo $userEmail; } ?>">
    </div>
    <div class="form-group">
        <label class="text-dark" for="userPassword">Password</label> <br>
        <input type="password" class="form-control" name="userPassword" placeholder="Password" value="<?php if(isset($userPassword)){ echo $userPassword; } ?>">
    </div>
    <div class="form-group">
        <label class="text-dark" for="userRole">Role</label>
        <select class="form-control" name="userRole" id="">
        <option <?php if(isset($userRole)&& $userRole=="Admin"){?> selected <?php } ?> value="Admin">Admin</option>
        <option <?php if(isset($userRole)&& $userRole=="Subscriber"){?> selected <?php } ?> value="Subscriber">Subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="editUser" value="Edit User">
    </div>
</form>