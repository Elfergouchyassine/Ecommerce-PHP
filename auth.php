<?php
session_start();

// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=database', 'root', '');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password']; // Match the form field name

    // Prevent SQL injection with prepared statements
    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = :login");
    $stmt->execute(['login' => $login]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // If user exists and password matches
    if ($user && $password === $user['password']) { // For plain-text passwords
        $_SESSION['auth'] = $user; // Store user info in session
        $_SESSION['is_admin'] = $user['is_admin']; // Store admin status
        header('Location: index.php'); // Redirect to main page
        exit();
    } else {
        // Redirect back to login page with error message
        header('Location: form.php?msg=Invalid login or password');
        exit();
    }
}
?>
