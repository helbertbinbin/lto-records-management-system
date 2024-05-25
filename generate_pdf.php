<?php
require_once ('tcpdf/tcpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle button clicks for add or details
    if (isset($_POST['add'])) {
        header("Location: admin_misc_monitoring_add.php");
        exit;
    }

    if (isset($_POST['details'])) {
        header("Location: admin_misc_monitoring_edit.php");
        exit;
    }

    // Get form data
    $motor_vehicle_file = $_POST['motor_vehicle_file'];
    $plate_number = $_POST['plate_number'];
    $borrower = $_POST['borrower'];
    $purpose = $_POST['purpose'];
    $status = $_POST['status'];
    $qrimage = $_POST['qrimage'];

    // Create new PDF instance
    $pdf = new TCPDF();

    // Set document information
    $pdf->SetCreator('Your Name');
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('PDF Report');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 10);

    // Add background image to the PDF
    $imageFile = 'img/lto_template.jpg'; // Path to your image file
    $pdf->Image($imageFile, 10, 10, 190, 0, '', '', '', false, 300, '', false, false, 0);

    // Calculate the width of the table
    $tableWidth = 100; // Adjust as needed

    // Calculate the position to center the table horizontally
    $marginLeft = ($pdf->getPageWidth() - $tableWidth) / 2;

    $html = "
            <table>
                <tr>
                    <td>Motor Vehicle File:</td>
                    <td>$motor_vehicle_file</td>
                </tr>
                <tr>
                    <td>Plate Number:</td>
                    <td>$plate_number</td>
                </tr>
                <tr>
                    <td>Borrower:</td>
                    <td>$borrower</td>
                </tr>
                <tr>
                    <td>Purpose:</td>
                    <td>$purpose</td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td>$status</td>
                </tr>
            </table>
            ";

    // Set the position to center the table horizontally
    $pdf->setXY($marginLeft, 80); // Adjust the Y position as needed

    // Write the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // Add QR code image to the PDF
    $qrImagePath = 'img/' . $qrimage; // Path to your QR image file
    if (file_exists($qrImagePath)) {
        $pdf->Image($qrImagePath, 140, 225, 50, 50, '', '', '', false, 300, '', false, false, 0);
    } else {
        // Handle the case where the image does not exist
        $pdf->Write(0, 'QR code image not found', '', 0, 'C', true, 0, false, false, 0);
    }

    // Output PDF
    $pdf->Output('report_' . $motor_vehicle_file . '.pdf', 'D');
}
?>