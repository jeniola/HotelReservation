<table  class="table table-bordered table-hover text-dark">
    <thead>
        <th>Id</th>
        <th>Type</th>
        <th>Details</th>
        <th>Image</th>
        <th>Price</th>
        <th>Status</th>
        <th>Total Rooms</th>
        <th>Available Rooms</th>
        <th>Edit Room</th>
        </th>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM allRooms ORDER BY roomId DESC";

        $selectRooms = mysqli_query($connection, $query);
        if (!$selectRooms) {
            die("QUERY FALIED " . mysqli_error($connection));
        }
        

        while ($row = mysqli_fetch_assoc($selectRooms)) {
            $roomId = $row['roomId'];
            $roomTypeId = $row['roomTypeId'];
            $roomType = $row['roomType'];
            $roomDetails = $row['roomDetails'];
            $roomImage = $row['roomImage'];
            $roomPrice = $row['roomPrice'];
            $roomStatus = $row['roomStatus'];
            $roomTotal = $row['roomTotal'];
            $roomAvailable = $row['roomAvailable'];
            
            
            echo "<tr>";
            echo "<td>$roomId</td>";
            echo "<td>$roomType</td>";
            echo "<td>$roomDetails</td>";
            echo "<td><img width='100' src='../images/$roomImage' alt='image'></td>";
            echo "<td>&#8358;$roomPrice</td>";
            echo "<td>$roomStatus</td>";
            echo "<td>$roomTotal</td>";
            echo "<td>$roomAvailable</td>";
            echo "<td><a class='btn btn-primary ' href='rooms.php?source=editRoom&rId={$roomId}'>Edit Room</a></td>";
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