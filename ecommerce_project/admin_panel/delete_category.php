<?php
include('../config.php');
include("logged_in_check.php");

$category_id = $_GET['id'];
$sql = "DELETE FROM categories WHERE id = '$category_id'";
if (mysqli_query($conn, $sql)) {
    header("Location: category_list.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
