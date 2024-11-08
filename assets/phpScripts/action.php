<?php

include ('database.php');
session_start();
$product = $_SESSION['product'];

$persons = '';

$data = mysqli_query($base, "SELECT * FROM `product_bit` WHERE prodcut = '{$product}' ORDER BY `product_bit`.`price` DESC LIMIT 0, 3");

if(mysqli_num_rows($data) > 0){

while($row = mysqli_fetch_assoc($data)){
    // print_r($row);
    $get = mysqli_query($base,"SELECT * FROM users WHERE email = '{$row['email']}'");
    $getData = mysqli_fetch_assoc($get);
    $persons .= "
    <div class='person'>
    <img src='../images/dbimages/{$getData['img']}' alt=''>
    <div class='details'>
        <span>name: {$getData['name']}</span>
        <span>email: {$row['email']}</span>
        <span>rate: {$row['price']}</span>
    </div>
</div>
    ";
}
echo $persons;
}
else {
    echo 'error';
}



?>