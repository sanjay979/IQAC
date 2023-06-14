<?php
session_start();
if ($_SESSION['s_id']) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Hod Approve</title>
        <link rel="stylesheet" href="ApproveForm.css">
        <link rel="stylesheet" type="text/css" href="sidebar.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <?php include 'sidebar.php' ?>

        <div class="main-content">
            <?php include 'header.php' ?>
            <main>

<?php
$con = mysqli_connect("localhost", "root", "", "demo");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Retrieve all rows from the faculty1 table where hod=1 and aqict=3
$query = "SELECT * FROM faculty1 WHERE hod = 1 AND aqict = 3";
$result = mysqli_query($con, $query);

// Generate the HTML table
$html = '<div class="table-responsive">';
$html .= '<table class="table table-striped table-bordered">';
$html .= '<thead class="thead-dark">';
$html .= '<tr>';
$html .= '<th>S.N</th>';
$html .= '<th>Staff Name</th>';
$html .= '<th>Staff ID</th>';
$html .= '<th>Leave Type</th>';
$html .= '<th>Start Date</th>';
$html .= '<th>End Date</th>';
$html .= '<th>No of Days</th>';
$html .= '<th>Applied On</th>';
$html .= '<th>Reason</th>';
$html .= '<th>Approval</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

$serialNumber = 1; // Initialize the serial number

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>';
    $html .= '<td>' . $serialNumber . '</td>'; // Add the serial number column
    $html .= '<td>' . $row['name'] . '</td>';
    $html .= '<td>' . $row['id'] . '</td>';
    $html .= '<td>' . $row['LType'] . '</td>';
    $html .= '<td>' . $row['start'] . '</td>';
    $html .= '<td>' . $row['end'] . '</td>';
    $html .= '<td>' . $row['ndays'] . '</td>';
    $html .= '<td>' . $row['RegDate'] . '</td>';
    $html .= '<td>' . $row['reason'] . '</td>';
    $html .= '<td>';
    $html .= '<form method="post">';
    $html .= '<input type="hidden" name="leave_id" value="' . $row['application_id'] . '">';

    // Add CSS classes to the buttons for styling
    $html .= '<button class="approve-btn" type="button" onclick="updateApprovalStatus(' . $row['application_id'] . ', 1)">Approve</button>';
    $html .= '<button class="reject-btn" type="button" onclick="updateApprovalStatus(' . $row['application_id'] . ', 0)">Reject</button>';

    $html .= '</form>';
    $html .= '</td>';
    $html .= '</tr>';

    $serialNumber++; // Increment the serial number
}

$html .= '</tbody>';
$html .= '</table>';
$html .= '</div>';

// Output the generated HTML table
echo $html;
?>

<script>
    function updateApprovalStatus(leaveID, status) {
        $.ajax({
            type: 'POST',
            url: 'update_approval.php', // PHP file to handle the update
            data: {
                leave_id: leaveID,
                status: status
            },
            success: function(response) {
                // Reload the table or update the rows dynamically
                // You can handle the response here and update the table accordingly
                location.reload(); // Reload the page to reflect the changes
            }
        });
    }
</script>

            </main>
        </div>

    </body>

    </html>
<?php
} else {
    header("location:../Login/home.php");
}
?>
