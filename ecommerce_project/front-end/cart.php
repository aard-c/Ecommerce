<?php
session_start();
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = 1;

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
}

// Fetch products in cart
$cart_products = [];
if (!empty($_SESSION['cart'])) {
    $product_ids = implode(',', array_keys($_SESSION['cart']));
    $cart_products = mysqli_query($conn, "SELECT * FROM products WHERE id IN ($product_ids)");
}
?>

<h1>Cart</h1>
<ul>
    <?php while ($product = mysqli_fetch_assoc($cart_products)) { ?>
        <li>
            <p><?php echo $product['name']; ?></p>
            <p>Quantity: <?php echo $_SESSION['cart'][$product['id']]; ?></p>
        </li>
    <?php } ?>
</ul>
<a href="checkout.php">Proceed to Checkout</a>
