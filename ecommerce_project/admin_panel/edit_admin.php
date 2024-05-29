<?php
include('../config.php');
include("logged_in_check.php");

$admin_id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM admin_table WHERE admin_id = '$admin_id'");
$admin = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : $admin['admin_pass'];


    $sql = "UPDATE admin_table SET name = '$name', surname = '$surname', admin_username = '$username', admin_pass = '$password' WHERE admin_id = '$admin_id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: admin_list.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Admin User</title>
</head>
<body>
    <h1>Edit Admin User</h1>
    <form action="edit_admin.php?id=<?php echo $admin['admin_id']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $admin['admin_name']; ?>" required><br>
        <label for="surname">Surname:</label>
        <input type="text" name="surname" value="<?php echo $admin['admin_surname']; ?>" required><br>
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $admin['admin_username']; ?>" required><br>
        <label for="password">Password (leave blank to keep current):</label>
        <input type="password" name="password"><br>
        <button type="submit">Update Admin</button>
    </form>
</body>
</html>
