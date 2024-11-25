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

// Fetch all users
$users = [];
$query_users = "SELECT * FROM users WHERE role='user'";
$result_users = $conn->query($query_users);
if ($result_users->num_rows > 0) {
    while ($row = $result_users->fetch_assoc()) {
        $users[] = $row;
    }
}

// Fetch all admins
$admins = [];
$query_admins = "SELECT * FROM users WHERE role='admin'";
$result_admins = $conn->query($query_admins);
if ($result_admins->num_rows > 0) {
    while ($row = $result_admins->fetch_assoc()) {
        $admins[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Admin Dashboard</h1>

        <!-- Users Section -->
        <div class="mt-4">
            <h2>Users</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo htmlspecialchars($user['name']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['mobile']); ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm"
                                    onclick="window.location.href='crud_admin/editUsers.php?id=<?php echo $user['id']; ?>'">
                                    Edit
                                </button>
                                <a href="deleteUser.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this user?');">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button class="btn btn-primary mb-2" onclick="window.location.href='crud_admin/createUser.php'">Add
                User</button>

        </div>

        <!-- Admins Section -->
        <div class="mt-4">
            <h2>Admins</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admins as $admin): ?>
                        <tr>
                            <td><?php echo $admin['id']; ?></td>
                            <td><?php echo htmlspecialchars($admin['name']); ?></td>
                            <td><?php echo htmlspecialchars($admin['email']); ?></td>
                            <td><?php echo htmlspecialchars($admin['mobile']); ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm"
                                    onclick="window.location.href='crud_admin/editAdmins.php?id=<?php echo $admin['id']; ?>'">
                                    Edit
                                </button>
                                <a href="deleteAdmin.php?id=<?php echo $admin['id']; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this admin?');">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button class="btn btn-primary mb-2" onclick="window.location.href='editAdmins.php'">Add Admin</button>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>