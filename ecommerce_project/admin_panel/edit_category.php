<?php
include('../config.php');
include("logged_in_check.php");

$category_id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM categories WHERE id = '$category_id'");
$category = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $display_order = $_POST['display_order'];

    $sql = "UPDATE categories SET name = '$name', display_order = '$display_order' WHERE id = '$category_id'";
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
    <title>Edit Category</title>
</head>
<body>
    <h1>Edit Category</h1>
    <form action="edit_category.php?id=<?php echo $category['id']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $category['name']; ?>" required><br>
        <label for="display_order">Display Order:</label>
        <input type="number" name="display_order" value="<?php echo $category['display_order']; ?>" required><br>
        <button type="submit">Update Category</button>
    </form>
</body>
</html>
