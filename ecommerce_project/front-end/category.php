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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $category['name']; ?></title>
    <style>
        .category-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .category-container h1 {
            text-align: center;
            margin-bottom: 40px;
        }
        .products-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            list-style-type: none;
            padding: 0;
            justify-content: center;
        }
        .products-grid li {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            width: 300px; 
            text-align: center;
        }
        .products-grid img {
            width: 100%;
            height: 300px; 
            object-fit: cover; 
            margin-bottom: 10px;
        }
        .products-grid p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="category-container">
        <h1><?php echo $category['name']; ?></h1>
        <ul class="products-grid">
            <?php while ($product = mysqli_fetch_assoc($products)) { ?>
                <li>
                    <a href="product.php?id=<?php echo $product['id']; ?>">
                        <img src="product-images/<?php echo $product['picture']; ?>" alt="<?php echo $product['name']; ?>">
                        <p><?php echo $product['name']; ?></p>
                        <p>$<?php echo $product['price']; ?></p>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</body>
</html>
