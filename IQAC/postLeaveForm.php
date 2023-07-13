<?php
$con = mysqli_connect("localhost", "root", "", "demo");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Retrieve all rows from the faculty1 table where hod=1 and aqict=3
$query = "SELECT * FROM leave_details WHERE hod = 1 AND iqac = 3";
$result = mysqli_query($con, $query);

// Generate the HTML table
$html = '<div class="table-responsive">';
$html .= '<table class="table table-striped table-bordered">';
$html .= '<thead class="thead-dark">';
$html .= '<tr>';
$html .= '<th>S.N</th>';
$html .= '<th>Staff Name</th>';
$html .= '<th>Staff ID</th>';
//$html .= '<th>Leave Type</th>';
//$html .= '<th>Shift</th>';


$html .= '<th>Description</th>';
$html .= '<th>Documents</th>';
$html .= '<th>Comments</th>';

$html .= '<th>Approval</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

$serialNumber = 1; // Initialize the serial number

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr id="row_preform_' . $row['application_id'] . '">';
    $html .= '<td>' . $serialNumber . '</td>'; // Add the serial number column
    $html .= '<td>' . $row['name'] . '</td>';
    $html .= '<td>' . $row['id'] . '</td>';
    //$html .= '<td>' . $row['LType'] . '</td>';
    //$html .= '<td>' . $row['shift'] . '</td>';


    $html .= '<td>' . $row['assessment'] . '</td>';

    $html .= '<td>';

    if (!empty($row['file'])) {
        $html .= '<a href="' . $row['file'] . '" target="_blank">View File</a>';
    } else {
        $html .= 'No File Available';
    }

    $html .= '</td>';
    $html .= '<td>';
    $html .= '<textarea name="comments[' . $row['application_id'] . ']" placeholder="Enter comments" rows="2" class="custom-textarea"></textarea>';
    $html .= '</td>';

    $html .= '</td>';

    $html .= '<td class="button-cell">';
    $html .= '<form method="post">';

    $html .= '<div class="button-container">';
    $html .= '    <button class="approve-btn" type="button" onclick="updatePostApprovalStatus(' . $row['application_id'] . ', 1)">Approve</button>';
    $html .= '</div>';
    $html .= '<div class="button-container">';
    $html .= '  <button class="reject-btn" type="button" onclick="updatePostApprovalStatus(' . $row['application_id'] . ', 0)">Reject</button>';
    $html .= '</div>';
    //$html .= '</td>';

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
  
    function updatePostApprovalStatus(leaveID, status) {
  var comments = $("textarea[name='comments[" + leaveID + "]']").val();

  $.ajax({
    type: 'POST',
    url: 'update_postapproval.php',
    data: {
      leave_id: leaveID,
      status: status,
      comments: comments
    },
    success: function(response) {
      if (response === 'success') {
        $('#row_preform_' + leaveID).remove();
        $('#row_postform_' + leaveID).remove();
        updateSerialNumbers('preform');
        updateSerialNumbers('postform');
      } else {
        console.log(response);
      }
    }
  });
}

function updateSerialNumbers(tableId) {
  var rows = $('#' + tableId + ' table tbody tr');

  rows.each(function(index) {
    $(this).find('td:first-child').text(index + 1);
  });
}

</script>