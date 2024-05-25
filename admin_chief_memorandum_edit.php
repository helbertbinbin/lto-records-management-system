<?php
session_start();

if (!isset($_SESSION["user_name"])) {
    header("Location: index.php");
    exit();
}

$server = "localhost";
$username = "root";
$password = "";
$dbname = "lto_system";

$conn = mysqli_connect($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_name = $_SESSION["user_name"];
$sql = "SELECT * FROM users WHERE name = '$user_name'";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['cancel'])) {
    header("Location: admin_chief_memorandum.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTO Records Management</title>
    <script src="js/icon.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/admin_main_header.css">
    <link rel="stylesheet" href="css/admin_main_navigation.css">
    <link rel="stylesheet" href="css/admin_chief_memorandum_add.css">
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
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">
                        <span class="name"><i class="fa-solid fa-user"></i>
                            <?php echo $_SESSION["user_name"]; ?>
                        </span>
                    </a>
                    <div class="dropdown-content">
                        <a href="admin_main_account.php"><i class="fa-regular fa-user"></i> View Account</a>
                        <a href="admin_main_registration.php"><i class="fa-solid fa-plus"></i> New Account</a>
                        <a href="db_logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <script>
        function myFunction() {
            var x = document.getElementById("sidenav");
            if (x.className === "navbar") {
                x.className += " responsive";
            }
            else {
                x.className = "navbar";
            }
        }
    </script>
    <nav class="navbar" id="sidenav">
        <div class="sidebar">
            <div class="menu-btn">
                <a href="javascript:void(0);" class="menu-x" onclick="myFunction()">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            </div>
            <ul>
                <li>
                    <a href="admin_main_home.php" style="padding-right: 99px;">
                        <i class="fa-solid fa-house"></i> Home
                    </a>
                </li>
                <li>
                    <a href="admin_main_dashboard.php" style="padding-right: 71px;">
                        <i class="fa-solid fa-chart-line"></i> Dashboard
                    </a>
                </li>
                <li>
                    <button class="dropdown-btn">
                        <i class="fa-solid fa-folder"></i> LETAS <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <a href="admin_letas_impound.php"><i class="fa-solid fa-file"></i> Impound Records</a>
                        <a href="admin_letas_ticket.php"><i class="fa-solid fa-file"></i> Ticketing Records</a>
                    </div>
                </li>
                <li>
                    <button class="dropdown-btn">
                        <i class="fa-solid fa-folder"></i> Miscellaneous <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <a href="admin_misc_monitoring.php"><i class="fa-solid fa-file"></i> Motinoring Records</a>
                        <a href="admin_misc_special.php"><i class="fa-solid fa-file"></i> Special Files</a>
                    </div>
                </li>
                <li>
                    <button id="active" class="dropdown-btn">
                        <i class="fa-solid fa-folder"></i> Chief Records <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <a class="active" href="admin_chief_memorandum.php"><i class="fa-solid fa-file"></i> Memorandum</a>
                    </div>
                </li>
                <li>
                    <a href="admin_main_archive.php" style="padding-right: 84.5px;">
                        <i class="fa-solid fa-box-archive"></i> Archived
                    </a>
                </li>
                <li>
                    <a href="admin_main_archive.php" style="padding-right: 40.5px; padding-left: 8px;">
                        <i class="fa-solid fa-users"></i>Registered Staff
                    </a>
                </li>
                <li>
                    <a href="admin_main_archive.php" style="padding-right: 56px;">
                        <i class="fa-solid fa-file-signature"></i> Activity Logs
                    </a>
                </li>
                <li>
                    <a href="admin_main_archive.php" style="padding-right: 76px;">
                        <i class="fa-solid fa-clock-rotate-left"></i> User Logs
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
    <main>
        <div class="container">
            <h2>Chief Office Records</h2>
            <div class="box">
                <h3>Edit Record For Memorandum</h3>
                <div class="contents">
                    <form action="" method="post">
                        <div class="mv-details">
                            <div class="details">
                                <label for="">Subject :</label>
                                <input type="text" placeholder="">
                                <label for="">Date :</label>
                                <input type="date" placeholder="">
                                <label for="">Time :</label>
                                <input type="text" placeholder="">
                                <label for="">Venue :</label>
                                <input type="text" placeholder="">
                            </div>
                            <div class="details">
                                <label for="">Drawer Level :</label>
                                <select name="" id="">
                                    <option value="" hidden>Drawer A-Z</option>
                                    <option value="">A</option>
                                    <option value="">B</option>
                                    <option value="">C</option>
                                    <option value="">D</option>
                                    <option value="">E</option>
                                </select>
                                <label for="">Drawer Number :</label>
                                <select name="" id="">
                                    <option value="" hidden>Drawer 1-10</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="camera">
                            <div class="video-cam">
                                <video id="video" autoplay></video>
                            </div>
                            <div class="image">
                                <img id="captured-image" src="" alt="Captured Image">
                            </div>
                        </div>
                        <div class="btn">
                            <button class="cancel-btn" name="cancel">Cancel</button>
                            <button class="add-btn">Submit</button>
                        </div>
                    </form>
                    <div class="camera-btn">
                        <button id="capture-btn">Capture</button>
                        <button id="download-btn">Download</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        const video = document.getElementById('video');
        const captureButton = document.getElementById('capture-btn');
        const capturedImage = document.getElementById('captured-image');
        const downloadButton = document.getElementById('download-btn');
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');
        const constraints = {
            video: true
        };

        // Access the user's camera and stream the video to the video element
        navigator.mediaDevices.getUserMedia(constraints)
            .then((stream) => {
                video.srcObject = stream;
            })
            .catch((error) => {
                console.error('Error accessing the camera: ', error);
            });

        // Function to capture the video frame and save it as an image
        function capture() {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            // Convert canvas to image data
            const dataURI = canvas.toDataURL('image/png');
            // Display the captured image
            capturedImage.src = dataURI;
            capturedImage.style.display = 'block';
            // Display the download button
            downloadButton.style.display = 'block';
        }

        // Event listener for the capture button
        captureButton.addEventListener('click', capture);

        // Event listener for the download button
        downloadButton.addEventListener('click', () => {
            const link = document.createElement('a');
            link.href = capturedImage.src;
            link.download = 'captured_image.png';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    </script>
    <footer>
        <p>Copyright &#169 2024 LTO Calamba District Office.</p>
    </footer>
</body>

</html>