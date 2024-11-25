<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "php_learning";

try{
    $conn = new PDO("mysql:host=$server;dbname=$database", $username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "database connection error";
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])){
    $uname = $_POST["name"];
    $uemail = $_POST["email"];
    $upwd = password_hash($_POST["password"],PASSWORD_DEFAULT);
    $upwd2 = password_hash($_POST["repassword"],PASSWORD_DEFAULT);
    $umobile = $_POST["mobile"];

    try{
           if(empty($uname)|| empty($uemail) || empty($upwd) || empty($upwd2) || empty($umobile)){
            
            if(empty($uname)){ echo "<p style='color:red;'>please enter name </p>"."<br>";}
            if(empty($uemail)|| filter_var($uemail,FILTER_VALIDATE_EMAIL)) echo "<p style=color:'red;'>please enter valid email </p>"."<br>";
            if(empty($upwd) || strlen($upwd)<4) echo "<p style=color:'red;'>password minimun 4 charater's</p>"."<br>";
            if(empty($upwd2)|| ($upwd !== $upwd2)) echo "<p style=color:'red;'> both password's mismatch </p>"."<br>";
            if(empty($umobile)) echo "<p style='color:red;'>enter mobile number </p>"."<br>";




        }elseif(!empty($uname)&& !empty($uemail) && !empty($upwd) && !empty($upwd2)&& !empty($umobile)){
            try{
                $query = "INSERT INTO users(name,email,password,mobile)values(:name,:email,:password,:mobile)";

                $stmt = $conn->prepare($query);
                $stmt->execute(['name'=>$uname,'email'=>$uemail,'password'=>$upwd,'mobile'=>$umobile]);
                echo "<script>alert('user created successfully..!');</script>";


            }catch(PDOException $e){
                if($e->getCode()== 23000){
                    echo "<script>alert(' this email already have an account ..!');</script>";
 
                }else{
                    echo "error"."<br>".$e->getMessage();
                }
           }
        }
    }catch(PDOException $e){
        echo "error occured ".$e->getMessage();
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>del document</title>
</head>
<body>
    <div class="one">
        <form action="" method="post">
            <label for="Name">Name</label>
            <input type="text" name="name" id="name"><br>
            <label for="email">email</label>
            <input type="email" name="email" id="email"><br>
            <label for="password">password</label>
            <input type="password" name="password" id="passowrd"><br>
            <label for="conformpassword">conform password</label>
            <input type="password" name="repassword" id="repassword"><br>
            <label for="mobile">mobile</label>
            <input type="number" name="mobile" id="mobile"><br>
            <input type="submit" value="register" name="register">
        </form>
    </div>
</body>
</html>