<?php 
        $server = "localhost";
        $username = "root";
        $password = "";
        $database= "php_learning";

        $conn = mysqli_connect($server , $username,$password , $database);

        if($conn->connect_error){
            die("connected". $conn->connect_error);
        }
        echo "connected successfully";
?>