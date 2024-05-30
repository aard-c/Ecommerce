<?php
include('../config.php');
include("logged_in_check.php");

$product_id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM products WHERE id = '$product_id'");
$product = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $picture = $_POST['picture'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];
    $description = $_POST['description'];
    $categories = $_POST['categories'];

    $sql = "UPDATE products SET name = '$name', picture = '$picture', price = '$price', stock_quantity = '$stock_quantity', description = '$description' WHERE id = '$product_id'";
    if (mysqli_query($conn, $sql)) {
        mysqli_query($conn, "DELETE FROM product_categories WHERE product_id = '$product_id'");
        foreach ($categories as $category_id) {
            mysqli_query($conn, "INSERT INTO product_categories (product_id, category_id) VALUES ('$product_id', '$category_id')");
        }
        header("Location: product_list.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$categories = mysqli_query($conn, "SELECT * FROM categories");
$product_categories = mysqli_query($conn, "SELECT category_id FROM product_categories WHERE product_id = '$product_id'");
$product_category_ids = [];
while ($row = mysqli_fetch_assoc($product_categories)) {
    $product_category_ids[] = $row['category_id'];
}

?>

<?php include('header.php'); ?>

<body>

<div id="wrapper">

    <?php include('top_bar.php'); ?>

    <?php include('left_sidebar.php'); ?>

    <div id="content">      
        
        <div id="content-header">
            <h1>Edit Product</h1>
        </div> <!-- #content-header --> 

        <div id="content-container">

            <div class="row">

                <div class="col-md-12 col-xs-12">

                    <form action="edit_product.php?id=<?php echo $product['id']; ?>" method="POST">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $product['name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="picture">Picture URL:</label>
                            <input type="text" class="form-control" name="picture" value="<?php echo $product['picture']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="stock_quantity">Stock Quantity:</label>
                            <input type="number" class="form-control" name="stock_quantity" value="<?php echo $product['stock_quantity']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="description" required><?php echo $product['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories:</label>
                            <select class="form-control" name="categories[]" multiple required>
                                <?php while ($row = mysqli_fetch_assoc($categories)) { ?>
                                <option value="<?php echo $row['id']; ?>" <?php echo in_array($row['id'], $product_category_ids) ? 'selected' : ''; ?>><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>

                </div> <!-- /.col -->

            </div> <!-- /.row -->

        </div> <!-- /#content-container -->
        
    </div> <!-- #content -->    
    
</div> <!-- #wrapper -->

<?php include('footer.php'); ?>

</body>
</html>
