<?php
session_start();

// Simulate credentials for login
if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
    $_SESSION["username"] = "prabhu";
    $_SESSION["password"] = "1234";
}

// Set session timeout duration in seconds
$session_timeout = 50; // 50 seconds

// Check if the last activity timestamp is set
if (isset($_SESSION["last_activity"])) {
    // Calculate inactivity duration
    $inactivity_time = time() - $_SESSION["last_activity"];

    // Check if session has expired
    if ($inactivity_time > $session_timeout) {
        session_unset(); // Clear session data
        session_destroy(); // Destroy session
        header("Location: login.php"); // Redirect to login page
        exit(); // Stop further script execution
    }
}

// Update last activity timestamp
$_SESSION["last_activity"] = time();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Example</title>
</head>
<body>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Login" name="login"> 
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
        $Uname = $_POST["username"];
        $Upwd = $_POST["password"];

        // Validate credentials
        if (!empty($_SESSION["username"]) && 
            !empty($_SESSION["password"]) && 
            $Uname === $_SESSION["username"] && 
            $Upwd === $_SESSION["password"]) {
            header("Location: two.php"); // Redirect to another page
            exit();
        } else {
            echo "<p style='color:red;'>Username and password mismatch</p>";
        }
    }
    ?>
</body>
</html>
