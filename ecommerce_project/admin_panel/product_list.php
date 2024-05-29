<?php
include('../config.php');
include("logged_in_check.php");

$products = mysqli_query($conn, "SELECT p.*, GROUP_CONCAT(c.name) AS categories FROM products p LEFT JOIN product_categories pc ON p.id = pc.product_id LEFT JOIN categories c ON pc.category_id = c.id GROUP BY p.id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Picture</th>
            <th>Price</th>
            <th>Stock Quantity</th>
            <th>Description</th>
            <th>Categories</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($products)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><img src="<?php echo $row['picture']; ?>" width="50" height="50"></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['stock_quantity']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['categories']; ?></td>
            <td>
                <a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_product.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
