<?php
try {
$email = $_POST['email'];
$pass = $_POST['pass'];
$role = $_POST['role'];

$pdo = new PDO('mysql:host=localhost;dbname=database', 'root', '');

$sql = "INSERT INTO users VALUES (NULL, ?, ?, ?)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(1, $email, PDO::PARAM_STR);
$stmt->bindValue(2, $pass, PDO::PARAM_STR);
$stmt->bindValue(3, $role, PDO::PARAM_STR);

$stmt->execute();
    $header = "location:/index.php";
} catch(PDOException $e) {
    $header = "location:/index.php?msg=une+erreur";
}

header($header);