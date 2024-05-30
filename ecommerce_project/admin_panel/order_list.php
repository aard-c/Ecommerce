<?php
include('../config.php');
include("logged_in_check.php");

$orders = mysqli_query($conn, "SELECT * FROM orders");
?>

<?php include('header.php'); ?>

<body>

<div id="wrapper">

    <?php include('top_bar.php'); ?>

    <?php include('left_sidebar.php'); ?>

    <div id="content">      
        
        <div id="content-header">
            <h1>Order List</h1>
        </div> <!-- #content-header --> 

        <div id="content-container">

            <div class="row">

                <div class="col-md-12 col-xs-12">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Products</th>
                                <th>Quantities</th>
                                <th>Images</th>
                                <th>Billing Information</th>
                                <th>Shipping Information</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($orders)) {
                                $order_items = mysqli_query($conn, "SELECT * FROM order_items WHERE order_id = '{$row['id']}'");
                                $products = [];
                                $quantities = [];
                                $images = [];
                                while ($item = mysqli_fetch_assoc($order_items)) {
                                    $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id = '{$item['product_id']}'"));
                                    $products[] = $product['name'];
                                    $quantities[] = $item['quantity'];
                                    $images[] = $product['picture'];
                                }
                            ?>
                            <tr>
                                <td><?php echo $row['order_number']; ?></td>
                                <td><?php echo $row['customer_name']; ?></td>
                                <td><?php echo $row['customer_phone']; ?></td>
                                <td><?php echo implode(", ", $products); ?></td>
                                <td><?php echo implode(", ", $quantities); ?></td>
                                <td><?php echo implode(", ", array_map(function($image) { return "<img src='$image' width='50' height='50'>"; }, $images)); ?></td>
                                <td><?php echo $row['billing_info']; ?></td>
                                <td><?php echo $row['shipping_address']; ?></td>
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
