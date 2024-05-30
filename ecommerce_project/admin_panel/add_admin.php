<?php
include('../config.php');
include("logged_in_check.php");
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

                    <form action="add_admin_action.php" method="POST">
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
