<?php

$id = $_GET['idd'];

$pdo = new PDO('mysql:host=localhost;dbname=database', 'root', '');

$sql = "DELETE FROM users WHERE id=$id";

$ret = $pdo->exec($sql);

header("location:/index.php");