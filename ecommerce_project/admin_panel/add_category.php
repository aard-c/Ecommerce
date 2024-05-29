<?php
include('../config.php');
include("logged_in_check.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $display_order = $_POST['display_order'];

    $sql = "INSERT INTO categories (name, display_order) VALUES ('$name', '$display_order')";
    if (mysqli_query($conn, $sql)) {
        header("Location: category_list.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Category</title>
</head>
<body>
    <h1>Add Category</h1>
    <form action="add_category.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="display_order">Display Order:</label>
        <input type="number" name="display_order" required><br>
        <button type="submit">Add Category</button>
    </form>
</body>
</html>
