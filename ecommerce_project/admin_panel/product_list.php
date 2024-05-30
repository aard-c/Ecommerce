<?php
include('../config.php');
include("logged_in_check.php");

$products = mysqli_query($conn, "SELECT p.*, GROUP_CONCAT(c.name) AS categories 
                                FROM products p 
                                LEFT JOIN product_categories pc ON p.id = pc.product_id 
                                LEFT JOIN categories c ON pc.category_id = c.id 
                                GROUP BY p.id");
?>

<?php include('header.php'); ?>

<body>

<div id="wrapper">

    <?php include('top_bar.php'); ?>

    <?php include('left_sidebar.php'); ?>

    <div id="content">      
        
        <div id="content-header">
            <h1>Product List</h1>
        </div> <!-- #content-header --> 

        <div id="content-container">

            <div class="row">

                <div class="col-md-12 col-xs-12">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Picture</th>
                                <th>Price</th>
                                <th>Stock Quantity</th>
                                <th>Description</th>
                                <th>Categories</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($products)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><img src="<?php echo $row['picture']; ?>" width="50" height="50"></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['stock_quantity']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['categories']; ?></td>
                                <td>
                                    <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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
