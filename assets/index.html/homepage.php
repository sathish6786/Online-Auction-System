<?php

include ("../phpScripts/database.php");
$products = mysqli_query($base, "SELECT product_link, pname, price, img FROM products");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <title>Online Auction System</title>
  <link rel="icon" href="../images/bid system icon.png">
  <!-- Boostrap styles -->
  <link rel="stylesheet" href="../css/bootstrap.css">
  <!-- css styles link -->
  <link rel="stylesheet" href="../css/home.css">

</head>

<body>
  <!-- header -->
  <header>
    <?php include ('header.php'); ?>
    <!-- menu bar -->
    <div class="menubar">
      <ul>

        <li>
          <a href="#">laptop</a>
          <ul class="dropdown">
            <li><a href="#">HP</a></li>
            <li><a href="#">DELL</a></li>
            <li><a href="#">LENOVO</a></li>
            <li><a href="#">MACOS</a></li>
          </ul>
        </li>
        <ul>

          <li>
            <a href="#">mobile</a>
            <ul class="dropdown">
              <li><a href="#">vivo</a></li>
              <li><a href="#">oppo</a></li>
              <li><a href="#">samsung</a></li>
              <li><a href="#">sony</a></li>
            </ul>
          </li>
          <ul>

            <li>
              <a href="#">Tv</a>
              <ul class="dropdown">
                <li><a href="#">LG</a></li>
                <li><a href="#">SONY</a></li>
                <li><a href="#">TATA</a></li>
                <li><a href="#">Panasonic</a></li>
              </ul>
            </li>
            <ul>

              <li>
                <a href="#">Fashion</a>
                <ul class="dropdown">
                  <li><a href="#">classy shoes</a></li>
                  <li><a href="#">smartWatch</a></li>
                  <li><a href="#">jeans</a></li>
                  <li><a href="#">Denims</a></li>
                </ul>
              </li>
              <ul>

                <li>
                  <a href="#">vehicles</a>
                  <ul class="dropdown">
                    <li><a href="#">Bikes</a></li>
                    <li><a href="#">Cars</a></li>
                    <li><a href="#">Cycles</a></li>
                    <li><a href="#">Scooty</a></li>
                  </ul>
                </li>

  </header>
  <!-- search bar -->
  <div class="search-items">
    <div class="search-input">
      <input placeholder="Search for products" id="searchBar" name="searchBar" type="text">
      <div class="search-icon">
        <i class="fa-solid fa-magnifying-glass glass" id="btn"></i>
      </div>
    </div>
  </div>
  </div>
  </div>
  <!-- container -->
  <div class="container">
    <div class="container">
      <!-- sliders shows -->
      <div id="carouselExampleIndicators" class="carousel slide" data-interval="2000" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../images/slider1.png" class="d-block w-100" data-interval="2000" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../images/slider2.png" class="d-block w-100" data-interval="2000" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../images/slider6.png" class="d-block w-100" data-interval="2000" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../images/slider7.jpeg" class="d-block w-100" data-interval="2000" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
      </div>
    </div>
  </div>
  <!-- products -->

  <div class="body">
    <div id="root">
      <?php
      if (mysqli_num_rows($products) > 0):
        while ($row = mysqli_fetch_assoc($products)):
          ?>
          <div class='box'>
            <div class='img-box'>
              <img class='images' src='../images/productImg/<?= $row['img'] ?>'></img>
            </div>
            <div class='bottom'>
              <p>
                <?= $row['pname'] ?>
              </p>
              <h2>₹
                <?= $row['price'] ?>
              </h2>
              <button><a href="detailspage.php?item=<?= $row['product_link'] ?>">Participate</a></button>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <center><span style="font-size: 20px; color: red;">NO ITEMS FOUND</span></center>
      <?php endif; ?>
    </div>
  </div>
  </div>
  <!-- footer -->
  <div class="footer">
    <!-- <span><i class="fa-regular fa-bell"></i></span> -->
    <h4 style="color:#FEC90B; font-size: 16px; text-align: center; padding: 10px;"> © 2024 | auction system</h4>
  </div>

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <!-- boostrap -->
  <script src="js/boostrap.js"></script>
  <script src="../js/bootstrap.bundle.js"></script>
  <!-- myscript -->
  <!-- <script src="../js/home.js"></script>  -->
  <style>
    .profileimg{
    width: 80px;
    height: 70px;
    padding: 10px;
    position: relative;
    left: 55%;
    border-radius: 50px;

    
}
.carousel-inner{
    width:130%;
    margin-top: 20px;
    height: 60vh;
    position: relative;
    right: 15%;
   
   
}
.navigationbar a{
    display: inline-block;
    color:#FEC90B;
    text-decoration: none;
    margin-right: 10px;
    padding: 14px;
    font-weight:400;
    font-family: 'Poppins', sans-serif;
    font-size: 18px;
    position: relative;
    left: 50%;
    
}
.navigationbar a:hover{
    color: greenyellow;
}
button{
    width: 100%;
    position: relative;
    border: none;
    border-radius: 5px;
    background-color:#FF8811;
    padding: 7px 25px;
    cursor: pointer;
    
}
.bottom button:hover{
    background-color:green;
}
a{
  color: black;
  font-weight: 500;
}
a:hover{
  color: #fff;
  font-weight: 700;
  text-decoration: none;
}
.box{
    margin: 1px;
    display: flex;
    flex-direction: column;
   
    align-items: center;
    justify-content: space-between;
    border: 1px solid black;
    border-radius: 5px;
    padding: 15px;
    box-shadow: 0px 0px 5px gray;


}
.box:hover{
  box-shadow: 0px 0px 20px orangered;
}
.profileimg {
    width: 80px;
    height: 70px;
    padding: 10px;
    position: relative;
    left: 49%;
    border-radius: 50px;
}


  </style>
</body>

</html>