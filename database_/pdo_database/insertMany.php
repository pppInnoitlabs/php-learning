<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "db_delete";

    try{
        $conn = new PDO("mysql:host=$server;dbname=$database",$username,$password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

       $stmt = $conn->prepare("INSERT INTO school(name,email,mobile)values(:name,:email,:mobile)");

       $stmt->bindParam(':name',$name);
       $stmt->bindParam(':email',$email);
       $stmt->bindParam(':mobile',$mobile);

    //    one  alex
       $name = "alex";
       $email = "alex@gmail.com";
       $mobile = "8989854958948";
       $stmt->execute();

    //    two james 
    $name = "james";
    $email = "james@gmail.com";
    $mobile = "454554545";

    $stmt->execute();
    echo "multiple data inserted";

      }catch(PDOException $e){
        echo "error in inserting"."<br>".$e->getMessage();
    }
    
?>