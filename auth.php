<?php
session_start();
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT admin_password FROM admin_info WHERE admin_username = ?");
    $stmt->bind_param("s", $admin_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['admin_password'];

        if ($admin_password === $stored_password) {
            $_SESSION['admin_logged_in'] = true;
            header('Location: index.php');
            exit;
        } else {
            echo 'Invalid username or password. <a href="login.php">Try again</a>.';
        }
    } else {
        echo 'Invalid username or password. <a href="login.php">Try again</a>.';
    }

    $stmt->close();
    $conn->close();
}
?>
