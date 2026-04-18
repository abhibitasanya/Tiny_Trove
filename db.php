<?php
$products = [
    1 => ['id' => 1, 'name' => 'UNO Deck', 'price' => 799.00, 'image' => 'images/product1.jpg', 'description' => 'Miniature UNO Cards.'],
    2 => ['id' => 2, 'name' => 'Diaries', 'price' => 999.00, 'image' => 'images/product2.jpg', 'description' => 'Minimal Mini Diaries.'],
    3 => ['id' => 3, 'name' => 'Books', 'price' => 599.00, 'image' => 'images/product3.jpg', 'description' => 'Mini Picture Books.'],
    4 => ['id' => 4, 'name' => 'Crumble', 'price' => 499.00, 'image' => 'images/product4.jpg', 'description' => 'For Chai Lovers, cup and biscuit.'],
    5 => ['id' => 5, 'name' => 'Theo', 'price' => 299.00, 'image' => 'images/product5.jpg', 'description' => 'Baby Bunny.'],
    6 => ['id' => 6, 'name' => 'Keeps', 'price' => 199.00, 'image' => 'images/product6.jpg', 'description' => 'Mini Gift-boxes.'],
    7 => ['id' => 7, 'name' => 'Bunny', 'price' => 899.00, 'image' => 'images/product7.jpg', 'description' => 'Bunny Charm.'],
    8 => ['id' => 8, 'name' => 'Paper Weights', 'price' => 299.00, 'image' => 'images/product8.jpg', 'description' => 'Cute animal print paper weights.'],
    9 => ['id' => 9, 'name' => 'Dairy Milk', 'price' => 199.00, 'image' => 'images/product9.jpg', 'description' => 'Miniature Dairy Milk.'],
    10 => ['id' => 10, 'name' => 'Scented Candles', 'price' => 699.00, 'image' => 'images/product10.jpg', 'description' => 'Tea Scented Candles.'],
    11 => ['id' => 11, 'name' => 'Charms', 'price' => 399.00, 'image' => 'images/product11.jpg', 'description' => 'Cute Charms.'],
    12 => ['id' => 12, 'name' => 'Kawaii Keychain', 'price' => 799.00, 'image' => 'images/product12.jpg', 'description' => 'Handmade Keychain.'],
    13 => ['id' => 13, 'name' => 'Midori', 'price' => 699.00, 'image' => 'images/product13.jpg', 'description' => 'Miniature Handmade Sapling.'],
    14 => ['id' => 14, 'name' => 'Kawaii Notes', 'price' => 399.00, 'image' => 'images/product14.jpg', 'description' => 'Adorable miniature handmade note-taking essential.'],
    15 => ['id' => 15, 'name' => 'Luffy Music Box', 'price' => 1499.00, 'image' => 'images/product15.jpg', 'description' => 'One Piece Luffy Wooden Music Box.'],
];

function tiny_trove_products(): array
{
    global $products;
    return $products;
}

function tiny_trove_get_product(int $id): ?array
{
    $products = tiny_trove_products();
    return $products[$id] ?? null;
}
