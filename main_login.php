<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTO Records Management</title>
    <script src="js/icon.js" crossorigin="anonymous"></script>
    <script src="js/script1.js"></script>
    <script src="js/script2.js"></script>
    <script src="js/script3.js"></script>
    <link rel="stylesheet" href="css/main_header.cSS">
    <link rel="stylesheet" href="css/main_login.css">
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
            <a href="javascript:void(0);" class="menu-bar" onclick="myFunction()">
                <i class="fa-solid fa-bars"></i>
            </a>
            <img src="img/lto_logo.png" alt="">
            <h2>LTRMS</h2>
        </div>
        <div class="reg-log">
            <ul>
                <li><a class="active" href="main_login.php"><i class="fa-solid fa-user"></i>Login</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="box">
                <div class="content-1">
                    <form action="db_login_email.php" method="POST">
                        <img src="img/lto_logo.png" alt="">
                        <h2>Land Transportation Records Management System</h2>
                        <span>in LTO Calamba District Office</span>
                        <h3>Login using Email</h3>
                        <div class="content">
                            <div class="div-1">
                                <div class="user">
                                    <i class="fa-solid fa-user"></i>
                                    <input type="email" name="email" placeholder="Email">
                                </div>
                                <div class="pass">
                                    <i class="fa-solid fa-key"></i>
                                    <input type="password" name="password" id="password" placeholder="Password">
                                    <button type="button" id="togglePassword">
                                        <i id="eyeIcon" class="fa-solid fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <script>
                                document.getElementById('togglePassword').addEventListener('click', function () {
                                    var passwordField = document.getElementById('password');
                                    var eyeIcon = document.getElementById('eyeIcon');
                                    var fieldType = passwordField.getAttribute('type');

                                    if (fieldType === 'password') {
                                        passwordField.setAttribute('type', 'text');
                                        eyeIcon.classList.remove('fa-eye');
                                        eyeIcon.classList.add('fa-eye-slash');
                                    } else {
                                        passwordField.setAttribute('type', 'password');
                                        eyeIcon.classList.remove('fa-eye-slash');
                                        eyeIcon.classList.add('fa-eye');
                                    }
                                });
                            </script>
                            <div class="div-2">
                                <div class="row-1">
                                    <input type="checkbox">
                                    <label for="">Remeber Username</label>
                                </div>
                                <div class="row-2">
                                    <p><a href=""><i class="fa-solid fa-circle-question"></i> Forgot Password</a></p>
                                </div>
                            </div>
                            <div class="log-btn">
                                <button>Login</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="break">
                    <div class="line"></div>
                    <span>OR</span>
                    <div class="line"></div>
                </div>
                <div class="content-2">
                    <form action="db_login_qr.php" method="POST">
                        <h3>Login using QR code</h3>
                        <p>
                            <strong>Note: </strong><em> Make sure the QR code is within the frame.</em>
                        </p>
                        <div class="cam-box">
                            <video class="camera" id="preview"></video>
                        </div>
                        <div class="result" style="display: none;">
                            <input type="text" name="qrcode" id="qrcode" placeholder="Result Here!">
                            <button type="submit" id="loginButton">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            }
            else {
                alert('No cameras found');
            }
        })
            .catch(function (e) {
                console.error(e);
            });
        scanner.addListener('scan', function (c) {
            document.getElementById('qrcode').value = c;
            document.getElementById('loginButton').click();
        });
    </script>
    <footer>
        <p>Copyright &#169 2024 LTO Calamba District Office.</p>
    </footer>
</body>

</html>