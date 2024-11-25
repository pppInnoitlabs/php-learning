<?php
        session_start();
        $_SESSION["username"]= "prabhu";
        $_SESSION["password"] = "1234";

    $session_timeout = 40;

    if(isset($_SESSION["last_activity"] )){
        $inactivity_time = time() - $_session["last_activity"];
        session_unset();
        session_destroy();
        echo "session timeout login again..!";
        header("Location: login.php");
    }
    $_SESSION["last_activity"] = time();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Username:
        <input type="text" name="username"> <br>
        Password:
        <input type="password" name="password" id="password">
        <input type="submit" value="login" name="login">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"]=== "POST" && isset($_POST["login"])) {
            $inputUname = $_POST["username"];
            $inputUpassword  = $_POST["password"];

            if(
                !empty($_SESSION["username"]) &&
                !empty($_SESSION["password"]) &&
                
                $_SESSION["password"] === $inputUpassword &&
                $_SESSION["username"] === $inputUname
                ){
                header("location: two.php");
                
            }else{
                echo "<p style='color:red;'>password and username mismatch</p>";
            }
        } 

    ?>
</body>
</html>