<?php

    function allReservationsRecordCount($table){
        global $connection;
        $query = "SELECT * FROM $table  ";
        $sendQuery = mysqli_query($connection, $query);
        $count = mysqli_num_rows($sendQuery);
        echo $count;
    }

    function currentReservationsRecordCount($table, $tableRow){
        global $connection; 
        $query = "SELECT * FROM $table WHERE $tableRow = 'paid' ";
        $sendQuery = mysqli_query($connection, $query);
        $count = mysqli_num_rows($sendQuery);
        echo $count;
    }




?> 