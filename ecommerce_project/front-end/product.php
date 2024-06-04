<?php
include('../config.php');
include('header.php');

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($product_id <= 0) {
    die('Invalid product ID');
}

$product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id = $product_id"));
if (!$product) {
    die('Product not found');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $product['name']; ?></title>
    <style>
        .product-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .product-container img {
            width: 300px;  
            height: 300px; 
            object-fit: cover; 
            margin-bottom: 20px;
        }
        .product-container h1, 
        .product-container p, 
        .product-container form {
            text-align: center;
            width: 100%;
        }
        .product-container form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .product-container form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="product-container">
        <h1><?php echo $product['name']; ?></h1>
        <img src="product-images/<?php echo $product['picture']; ?>" alt="<?php echo $product['name']; ?>">
        <p><?php echo $product['description']; ?></p>
        <p>Price: $<?php echo $product['price']; ?></p>
        <p>Stock: <?php echo $product['stock_quantity']; ?></p>
        <form id="add-to-cart-form" method="POST" action="cart.php">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <button type="submit" name="add_to_cart" onclick="addToCart()">Add to Cart</button>
        </form>
    </div>

    <script>
        function addToCart() {
            alert("<?php echo $product['name']; ?> added to cart!");
            document.getElementById("add-to-cart-form").submit();
        }
    </script>
</body>
</html>
