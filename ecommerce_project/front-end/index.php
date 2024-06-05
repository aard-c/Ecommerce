<?php
include('../config.php');
include('header.php');

// Fetch categories and products using the query function
$categories = query_parser("SELECT * FROM categories ORDER BY display_order");
$products = query_parser("SELECT * FROM products LIMIT 10");

if (!$categories || !$products) {
    die('Query failed');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <style>
        /* Flexbox for categories */
        .categories {
            display: flex;
            flex-wrap: wrap;
            list-style-type: none;
            padding: 0;
            margin-left: 10%;
        }
        .categories li {
            margin: 10px;
        }
        .categories li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            font-weight: bold;
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .categories li a:hover {
            background-color: #ddd;
        }

        /* Slick slider styles */
        .slider {
            width: 80%;
            margin: 20px auto;
        }
        .slider img {
            width: 250px;  
            height: 250px; 
            object-fit: cover;
            margin-bottom: 10px;
        }
        .slider p {
            text-align: left;
            margin: 0;
        }
        .slider p.product-name {
            font-size: 18px;
            font-weight: bold;
        }
        .slider p.product-price {
            font-size: 16px;
            color: #28a745;
        }

        /* General styles */
        body {
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        h1 {
            font-size: 32px;
            margin-left: 0; 
        }
        h2 {
            font-size: 28px;
            margin-left: 10%;
        }
    </style>
</head>
<body>
<h1>Home Page</h1> <br>
<h2>Categories</h2>
<ul class="categories">
    <?php foreach ($categories as $category) { ?>
        <li><a href="category.php?id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
    <?php } ?>
</ul>

<h2>Top Products</h2>
<div class="slider">
    <?php foreach ($products as $product) { ?>
        <div>
            <a href="product.php?id=<?php echo $product['id']; ?>">
                <img src="product-images/<?php echo $product['picture']; ?>" alt="<?php echo $product['name']; ?>">
                <p class="product-name"><?php echo $product['name']; ?></p>
                <p class="product-price">$<?php echo $product['price']; ?></p>
            </a>
        </div>
    <?php } ?>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Slick Carousel JS -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>
</body>
</html>
