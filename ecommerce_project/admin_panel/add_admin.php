<?php
include('../config.php');
include("logged_in_check.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);


    $sql = "INSERT INTO admin_users (name, surname, admin_username, admin_pass) VALUES ('$name', '$surname', '$username', '$password')";
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
    <title>Add Admin User</title>
</head>
<body>
    <h1>Add Admin User</h1>
    <form action="add_admin.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="surname">Surname:</label>
        <input type="text" name="surname" required><br>
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Add Admin</button>
    </form>
</body>
</html>
