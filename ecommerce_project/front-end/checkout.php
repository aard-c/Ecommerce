<?php
session_start();
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $customer_phone = mysqli_real_escape_string($conn, $_POST['customer_phone']);
    $shipping_address = mysqli_real_escape_string($conn, $_POST['shipping_address']);
    $billing_info = mysqli_real_escape_string($conn, $_POST['billing_info']);

    $order_number = uniqid();

    $query = "INSERT INTO orders (order_number, customer_name, customer_phone, shipping_address, billing_info) VALUES ('$order_number', '$customer_name', '$customer_phone', '$shipping_address', '$billing_info')";
    if (mysqli_query($conn, $query)) {
        $order_id = mysqli_insert_id($conn);

        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            $query = "INSERT INTO order_items (order_id, product_id, quantity) VALUES ($order_id, $product_id, $quantity)";
            mysqli_query($conn, $query);
        }

        // Clear the cart
        $_SESSION['cart'] = [];

        header('Location: success.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h1>Checkout</h1>
<form method="POST" action="">
    Name: <input type="text" name="customer_name" required><br>
    Phone: <input type="text" name="customer_phone" required><br>
    Shipping Address: <textarea name="shipping_address" required></textarea><br>
    Billing Info: <textarea name="billing_info" required></textarea><br>
    <button type="submit" name="checkout">Place Order</button>
</form>
