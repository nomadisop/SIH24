<?php
    try {
        $server="localhost";
        $username="root";
        $password="";
        $database="greenaccord";    
        $conn = new mysqli($server,$username,$password,$database);  //connecting database
    
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error); //exception occured
        }
    } catch (Exception $e) {
        // Handle connection error
        echo "Error: " . $e->getMessage();
        exit();
    }
?>      