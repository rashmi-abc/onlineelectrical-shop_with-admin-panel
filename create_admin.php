<?php
require_once 'db_config.php';
$pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'); 
if($pageRefreshed == 1){
    header("Location: login.php");
}

// Replace 'admin' and 'admin123' with your desired username and password
$admin_username = 'admin';
$admin_password = 'admin123';

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO admin_info (admin_username, admin_password) VALUES (?, ?)");
$stmt->bind_param("ss", $admin_username, $admin_password);

if ($stmt->execute()) {
    echo "Admin user created successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
