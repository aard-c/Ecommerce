<?php
include('../config.php');
include("logged_in_check.php");

$orders = mysqli_query($conn, "SELECT * FROM orders");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order List</title>
</head>
<body>
    <h1>Order List</h1>
    <table border="1">
        <tr>
            <th>Order Number</th>
            <th>Products</th>
            <th>Quantities</th>
            <th>Images</th>
            <th>Billing Information</th>
            <th>Shipping Information</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($orders)) {
            $order_items = mysqli_query($conn, "SELECT * FROM order_items WHERE order_id = '{$row['id']}'");
            $products = [];
            $quantities = [];
            $images = [];
            while ($item = mysqli_fetch_assoc($order_items)) {
                $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id = '{$item['product_id']}'"));
                $products[] = $product['name'];
                $quantities[] = $item['quantity'];
                $images[] = $product['picture'];
            }
        ?>
        <tr>
            <td><?php echo $row['order_number']; ?></td>
            <td><?php echo implode(", ", $products); ?></td>
            <td><?php echo implode(", ", $quantities); ?></td>
            <td><?php echo implode(", ", array_map(function($image) { return "<img src='$image' width='50' height='50'>"; }, $images)); ?></td>
            <td><?php echo $row['billing_information']; ?></td>
            <td><?php echo $row['shipping_information']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
