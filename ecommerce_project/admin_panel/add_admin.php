<?php
include('../config.php');
include("logged_in_check.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password']; 
    $admin_name = $_POST['admin_name'];
    $admin_surname = $_POST['admin_surname'];
    $admin_status = $_POST['admin_status'];

   

    // Prepare SQL statement to insert data into admin_table
    $sql = "INSERT INTO admin_table (admin_username, admin_pass, admin_name, admin_surname, admin_status)
            VALUES ('$admin_username', '$admin_password', '$admin_name', '$admin_surname', '$admin_status')";

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New admin added successfully');</script>";
        echo "<script>window.location.href = 'admin_list.php';</script>";
        exit(); // stop further execution to prevent the form from being displayed again
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
            <h1>Add New Admin</h1>
        </div> <!-- #content-header --> 

        <div id="content-container">

            <div class="row">

                <div class="col-md-12 col-xs-12">

                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="admin_username">Username:</label>
                            <input type="text" class="form-control" id="admin_username" name="admin_username" required>
                        </div>
                        <div class="form-group">
                            <label for="admin_password">Password:</label>
                            <input type="password" class="form-control" id="admin_password" name="admin_password" required>
                        </div>
                        <div class="form-group">
                            <label for="admin_name">Name:</label>
                            <input type="text" class="form-control" id="admin_name" name="admin_name" required>
                        </div>
                        <div class="form-group">
                            <label for="admin_surname">Surname:</label>
                            <input type="text" class="form-control" id="admin_surname" name="admin_surname" required>
                        </div>
                         <div class="form-group">
                            <label for="admin_status">Status:</label>
                            <input type="number" class="form-control" id="admin_status" name="admin_status" required>
                        </div> 
                        <button type="submit" class="btn btn-primary">Add Admin</button>
                    </form>

                </div> <!-- /.col -->

            </div> <!-- /.row -->

        </div> <!-- /#content-container -->
        
    </div> <!-- #content -->    
    
</div> <!-- #wrapper -->

<?php include('footer.php'); ?>

</body>
</html>
