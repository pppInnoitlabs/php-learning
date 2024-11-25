<?php
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "php_learning";

        $conn = mysqli_connect($server , $username , $password , $database);

        if($conn->connect_error){
            die("". $conn->connect_error);
        }

        $Uname = $Uemail = $Upwd = $Upwd2 = $Umobile = $role = "";
        $UnameError = $UemailError = $UpwdError  = $UmobileError = "";
        $role = "admin";

        function sanitizeInput($data){
            return htmlspecialchars(stripslashes(trim($data)));

        }

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])){
            $Uname = sanitizeInput($_POST["name"]);
            $Uemail = sanitizeInput($_POST["email"]);
            $Upwd = sanitizeInput($_POST["password"]);
            $Upwd2 = sanitizeInput($_POST["repassword"]);
            $Umobile = sanitizeInput($_POST["mobile"]);

            if(empty($Uname)) $UnameError = "name is required";
            if(empty($Uemail) || !filter_var($Uemail , FILTER_VALIDATE_EMAIL)) $UemailError = "enter valid email";
            if(empty($Upwd) || strlen($Upwd) < 4 ) $UpwdError = "password minimun 4 charecters";
            if(empty($Umobile) || !preg_match("/^\d{10}$/", $Umobile)) $UmobileError = "enter valid mobile number";


            if(empty($UnameError) && empty($UemailError) && empty($UpwdError) && empty($UmobileError)){
                $hashedpassword = password_hash($Upwd,PASSWORD_DEFAULT);

                $query = "insert into users(name,email,password,mobile,role)values(?,?,?,?,?)";

                $stmt = $conn->prepare($query);
                $stmt->bind_param("sssis",$Uname, $Uemail, $hashedpassword, $Umobile ,$role);
                $stmt->execute();

                if($stmt->error){
                    echo "connection error".$stmt->error;
                }echo "<script>alert(admin created successfully);</script>";
            }
        }

        $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A-registration</title>
</head>
<body>
    <div class="one">
        <form action="" method="POST">
            <label for="name">name:</label><br>
            <input type="text" id="name" name="name" placeholder="name"><br>
            <span style="color:red;"><?php echo $UnameError; ?></span><br>

            <label for="email">email:</label><br>
            <input type="email" id="email" name="email" placeholder="email"><br>
            <span style="color:red;"><?php echo $UemailError; ?></span><br>

            <label for="password">password:</label><br>
            <input type="password" id="password" name="password" placeholder="password"><br>
            <span style="color:red;"><?php echo $UpwdError; ?></span><br>

            <label for="repassword">Conform password:</label><br>
            <input type="password" id="repassword" name="repassword" placeholder="conform password">
            <span style="color:red;"><?php echo $UpwdError; ?></span><br>
            <label for="mobile">mobile:</label><br>
            <input type="text" id="mobile" name="mobile" placeholder="mobile"><br>
            <span style="color:red;"><?php echo $UmobileError; ?></span><br>
            <input type="submit" value="submit" name="register">
            
        </form>
    </div>
     
</body>
</html>