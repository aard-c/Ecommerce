<?php
// category.php
include('config.php');

$category_id = $_GET['id'];
$category = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM categories WHERE id = $category_id"));
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
