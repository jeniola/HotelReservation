<?php
    if (isset($_GET['rId'])) {
        $theRoomId = $_GET['rId'];
    }

    if (isset($_POST['editRoom'])) {
        
        foreach ($_POST as $key => $value) {
            if (empty($_POST[$key])) {
                $error = "All Fields are required";
                break;
            }
        }

        if (empty($error)) {
            if (empty($_FILES['roomImage']['name'])) {
                $error = "Please Choose Image";
            }
        }

        if(empty($error)){
            $success = "Room Adjusted";
        }

        $roomType = $_POST['roomType'];
        $roomDetails = $_POST['roomDetails'];
        
        $roomImage = $_FILES['roomImage']['name'];
        $roomImageTmp = $_FILES['roomImage']['tmp_name'];
        
        $roomPrice = $_POST['roomPrice'];
        $roomStatus = $_POST['roomStatus'];
        $roomTotal = $_POST['roomTotal'];
        
        if (empty($error)) {
            $moveImage = move_uploaded_file($roomImageTmp, "../images/$roomImage");
            $addRoomquery = "UPDATE allRooms SET ";
            $addRoomquery.= "roomType = '{$roomType}', ";
            $addRoomquery.= "roomDetails = '{$roomDetails}', ";
            $addRoomquery.= "roomImage = '{$roomImage}', ";
            $addRoomquery.= "roomPrice = '{$roomPrice}', ";
            $addRoomquery.= "roomStatus = '{$roomStatus}', ";
            $addRoomquery.= "roomTotal = '{$roomTotal}' ";
            $addRoomquery.= "WHERE roomId = {$theRoomId} ";
            
            $sendAddRoomquery = mysqli_query($connection, $addRoomquery);
        }
    }

?>


<form action="" method="post" enctype="multipart/form-data">
    <?php
        if (!empty($error)) {?>
            <div class="alert alert-danger" role="alert">
                <?php if(isset($error)){ echo $error; } ?>
            </div>

<?php    }    ?>
<?php
        if (isset($success)) {?>
            <div class="alert alert-success" role="alert">
                <?php if(isset($success)){ echo $success; } ?>
            </div>

<?php    }    ?>

        <?php 
            $query = "SELECT * FROM allRooms WHERE roomId = '{$theRoomId}'; ";
            $addRoomQuery = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($addRoomQuery)){
                $roomId = $row['roomId'];
                $roomTypeId = $row['roomTypeId'];
                $roomType = $row['roomType'];
                $roomDetails = $row['roomDetails'];
                $roomImage = $row['roomImage'];
                $roomPrice = $row['roomPrice'];
                $roomStatus = $row['roomStatus'];
                $roomTotal = $row['roomTotal'];

            ?>
            
            <?php    
        
            }
            ?>
            
    <div class="form-group">
        <label for="roomType">Room Type</label>
        <input type="text" class="form-control" name="roomType" placeholder="Room Type"   value="<?php if(isset($roomType)){ echo $roomType; } ?>">            
    </div>
    <div class="form-group">
        <label for="roomDetails">Room Details</label>
        <input type="text" class="form-control" name="roomDetails" placeholder="Room Details"   value="<?php if(isset($roomDetails)){ echo $roomDetails; } ?>">
    </div>    
    <div class="form-group">
        <label for="roomImage">Room Image</label> <br>
        <?php
        echo "<img width='100' src='../images/$roomImage' alt='image' ?>"; ?>
        <input type="file" class="form-control" name="roomImage" value="<?php if(isset($roomImage)){echo $roomImage;} ?>">
    </div>
    <div class="form-group">
        <label for="roomPrice">Room Price</label>
        <input type="text" class="form-control" name="roomPrice" placeholder=" e.g. 5000" value="<?php if(isset($roomPrice)){ echo $roomPrice; } ?>">
    </div>
    <div class="form-group">
        <label for="roomStatus">Room Status</label>
        <select class="form-control" name="roomStatus" id="">
        <option <?php if(isset($roomStatus) && $roomStatus=="available") { ?> selected <?php } ?> value="available">Available</option>
        <option <?php if(isset($roomStatus) && $roomStatus=="booked") { ?> selected <?php } ?> value="booked">Booked</option>
        </select>
    </div>
    <div class="form-group">
        <label for="roomTotal">Total Room </label>
        <input type="text" class="form-control" name="roomTotal" placeholder=" e.g. 5" value="<?php if(isset($roomTotal)){ echo $roomTotal; } ?>">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="editRoom" value="Edit Room">
    </div>
</form>
