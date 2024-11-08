<!DOCTYPE html>
<?php
session_start();
$_SESSION['product'] = $_GET['item'];

$product = $_GET['item'];

include ('../phpScripts/database.php');

$dataItem = mysqli_query($base, "SELECT * FROM products WHERE product_link = '{$product}'");

$getDataItem = mysqli_fetch_assoc($dataItem);

$winner = mysqli_query($base, "SELECT * FROM `product_bit` WHERE prodcut = '{$product}' ORDER BY `product_bit`.`price` DESC LIMIT 1");

$winnerName = mysqli_fetch_assoc($winner);

$winnerPerson = mysqli_query($base, "SELECT * FROM `users` WHERE email = '{$winnerName['email']}'");

$winnerman = mysqli_fetch_assoc($winnerPerson);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Online Auction System</title>
    <link rel="icon" href="../images/bid system icon.png">
    <!-- Boostrap styles -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- css styles link -->
    <link rel="stylesheet" href="../css/winning page.css">

    <style> 
        .winning-rusultcontainer.open-popup .details-popup {
            visibility: visible;
            transform: translate(-50%, -50%) scale(1);
        }
        .details-popup {
            background-color: royalblue;
            margin-top: 0px;
            border-radius: 30px;
            transform: translate(-50%, -50%) scale(0);
            position: absolute;
            left: 50%;
            top: 50%;
            visibility: hidden;
            transition: transform 0.8s ease;
        }
        .winner{
    display: flex;
    width: 300px;
    height: 110px;
    background-color: #FFf;
    margin-left: 27px;
    border-top-left-radius: 18PX;
    
}
.winner img{
    width: 70px;
    height: 80px;
    margin-top: 8px;
}
.winner h6{
    font-size: 10px;
    padding: 2px;
    margin-top: 5px;
}
.left-section {
    height: 110px;
    width: 280px;
    background-color: #FFf;
    display: flex;
   
   
    border-top-right-radius: 18PX;
    
}
.left-section img{
    width: 80px;
    height: 80px;

}
.left-section h6 {
    font-size: 10px;
}
    
.right-section{
    width: 230px;
}
.details-popup b{
    color: orange;
    font-size: 10px;
}
    </style>
   
</head>
<body>
    <div class="winning-rusultcontainer" id="popup">
        <h5><b>Bid Rusult</b></h5>
        <img src="../images/winning cup.png">
        <h3>RANK 01</h3>
        <p>Configuration!!For winning bid session,we will contact you,best wishes for next one.</p>
        <button onclick="openpopup()">Result details</button>
        <div class="details-popup">
            <i class="fa-solid fa-trophy"></i>
            <h5>Winner info</h5>
            <h4>products</h4>
            <h3>winner</h3>
            <div class="left-section">
                <img src="../images/productImg/<?=$getDataItem['img']?>">
                <div class="left-side content">
                <h6>Name:<b><?=$getDataItem['pname']?></b></h6>
                <h6>Catagory:<b><?=$getDataItem['ptype']?></b></h6>
                <h6>Seller:<b><?=$getDataItem['email']?></b></h6>
                <h6>Price:<span><?=$getDataItem['price']?>.$</span></h6>
                </div>
            <div class="winner">
                    <img src="../images/dbimages/<?=$winnerman['img']?>">
             <div class="right-section">
                <h6>Name:<b><?=$winnerman['name']?></b></h6>
                <h6>email:<b><?=$winnerName['email']?></b></h6>
                <h6>Submitted price:<b><?=$winnerName['price']?>.$</b></h6>
                
             </div>

            </div>
        </div>
        <div class="Bid-Ranking">
            <i class="fa-solid fa-ranking-star"></i>
            <h2>Bid Ranking</h2>
            <table border="1">
                <thead>
                    <th>RANK</th>
                    <Th>NAME</Th>
                    <Th>SUBMITTED PRICE</Th>
                </thead>
                <tbody class="rankData"></tbody>
               </table>
             <button onclick="closepopup()">ok</button>
        </div>


            
        

        
    </div>
    <script>
        let popup=document.getElementById("popup")
        function openpopup(){
           popup.classList.add("open-popup");
        }
        function closepopup(){
           popup.classList.remove("open-popup");
        }
        
        let rankData = document.querySelector('.rankData');
        setInterval(function () {
            let xml = new XMLHttpRequest();
            xml.open('post', '../phpScripts/otherbits.php', true);
            xml.onload = function () {
                if (xml.status = 200 && xml.readyState == 4) {
                    rankData.innerHTML = xml.responseText;
                }
            }
            xml.send();
        }, 1000);

    </script>
</body>
</html>