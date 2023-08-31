                <?php
                include "../database/Databasedemo.php";
                // Retrieve all rows from the faculty1 table where hod=1 and aqict=3
                $query = "SELECT * FROM faculty1 WHERE shift = $shift AND hod = 1 AND aqict = 3";
                $result = mysqli_query($conn, $query);

                // Generate the HTML table
                $html = '<div class="table-responsive">';
                $html .= '<table class="table table-striped table-bordered">';
                $html .= '<thead class="thead-dark">';
                $html .= '<tr>';
                $html .= '<th>S.N</th>';
                $html .= '<th>Staff Name</th>';
                $html .= '<th>Staff ID</th>';
                $html .= '<th>Leave Type</th>';
                //$html .= '<th>Shift</th>';
                $html .= '<th>Date</th>';
                //$html .= '<th>End Date</th>';
                //$html .= '<th>No of Days</th>';
                $html .= '<th>Reason</th>';
                $html .= '<th>Days Left</th>';

                $html .= '<th>Documents</th>';
                $html .= '<th>Comments</th>';

                $html .= '<th>Approval</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';

                $serialNumber = 1; // Initialize the serial number

                while ($row = mysqli_fetch_assoc($result)) {
                    $html .= '<tr id="row_' . $row['application_id'] . '">';
                    $html .= '<td class="serial_no">' . $serialNumber . '</td>'; // Add the serial number column
                    $html .= '<td>' . $row['name'] . '</td>';
                    $html .= '<td>' . $row['id'] . '</td>';
                    $html .= '<td>' . $row['LType'] . '</td>';
                    //$html .= '<td>' . $row['shift'] . '</td>';
                    $html .= '<td>' . $row['start'] . ' to ' . $row['end'] . '</td>';;
                    //$html .= '<td>' . $row['end'] . '</td>';
                    //$html .= '<td>' . $row['ndays'] . '</td>';

                    $html .= '<td>' . $row['reason'] . '</td>';

                    $lType=$row['LType'];

                    $countQuery='SELECT COUNT(*) AS LCount from faculty1 where id="'.$row['id'].'" AND LType="'.$row['LType'].'" AND principal=1';
                    $countResult=mysqli_query($conn,$countQuery);
                    if($countResult){
                        $count= mysqli_fetch_assoc($countResult)['LCount'];
                    }
                    else{
                        $count=0;
                    }

                    $limitQuery='SELECT '.$row['LType'].' FROM l_details';
                    $limitResult= mysqli_query($conn,$limitQuery);

                    $limit= mysqli_fetch_assoc($limitResult)[$lType];

                    $daysLeft=$limit-$count;

                    $html .='<td>'.$daysLeft.'</td>';


                    $html .= '<td>';

                    if (!empty($row['file'])) {
                        $html .= '<a href="' . $row['file'] . '" target="_blank">View File</a>';
                    } else {
                        $html .= 'No File Available';
                    }

                    $html .= '</td>';

                    $html .= '<td>';
                    $html .= '<textarea name="comments[' . $row['application_id'] . ']" rows="2" class="custom-textarea" placeholder="Enter comments"></textarea>';
                    $html .= '</td>';

                    $html .= '<td class="button-cell">';
                    $html .= '<form method="post">';

                    $html .= '<div class="button-container">';
                    $html .= '    <button class="approve-btn" type="button" onclick="updateApprovalStatus(' . $row['application_id'] . ', 1)">Approve</button>';
                    $html .= '</div>';
                    $html .= '<div class="button-container">';
                    $html .= '  <button class="reject-btn" type="button" onclick="updateApprovalStatus(' . $row['application_id'] . ', 0)">Reject</button>';
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
                    function updateApprovalStatus(leaveID, status) {

                        var comments = $("textarea[name='comments[" + leaveID + "]']").val(); // Get the comments for the specific row

                        $.ajax({
                            type: 'POST',
                            url: 'update_approval.php', // PHP file to handle the update
                            data: {
                                leave_id: leaveID,
                                status: status,
                                comments: comments
                            },
                            success: function(response) {
                                // Handle the response
                                if (response === 'success') {
                                    // Remove the row from the table
                                    $('#row_' + leaveID).remove();

                                    // Update the serial numbers of remaining rows
                                    updateSerialNumbers();
                                } else {
                                    console.log(response); // Log the error message for debugging
                                }
                            }
                        });
                    }

                    function updateSerialNumbers() {
                        //alert("updateSerialNumbers() called");
                        var rows = $('.table tbody tr'); // Get all table rows

                        rows.each(function(index) {
                            $(this).find('.serial_no').text(index + 1); // Update the serial number column
                        });
                    }
                </script>