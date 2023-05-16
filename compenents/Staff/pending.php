<!DOCTYPE html>
<html>

<head>
    <title>Faculty Details</title>
    <link rel="stylesheet" href="pending.css">
    
</head>

<body>

    <div class="container" style="margin-left: auto">
    

        <?php
        // Connect to the database
        //echo' container begins';
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "demo";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $form_fields = [
            'Name' => ['type' => 'text', 'label' => 'Name', 'required' => true],      // the coulumn name in the table in the single quotes firstly
            'id' => ['type' => 'varchar', 'label' => 'ID', 'required' => true],
            'LType' => ['type' => 'text', 'label' => 'Leave-Type', 'required' => true],
            'days' => ['type' => 'int', 'label' => 'No of Days', 'required' => true],
            'start' => ['type' => 'date', 'label' => 'From', 'required' => true],
            'end' => ['type' => 'date', 'label' => 'To', 'required' => true],
            'reason' => ['type' => 'text', 'label' => 'Reason', 'required' => false],

        ];


        // Fetch the data from the database
        $id = "22pca115";
        $sql = "SELECT Name,id,LType,days,start,end,reason FROM faculty WHERE id='" . $id . "' AND (hod=FALSE OR aqict=FALSE OR principal=FALSE OR hod=3  or 
                 aqict=3 OR  principal=3)";

        $sql2 = "Select hod,aqict,principal from faculty where id ='" . $id . "' AND (hod=FALSE OR aqict=FALSE OR principal=FALSE OR hod=3  or 
        aqict=3 OR  principal=3)";


        $result = mysqli_query($conn, $sql);

        $result2 = mysqli_query($conn, $sql2);
        //$row = mysqli_fetch_assoc($result);

        // Display the form data in non-editable format
        while (true) {
            $row = mysqli_fetch_assoc($result);

            $row2 = mysqli_fetch_assoc($result2);
            if ($row != null) {
                //echo'playing';
                echo '<div class="form-container">';

                //to give different border color for od,cl
                if (strcasecmp($row['LType'], 'OD') == 0) {

                    echo ' <div class="odForm-head">';
                    echo '<h2 class="form-heading">' . strtoupper($row['LType']) . '</h2>';
                    //for dif color  style="color:#006400"
                } elseif (strcasecmp($row['LType'], 'CL') == 0) {
                    echo ' <div class="clForm-head">';
                    echo '<h2 class="form-heading" >' . strtoupper($row['LType']) . '</h2>';
                    //for dif color  style="color:#800080"
                }
                echo '</div>';
                //heading to the form -(type of leave)
                //echo '<h2 class="form-heading">'.strtoupper($row['LType']).'</h2>';

                echo '<hr>';

                //echo '<div class="form-body">';
                echo '<div class="box-container">';
                echo '<fieldset>';
                foreach ($form_fields as $field_name => $field_data) {
                    $value = $row[$field_name];
                    echo '<label>' . $field_data['label'] . '</label>';
                    echo '<span class="sp">' . $value . '<br></span>';
                }

                echo '</fieldset>';

                echo '</div>';
                $state = array(

                    0 => $row2['hod'],

                    1 => $row2['aqict'],

                    2 => $row2['principal'],

                );

                $steps = array(
                    array('status' => '', 'symbol' => ''),
                    array('status' => '', 'symbol' => ''),
                    array('status' => '', 'symbol' => ''),
                );

                $official = array('HOD','AQICT','PRINCIPAL');

                //echo 'hod='.$row2['hod'].' and '.$state[0]; 

                for ($i = 0; $i < count($state); $i++) {
                    //echo 'hod='.$row2['hod'].' and '.$state[$i]; 

                    //echo $state[$i];
                    if ($state[$i] == 1) {
                        //echo 'playing';
                        $steps[$i][0] = 'Approved';
                        $steps[$i][1] = '✔';
                    } elseif ($state[$i] == 0) {
                        $steps[$i][0] = 'Declined';
                        $steps[$i][1] = '❌';
                    } else {
                        //echo 'playing';
                        $steps[$i][0] = 'Pending';
                        $steps[$i][1] = '!';
                    }
                }

                //$steps[0][0]='';

                echo '<div class="containerB">
                        <ul class= "progressbar">';
                for ($i=0;$i<count($steps);$i++) {
                    //echo 'i='.$i.' style[0]='.$steps[$i][0].' style[1]='.$steps[$i][1].'\n';
                    
                    echo '<li class="'.$steps[$i][0].'">'.$official[$i].'<span class="step-symbol">'.$steps[$i][0].'</span></li>';
                   
                }

                echo '</ul>
                </div>
               ';

                echo '<style>';
                for ($i = 0; $i < count($steps); $i++) {
                    echo '.progressbar li.' . $steps[$i][0] . '::before {';
                    echo 'content: "' . $steps[$i][1] . '";'; // Set the content dynamically
                    echo '}';
                }
                echo '</style>';
                //echo 'form ends';
                echo '</div>';     // for form container
            } else break;
        }
        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>

</body>

</html>