<?php
session_start();
$_SESSION['wishlist'] = [];
header('Location: wishlist.php');
exit();
