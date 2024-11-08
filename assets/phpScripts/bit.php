<?php

include ("database.php");
session_start();
$val = $_POST['rate'];
$emails = $_SESSION['email'];
$product = $_SESSION['product'];

$proDetails = mysqli_query($base, "SELECT * FROM products WHERE product_link = '{$product}'");

$proDetailsItem = mysqli_fetch_assoc($proDetails);


if ($proDetailsItem['price'] < $val) {
    $data = mysqli_query($base, "SELECT * FROM product_bit WHERE email = '{$emails}' AND prodcut = '{$product}'");
    if (mysqli_num_rows($data) > 0) {
        $add = mysqli_query($base, "UPDATE product_bit SET price = '{$val}' WHERE email = '{$emails}' AND prodcut = '{$product}'");
    } else {
        $adds = mysqli_query($base, "INSERT INTO `product_bit` (`email`, `price`, `prodcut`) VALUES ('{$emails}', '{$val}', '{$product}');");
    }
    echo "success";
} else {
    echo "error_low";
}

?>