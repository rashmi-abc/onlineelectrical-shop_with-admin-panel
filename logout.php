<?php
// Start the session
session_start();

// Destroy the session
session_unset();
session_destroy();

// Redirect to the login page or home page after logout
header("Location: ../index.php");
exit();
?>
