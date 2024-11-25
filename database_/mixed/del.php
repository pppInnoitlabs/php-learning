<?php
        $server = "localhost";
        $username = "root";
        $password = "";

        try{
            $conn = new PDO("mysql:host:$server;", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("CREATE DATABASE del_phpdb");
            $stmt->execute();
            
            echo 'database created successfully';

        }catch(PDOException $e ){
            echo "failed to create database".$e->getMessage();
        }
?>