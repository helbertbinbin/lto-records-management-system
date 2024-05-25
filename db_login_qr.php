<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$dbname = "lto_system";

$conn = mysqli_connect($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $qrcode = $_POST["qrcode"];

    $sql = "SELECT * FROM users WHERE qrcode = '$qrcode'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["user_name"] = $row["name"];
        header("Location: admin_main_home.php");
    } else {
        header("Location: main_login.php?error=Login failed. QR code is not yet registered");
    }
}

$conn->close();
?>