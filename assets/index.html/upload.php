<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/upload.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Online Auction System</title>
    <link rel="icon" href="../images/bid system icon.png">
    <script>
    <?php

    include ('../phpScripts/database.php');

    if (isset($_SESSION['email']) || $_SESSION['email'] != '') {
        if(!isset($_SESSION['type']) || $_SESSION['type'] != 'seller') {
            echo '
            alert("sign in to bidder, access this page..");
            location.href = "homepage.php";
        ';
        }
    }
    else {
        echo '
            alert("sign in to access this page..");
            location.href = "homepage.php";
        ';
    }

    ?>
    </script>
    <style>
        .product-namebox input,
        .upload-date input,
        .product-image input {
            padding: 0 10px;
        }
    </style>
</head>

<body>
    <!-- header -->
    <header>
        <?php include ('header.php'); ?>
        <div class="upload-products">
            <h1>Upload Your Product</h1>
            <form action="#" class="formPage">
                <div class="product-namebox" max-val="max:20">
                    <h5>Product Name</h5>
                    <input type="text" placeholder="product name" name='name'>
                </div>
                <div class="product-namebox" max-val="max:40">
                    <h5>Product type</h5>
                    <input type="text" placeholder="product type" name='type'>
                </div>
                <div class="product-namebox" max-val="max:10000">
                    <h5>product price</h5>
                    <input type="number" placeholder="product price" name='price'>
                </div>
                <div class="upload-date" max-val="max:10000">
                    <h5>Starting Date</h5>
                    <input type="time" placeholder="starting date" name='sdate'>
                    <h5>Ending Date</h5>
                    <input type="time" placeholder="ending date date" name='edate'>
                </div>
                <div class="product-image">
                    <input type="file" placeholder="upload image" name='file'>
                </div>
                <div class="product-detailsbox">
                    <h5>product Details</h5>
                    <input type="text" placeholder="product details" name="details">
                </div>
                <div class="upload-btn">
                    <button class="upBtn" type='submit'>upload</button>
                </div>
            </form>

        </div>
        <div class="footer">
            <h4 style="color: #fff; font-size: 16px; text-align: center; padding: 10px;"> © 2024 | auction system</h4>
        </div>


        <script>
            let formPage = document.querySelector('form.formPage');
            let upBtn = document.querySelector('form.formPage button.upBtn');
            formPage.addEventListener('submit', function (e) {
                e.preventDefault();
            });

            upBtn.onclick = function () {
            let formData = new FormData(formPage);
            let xml = new XMLHttpRequest();
            xml.open('post', '../phpScripts/productUpload.php', true);
            xml.onload = function () {
                if (xml.status = 200 && xml.readyState == 4) {
                    alerts(xml.response);
                    if (xml.responseText == 'success') {
                        setTimeout(function () {
                            location.href = 'homepage.php';
                        }, 1500);
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
            position: fixed;
            left: 50%;
            top: 0;
            transform: translate(-50%, 30px);
            pointer-events: none;
            background: green;
            color: rgb(255, 255, 255);
            padding: 5px;
            z-index: 100;
        `;
            span.innerHTML = data;
            body.appendChild(span);
            setTimeout(function () {
                span.remove()
            }, 1000)
        }

    </script>
</body>

</html>