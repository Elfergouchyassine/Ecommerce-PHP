<?php
session_start();  // Start the session

// Destroy the session to log out the user
session_destroy();

// Redirect to the login page after logging out
header('Location: form.php');
exit();
?>