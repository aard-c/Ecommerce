<?php
include('../config.php');
include('header.php');


// Function to update the quantity of a product in the cart
function updateQuantity($productId, $quantity) {
    if ($quantity <= 0) {
        unset($_SESSION['cart'][$productId]); // Remove product from cart if quantity is zero or less
    } else {
        $_SESSION['cart'][$productId] = $quantity; // Update quantity
    }
}

// Add to cart functionality
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = 1;

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
}

// Increase quantity functionality
if (isset($_POST['increase_quantity'])) {
    $product_id = intval($_POST['product_id']);
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    }
}

// Decrease quantity functionality
if (isset($_POST['decrease_quantity'])) {
    $product_id = intval($_POST['product_id']);
    if (isset($_SESSION['cart'][$product_id]) && $_SESSION['cart'][$product_id] > 1) {
        $_SESSION['cart'][$product_id]--;
    }
}

// Remove product from cart functionality
if (isset($_POST['remove_from_cart'])) {
    $product_id = intval($_POST['product_id']);
    unset($_SESSION['cart'][$product_id]);
}

// Fetch products in cart
$cart_products = [];
if (!empty($_SESSION['cart'])) {
    $product_ids = implode(',', array_keys($_SESSION['cart']));
    $cart_products = mysqli_query($conn, "SELECT * FROM products WHERE id IN ($product_ids)");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        h1 {
            font-size: 32px;
            margin-left: 10%;
        }
        .cart {
            width: 80%;
            margin: 20px auto;
        }
        .cart ul {
            list-style-type: none;
            padding: 0;
        }
        .cart li {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #f1f1f1;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
        }
        .cart li p {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }
        .cart li form {
            display: flex;
            align-items: center;
        }
        .cart li button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            margin: 0 5px;
            border-radius: 5px;
            cursor: pointer;
        }
        .cart li button:hover {
            background-color: #0056b3;
        }
        .cart li span {
            font-size: 16px;
            margin: 0 10px;
        }
        .checkout {
            text-align: right;
            margin-right: 10%;
            margin-top: 20px;
        }
        .checkout a {
            background-color: #28a745;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .checkout a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Cart</h1>
    <div class="cart">
        <?php if (empty($_SESSION['cart'])) { ?>
            <p>You haven't added any product to the cart.</p>
        <?php } else { ?>
            <ul>
                <?php while ($product = mysqli_fetch_assoc($cart_products)) { ?>
                    <li>
                        <p><?php echo $product['name']; ?></p>
                        <form method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <button type="submit" name="increase_quantity">+</button>
                            <span>Quantity: <?php echo $_SESSION['cart'][$product['id']]; ?></span>
                            <button type="submit" name="decrease_quantity">-</button>
                            <button type="submit" name="remove_from_cart">Remove</button>
                        </form>
                    </li>
                <?php } ?>
            </ul>
            <div class="checkout">
                <a href="checkout.php">Proceed to Checkout</a>
            </div>
        <?php } ?>
    </div>
</body>
</html>
