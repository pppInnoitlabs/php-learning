<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: adminLogin.php");
    exit();
}

// Database connection
$server = "localhost";
$username = "root";
$password = "";
$database = "php_learning";

$conn = mysqli_connect($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$id = $name = $email = $mobile = $password = "";
$nameErr = $emailErr = $mobileErr = $passwordErr = "";
$editMode = false;

// Check if editing an existing user
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = ? AND role = 'user'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $name = $user['name'];
        $email = $user['email'];
        $mobile = $user['mobile'];
        $editMode = true;
    } else {
        echo "User not found.";
        exit();
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mobile = htmlspecialchars(trim($_POST['mobile']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Validate inputs
    if (empty($name)) $nameErr = "Name is required.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $emailErr = "Valid email is required.";
    if (empty($mobile) || !preg_match("/^\d{10}$/", $mobile)) $mobileErr = "Valid 10-digit mobile number is required.";
    if (!empty($password) && strlen($password) < 8) $passwordErr = "Password must be at least 8 characters long.";

    if (empty($nameErr) && empty($emailErr) && empty($mobileErr) && empty($passwordErr)) {
        if (!empty($password)) {
            // Update with password
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE users SET name=?, email=?, mobile=?, password=? WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssi", $name, $email, $mobile, $hashedPwd, $id);
        } else {
            // Update without password
            $query = "UPDATE users SET name=?, email=?, mobile=? WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssi", $name, $email, $mobile, $id);
        }

        $stmt->execute();

        // Redirect back to adminDashboard
        header("Location: ../adminDashboard.php");
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $editMode ? "Edit User" : "Add User"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center"><?php echo $editMode ? "Edit User" : "Add User"; ?></h2>

        <form action="" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>">
                <div class="text-danger"><?php echo $nameErr; ?></div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>">
                <div class="text-danger"><?php echo $emailErr; ?></div>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile:</label>
                <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo htmlspecialchars($mobile); ?>">
                <div class="text-danger"><?php echo $mobileErr; ?></div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password (Leave blank to keep current password):</label>
                <input type="password" name="password" id="password" class="form-control">
                <div class="text-danger"><?php echo $passwordErr; ?></div>
            </div>
            <button type="submit" class="btn btn-success"><?php echo $editMode ? "Update User" : "Add User"; ?></button>
            <a href="adminDashboard.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
