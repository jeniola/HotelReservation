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

    function secureInput($data){
        global $connection;
        $data = mysqli_real_escape_string($connection, $data);
        $data = trim($data);
        return $data;
    }

    function hashPassword($password){
        $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10)); 
        return $password;
        
    }

    function confirmQuery($query){
        global $connection;
        $sendQuery = mysqli_query($connection, $query);
        
        if(!$sendQuery){
            die("QUERY FAILED " . mysqli_error($connection) );
        }
        return $sendQuery;
    }
    
