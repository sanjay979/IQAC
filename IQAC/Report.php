<?php
require_once('../helpers/tcpdf-main/tcpdf.php');



// Create a new PDF instance
$pdf = new TCPDF();
$pdf->SetAutoPageBreak(true, 10);

// Add a page
$pdf->AddPage();

//including the database connection
include("..//database/Databasedemo.php");
// Set font
$pdf->SetFont('helvetica', 'B', 16);

// Add a title
$pdf->Cell(0, 10, 'Staff Names Report', 0, 1, 'C');


// Retrieve staff names from the database
$sql = "SELECT name FROM faculty1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through the results and add names to the PDF
    while ($row = $result->fetch_assoc()) {
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, $row['name'], 0, 1, 'L');
    }
} else {
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'No staff names found', 0, 1, 'L');
}

// Close the database connection
$conn->close();

// Output the PDF as a file
$pdf->Output('staff_names_report.pdf', 'D');
