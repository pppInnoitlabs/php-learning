<?php
// Database connection
$server = "localhost";
$username = "root";
$password = "";
$database = "php_learning";

$conn = mysqli_connect($server, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$loginErr = "";
$email = $Upwd = "";

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
    // Get and sanitize inputs
    $email = htmlspecialchars(stripslashes(trim($_POST["email"])));
    $Upwd = htmlspecialchars(stripslashes(trim($_POST["password"])));

    // Validate inputs
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $loginErr = "Please enter a valid email.";
    } elseif (empty($Upwd)) {
        $loginErr = "Please enter your password.";
    } else {
        // Query to check if the email exists
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Fetch user data
            $user = $result->fetch_assoc();
            $hashedPassword = $user['password'];

            // Verify the password
            if (password_verify($Upwd, $hashedPassword)) {
                // Start a session for the logged-in user
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];

                // Redirect to a welcome page or dashboard
                header("Location: userDashboard.php");
                exit();
            } else {
                $loginErr = "Invalid email or password.";
            }
        } else {
            $loginErr = "No account found with this email.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user Login</title>
</head>
<body>
    <div class="login">
        <h2>Login</h2>
        <form action="" method="post">
            Email: <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>"> <br>
            Password: <input type="password" name="password" id="password"><br>
            <input type="submit" value="Login" name="login">
        </form>
        <?php
        // Display the error message, if any
        if (!empty($loginErr)) {
            echo "<p style='color:red;'>$loginErr</p>";
        }
        ?>
    </div>
</body>
</html>
