<table  class="table table-bordered table-hover table-responsive text-dark">
    <thead>
        <!-- <th>Id</th> -->
        <th>Room Type</th>
        <th>Reference ID</th>
        <th>Booking Time</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Check-in-Date</th>
        <th>Check-out-Date</th>
        <th>Nights</th>
        <th>Check-in -Time</th>
        <th>Check-out-Time</th>
        <th>Country</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Payment Status</th>
        <th>Checked Out?</th>
        </th>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM reservations ORDER BY id DESC";

        $selectRooms = mysqli_query($connection, $query);
        if (!$selectRooms) {
            die("QUERY FALIED " . mysqli_error($connection));
        }
        

        while ($row = mysqli_fetch_assoc($selectRooms)) {
            // $id = $row['id'];
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
            $hasCheckedOut = $row['hasCheckedOut'];

            
            
            echo "<tr>";
            // echo "<td>$id</td>";
            echo "<td>$roomType</td>";
            echo "<td>$referenceId</td>";
            echo "<td>$bookingTime</td>";
            echo "<td>$firstName $lastName</td>";
            echo "<td>$eMail</td>";
            echo "<td>$phoneNumber</td>";
            echo "<td>$checkInDate</td>";
            echo "<td>$checkOutDate</td>";
            echo "<td>$nights</td>";
            echo "<td>$checkInTime</td>";
            echo "<td>$checkOutTime</td>";
            echo "<td>$country</td>";
            echo "<td>$gender</td>";
            echo "<td>$residentialAddress</td>";
            echo "<td>$paymentStatus</td>";
            echo "<td>$hasCheckedOut</td>";
            
            // echo "<td><a class='btn btn-primary ' href='rooms.php?source=editRoom&rId={$roomId}'>Edit Room</a></td>";
            // echo "<td><input type='submit' class='btn btn-danger' value='Delete'></td>";
            ?>
        <form action="" method="post">
            <input type="hidden" name="roomId" value="<?php echo $roomId; ?> ">

<?php
            // echo "<td><input type='submit' class='btn btn-danger' name='deleteRoom' value='Delete' ></td>";
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
        
        ?>
    </tbody>

</table>