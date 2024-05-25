<?php
session_start();

require_once 'phpqrcode/qrlib.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lto_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $drawer_level = $_POST['drawer_level'];
    $drawer_number = $_POST['drawer_number'];
    $date = $_POST['date'];
    $enc = $_POST['enc'];
    $motor_vehicle_file = $_POST['motor_vehicle_file'];
    $plate_number = $_POST['plate_number'];
    $borrower = $_POST['borrower'];
    $purpose = $_POST['purpose'];
    $returned_date = $_POST['returned_date'];
    $status = $_POST['status'];

    $path = 'img/';
    $qrcode = $path . time() . ".png";
    $qrimage = time() . ".png";

    QRcode::png($motor_vehicle_file, $qrcode, 'H', 4, 4);

    $stmt = $conn->prepare("INSERT INTO misc_monitoring (drawer_level, drawer_number, date, enc, motor_vehicle_file, plate_number, 
                                                        borrower, purpose, returned_date, status, qrimage) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "sssssssssss",
        $drawer_level,
        $drawer_number,
        $date,
        $enc,
        $motor_vehicle_file,
        $plate_number,
        $borrower,
        $purpose,
        $returned_date,
        $status,
        $qrimage
    );

    if ($stmt->execute()) {
        header("location: admin_misc_monitoring.php");
        exit();
    } else {
        echo "Error inserting record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>