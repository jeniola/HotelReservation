<?php
    if (isset($_POST['addRoom'])) {
        
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

        $roomType = $_POST['roomType'];
        $roomDetails = $_POST['roomDetails'];
        
        $roomImage = $_FILES['roomImage']['name'];
        $roomImageTmp = $_FILES['roomImage']['tmp_name'];

        $roomPrice = $_POST['roomPrice'];
        $roomStatus = $_POST['roomStatus'];
        $roomTotal = $_POST['roomTotal'];
        
        if(empty($error)){
            $success = "Room Added Successfully";
        }

        if(empty($error)){
            $moveImage = move_uploaded_file($roomImageTmp, "../images/$roomImage");
            $insertQuery = "INSERT INTO allRooms (roomType, roomDetails, roomImage, roomPrice, roomStatus, roomTotal) ";
            $insertQuery.= "VALUES ('$roomType', '$roomDetails', '$roomImage', '$roomPrice', '$roomStatus', '$roomTotal') ";
            $sendInsertQuery = mysqli_query($connection, $insertQuery);
            if (!$sendInsertQuery) {
                die("QUERY FAILED " . mysqli_error($connection));
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

    <div class="form-group">
        <label class="text-dark" for="roomName">Room Type</label>
        <input type="text" class="form-control" name="roomType" placeholder="Room Type"   value="<?php if(isset($roomType)){ echo $roomType; } ?>">    
    </div>
    <div class="form-group">
        <label class="text-dark" for="roomDetails">Room Details</label>
        <input type="text" class="form-control" name="roomDetails" placeholder="Room Details"   value="<?php if(isset($roomDetails)){ echo $roomDetails; } ?>">
    </div>    
    <div class="form-group">
        <label class="text-dark" for="roomImage">Room Image</label> <br>
        <input type="file" class="" name="roomImage" placeholder="Room Image" value="<?php if(isset($roomImage)){ echo $roomImage; } ?>">
    </div>
    <div class="form-group">
        <label class="text-dark" for="roomPrice">Room Price</label>
        <input type="text" class="form-control" name="roomPrice" placeholder=" e.g. 5000" value="<?php if(isset($roomPrice)){ echo $roomPrice; } ?>">
    </div>
    <div class="form-group">
        <label class="text-dark" for="roomStatus">Room Status</label>
        <select class="form-control" name="roomStatus" id="">
        <option <?php if(isset($roomStatus) && $roomStatus=="Available") { ?> selected <?php } ?> value="Available">Available</option>
        <option <?php if(isset($roomStatus) && $roomStatus=="Booked") { ?> selected <?php } ?> value="Booked">Booked</option>
        </select>
    </div>
    <div class="form-group">
        <label class="text-dark" for="roomTotal">Total Rooms</label>
        <input type="text" class="form-control" name="roomTotal" placeholder=" e.g. 5" value="<?php if(isset($roomTotal)){ echo $roomTotal; } ?>">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="addRoom" value="Add Room">
    </div>
</form>