<?php
session_start();
$type = '';

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = (int) $_GET['id'];
    $type = $_GET['type'];

    if ($type === "cart" && isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    } elseif ($type === "wishlist" && isset($_SESSION['wishlist']) && in_array($id, $_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = array_values(array_filter($_SESSION['wishlist'], fn($item) => (int)$item !== $id));
    }
}

$redirect = ($type ?? '') === "cart" ? "cart.php" : "wishlist.php";
header("Location: " . $redirect);
exit();
