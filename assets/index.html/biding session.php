<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$_SESSION['product'] = $_GET['item'];

$product = $_GET['item'];

include ('../phpScripts/database.php');

$dataItem = mysqli_query($base, "SELECT * FROM products WHERE product_link = '{$product}'");

$getDataItem = mysqli_fetch_assoc($dataItem);
?>

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
    <link rel="stylesheet" href="../css/biding session.css">

    <style>
        .topThree {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            gap: 5px;
           
        }

        .topThree .person {
            background-color: red;
            display: flex;
            padding: 5px;
            position: relative;
            gap: 5px;
            border: 2px solid royalblue;
            background-color: antiquewhite;
            font-size: 12px;
        }

        .topThree .person img {
            width: 50px;
            height: 55px;
            flex-shrink: 0;
        }

        .topThree .person .details {
            display: flex;
            width: 200px;
            flex-direction: column;
            flex-wrap: nowrap;
        }

        .topThree .person::before {
            content: '';
            position: absolute;
            bottom: -120%;
            width: 5px;
            height: 100px;
            background: green;
            background: blue;
            left: 50%;
            transform: translateX(-50%);
        }

        .biding-session {
            margin-top: 150px;
        }
    </style>

</head>

<body>
    <div class="topThree"></div>
    </div>
    <div class="biding-session">
        <div class="winners">
            <i class="fa-solid fa-coins"></i>
            <h6>Waiting For Winners</h6>
        </div>
    </div>

    <div class="times" data-val = '<?=$getDataItem['etime']?>'></div>


    <div class="container">
        <div class="left-section">
            <img src="../images/productImg/<?=$getDataItem['img']?>">
        </div>
        <div class="right-section">
            <h5>Product Name:<b><?=$getDataItem['pname']?></b></h5>
            <h5>Product Seller:<b><?=$getDataItem['email']?></b></h5>
            <h5>Minimum Price:<span><?=$getDataItem['price']?>.$</span></h5>
            <form action="#" class="rateForm">
                <input type="number" name="rate">
                <button type="submit" class="rateBtn">Submit</button>
                    <a href="winners%20page.php?item=<?=$_GET['item']?>">SEE RESULT</a>
            </form>
        </div>
    </div>
    </div>




    <div class="list-container">
        <h5>Other Participate Bidders</h5>
        <table border="1">
            <thead>
                <th>RANK</th>
                <Th>NAME</Th>
                <Th>SUBMITTED PRICE</Th>
            </thead>
            <tbody class='rankData'></tbody>
        </table>
        <div class="leave-bid">
            <a href="homepage.php">Leave Bid</a>
        </div>
    </div>
    </div>

<script>
    let times =document.querySelector('div.times');
    times.innerHTML = "End on: "+SliptDate(times.dataset.val);
    function SliptDate(date) {
            date = date.split(':')
            hr = parseInt(date[0]) > 12 ? parseInt(date[0]) - 12 : parseInt(date[0]);
            min = date[1];
            type = parseInt(date[0]) > 12 ? 'PM' : 'AM';
            return hr + ':' + min + ':' + type;
        }
</script>

    <script>
        let topPerson = document.querySelector('.topThree');
        setInterval(function () {
            let xml = new XMLHttpRequest();
            xml.open('post', '../phpScripts/action.php', true);
            xml.onload = function () {
                if (xml.status = 200 && xml.readyState == 4) {
                    if(xml.responseText == 'error'){
                        topPerson.innerHTML = "<span>no person bit here</span>";
                    }
                    else {
                        topPerson.innerHTML = xml.responseText;
                    }
                }
            }
            xml.send();
        }, 1000);

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

    <script>

        let form = document.querySelector('.rateForm');
        form.addEventListener('submit', (e) => {
            e.preventDefault()
        });
        let btn = document.querySelector('.rateBtn');
        btn.onclick = () => {
            let formData = new FormData(form);
            let xml = new XMLHttpRequest();
            xml.open('post', '../phpScripts/bit.php', true);
            xml.onload = function () {
                if (xml.status = 200 && xml.readyState == 4) {
                    if(xml.responseText == 'error_low') {
                        alerts('❌Please enter high amount');
                    }
                    else{
                        alerts('✅succes');
                    }
                }
            }
            xml.send(formData);
        }
    </script>
    <script>
        function alerts(data) {
            let body = document.body;
            let span = document.createElement('span');
            span.style = `
            width:250px;
            height:90px;
            position: fixed;
            left: 50%;
            top: 0;
            transform: translate(-50%, 30px);
            pointer-events: none;
            background:#1F7A8C;
            font-weight:600;
            border: 2px solid black;
            border-top-right-radius: 15PX;
            border-bottom-left-radius: 15PX;
            text-align:center;
            color: rgb(255, 255, 255);
            padding: 20px;
            font-size:18px;
            z-index: 100;
        `;
            span.innerHTML = data;
            body.appendChild(span);
            setTimeout(function () {
                span.remove()
            }, 1000);
        }

    </script>
</body>

</html>