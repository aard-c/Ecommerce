<?php
include('../config.php');
include("logged_in_check.php");

$admin_users = mysqli_query($conn, "SELECT * FROM admin_table");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin List</title>
</head>
<body>
    <h1>Admin List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Username</th>
            <th>ID Number</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($admin_users)) { ?>
        <tr>
            <td><?php echo $row['admin_id']; ?></td>
            <td><?php echo $row['admin_name']; ?></td>
            <td><?php echo $row['admin_surname']; ?></td>
            <td><?php echo $row['admin_username']; ?></td>
            <td>
                <a href="edit_admin.php?id=<?php echo $row['admin_id']; ?>">Edit</a> |
                <a href="delete_admin.php?id=<?php echo $row['admin_id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
