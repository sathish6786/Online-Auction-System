<?php

include ("database.php");
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$type = $_POST['type'];

if ($email == '' || $password == '' || $type == '') {
    echo 'fill all data';
} else {
    $data = mysqli_query($base, "SELECT * FROM users WHERE email = '{$email}' AND type ='{$type}' AND password = '{$password}'");
    if (mysqli_num_rows($data) > 0) {
        echo 'success';
        $_SESSION['email'] = $email;
        $_SESSION['type'] = $type;
    } else {
        echo 'no user found';
    }
}
?>