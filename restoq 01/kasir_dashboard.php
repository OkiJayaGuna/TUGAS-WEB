<?php
require_once 'db_config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: kasir_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Kasir Dashboard</h1>
    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
</body>
</html>
