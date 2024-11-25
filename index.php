<?php
session_start();

// Initialize the cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Load products from products.json
$products = json_decode(file_get_contents('products.json'), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container pt-4">
        <!-- Cart Counter in Top Right -->
        <div id="cart-counter" class="position-fixed top-0 end-0 p-3">
            <a href="cart.php" class="btn btn-primary">Cart: <span id="cart-count"><?= count($_SESSION['cart']) ?></span></a>
        </div>

        <!-- Logout Button -->
        <?php if (isset($_SESSION['auth'])) : ?>
            <a href="logout.php" class="btn btn-danger">Log Out</a>
        <?php endif; ?>

        <!-- Admin Dashboard Button -->
        <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) : ?>
            <a href="admin_dashboard.php" class="btn btn-warning">Admin Dashboard</a>
        <?php endif; ?>

        <h1 class="mb-4">Product List</h1>

        <!-- Product Cards -->
        <div class="row">
            <?php foreach (array_slice($products, 6) as $product) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="<?= $product['images'][0] ?>" class="card-img-top" alt="<?= htmlspecialchars($product['title']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($product['title']) ?></h5>
                            <p class="card-text">
                                <strong>Price:</strong> $<?= number_format($product['price'], 2) ?><br>
                                <strong>Rating:</strong> <?= $product['rating'] ?>/5<br>
                                <?= htmlspecialchars($product['description']) ?>
                            </p>
                            <p><strong>Stock:</strong> <?= $product['stock'] ?> available</p>
                            <form class="add-to-cart-form" method="post">
                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                <div class="form-group mb-2">
                                    <label for="quantity-<?= $product['id'] ?>">Quantity:</label>
                                    <input type="number" id="quantity-<?= $product['id'] ?>" name="quantity" value="1" min="1" max="<?= $product['stock'] ?>" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
