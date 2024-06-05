<?php
include('../config.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['place_order'])) {
    $order_id = intval($_POST['order_id']);
    $card_number = mysqli_real_escape_string($conn, $_POST['card_number']);
    $expiration_date = mysqli_real_escape_string($conn, $_POST['expiration_date']);
    $security_code = mysqli_real_escape_string($conn, $_POST['security_code']);

    $billing_info = "Card Number: $card_number, Expiration Date: $expiration_date, Security Code: $security_code";

    $update_query = "UPDATE orders SET billing_info = '$billing_info' WHERE id = $order_id";
    if (mysqli_query($conn, $update_query)) {
        // Clear the cart session after successfully updating the order
        unset($_SESSION['cart']);
        header('Location: success.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Fetch order details
if (isset($_GET['order_id'])) {
    $order_id = intval($_GET['order_id']);

    $order_query = mysqli_query($conn, "SELECT * FROM orders WHERE id = $order_id");
    $order = mysqli_fetch_assoc($order_query);

    $order_items_query = mysqli_query($conn, "SELECT products.name, order_items.quantity, products.price FROM order_items INNER JOIN products ON order_items.product_id = products.id WHERE order_items.order_id = $order_id");
}

$total_price = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment</title>
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
        .order-details, .payment-form {
            width: 80%;
            margin: 20px auto;
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .order-details ul {
            list-style-type: none;
            padding: 0;
        }
        .order-details li {
            margin-bottom: 10px;
        }
        .payment-form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .payment-form button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .payment-form button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Payment</h1>

    <?php if ($order && $order_items_query && mysqli_num_rows($order_items_query) > 0) { ?>
        <div class="order-details">
            <h2>Order Details</h2>
            <ul>
                <?php while ($item = mysqli_fetch_assoc($order_items_query)) { 
                    $subtotal = $item['quantity'] * $item['price'];
                    $total_price += $subtotal;
                ?>
                    <li><?php echo $item['name']; ?> x <?php echo $item['quantity']; ?> - $<?php echo number_format($subtotal, 2); ?></li>
                <?php } ?>
                <li>Total Price: $<?php echo number_format($total_price, 2); ?></li>
            </ul>
        </div>
        <div class="payment-form">
            <form method="POST" action="">
                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" name="card_number" required><br>
                <label for="expiration_date">Expiration Date:</label>
                <input type="text" id="expiration_date" name="expiration_date" required><br>
                <label for="security_code">Security Code:</label>
                <input type="text" id="security_code" name="security_code" required><br>
                <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                <button type="submit" name="place_order">Place Order</button>
            </form>
        </div>
    <?php } else { ?>
        <p>No order details found.</p>
    <?php } ?>
</body>
</html>
