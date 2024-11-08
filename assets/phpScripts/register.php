<?php

include ("database.php");
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$type = $_POST['type'];
$typsImg = ['png', 'jpg', 'jpeg'];
$img = $_FILES['file'];

if($name == '' || $email == '' || $password == '' || $type == ''){
    echo 'fill all data';
}
else {
    $exe = pathinfo($img['name'], PATHINFO_EXTENSION);
    if(!in_array($exe, $typsImg)){
        echo 'upload only jpg, png, jpeg';
    }
    else {
        $data = mysqli_query($base, "SELECT * FROM users WHERE email = '{$email}' AND type= '{$type}'");
        if(mysqli_num_rows($data) > 0){
            echo 'already user found';
        }
        else {      
            $fileName = $email.'.'.$exe;
            move_uploaded_file($img['tmp_name'], '../images/dbimages/'.$fileName);
            $add = mysqli_query($base, "INSERT INTO users (name, email, password, type, img) VALUES ('{$name}', '{$email}', '{$password}', '{$type}', '{$fileName}')");
            if($add){
                echo 'success';
                $_SESSION['email'] = $email;
                $_SESSION['type'] = $type;
            }
            else {
                echo 'some error';
            }
        }
    }
}

?>