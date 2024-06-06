<?php
include('../config.php');
include("logged_in_check.php");

// Check if product ID is provided via GET
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('Invalid product ID');
}

$product_id = $_GET['id'];

// Step 1: Delete associated records from order_items table
$delete_order_items_query = "DELETE FROM order_items WHERE product_id = '$product_id'";
if (!mysqli_query($conn, $delete_order_items_query)) {
    echo "Error deleting order items: " . mysqli_error($conn);
    exit;
}

// Step 2: Delete associated records from product_categories table
$delete_product_categories_query = "DELETE FROM product_categories WHERE product_id = '$product_id'";
if (!mysqli_query($conn, $delete_product_categories_query)) {
    echo "Error deleting product categories: " . mysqli_error($conn);
    exit;
}

// Step 3: Delete the product from the products table
$delete_product_query = "DELETE FROM products WHERE id = '$product_id'";
if (mysqli_query($conn, $delete_product_query)) {
    header("Location: product_list.php");
    exit;
} else {
    echo "Error deleting product: " . mysqli_error($conn);
}
?>
