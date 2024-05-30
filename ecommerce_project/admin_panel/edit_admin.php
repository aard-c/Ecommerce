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

    $sql = "UPDATE admin_table SET admin_name = '$name', admin_surname = '$surname', admin_username = '$username', admin_pass = '$password' WHERE admin_id = '$admin_id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: admin_list.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<?php include('header.php'); ?>

<body>

<div id="wrapper">

    <?php include('top_bar.php'); ?>

    <?php include('left_sidebar.php'); ?>

    <div id="content">      
        
        <div id="content-header">
            <h1>Edit Admin User</h1>
        </div> <!-- #content-header --> 

        <div id="content-container">

            <div class="row">

                <div class="col-md-12 col-xs-12">

                    <form action="edit_admin.php?id=<?php echo $admin['admin_id']; ?>" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="<?php echo $admin['admin_name']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="surname" class="col-sm-2 control-label">Surname:</label>
                            <div class="col-sm-10">
                                <input type="text" name="surname" class="form-control" value="<?php echo $admin['admin_surname']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Username:</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" value="<?php echo $admin['admin_username']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password (leave blank to keep current):</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Admin</button>
                            </div>
                        </div>
                    </form>

                </div> <!-- /.col -->

            </div> <!-- /.row -->

        </div> <!-- /#content-container -->
        
    </div> <!-- #content -->    
    
</div> <!-- #wrapper -->

<?php include('footer.php'); ?>

</body>
</html>
