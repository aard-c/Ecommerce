<?php
include('../config.php');
include("logged_in_check.php");

$category_id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM categories WHERE id = '$category_id'");
$category = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $display_order = $_POST['display_order'];

    $sql = "UPDATE categories SET name = '$name', display_order = '$display_order' WHERE id = '$category_id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: category_list.php");
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
            <h1>Edit Category</h1>
        </div> <!-- #content-header --> 

        <div id="content-container">

            <div class="row">

                <div class="col-md-12 col-xs-12">

                    <form action="edit_category.php?id=<?php echo $category['id']; ?>" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="<?php echo $category['name']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="display_order" class="col-sm-2 control-label">Display Order:</label>
                            <div class="col-sm-10">
                                <input type="number" name="display_order" class="form-control" value="<?php echo $category['display_order']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Category</button>
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
