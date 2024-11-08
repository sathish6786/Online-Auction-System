<?php 
$img = '../images/profile img.png';
session_start();
if (isset($_SESSION["email"])){
    $email = $_SESSION["email"];
    $data = mysqli_query($base, "SELECT img,type FROM users WHERE email = '{$email}'");
    $datas = mysqli_fetch_assoc($data);
    $img = '../images/dbimages/'.$datas["img"];

}
?>

<div class="navigationbar">
            <img src="../images/project logo.jpg" class="logo">
            <a href="#">Home</a>
            <a href="aboutus.html">about us</a>
            <a href="#">Contactus</a>
            <?php
            if($datas['type'] == 'seller'){
                echo '<a href="upload.php">upload</a>';
            }
            ?>
            <img src="<?=$img?>"  class="profileimg">    
        </div>
        
        <style>
            ::-webkit-scrollbar{
                width: 8px;
                background: #fff;
            }
            ::-webkit-scroll-thumb{
                background: blue;
            }

            
        </style>