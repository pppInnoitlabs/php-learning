<?php 
        $server = "localhost";
        $username = "root";
        $password  = "";
        $database = "php_learning";

        $conn = mysqli_connect($server , $username , $password , $database);
     
        if($conn->connect_error){
            die("database connection error".$conn->connect_error);
        }
        // echo "database connected successfully..!";

        $Uname = $Uemail = $Upwd = $Upwd2 = $Umobile  = "";
        $UnameError = $UemailError = $UpwdError = $Upwd2Error = $UmobileError  = "";
        $role = "user";

        function sanitizeInput($data){
            return htmlspecialchars((stripslashes(trim($data))));
        }

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])){
            
            $Uname = sanitizeInput($_POST["name"]);
            $Uemail = sanitizeInput($_POST["email"]);
            $Upwd = sanitizeInput($_POST["password"]);
            $Upwd2 = sanitizeInput($_POST["repassword"]);
            $Umobile = sanitizeInput($_POST["mobile"]);

            if(empty($Uname)) echo $UnameError = "enter valid name";
            if(empty($Uemail) || !filter_var($Uemail , FILTER_VALIDATE_EMAIL)) echo $UemailError = "enter valid email";echo "<br>";
            if(empty($Upwd) || strlen($Upwd) < 4 ) echo $UpwdError = "password is minimum 4 characters needed";echo "<br>";
            if(empty($Upwd2) || ($Upwd !== $Upwd2)) echo $UpwdError = "both password's mismatch";echo "<br>";
            if(empty($Umobile ) || !preg_match("/^\d{10}$/" , $Umobile)) echo $UmobileError = "enter 10 digit mobile number";echo "<br>";

            if(empty($UnameError ) && empty($UemailError) && empty($UpwdError) && empty($UmobileError)){
                $passwordHash = password_hash($Upwd , PASSWORD_DEFAULT);

                $query  = "insert into users(name,email,password,mobile,role)values(?,?,?,?,?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("sssis",$Uname , $Uemail,$passwordHash,$Umobile,$role);
                $stmt->execute();
                
                if($stmt->error){
                    echo "user not created ".$stmt->error;
                }echo "<script>alert('user created successfully..!');</script>";

                $stmt->close();
            }

        }
            $conn->close();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <div class="form_div">
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name"><br>
            <label for="email">email</label>
            <input type="text" name="email" id="email"><br>
            <label for="password">password</label>
            <input type="password" name="password" id="password"><br>
            <label for="repassword">repassword</label>
            <input type="password" name="repassword" id="repassword"><br>
            <label for="mobile">mobile</label>
            <input type="number" name="mobile" id="mobile"><br>
            <input type="submit" value="register" name="register">
        </form>
    </div>
</body>
</html>