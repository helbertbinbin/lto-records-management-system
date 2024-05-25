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
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $mobile_number = $_POST['mobile_number'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $path = 'img/';
    $qrcode = $path . time() . ".png";
    $qrimage = time() . ".png";

    QRcode::png($password, $qrcode, 'H', 4, 4);

    $stmt = $conn->prepare("INSERT INTO users (first_name, middle_name, last_name, birthdate, age, gender, 
                                                address, mobile_number, name, email, password, qrimage, role) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "sssssssssssss",
        $first_name,
        $middle_name,
        $last_name,
        $birthdate ,
        $age,
        $gender,
        $address,
        $mobile_number,
        $name,
        $email,
        $password,
        $qrimage,
        $role
    );

    if ($stmt->execute()) {
        header("location: admin_main_registration.php");
        exit();
    } else {
        echo "Error inserting record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>