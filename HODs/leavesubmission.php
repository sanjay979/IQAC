<?php
if (isset($_POST['submit'])) {
    include '../database/Databasedemo.php';
    $name = $_POST['name'];
    $id = $_POST['id'];
    $department = $_POST['department'];
    $shift=$_POST['shift'];
    $leaveType = $_POST['Ltype'];
    $startDate = $_POST['start'];
    $endDate = $_POST['end'];
    $numDays = $_POST['days'];
    $reason = $_POST['reason'];
    $hod=1;

    $sql="select * from l_details";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $year=$row['Academic_year'];
    $target_directory = "../assets" . "/assets";
    $file_name = $_FILES['file']['name'];
    $file_path = $target_directory . $file_name;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
        // Insert form data into the database
        $sql = "INSERT INTO faculty1 (Name, id, department, LType,shift, start, end, ndays,hod, reason, file,a_year)
                        VALUES ('$name', '$id', '$department', '$leaveType','$shift', '$startDate', '$endDate', '$numDays','$hod', '$reason', '$file_path','$year')";

        if ($conn->query($sql) === TRUE) {
            $successMessage = "Leave application submitted successfully.";
            header('Location:pending.php');
        } else {
            $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $errorMessage = "Error uploading file.";
    }

    $conn->close();
}
