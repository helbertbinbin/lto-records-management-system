<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTO Records Management</title>
    <script src="js/icon.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main_header.css">
    <link rel="stylesheet" href="css/user_main_home.css">
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
            <h2>Driver Online Record</h2>
            <div class="box">
                <h3>Record For Unclaimed Impound Motor Vehicle</h3>
                <div class="contents">
                    <form action="" method="">
                        <div class="mv-details">
                            <div class="details">
                                <label for="">Name of Owner/Operator :</label>
                                <input type="text" placeholder="">
                                <label for="">Plate Number :</label>
                                <input type="text" placeholder="">
                                <label for="">Temporary Operator Permmit (TOP #) :</label>
                                <input type="text" placeholder="">
                                <label for="">Apprehension Date :</label>
                                <input type="date" placeholder="">
                            </div>
                            <div class="details">
                                <label for="">Violation in Code :</label>
                                <input type="text" placeholder="">
                                <label for="">Type of Violation :</label>
                                <input type="text" placeholder="">
                                <label for="">Name of Apprehension Officer :</label>
                                <input type="text" placeholder="">
                                <label for="">Penalty Impounding Fee :</label>
                                <input type="text" placeholder="">
                            </div>
                            <div class="details">
                                <label for="">Amount (Fines and Penalties) :</label>
                                <input type="text" placeholder="">
                                <label for="">Encombered :</label>
                                <input type="text" placeholder="">
                                <label for="">Serviceable / Unserviceable :</label>
                                <input type="text" placeholder="">
                                <label for="">Remarks :</label>
                                <input class="remarks" type="text" placeholder="">
                            </div>
                        </div>
                        <h3>Motor Vehicle Details</h3>
                        <div class="mv-details">
                            <div class="details">
                                <label for="">Type of Body :</label>
                                <input type="text" placeholder="">
                                <label for="">Make :</label>
                                <input type="text" placeholder="">
                                <label for="">Series :</label>
                                <input type="text" placeholder="">
                            </div>
                            <div class="details">
                                <label for="">Year Model :</label>
                                <input type="text" placeholder="">
                                <label for="">Color :</label>
                                <input type="tetx" placeholder="">
                            </div>
                            <div class="details">
                                <label for="">Engine Number :</label>
                                <input type="text" placeholder="">
                                <label for="">Chassis Number :</label>
                                <input type="text" placeholder="">
                            </div>
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