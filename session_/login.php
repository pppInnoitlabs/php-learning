<?php
        session_start();

        $_SESSION["username"]= "prabhu";
        $_SESSION["password"]="1234";

        $session_timeout = 40;

        if(isset($_SESSION["last_activity"])){
            $inactivity_time = time() - $_SESSION["last_activity"];

            if($inactivity_time > $session_timeout){
                session_unset();
                session_destroy();
                
                echo "session timeout please login again!";
            }
        }

$_SESSION["last_activity"]= time();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for session</title>
</head>
<body>
    <form action="login.php" method="POST">
        username:
        <input type="text" name="username" id="username"><br>
        password:
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="login" name="login"> 
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"]=== "POST" && isset($_POST["login"])){
            $Uname = $_POST["username"];
            $Upwd = $_POST["password"];
            if(!empty($_SESSION["username"] &&
             !empty($_SESSION["password"]) && 
            $Uname === $_SESSION["username"]) &&
            $Upwd === $_SESSION["password"]){
                header("Location: two.php");
                exit();
        }else{
            echo "<p style='color:red;'> username and password mismatch</p>";
        };
        }
    ?>
</body>
</html>