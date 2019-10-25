<?php

function confirmQuery($query){
    global $connection;
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection)) ;
    }
    return $result;
}

function secureInput($input){
    global $connection;
    $input = mysqli_real_escape_string($connection, $input);
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    
    return $input;
}



