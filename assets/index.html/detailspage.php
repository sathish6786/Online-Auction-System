<!DOCTYPE html>
<html lang="en">
<?php
include ("../phpScripts/database.php");
$products = mysqli_query($base, "SELECT * FROM products WHERE product_link = '{$_GET['item']}'");
$item = mysqli_fetch_assoc($products);

// print_r($item);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Auction System</title>
    <link rel="icon" href="../images/bid system icon.png">
    <!-- Boostrap styles -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- css styles link -->
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/details.css">
    <script>
        <?php
        if (!isset($_GET["item"]) || !(mysqli_num_rows($products) > 0)) {
            echo "document.querySelector('.details-container').innerHTML = '<H3>404</H3><p>PAGE NOT FOUND</p>'";
        }
        ?>
    </script>

    <style>
        .col-lg-7.mt-0 {
            margin-left: 280px;
        }
        .left-section button {
            z-index: 3;
        }
    </style>
</head>

<body>
    <header>
        <div class="navigationbar">
            <img src="../images/project logo.jpg" class="logo">
            <a href="../index.html/homepage.html">Home</a>
            <a href="#">Products</a>
            <a href="#">Contactus</a>
            <img src="../images/profile img.png" class="profileimg">
        </div>
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
        </div>
    </header>
    <!-- search bar -->
    <div class="search-items">
        <div class="search-input">
            <input placeholder="Search..." id="searchBar" name="searchBar" type="text">
            <div class="search-icon">
                <i class="fa-solid fa-magnifying-glass glass" id="btn"></i>
            </div>
        </div>
    </div>
    <!-- detials contaniner -->
    <div class="details-container">
        <div class="detals">

            <div class="row">
                <div class="col-lg-5 mt-0">
                    <div class="left-section">
                        <img src="../images/productImg/<?= $item['img'] ?>">
                        <i class="fa-solid fa-heart"></i>
                        <button><a href="./biding%20session.php?item=<?=$item['product_link']?>">BID NOW</a></button>
                    </div>
                </div>
                <div class="right-section">
                    <!-- <div class="row"> -->
                    <div class="col-lg-7 mt-0">
                        <div class="share"><i class="fa-solid fa-share-from-square"></i></div>
                        <h4><span>
                                <?= $item['pdetails'] ?>
                            </span></h4>
                        <span class="hashtag">#JustHere</span>
                        <div class="ratings">
                            <h1 style="position: relative; left: 70%;">₹
                                <?= $item['price'] ?>
                            </h1>
                            <div class="Specification">
                                <h1 style="position: relative; left: 70%; font-size: 25px;">Specifications</h1>
                                <table>
                                    <tbody>
                                        <th>general</th>
                                        <tr>
                                            <td>Product:</td>
                                            <td>
                                                <?= $item['pname'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Type:</td>
                                            <td>
                                                <?= $item['ptype'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>details:</td>
                                            <td>
                                                <?= $item['pdetails'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>seller:</td>
                                            <td>
                                                <?= $item['email'] ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p style="position: relative; left: 70%; color: royalblue;font-size: 14px;">⏱Auction
                                    Information</p>
                                <h6 class="auc-start" style="position: relative; left: 70%; font-size: 18px;
                  font-weight:400;" data-val='<?= $item['stime'] ?>'></h6>
                                <h6 class="auc-end" data-val='<?= $item['etime'] ?>' style="position: relative; left: 70%; font-size: 18px;
                  font-weight:400;"></h6>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="footer">
    <!-- <span><i class="fa-regular fa-bell"></i></span> -->
    <h4 style="color:#FEC90B; font-size: 16px; text-align: center; padding: 10px;"> © 2024 | auction system</h4>
  </div>


    <script>
        let data = new Date();
        let aucStart = document.querySelector('h6.auc-start');
        let aucEnd = document.querySelector('h6.auc-end');
        aucStart.innerHTML = 'Start Time: '+ SliptDate(aucStart.dataset.val);
        aucEnd.innerHTML = 'End Time: '+ SliptDate(aucEnd.dataset.val);
        function SliptDate(date) {
            date = date.split(':')
            hr = parseInt(date[0]) > 12 ? parseInt(date[0]) - 12 : parseInt(date[0]);
            min = date[1];
            type = parseInt(date[0]) > 12 ? 'PM' : 'AM';
            return hr + ':' + min + ':' + type;
        }
    </script>

    <style>
.profileimg{
    width: 80px;
    height: 70px;
    padding: 10px;
    position: relative;
    left: 55%;
    border-radius: 50px;
 }
  .footer{
    background-color: black;
    width: 100%;
    height: 40px;
    margin-top: 88px;
}
.details-container a{
    color: #fff;
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


    </style>

</body>

</html>