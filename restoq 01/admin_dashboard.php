<?php
require_once 'db_config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];
    $new_role = $_POST['new_role'];

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, role) VALUES ('$new_username', '$hashed_password', '$new_role')";

    if ($conn->query($sql) === TRUE) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Admin Dashboard</h1>
    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>

    <!-- Form to add a new user -->
    <h2>Add New User</h2>
    <form action="admin_dashboard.php" method="POST">
        <label for="new_username">Username:</label>
        <input type="text" id="new_username" name="new_username" required>
        <br>
        <label for="new_password">Password:</label>
        <input type="password" id="new_password" name="new_password" required>
        <br>
        <label for="new_role">Role:</label>
        <select id="new_role" name="new_role" required>
            <option value="admin">Admin</option>
            <option value="kasir">Kasir</option>
            <option value="koki">Koki</option>
            <option value="pelayan">Pelayan</option>
            <option value="pelanggan">Pelanggan</option>
        </select>
        <br>
        <button type="submit">Add User</button>
    </form>
</body>
</html>
