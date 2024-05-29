<?php
include('../config.php');
include("logged_in_check.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $picture = $_POST['picture'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];
    $description = $_POST['description'];
    $categories = $_POST['categories'];

    $sql = "INSERT INTO products (name, picture, price, stock_quantity, description) VALUES ('$name', '$picture', '$price', '$stock_quantity', '$description')";
    if (mysqli_query($conn, $sql)) {
        $product_id = mysqli_insert_id($conn);
        foreach ($categories as $category_id) {
            mysqli_query($conn, "INSERT INTO product_categories (product_id, category_id) VALUES ('$product_id', '$category_id')");
        }
        header("Location: product_list.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$categories = mysqli_query($conn, "SELECT * FROM categories");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form action="add_product.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="picture">Picture URL:</label>
        <input type="text" name="picture" required><br>
        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" required><br>
        <label for="stock_quantity">Stock Quantity:</label>
        <input type="number" name="stock_quantity" required><br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>
        <label for="categories">Categories:</label>
        <select name="categories[]" multiple required>
            <?php while ($row = mysqli_fetch_assoc($categories)) { ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
        </select><br>
        <button type="submit">Add Product</button>
    </form>
</body>
</html>
