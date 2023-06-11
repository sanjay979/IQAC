<?php
$con = mysqli_connect("localhost", "root", "", "demo");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>


<?php
// Include the database connection file
//include("config.php");

// Check if the request parameter is set
if (isset($_POST['request'])) {
    $filter = $_POST['request'];

    // Perform the data filtering based on the selected filter
    $filteredData = filterData($filter);

    // Generate the HTML for the filtered data
    $html = generateHTML($filteredData);

    // Return the HTML as the response
    echo $html;
}

// Function to filter the data based on the selected filter
function filterData($filter)
{
    global $con; // Use the global connection variable

    // Perform the data filtering based on the selected filter
    $query = "";

    // Example: Filtering based on the last 24 hours
    if ($filter === 'hours') {
        $query = "SELECT * FROM faculty1 WHERE DATE(RegDate) >= DATE(NOW()) - INTERVAL 1 DAY";
    }

    // Example: Filtering based on the last 1 week
    if ($filter === 'week') {
        $query = "SELECT * FROM faculty1 WHERE DATE(RegDate) >= DATE(NOW()) - INTERVAL 1 WEEK";
    }

    // Example: Filtering based on the last 1 month
    if ($filter === 'month') {
        $query = "SELECT * FROM faculty1 WHERE DATE(RegDate) >= DATE(NOW()) - INTERVAL 1 MONTH";
    }

    // Execute the query
    $result = mysqli_query($con, $query);

    // Fetch the filtered data into an array
    $filteredData = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $filteredData[] = $row;
    }

    // Return the filtered data
    return $filteredData;
}

// Function to generate HTML for the filtered data
// Function to generate HTML for the filtered data
function generateHTML($filteredData)
{
    // Generate the HTML based on the filtered data
    $html = '';

    if (!empty($filteredData)) {
        $html .= '<div class="table-responsive">';
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
        $html .= '<th>Reason</th>';
        $html .= '<th>Applied On</th>';
        $html .= '<th>Status</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';

        $serialNumber = 1; // Initialize the serial number

        foreach ($filteredData as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $serialNumber . '</td>'; // Add the serial number column
            $html .= '<td>' . $row['name'] . '</td>';
            $html .= '<td>' . $row['id'] . '</td>';
            $html .= '<td>' . $row['LType'] . '</td>';
            $html .= '<td>' . $row['start'] . '</td>';
            $html .= '<td>' . $row['end'] . '</td>';
            $html .= '<td>' . $row['ndays'] . '</td>';
            $html .= '<td>' . $row['reason'] . '</td>';
            $html .= '<td>' . $row['RegDate'] . '</td>';

            $status = '';

            // Assuming the status values are stored in columns hod, aqict, principal
            $hodStatus = $row['hod'];
            $aqictStatus = $row['aqict'];
            $principalStatus = $row['principal'];

            if ($hodStatus == 1 && $aqictStatus == 1 && $principalStatus == 1) {
                $status = 'Approved';
            } elseif ($hodStatus == 0 || $aqictStatus == 0 || $principalStatus == 0) {
                $status = 'Declined';
            } else {
                $status = 'Pending';
            }

            $html .= '<td>' . $status . '</td>';
            $html .= '</tr>';

            $serialNumber++; // Increment the serial number
        }

        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</div>';
    } else {
        $html .= '<div class="alert alert-info" role="alert">Sorry! No records found.</div>';
    }

    return $html;
}

