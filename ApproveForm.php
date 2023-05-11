<!DOCTYPE html>
<html>

<head>
    <title>Faculty Details</title>
    <style>
        body {
            display: flex;
            flex-wrap: wrap;
        }

        .form-container {
            flex: 0 0 350px;
            margin: 10px;
            padding: 10px;
            border: 1px solid black;
            box-sizing: border-box;
        }

        fieldset {
            border: none;
            padding: 0;
            margin: 0;
        }

        label {
            display: inline-block;
            width: 110px; 
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            display: inline-block;
            width: calc(100% - 110px);
            margin-bottom: 10px;
            padding: 5px;
            font-size: 16px;
            border: 1px solid black;
        }

        input:disabled {
            background-color: #f7f7f7;
        }

        button {
            display: inline-block;
            padding: 10px;
            margin: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: blue;
            color: white;
        }

        .btn-secondary {
            background-color: gray;
            color: white;
        }
    </style>

</head>

<body>

    <div class="container" style="margin-left: auto">

        <?php
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "demo";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Define the form structure
        /*
        $form_fields = [
            'name' => ['label' => 'Name'],
            'email' => ['label' => 'Email'],
            'phone' => ['label' => 'Phone'],
            'message' => ['label' => 'Message'],
        ];
        */

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
        $id = "1234567";
        $sql = "SELECT * FROM faculty WHERE hod=false";
        $result = mysqli_query($conn, $sql);
        //$row = mysqli_fetch_assoc($result);

        // Display the form data in non-editable format
        while (true) {
            $row = mysqli_fetch_assoc($result);
            if ($row != null) {
                echo '<div class="form-container">';
                echo '<fieldset>';
                $i=1;
                foreach ($form_fields as $field_name => $field_data) {
                    $value = $row[$field_name];
                    echo '<label>' . $field_data['label'] . '</label>';
                    echo '<span>' . $value . '</span>';
                    if($i%2==0) echo '<br>';
                    $i++;
                    //echo'<label></label><span></span>';
                }
                echo '<br><button class="btn-primary">Approve</button>';
                echo '<button class="btn-secoondary">Decline</button>';
                echo '</fieldset>';
                echo '</div>';
            } else break;
        }
        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>

</body>

</html>