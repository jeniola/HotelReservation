<table  class="table table-bordered">
    <thead>
        <th>Id</th>
        <th>Type</th>
        <th>Details</th>
        <th>Image</th>
        <th>Price</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
        </th>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM rooms ORDER BY roomId DESC";

        $selectRooms = mysqli_query($connection, $query);
        if (!$selectRooms) {
            die("QUERY FALIED " . mysqli_error($connection));
        }
        

        while ($row = mysqli_fetch_assoc($selectRooms)) {
            $roomId = $row['roomId'];
            $roomType = $row['roomType'];
            $roomDetails = $row['roomDetails'];
            $roomImage = $row['roomImage'];
            $roomPrice = $row['roomPrice'];
            $roomStatus = $row['roomStatus'];
            
            echo "<tr>";
            echo "<td>$roomId</td>";
            echo "<td>$roomType</td>";
            echo "<td>$roomDetails</td>";
            echo "<td><img width='100' src='../images/$roomImage' alt='image'></td>";
            echo "<td>&#8358;$roomPrice</td>";
            echo "<td>$roomStatus</td>";
            echo "<td>$roomStatus</td>";
            
            ?>
            <form action="" method="post">
                <input type="hidden" name="roomId" value="<?php echo $roomId; ?>" >
                <?php

            echo "<td><input type='submit' name='delete' class='btn btn-danger' value='Delete'></td>";
            echo "</tr>";
                 ?>
            </form>
            <?php
        }


            // header("Refresh:0;url=rooms.php");
        
        ?>
    
    </tbody>

</table>



<?php





    

?>

