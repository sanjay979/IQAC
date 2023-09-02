<?php
require_once('../helpers/tcpdf-main/tcpdf.php');

// Create a new PDF instance with landscape orientation
$pdf = new TCPDF('L', 'mm', 'A4');

$pdf->SetAutoPageBreak(true, 10);

// Add a page
$pdf->AddPage();

// Including the database connection
include("../database/Databasedemo.php");

// Set font
$pdf->SetFont('helvetica', 'B', 16);

// Add a title
$pdf->Cell(0, 10, 'Leave Report', 0, 1, 'C');

// Define table columns
$header = array('Name', 'ID', 'Department', 'CL', 'OD', 'ML', 'Total Days');

// Initialize an empty array to store the retrieved data
$data = array();

// Define an SQL query to fetch staff details from faculty_details table
$sql = "SELECT faculty_details.name AS name, faculty_details.s_id AS id, faculty_details.department AS department,
SUM(CASE WHEN faculty1.LType = 'CL' THEN faculty1.ndays ELSE 0 END) AS cl,
SUM(CASE WHEN faculty1.LType = 'OD' THEN faculty1.ndays ELSE 0 END) AS od,
SUM(CASE WHEN faculty1.LType = 'ML' THEN faculty1.ndays ELSE 0 END) AS ml
FROM faculty_details
LEFT JOIN faculty1 ON faculty_details.s_id = faculty1.id
WHERE faculty_details.department <> 'All' AND faculty_details.name <> 'Assistant HOD'
GROUP BY faculty_details.s_id;
";

$result = $conn->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    // Loop through the rows and add them to the data array
    while ($row = $result->fetch_assoc()) {
        $totalDays = $row['cl'] + $row['od'] + $row['ml'];
        $data[] = array(
            'Name' => $row['name'],
            'ID' => $row['id'],
            'Department' => $row['department'],
            'CL' => $row['cl'],
            'OD' => $row['od'],
            'ML' => $row['ml'],
            'Total Days' => $totalDays
        );
    }
}

// Close the database connection
$conn->close();

// Create the table
$pdf->SetFont('courier', '', 12);
$pdf->SetFillColor(200, 200, 200); // Set table header background color

foreach ($header as $col) {
    $pdf->Cell(40, 10, $col, 1, 0, 'C', 1);
}

$pdf->Ln();

foreach ($data as $row) {
    foreach ($row as $col) {
        $pdf->Cell(40, 10, $col, 1, 0, 'C');
    }
    $pdf->Ln();
}

// Output the PDF as a file
$pdf->Output('staff_info_report.pdf', 'D');
