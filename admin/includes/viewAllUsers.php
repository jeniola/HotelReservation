<table  class="table table-bordered table-hover text-dark">
    <thead>
        <th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role</th>
        </th>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM users ORDER BY userId DESC";

        $allUsers = mysqli_query($connection, $query);
        if (!$allUsers) {
            die("QUERY FALIED " . mysqli_error($connection));
        }
        

        while ($row = mysqli_fetch_assoc($allUsers)) {
            $userId = $row['userId'];
            $userFirstname = $row['userFirstname'];
            $userLastname = $row['userLastname'];
            $userEmail = $row['userEmail'];
            $userRole = $row['userRole'];
            
            
            echo "<tr>";
            echo "<td>$userId</td>";
            echo "<td>$userFirstname</td>";
            echo "<td>$userLastname</td>";
            echo "<td>$userEmail</td>";
            echo "<td>$userRole</td>";
            echo "<td><a class='btn btn-primary' href='users.php?makeAdmin={$userId}'>Admin </a></td>";
            echo "<td><a class='btn btn-info' href='users.php?makeSubscriber={$userId}'>Subscriber </a></td>";
            echo "<td><a class='btn btn-warning' href='users.php?source=editUser&userId={$userId}'>Edit </a></td>";
            
            ?>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="hidden" name="theRoomId" class="form-control" value="<?php echo $userId; ?>">
                    </div>
                
            <?php
            
            echo "<td><input onClick=\" javascript: return confirm ('Are you sure you want to delete?'); \" type='submit' name='deleteUser' class='btn btn-danger' value='Delete'></td>";
            ?>
            </form>

<?php
            echo "</tr>";
                 
        }

        ?>
        <?php
            if (isset($_GET['makeAdmin'])) {
                $theUserId = $_GET['makeAdmin'];
                $makeAdminQuery = "UPDATE users SET ";
                $makeAdminQuery.= "userRole = 'Admin' ";
                $makeAdminQuery.= "WHERE userId = '{$theUserId}' ";
                confirmQuery($makeAdminQuery);
                header("Location: users.php");
            }

            if (isset($_GET['makeSubscriber'])) {
                $theUserId = $_GET['makeSubscriber'];
                $makeSubscriberQuery = "UPDATE users SET ";
                $makeSubscriberQuery.= "userRole = 'Subscriber' ";
                $makeSubscriberQuery.= "WHERE userId = '{$theUserId}' ";
                confirmQuery($makeSubscriberQuery);
                header("Location: users.php");
            }

            if (isset($_POST['deleteUser'])) {
                $theUserId = $_POST['userId'];
                $deleteUserQuery = "DELETE FROM users WHERE userId = '{$theUserId}' ";
                $sendDeleteUserQuery = mysqli_query($connection, $deleteUserQuery) ;
                confirmQuery($makeAdminQuery);
                header("Location: users.php");
            }
        
        ?>
    </tbody>

</table>