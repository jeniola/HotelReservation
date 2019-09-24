<?php

function confirmQuery($query){
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection)) ;
    }
}

function secureInput($input){
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    return $input;
}
?>

<html>
<?php 
    function form($variable){
        if(isset($_POST['submit']) && empty($variable)){ ?> is-invalid <?php }  
    }

?>
</html>

<?php

?>