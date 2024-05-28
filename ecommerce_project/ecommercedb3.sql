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
