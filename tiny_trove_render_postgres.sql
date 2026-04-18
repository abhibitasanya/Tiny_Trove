CREATE TABLE IF NOT EXISTS products (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price NUMERIC(10,2) NOT NULL,
    image VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);

TRUNCATE TABLE products RESTART IDENTITY;

INSERT INTO products (name, price, image, description) VALUES
('UNO Deck', 799.00, 'images/product1.jpg', 'Miniature UNO Cards.'),
('Diaries', 999.00, 'images/product2.jpg', 'Minimal Mini Diaries.'),
('Books', 599.00, 'images/product3.jpg', 'Mini Picture Books.'),
('Crumble', 499.00, 'images/product4.jpg', 'For Chai Lovers, cup and biscuit.'),
('Theo', 299.00, 'images/product5.jpg', 'Baby Bunny.'),
('Keeps', 199.00, 'images/product6.jpg', 'Mini Gift-boxes.'),
('Bunny', 899.00, 'images/product7.jpg', 'Bunny Charm.'),
('Paper Weights', 299.00, 'images/product8.jpg', 'Cute animal print paper weights.'),
('Dairy Milk', 199.00, 'images/product9.jpg', 'Miniature Dairy Milk.'),
('Scented Candles', 699.00, 'images/product10.jpg', 'Tea Scented Candles.'),
('Charms', 399.00, 'images/product11.jpg', 'Cute Charms.'),
('Kawaii Keychain', 799.00, 'images/product12.jpg', 'Handmade Keychain.'),
('Midori', 699.00, 'images/product13.jpg', 'Miniature Handmade Sapling.'),
('Kawaii Notes', 399.00, 'images/product14.jpg', 'Adorable miniature handmade note-taking essential.'),
('Luffy Music Box', 1499.00, 'images/product15.jpg', 'One Piece Luffy Wooden Music Box.');
