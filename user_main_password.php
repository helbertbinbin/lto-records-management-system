<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTO Records Management</title>
    <script src="js/icon.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main_header.css">
    <link rel="stylesheet" href="css/user_main_password.CSS">
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
            <h2>Driver Password</h2>
            <div class="box">
                <h3>Create Password for Security</h3>
                <div class="contents">
                    <form action="" method="">
                        <div class="mv-details">
                            <div class="details">
                                <label for="">Password :</label>
                                <input type="password" placeholder="**********">
                                <label for="">Confirm Password :</label>
                                <input type="password" placeholder="**********">
                            </div>
                        </div>
                        <div class="btn">
                            <button class="add-btn">Submit</button>
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