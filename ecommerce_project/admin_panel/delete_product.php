<?php
include('../config.php');
include("logged_in_check.php");

$product_id = $_GET['id'];
$sql = "DELETE FROM products WHERE id = '$product_id'";
if (mysqli_query($conn, $sql)) {
    mysqli_query($conn, "DELETE FROM product_categories WHERE product_id = '$product_id'");
    header("Location: product_list.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
