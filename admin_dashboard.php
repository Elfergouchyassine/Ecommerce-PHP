<?php
session_start();

// Restrict access to admin users
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: index.php');
    exit();
}

// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=database', 'root', '');

// Fetch all users
$stmt = $pdo->query("SELECT id, login, is_admin FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle delete user
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $pdo->prepare("DELETE FROM users WHERE id = :id")->execute(['id' => $delete_id]);
    header("Location: admin_dashboard.php");
    exit();
}

// Handle toggle admin status
if (isset($_GET['toggle_id'])) {
    $toggle_id = $_GET['toggle_id'];
    $stmt = $pdo->prepare("UPDATE users SET is_admin = NOT is_admin WHERE id = :id");
    $stmt->execute(['id' => $toggle_id]);
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css">
</head>
<body>
    <div class="container pt-4">
        <!-- Navigation Buttons -->
        <div class="d-flex justify-content-between mb-4">
            <h1>Admin Dashboard</h1>
            <a href="index.php" class="btn btn-primary">Home</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Is Admin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= htmlspecialchars($user['login']) ?></td>
                        <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
                        <td>
                            <a href="?delete_id=<?= $user['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            <a href="?toggle_id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">
                                <?= $user['is_admin'] ? 'Revoke Admin' : 'Make Admin' ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
