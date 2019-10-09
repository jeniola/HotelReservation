<table  class="table table-bordered table-hover table-responsive text-dark">
    <thead>
        <th>Room Type</th>
        <th>Reference ID</th>
        <th>Booking Date/Time</th>
        <th>Email</th>
        <th>Check-In-Date</th>
        <th>Check-Out-Date</th>
        <th>Nights</th>
        <th>Check-In- Time</th>
        <th>Check-Out-Time</th>
        <th>Payment Status</th>
        <th>Check-in</th>
        <th>Check-out</th>
        </th>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM reservations WHERE paymentStatus = 'Paid' && hasCheckedOut = 'no' ORDER BY id DESC ";

        $selectRooms = mysqli_query($connection, $query);
        if (!$selectRooms) {
            die("QUERY FALIED " . mysqli_error($connection));
        }
        

        while ($row = mysqli_fetch_assoc($selectRooms)) {
            $id = $row['id'];
            $roomType = $row['roomType']; //get from the typeId
            $referenceId = $row['referenceId'];
            $bookingTime = $row['bookingTime'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $eMail = $row['eMail'];
            $phoneNumber = $row['phoneNumber'];
            $checkInDate = $row['checkInDate'];
            $checkOutDate = $row['checkOutDate'];
            $nights = $row['nights'];
            $checkInTime = $row['checkInTime'];
            $checkOutTime = $row['checkOutTime'];
            $country = $row['country'];
            $gender = $row['gender'];
            $residentialAddress = $row['residentialAddress'];
            $paymentStatus = $row['paymentStatus'];
            

            echo "<tr>";
            echo "<td>type</td>";
            echo "<td>$referenceId</td>";
            echo "<td>$bookingTime</td>";
            echo "<td>$eMail</td>";
            echo "<td>$checkInDate</td>";
            echo "<td>$checkOutDate</td>";
            echo "<td>$nights</td>";
            echo "<td>$checkInTime</td>";
            echo "<td>$checkOutTime</td>";
            echo "<td>$paymentStatus</td>";
            
            ?>
        <form action="" method="post">
            <input type="hidden" name="referenceId" value="<?php echo $referenceId; ?> ">
            
<?php
            echo "<td><input type='submit' class='btn btn-primary' name='checkInUser' value='Check In'></td>";
            echo "<td><input type='submit' class='btn btn-secondary' name='checkOutUser' value='Check Out'></td>";

            echo "</tr>";
                 
        }
            // header("Refresh:0;url=rooms.php");
?>

        </form>
        <?php
            if (isset($_POST['deleteRoom'])) {
                $deleteRoomId = $_POST['roomId'];
                $deleteRoomQuery = "DELETE FROM allRooms WHERE roomId = '{$deleteRoomId}' ";
                $sendDeleteRoomQuery = mysqli_query($connection, $deleteRoomQuery) ;
                header("Location: rooms.php");
            }
        
            if(isset($_POST['checkInUser'])){
                $userReferenceId = $_POST['referenceId'];
                
                $query = "UPDATE reservations SET ";
                $query.= "checkInTime = now() ";
                $query.= "WHERE referenceId = '{$userReferenceId}' ";
                
                $sendQuery = mysqli_query($connection, $query);
                header("Location: reservations.php?source=currentReservation");
            }
            
            if(isset($_POST['checkOutUser'])){
                $userReferenceId = $_POST['referenceId'];
                
                $query = "UPDATE reservations SET ";
                $query.= "checkOutTime = now(), ";
                $query.= "hasCheckedOut = 'Yes' ";
                $query.= "WHERE referenceId = '{$userReferenceId}' ";
                
                $sendQuery = mysqli_query($connection, $query);
                header("Location: reservations.php?source=currentReservation");
            }

        ?>
    </tbody>

</table>