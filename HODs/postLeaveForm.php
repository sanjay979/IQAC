<?php

//table begins
?>
<div>
  <table class="table postTable">
    <thead>
      <tr>
        <th>S.N</th>
        <th>Staff Name</th>
        <th>Staff Id</th>
        <th>Description</th>
        <th>Documents</th>
        <th>Comments</th>
        <th>Approval</th>
      </tr>
    </thead>
    <tbody>
      <?php

      //to retrieve all rows from the leave_details table which are unapproved

      $post_query = "SELECT * FROM leave_details where department = '$dept' AND shift = $shift AND hod=3";
      $post_result = mysqli_query($conn, $post_query);

      $sN = 1; // Initialize the serial number
      $post_html = "";
      //echo $sN;
      while ($post_row = mysqli_fetch_assoc($post_result)) {
        $post_html .= '<tr id="row_post_' . $post_row['application_id'] . '">';
        $post_html .= '<td class="s_no">' . $sN . '</td>'; // Add the serial number column
        $post_html .= '<td>' . $post_row['name'] . '</td>';
        $post_html .= '<td>' . $post_row['id'] . '</td>';
        //$post_html .= '<td>' . $post_row['LType'] . '</td>';
        //$post_html .= '<td>' . $post_row['start'] . ' to ' . $post_row['end'] . '</td>';
        $query_Reason="Select reason from faculty1 where application_id=".$post_row['application_id'];
        $reason=mysqli_query($conn, $query_Reason);
        $reason_row=mysqli_fetch_assoc($reason);

        $post_html .= '<td>' . $reason_row['reason']. '</td>';
        
        $post_html .= '<td>';
        if (!empty($post_row['file'])) {
          $post_html .= '<a href="' . $post_row['file'] . '" target="_post_blank">View File</a>';
        } else {
          $post_html .= 'No File';
        }
        $post_html .= '</td>';

        $post_html .= '<td>';
        $post_html .= '<textarea name="post_comments[' . $post_row['application_id'] . ']" rows="2" class="custom-textarea" placeholder="Enter comments"></textarea>';
        $post_html .= '</td>';

        //button cell for the form buttons button-cell
        $post_html .= '<td class="button-cell">';
        //form starts
        $post_html .= '<form method="post">';

        $post_html .= '<div class="button-container">';
        $post_html .= '    <button class="approve-btn" type="button" onclick="postUpdateApproval(' . $post_row['application_id'] . ',1)">Approve</button>';
        $post_html .= '</div>';
        $post_html .= '<div class="button-container">';
        $post_html .= '  <button class="reject-btn" type="button" onclick="postUpdateApproval(' . $post_row['application_id'] . ',0)">Reject</button>';
        $post_html .= '</div>';
        $post_html .= '</form>';
        $post_html .= '</td>';
        $post_html .= '</tr>';

        $sN++; // Increment the serial number
      }
      echo $post_html;
      ?>
    </tbody>
  </table>
</div>

<script>
  function postUpdateApproval(Id, state) {

    var post_comment = $("textarea[name='post_comments[" + Id + "]']").val();

    $.ajax({
      type: 'POST',
      url: 'update_postapproval.php',
      data: {
        leav_id: Id,
        status: state,
        comments: post_comment
      },
      success: function(response) {
        if (response === 'success') {
          $('#row_post_' + Id).remove();
          updateSNo();
          //updateSerialNumbers();
          //alert("successfully updated"+ response);
        } else {
          //alert(response);
          console.log(response);
        }
      }
    });
  }

  function updateSNo(){
    //alert("sno updation method called");
    var postRows = $('.postTable tbody tr');

    postRows.each(function(index){
      $(this).find('.s_no').text(index+1);
    });
  }

</script>