<?php
include('../config.php');
include("logged_in_check.php");

$categories = mysqli_query($conn, "SELECT * FROM categories");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category List</title>
</head>
<body>
    <h1>Category List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Display Order</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($categories)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['display_order']; ?></td>
            <td>
                <a href="edit_category.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_category.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
