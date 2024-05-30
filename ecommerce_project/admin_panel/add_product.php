<?php
include('../config.php');
include("logged_in_check.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $picture = $_POST['picture'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];
    $description = $_POST['description'];
    $categories = $_POST['categories'];

    $sql = "INSERT INTO products (name, picture, price, stock_quantity, description) VALUES ('$name', '$picture', '$price', '$stock_quantity', '$description')";
    if (mysqli_query($conn, $sql)) {
        $product_id = mysqli_insert_id($conn);
        foreach ($categories as $category_id) {
            mysqli_query($conn, "INSERT INTO product_categories (product_id, category_id) VALUES ('$product_id', '$category_id')");
        }
        header("Location: product_list.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$categories = mysqli_query($conn, "SELECT * FROM categories");

?>

<?php include('header.php'); ?>

<body>

<div id="wrapper">

    <?php include('top_bar.php'); ?>

    <?php include('left_sidebar.php'); ?>

    <div id="content">      
        
        <div id="content-header">
            <h1>Add Product</h1>
        </div> <!-- #content-header --> 

        <div id="content-container">

            <div class="row">

                <div class="col-md-12 col-xs-12">

                    <form action="add_product.php" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="picture" class="col-sm-2 control-label">Picture URL:</label>
                            <div class="col-sm-10">
                                <input type="text" name="picture" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">Price:</label>
                            <div class="col-sm-10">
                                <input type="number" step="0.01" name="price" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stock_quantity" class="col-sm-2 control-label">Stock Quantity:</label>
                            <div class="col-sm-10">
                                <input type="number" name="stock_quantity" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description:</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categories" class="col-sm-2 control-label">Categories:</label>
                            <div class="col-sm-10">
                                <select name="categories[]" class="form-control" multiple required>
                                    <?php while ($row = mysqli_fetch_assoc($categories)) { ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Product</button>
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
