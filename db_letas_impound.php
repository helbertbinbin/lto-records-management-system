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
    $name_of_owner = $_POST['name_of_owner'];
    $plate_number = $_POST['plate_number'];
    $temporary_operator_permit_number = $_POST['temporary_operator_permit_number'];
    $apprehension_date = $_POST['apprehension_date'];
    $violation_in_code = $_POST['violation_in_code'];
    $type_of_violation = $_POST['type_of_violation'];
    $name_of_apprehension_officer = $_POST['name_of_apprehension_officer'];
    $penalty_impounding_fee = $_POST['penalty_impounding_fee'];
    $amount = $_POST['amount'];
    $encumbered = $_POST['encumbered'];
    $serviceable_unserviceable = $_POST['serviceable_unserviceable'];
    $remarks = $_POST['remarks'];
    $email = $_POST['email'];
    $type_of_body = $_POST['type_of_body'];
    $make = $_POST['make'];
    $series = $_POST['series'];
    $year_model = $_POST['year_model'];
    $color = $_POST['color'];
    $engine_number = $_POST['engine_number'];
    $chassis_number = $_POST['chassis_number'];

    $stmt = $conn->prepare("INSERT INTO letas_impound (drawer_level, drawer_number, name_of_owner, plate_number, temporary_operator_permit_number, apprehension_date, 
                                                        violation_in_code, type_of_violation, name_of_apprehension_officer, penalty_impounding_fee, amount, encumbered, 
                                                        serviceable_unserviceable, remarks, email, type_of_body, make, series, year_model, color, engine_number, chassis_number) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssssssssss", $drawer_level, $drawer_number, $name_of_owner, $plate_number, $temporary_operator_permit_number, $apprehension_date, 
                                                $violation_in_code, $type_of_violation, $name_of_apprehension_officer, $penalty_impounding_fee, $amount, $encumbered, 
                                                $serviceable_unserviceable, $remarks, $email, $type_of_body, $make, $series, $year_model, $color, $engine_number, 
                                                $chassis_number);

    if ($stmt->execute()) {
        header("location: admin_letas_impound.php");
        exit();
    } else {
        echo "Error inserting record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>