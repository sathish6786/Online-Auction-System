<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Online Auction System</title>
    <link rel="icon" href="../images/bid system icon.png">
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registeration</span>
                <input type="text" placeholder="Name" name="name">
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name='password'>
                <input type="file" name='file'>
                <select name='type'>
                    <option value="seller">seller</option>
                    <option value="bidder">Bidder</option>
                </select>
                <button class="signup" type="submit">sign up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <select name="type">
                    <option value="seller">I am Seller</option>
                    <option value="bidder">I am Bidder</option>
                </select>
                <a href="#">Forget Your Password?</a>
                <button class="signin" type='submit'>signin</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back !</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome!!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/log.js"></script>
    <script>
        let signpBtn = document.querySelector('.sign-up form button.signup');
        let signForm = document.querySelector('.sign-up form');

        signForm.addEventListener('submit', function (e) {
            e.preventDefault();
        });

        signpBtn.onclick = function () {
            let formData = new FormData(signForm);
            let xml = new XMLHttpRequest();
            xml.open('post', '../phpScripts/register.php', true);
            xml.onload = function () {
                if (xml.status = 200 && xml.readyState == 4) {
                    if (xml.responseText == 'success') {
                        alerts('✅login succesfully!!!');
                        setTimeout(function () {
                            location.href = 'homepage.php';
                        }, 1500);
                    }
                    else {

                        alerts(xml.response);
                    }
                }
            }
            xml.send(formData);
        }
    </script>

    <script>
        let siginBtn = document.querySelector('.sign-in form button.signin');
        let signinForm = document.querySelector('.sign-in form');

        signinForm.addEventListener('submit', function (e) {
            e.preventDefault();
        });

        siginBtn.onclick = function () {
            let formData = new FormData(signinForm);
            let xml = new XMLHttpRequest();
            xml.open('post', '../phpScripts/login.php', true);
            xml.onload = function () {
                if (xml.status = 200 && xml.readyState == 4) {
                    if (xml.responseText == 'success') {
                        alerts('✅login succesfully!!!');
                        setTimeout(function () {
                            location.href = 'homepage.php';
                        }, 1500);
                    }
                    else {
                        alerts(xml.responseText);
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
            width:190px;
            height:40px;
            position: fixed;
            left: 93%;
            top: 0%;
            transform: translate(-50%, 30px);
            pointer-events: none;
            background:#FF8811;
            text-align:center;
            font-weight:600;
            border-top-right-radius: 12PX;
            border-bottom-left-radius: 12PX;
            color: rgb(255, 255, 255);
            padding: 8px;
            z-index: 150;
            
            
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