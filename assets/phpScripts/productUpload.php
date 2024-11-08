<?php
include ('../phpScripts/database.php');
session_start();
$name = $_POST['name'];
$type = $_POST['type'];
$price = $_POST['price'];
$sdate = $_POST['sdate'];
$edate = $_POST['edate'];
$details = $_POST['details'];
$email = $_SESSION['email'];
$img = $_FILES['file'];
$tn = '';
$typsImg = ['png', 'jpg', 'jpeg'];
$letters = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", 1, 2, 3, 4, 5, 6, 7, 8, 9, 0];

if ($name == '' && $type == '' && $price == '' && $sdate == '' && $edate == '' && $details == '') {
    echo 'Please fill all inputs';
}
else {
    $exe = pathinfo($img['name'], PATHINFO_EXTENSION);
    if(!in_array($exe, $typsImg)){
        echo 'upload only jpg, png, jpeg';
    }
    else {
        for ($i = 1; $i <= 8; $i++) {
            $rand = rand(1, sizeof($letters)-1);
            $tn .= $letters[$rand];
        }
        $fileName = $tn . '.' . $exe;
        move_uploaded_file($img['tmp_name'], '../images/productImg/'.$fileName);
        $data = mysqli_query($base, "INSERT INTO products (product_link, pname, ptype, price, pdetails, email, stime, etime, img) VALUES ('{$tn}', '{$name}', '{$type}', '{$price}', '{$details}', '{$email}', '{$sdate}', '{$edate}', '{$fileName}');");
        if($data) {
            echo 'success';
        }
        else {
            echo 'some error';
        }
    }
}
?>