<?php
include('../config.php');
include("logged_in_check.php");

$admin_users = mysqli_query($conn, "SELECT * FROM admin_table");
?>

<?php include('header.php'); ?>

<body>

<div id="wrapper">

    <?php include('top_bar.php'); ?>

    <?php include('left_sidebar.php'); ?>

    <div id="content">      
        
        <div id="content-header">
            <h1>Admin List</h1>
        </div> <!-- #content-header --> 

        <div id="content-container">

            <div class="row">

                <div class="col-md-12 col-xs-12">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Username</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($admin_users)) { ?>
                            <tr>
                                <td><?php echo $row['admin_id']; ?></td>
                                <td><?php echo $row['admin_name']; ?></td>
                                <td><?php echo $row['admin_surname']; ?></td>
                                <td><?php echo $row['admin_username']; ?></td>
                                <td>
                                    <a href="edit_admin.php?id=<?php echo $row['admin_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="delete_admin.php?id=<?php echo $row['admin_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div> <!-- /.col -->

            </div> <!-- /.row -->

        </div> <!-- /#content-container -->
        
    </div> <!-- #content -->    
    
</div> <!-- #wrapper -->

<?php include('footer.php'); ?>

</body>
</html>
