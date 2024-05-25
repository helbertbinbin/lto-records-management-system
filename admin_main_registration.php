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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTO Records Management</title>
    <script src="js/icon.js" crossorigin="anonymous"></script>
    <script src="js/registration.js" defer></script>
    <link rel="stylesheet" href="css/admin_main_header.css">
    <link rel="stylesheet" href="css/admin_main_navigation.CSS">
    <link rel="stylesheet" href="css/admin_main_registration.CsS">
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
                        <a class="active" href="admin_main_registration.php"><i class="fa-solid fa-plus"></i> New
                            Account</a>
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
                    <button class="dropdown-btn">
                        <i class="fa-solid fa-folder"></i> Chief Records <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <a href="admin_chief_memorandum.php"><i class="fa-solid fa-file"></i> Memorandum</a>
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
            <h2>Create Staff Account</h2>
            <div class="box">
                <form action="db_registration.php" method="POST" class="form">
                    <h3>Registration Form</h3>
                    <!-- Progress bar -->
                    <div class="progressbar">
                        <div class="progress" id="progress"></div>
                        <div class="progress-step progress-step-active" data-title="Personal Information"></div>
                        <div class="progress-step" data-title="Contact Information"></div>
                        <div class="progress-step" data-title="Account Security"></div>
                    </div>

                    <!-- Steps -->
                    <div class="form-step form-step-active">
                        <h4>Personal Information</h4>
                        <div class="input-group">
                            <div class="group" style="margin-right: 5px;">
                                <label for="phone">First Name<span>*</span></label>
                                <input type="text" name="first_name" id="input1" placeholder="Enter your first name" oninput="combineInputs()">
                            </div>
                            <div class="group" style="margin-right: 5px;">
                                <label for="phone">Last Name<span>*</span></label>
                                <input type="text" name="last_name" id="input2" placeholder="Enter your last name" oninput="combineInputs()">
                            </div>
                            <div class="group">
                                <label for="phone">Middle Name</label>
                                <input type="text" name="middle_name" id="input3" placeholder="Enter your middle name" oninput="combineInputs()">
                            </div>
                            <input type="text" name="name" id="combinedInput" style="display: none;" >
                            <input type="text" name="role" id="" value="staff" hidden>
                            <script>
                                function combineInputs() {
                                    const input1 = document.getElementById('input1').value;
                                    const input2 = document.getElementById('input2').value;
                                    const input3 = document.getElementById('input3').value;

                                    document.getElementById('combinedInput').value = input1 + ' ' + input3 + ' ' + input2;
                                }
                            </script>
                        </div>
                        <div class="input-group">
                            <div class="group" style="margin-right: 5px;">
                                <label for="phone">Birthdate<span>*</span></label>
                                <input type="date" name="birthdate" id="" class="date">
                            </div>
                            <div class="group" style="margin-right: 5px;">
                                <label for="phone">Age<span>*</span></label>
                                <input type="number" name="age" id="" min="18" max="60" placeholder="Enter 2 digits only">
                            </div>
                            <div class="group">
                                <label for="phone">Gender<span>*</span></label>
                                <select name="gender" id="">
                                    <option value="" hidden>Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="group" style="margin-right: 5px;">
                                <label for="email">Address<span>*</span></label>
                                <input type="text" name="address" id=""
                                    placeholder="Barangay/Village/Street/House Number/City/Province">
                            </div>
                        </div>
                    </div>
                    <div class="form-step">
                        <h4>Contact Information</h4>
                        <div class="input-group">
                            <div class="group" style="margin-right: 5px;">
                                <label for="">Email Address<span>*</span></label>
                                <input type="email" name="email" id="" placeholder="Enter your email address (e.g. @gmail)">
                            </div>
                            <div class="group">
                                <label for="">Confirm Email Address<span>*</span></label>
                                <input type="email" name="" id="" placeholder="Confirm your email address">
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="group">
                                <button>Send OTP</button>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="group" style="margin-right: 5px;">
                                <label for="">Verification Code<span>*</span></label>
                                <input type="email" name="" id="" placeholder="Enter OTP code">
                            </div>
                            <div class="group">
                                <label for="email">Modile Number</label>
                                <input type="text" name="mobile_number" id="email" placeholder="Enter 09XX XXX XXXX">
                            </div>
                        </div>
                    </div>
                    <div class="form-step">
                        <h4>Account Security</h4>
                        <div class="input-group">
                            <div class="group">
                                <label for="passord">Password<span>*</span></label>
                                <input type="password" name="password" id="password" placeholder="Enter your password">
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="group">
                                <label for="passord">Confirm Password<span>*</span></label>
                                <input type="password" name="" id="" placeholder="Confirm your password">
                            </div>
                        </div>
                    </div>
                    <div class="btns-group">
                        <button type="button" class="btn-cancel">Cancel</button>
                        <div class="btns">
                            <button type="button" class="btn btn-prev"><i class="fa-solid fa-angle-left"></i>Previous</button>
                            <button type="button" class="btn btn-next">Next <i class="fa-solid fa-angle-right"></i></button>
                            <button type="submit" class="btn-submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <p>Copyright &#169 2024 LTO Calamba District Office.</p>
    </footer>
</body>

</html>