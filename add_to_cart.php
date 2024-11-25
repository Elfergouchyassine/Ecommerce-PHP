<?php
session_start();

// Initialize cart if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = intval($_POST['quantity']);

    // Find the product in the cart
    $found = false;
    foreach ($_SESSION['cart'] as &$cart_item) {
        if ($cart_item['id'] == $product_id) {
            $cart_item['quantity'] += $quantity; // Increment quantity
            $found = true;
            break;
        }
    }

    // If product not found, add it to the cart
    if (!$found) {
        $product = getProductById($product_id); // Get the product details
        if ($product) {
            $product['quantity'] = $quantity;
            $_SESSION['cart'][] = $product;
        }
    }

    // Return the updated cart count as a response
    echo count($_SESSION['cart']);
    exit();
}

function getProductById($product_id) {
    // Get product from the products.json file
    $products = json_decode(file_get_contents('products.json'), true);
    foreach ($products as $product) {
        if ($product['id'] == $product_id) {
            return $product;
        }
    }
    return null; // Return null if the product is not found
}
?>
