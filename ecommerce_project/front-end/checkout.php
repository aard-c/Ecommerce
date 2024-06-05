<?php
include('../config.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $customer_phone = mysqli_real_escape_string($conn, $_POST['customer_phone']);
    $shipping_address = mysqli_real_escape_string($conn, $_POST['shipping_address']);

    $order_number = uniqid();

    $query = "INSERT INTO orders (order_number, customer_name, customer_phone, shipping_address) VALUES ('$order_number', '$customer_name', '$customer_phone', '$shipping_address')";
    if (mysqli_query($conn, $query)) {
        $order_id = mysqli_insert_id($conn);

        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            $query = "INSERT INTO order_items (order_id, product_id, quantity) VALUES ($order_id, $product_id, $quantity)";
            mysqli_query($conn, $query);
        }

        header('Location: payment.php?order_id='.$order_id);
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        h1 {
            font-size: 32px;
            margin-left: 10%;
        }
        .checkout-form {
            width: 80%;
            margin: 20px auto;
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .checkout-form input[type="text"],
        .checkout-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .checkout-form button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .checkout-form button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Checkout</h1>
    <div class="checkout-form">
        <form method="POST" action="">
            <label for="customer_name">Name:</label>
            <input type="text" id="customer_name" name="customer_name" required><br>
            <label for="customer_phone">Phone:</label>
            <input type="text" id="customer_phone" name="customer_phone" required><br>
            <label for="shipping_address">Shipping Address:</label>
            <textarea id="shipping_address" name="shipping_address" required></textarea><br>
            <button type="submit" name="checkout">Proceed to Payment</button>
        </form>
    </div>
</body>
</html>
