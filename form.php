<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/united/bootstrap.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Login</h1>
        <?php if (isset($_GET['msg'])) : ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($_GET['msg']); ?>
            </div>
        <?php endif; ?>
        <form method="post" action="auth.php">
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" id="login" class="form-control" name="login" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
