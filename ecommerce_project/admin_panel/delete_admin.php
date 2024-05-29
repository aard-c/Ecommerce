<?php
include('../config.php');
include("logged_in_check.php");

$admin_id = $_GET['id'];
$sql = "DELETE FROM admin_table WHERE admin_id = '$admin_id'";
if (mysqli_query($conn, $sql)) {
    header("Location: admin_list.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
