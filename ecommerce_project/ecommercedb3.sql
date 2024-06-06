-- Insert data into categories table
INSERT INTO categories (name, display_order) VALUES 
('Electronics', 1),
('Books', 2),
('Clothing', 3),
('Home Appliances', 4),
('Sports', 5),
('Toys', 6),
('Furniture', 7),
('Beauty Products', 8),
('Automotive', 9),
('Groceries', 10);

-- Insert data into products table
INSERT INTO products (name, picture, price, stock_quantity, description) VALUES 
('Smartphone', 'smartphone.jpg', 699.99, 50, 'Latest model smartphone with all the new features.'),
('Laptop', 'laptop.jpg', 1099.99, 30, 'High-performance laptop suitable for all your work and play needs.'),
('Fiction Novel', 'fiction_novel.jpg', 14.99, 100, 'A thrilling fiction novel by a bestselling author.'),
('T-shirt', 'tshirt.jpg', 19.99, 200, 'Comfortable and stylish t-shirt available in multiple colors.'),
('Blender', 'blender.jpg', 49.99, 75, 'Powerful blender for smoothies and shakes.'),
('Basketball', 'basketball.jpg', 29.99, 60, 'Official size and weight basketball.'),
('Doll', 'doll.jpg', 24.99, 80, 'Beautiful doll with accessories.'),
('Sofa', 'sofa.jpg', 499.99, 15, 'Comfortable and stylish sofa for your living room.'),
('Lipstick', 'lipstick.jpg', 9.99, 120, 'Long-lasting lipstick available in various shades.'),
('Car Tire', 'car_tire.jpg', 89.99, 40, 'Durable car tire for all-season use.');

-- Insert data into product_categories table
INSERT INTO product_categories (product_id, category_id) VALUES 
(1, 1), (2, 1), (3, 2), (4, 3), (5, 4), (6, 5), (7, 6), (8, 7), (9, 8), (10, 9);

-- Insert data into orders table
INSERT INTO orders (order_number, customer_name, customer_phone, shipping_address, billing_info) VALUES 
('ORD001', 'John Doe', '123-456-7890', '123 Elm St, Springfield, IL', 'Visa ****1234'),
('ORD002', 'Jane Smith', '234-567-8901', '456 Oak St, Metropolis, IL', 'MasterCard ****5678'),
('ORD003', 'Alice Johnson', '345-678-9012', '789 Pine St, Gotham, NY', 'Amex ****9012'),
('ORD004', 'Bob Brown', '456-789-0123', '321 Maple St, Star City, CA', 'Discover ****3456'),
('ORD005', 'Charlie Davis', '567-890-1234', '654 Birch St, Central City, TX', 'Visa ****6789'),
('ORD006', 'Dave Evans', '678-901-2345', '987 Cedar St, Coast City, FL', 'MasterCard ****0123'),
('ORD007', 'Eve Foster', '789-012-3456', '159 Walnut St, Keystone, OH', 'Amex ****4567'),
('ORD008', 'Frank Green', '890-123-4567', '753 Cherry St, Bludhaven, NJ', 'Discover ****7890'),
('ORD009', 'Grace Harris', '901-234-5678', '852 Willow St, Fawcett City, WA', 'Visa ****0123'),
('ORD010', 'Hank Ingram', '012-345-6789', '951 Fir St, Ivy Town, OR', 'MasterCard ****3456');

-- Insert data into order_items table
INSERT INTO order_items (order_id, product_id, quantity) VALUES 
(1, 1, 1), (1, 3, 2),
(2, 2, 1), (2, 5, 1),
(3, 4, 3),
(4, 6, 2),
(5, 7, 1), (5, 9, 1),
(6, 8, 1),
(7, 10, 4),
(8, 1, 2), (8, 4, 1),
(9, 3, 1), (9, 6, 1), (9, 8, 1),
(10, 2, 1), (10, 7, 2);


INSERT INTO products (name, picture, price, stock_quantity, description) VALUES 
('Tablet', 'tablet.jpg', 499.99, 40, 'Lightweight tablet with a sharp display and fast performance.'),
('Headphones', 'headphones.jpg', 149.99, 70, 'Noise-cancelling headphones with high-quality sound.'),
('Cookbook', 'cookbook.jpg', 24.99, 90, 'A collection of delicious recipes from around the world.'),
('Jeans', 'jeans.jpg', 39.99, 150, 'Comfortable and durable jeans available in various sizes.'),
('Microwave', 'microwave.jpg', 89.99, 25, 'Compact microwave oven with multiple settings.'),
('Tennis Racket', 'tennis_racket.jpg', 59.99, 50, 'Lightweight tennis racket for all skill levels.'),
('Board Game', 'board_game.jpg', 34.99, 100, 'Fun and engaging board game for the whole family.'),
('Coffee Table', 'coffee_table.jpg', 199.99, 20, 'Stylish coffee table made of high-quality wood.'),
('Shampoo', 'shampoo.jpg', 12.99, 110, 'Nourishing shampoo for all hair types.'),
('Car Battery', 'car_battery.jpg', 129.99, 30, 'Reliable car battery with long life.'),
('Smartwatch', 'smartwatch.jpg', 199.99, 80, 'Advanced smartwatch with multiple health tracking features.'),
('Camera', 'camera.jpg', 499.99, 25, 'High-resolution camera with multiple lenses.'),
('Historical Book', 'historical_book.jpg', 19.99, 70, 'Detailed historical account by a renowned author.'),
('Jacket', 'jacket.jpg', 59.99, 90, 'Warm and stylish jacket for all seasons.'),
('Washing Machine', 'washing_machine.jpg', 399.99, 10, 'Efficient washing machine with multiple modes.'),
('Yoga Mat', 'yoga_mat.jpg', 29.99, 120, 'Comfortable yoga mat for all fitness levels.'),
('Action Figure', 'action_figure.jpg', 19.99, 80, 'Detailed action figure with movable parts.'),
('Dining Table', 'dining_table.jpg', 799.99, 5, 'Elegant dining table that seats six.'),
('Face Cream', 'face_cream.jpg', 29.99, 100, 'Moisturizing face cream for daily use.'),
('Car Wax', 'car_wax.jpg', 14.99, 50, 'High-quality car wax for a lasting shine.');

INSERT INTO product_categories (product_id, category_id) VALUES 
(11, 1), (12, 1), (13, 2), (14, 3), (15, 4), (16, 5), (17, 6), (18, 7), (19, 8), (20, 9),
(21, 1), (22, 1), (23, 2), (24, 3), (25, 4), (26, 5), (27, 6), (28, 7), (29, 8), (30, 9);