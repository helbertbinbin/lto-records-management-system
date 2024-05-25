<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTO Records Management</title>
    <script src="js/icon.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main_header.css">
    <link rel="stylesheet" href="css/user_main_email.CSS">
    <link rel="stylesheet" href="css/main_footer.CSS">
    <style>
        main {
            background-image: url('img/lto_img.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-name">
            <img src="img/lto_logo.png" alt="">
            <h2>LTRMS</h2>
        </div>
        <div class="reg-log">
            <ul>
                <li><a href="main_login.php"><i class="fa-solid fa-user"></i>Login</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Driver Email Address</h2>
            <div class="box">
                <h3>Enter your Email for Notification</h3>
                <div class="contents">
                    <form action="" method="">
                        <div class="mv-details">
                            <div class="details">
                                <label for="">Email Address :</label>
                                <div class="email">
                                    <input type="text" placeholder="@gmail.com">
                                    <button>Send OTP</button>
                                </div>
                                <label for="">Verification Code :</label>
                                <input type="text" placeholder="XXXXXX">
                            </div>
                        </div>
                        <div class="btn">
                            <button class="cancel-btn">Skip <i class="fa-solid fa-angles-right"></i></button>
                            <button class="add-btn">Next <i class="fa-solid fa-angle-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>Copyright &#169 2024 LTO Calamba District Office.</p>
    </footer>
</body>

</html>