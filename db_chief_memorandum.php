<?php
session_start();

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
    $subject = $_POST['subject'];
    $venue = $_POST['venue'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $stmt = $conn->prepare("INSERT INTO chief_memorandum (drawer_level, drawer_number, subject, venue, date, time) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $drawer_level, $drawer_number, $subject, $venue, $date, $time);

    if ($stmt->execute()) {
        header("location: admin_chief_memorandum.php");
        exit();
    } else {
        echo "Error inserting record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>