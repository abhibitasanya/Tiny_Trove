CREATE DATABASE IF NOT EXISTS tiny_trove;
USE tiny_trove;

DROP TABLE IF EXISTS products;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);

INSERT INTO products (id, name, price, image, description) VALUES
(1, 'UNO Deck', 799.00, 'images/product1.jpg', 'Miniature UNO Cards.'),
(2, 'Diaries', 999.00, 'images/product2.jpg', 'Minimal Mini Diaries.'),
(3, 'Books', 599.00, 'images/product3.jpg', 'Mini Picture Books.'),
(4, 'Crumble', 499.00, 'images/product4.jpg', 'For Chai Lovers, cup and biscuit.'),
(5, 'Theo', 299.00, 'images/product5.jpg', 'Baby Bunny.'),
(6, 'Keeps', 199.00, 'images/product6.jpg', 'Mini Gift-boxes.'),
(7, 'Bunny', 899.00, 'images/product7.jpg', 'Bunny Charm.'),
(8, 'Paper Weights', 299.00, 'images/product8.jpg', 'Cute animal print paper weights.'),
(9, 'Dairy Milk', 199.00, 'images/product9.jpg', 'Miniature Dairy Milk.'),
(10, 'Scented Candles', 699.00, 'images/product10.jpg', 'Tea Scented Candles.'),
(11, 'Charms', 399.00, 'images/product11.jpg', 'Cute Charms.'),
(12, 'Kawaii Keychain', 799.00, 'images/product12.jpg', 'Handmade Keychain.'),
(13, 'Midori', 699.00, 'images/product13.jpg', 'Miniature Handmade Sapling.'),
(14, 'Kawaii Notes', 399.00, 'images/product14.jpg', 'Adorable miniature handmade note-taking essential.'),
(15, 'Luffy Music Box', 1499.00, 'images/product15.jpg', 'One Piece Luffy Wooden Music Box.');