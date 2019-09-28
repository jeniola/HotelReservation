<?php
    if (isset($_POST['addRoom'])) {
        
        foreach ($_POST as $key => $value) {
            if (empty($_POST[$key])) {
                $error = "All Fields are required";
                break;
            }
        }

        $roomType = $_POST['roomType'];
        $roomDetails = $_POST['roomDetails'];
        $roomImage = $_POST['roomImage'];
        $roomPrice = $_POST['roomPrice'];
        $roomStatus = $_POST['roomStatus'];
        

    }

?>


<form action="" method="post" enctype="">
    <?php
        if (!empty($error)) {?>
            <div class="alert alert-danger" role="alert">
                <?php if(isset($error)){ echo $error; } ?>
            </div>

        <?php }
    ?>
    
    <div class="form-group">
        <label for="roomType">Room Type</label>
        <input type="text" class="form-control" name="roomType" placeholder="Room Type" value="<?php if(isset($roomType)){ echo $roomType; } ?>" value="<?php if(isset($roomType)){ echo $roomType; } ?>">
    </div>
    <div class="form-group">
        <label for="roomDetails">Room Details</label>
        <input type="text" class="form-control" name="roomDetails" placeholder="Room Details"   value="<?php if(isset($roomDetails)){ echo $roomDetails; } ?>">
    </div>
    <div class="form-group">
        <label for="roomImage">Room Image</label> <br>
        <input type="file" class="" name="roomImage" placeholder="Room Image" value="<?php if(isset($roomImage)){ echo $roomImage; } ?>">
    </div>
    <div class="form-group">
        <label for="roomPrice">Room Price</label>
        <input type="text" class="form-control" name="roomPrice" placeholder=" e.g. 5000" value="<?php if(isset($roomPrice)){ echo $roomPrice; } ?>">
    </div>
    <div class="form-group">
        <label for="roomStatus">Room Status</label>
        <select class="form-control" name="roomStatus" id="">
        <option <?php if(isset($roomStatus) && $roomStatus=="Available") { ?> selected <?php } ?> value="Available">Available</option>
        <option <?php if(isset($roomStatus) && $roomStatus=="Booked") { ?> selected <?php } ?> value="Booked">Booked</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="addRoom" value="Add Room">
    </div>
</form>