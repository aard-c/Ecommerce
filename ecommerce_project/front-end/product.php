<?php
// product.php
include('config.php');

$product_id = $_GET['id'];
$product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id = $product_id"));
?>

<h1><?php echo $product['name']; ?></h1>
<img src="<?php echo $product['picture']; ?>" alt="<?php echo $product['name']; ?>">
<p><?php echo $product['description']; ?></p>
<p>Price: $<?php echo $product['price']; ?></p>
<p>Stock: <?php echo $product['stock_quantity']; ?></p>
<form method="POST" action="cart.php">
    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
    <button type="submit" name="add_to_cart">Add to Cart</button>
</form>
