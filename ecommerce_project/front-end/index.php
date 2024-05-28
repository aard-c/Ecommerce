<?php
include('../config.php');

// Fetch categories and products using the query function
$categories = berkhoca_query_parser("SELECT * FROM categories ORDER BY display_order");
$products = berkhoca_query_parser("SELECT * FROM products LIMIT 10");

if (!$categories || !$products) {
    die('Query failed');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
</head>
<body>
<h1>Home Page</h1>
<h2>Categories</h2>
<ul>
    <?php foreach ($categories as $category) { ?>
        <li><a href="category.php?id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
    <?php } ?>
</ul>

<h2>Products</h2>
<ul>
    <?php foreach ($products as $product) { ?>
        <li>
            <a href="product.php?id=<?php echo $product['id']; ?>">
                <img src="<?php echo $product['picture']; ?>" alt="<?php echo $product['name']; ?>">
                <p><?php echo $product['name']; ?></p>
                <p>$<?php echo $product['price']; ?></p>
            </a>
        </li>
    <?php } ?>
</ul>
</body>
</html>
