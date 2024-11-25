<?php
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "db_delete";

        try{
            $conn = new PDO("mysql:host=$server;dbname=$database",$username , $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $query = "INSERT INTO school(name,email,mobile)values('prabhu','prabhu28399@gmail.com','9505171479')";
            // $conn->prepare("INSERT into school(name,email,mobile)values(prabhu,prabhu28399@gmail.com,9505171479)");
        //    $result = $conn->prepare($query);
            $conn->exec($query);
            echo "data inserted successfully";

        }catch(PDOException $e){
            echo "failed to insert data".$e->getMessage();
        }


?>  