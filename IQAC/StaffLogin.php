<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add staff details</title>
    <link rel="stylesheet" type="text/css" href="StaffLogin.css">
    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
<?php include 'sidebar.php';?>
<div class="main-content">
<?php include 'header.php';?>
<main>
    <h1>Add staff details</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
    <div class="fields">
    <div class="input-field">
                            <label>Staff Name</label>
                            <input type="text" name="name" placeholder="Enter your name" required>
                        </div>
        <div class="input-field">
                            <label>Staff Id</label>
                            <input type="text" name="id" placeholder="Enter Id" required>
                        </div>
        <div class="input-field">
                            <label>Department</label>
                            <select name="department" required>
                                <option disabled selected>Select Department</option>
                                <option>Computer Science</option>
                                <option>Physics</option>
                                <option>Chemistry</option>
                                <option>botany</option>
                            </select>
                        </div>
        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" placeholder="DOB" required>
                        </div>
        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
    </div>
    <button type="submit" name="submit" class="submitBtn">
                        <span class="btnText">Submit</span>
                        <i class="uil uil-navigator"></i>
                    </button>
    </form>
</main>
<?php
    if (isset($_POST['submit'])) {
        include("..//database/Databasedemo.php");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name = $_POST['name'];
    $id = $_POST['id'];
    $department = $_POST['department'];
    $dob = $_POST['dob'];
    $password=$_POST['password'];


      
            // Insert form data into the database
            $sql = "INSERT INTO faculty_details (name, s_id,department,dob)
                    VALUES ('$name', '$id','$department','$dob')";

            if ($conn->query($sql) === TRUE) {
                echo "application submitted successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $login = "INSERT INTO staff_login (s_id,password)
                    VALUES ('$id','$password')";

            if ($conn->query($login) === TRUE) {
                echo "application submitted successfully.";
            } else {
                echo "Error: " . $login . "<br>" . $conn->error;
            }
        

        
        $conn->close();
    }
    ?>
</div>
</body>
</html>