<?php
    $server  = "localhost";
    $username = "root";
    $password = "";
    

    try{
        $conn = new PDO ("mysql:host=$server",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $dbcreate = "CREATE DATABASE db_delete";
        $conn->exec($dbcreate);

        $conn->exec("use db_delete");

        $createTable = "CREATE TABLE school( id int AUTO_INCREMENT primary key ,name varchar(255) not null , email varchar(255) not null ,mobile varchar(255) not null)";
        $conn->exec($createTable);

        echo "database and table created..!";

    }catch(PDOException $e){
        echo "databaes and table creation failed ".$e->getMessage();
    }

?>