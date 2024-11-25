<?php
session_start();

// Check if user is authenticated
if (!isset($_SESSION['auth'])) {
    header('Location: form.php'); // Redirect to login
    exit();
}
?>
