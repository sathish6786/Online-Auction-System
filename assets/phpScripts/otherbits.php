<?php

include ('database.php');
session_start();
$product = $_SESSION['product'];
$RANK = 1;
$persons = '';

$data = mysqli_query($base, "SELECT * FROM `product_bit` WHERE prodcut = '{$product}' ORDER BY `product_bit`.`price` DESC");

if (mysqli_num_rows($data) > 0) {

    while ($row = mysqli_fetch_assoc($data)) {
        // print_r($row);
        $get = mysqli_query($base, "SELECT * FROM users WHERE email = '{$row['email']}'");
        $getData = mysqli_fetch_assoc($get);
        $persons .= "<tbody>
                        <TD>{$RANK}</TD>
                        <TD>{$getData['name']}</TD>
                        <td><span>{$row['price']}.$</span></td>
                    </tbody>";
                    $RANK += 1;
    }
    echo $persons;
} else {
    echo 'error';
}



?>