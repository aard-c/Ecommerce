<?php
include('../config.php');
include('header.php');

$category_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($category_id <= 0) {
    die('Invalid category ID');
}

$category = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM categories WHERE id = $category_id"));
if (!$category) {
    die('Category not found');
}

$products = mysqli_query($conn, "SELECT * FROM products WHERE id IN (SELECT product_id FROM product_categories WHERE category_id = $category_id)");
?>

<h1><?php echo $category['name']; ?></h1>
<ul>
    <?php while ($product = mysqli_fetch_assoc($products)) { ?>
        <li>
            <a href="product.php?id=<?php echo $product['id']; ?>">
                <img src="<?php echo $product['picture']; ?>" alt="<?php echo $product['name']; ?>">
                <p><?php echo $product['name']; ?></p>
                <p>$<?php echo $product['price']; ?></p>
            </a>
        </li>
    <?php } ?>
</ul>
