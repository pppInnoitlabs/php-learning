<?php

	$server  = "localhost";
	$username = "root";
	$password = "";
	
	try{
		$conn = new PDO("mysql:host=$server;dbname=php_learning",$username , $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * from users");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row){
            echo $row["name"]."<br>";
        }

        echo "database connected";
	}catch(PDOException $e){
		echo "database connetion error : ".$e->getMessage();
	}


?>