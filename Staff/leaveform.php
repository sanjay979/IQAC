<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../compenents/sidebar/sidebar.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

   <title>Responsive Regisration Form </title>
   <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');


*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    min-height: 100vh;
    display: flex;
    margin-top: 90px;
   
    align-items: center;
    justify-content: center;
    background: #f1f5f9;
}
.container{
    position: relative;
    max-width: 900px;
    width: calc(100% - 350px);
    border-radius: 6px;
    padding: 30px;
    margin: 0 15px;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.container header{
    position: static;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}
.container header::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    height: 3px;
    width: 27px;
    border-radius: 8px;
    background-color: #4070f4;
}
.container form{
    position: relative;
    margin-top: 16px;
    min-height: 600px;
    background-color: #fff;
    overflow:auto;
}
.container form .form{
    position: absolute;
    background-color: #fff;
    transition: 0.3s ease;
}
form.secActive .form.first{
    opacity: 0;
    pointer-events: none;
    transform: translateX(-100%);
}
.container form .title{
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    font-weight: 500;
    margin: 6px 0;
    color: #333;
}
.container form .fields{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
form .fields .input-field{
    display: flex;
    width: calc(100% / 2 - 15px);
    flex-direction: column;
    margin: 4px 0;
}
.input-field label{
    font-size: 12px;
    font-weight: 500;
    color: #2e2e2e;
}
.input-field input, select{
    outline: none;
    font-size: 14px;
    font-weight: 400;
    color: #333;
    border-radius: 5px;
    border: 1px solid #aaa;
    padding: 0 15px;
    height: 42px;
    margin: 8px 0;
}
.input-field input :focus,
.input-field select:focus{
    box-shadow: 0 3px 6px rgba(0,0,0,0.13);
}
.input-field select,
.input-field input[type="date"]{
    color: #707070;
}
.input-field input[type="date"]:valid{
    color: #333;
}
.container form button{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    margin: 25px 0;
    background-color: #4070f4;
    transition: all 0.3s linear;
    cursor: pointer;
}
.container form {
    font-size: 14px;
    font-weight: 400;
}
form button:hover{
    background-color: #265df2;
}
form button i{
    margin: 0 6px;
}
.success{
    color: green;
}


 @media (max-width: 750px) {
    .container form{
        overflow-y: scroll;
    }
    .container form::-webkit-scrollbar{
       display: none;
    }
    form .fields .input-field{
        width: calc(100% / 2 - 15px);
    }
}

@media (max-width: 550px) {
    form .fields .input-field{
        width: 100%;
    }
} 

</style>
</head>

<body>
<?php include "../compenents/sidebar/Sidebar.php";?>
<?php include "../compenents/sidebar/header.php";?>
<div></div>
    <div class="main-content container">
    
        <header>Leave Form</header>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Leave Details</span>

                    <div class="fields">

                        <div class="input-field">
                            <label>Staff Name</label>
                            <input type="text" name="name" placeholder="Enter your name" required>
                        </div>

                        <div class="input-field">
                            <label>Staff Id</label>
                            <input type="text" name="id" placeholder="Enter your Id" required>
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
                            <label>Leave type</label>
                            <select name="Ltype" required>
                                <option disabled selected>--Select--</option>
                                <option>OD</option>
                                <option>CL</option>
                                <option>ML</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>From date</label>
                            <input type="date" name="start" placeholder="from" required>
                        </div>

                        <div class="input-field">
                            <label>To date</label>
                            <input type="date" name="end"  placeholder="to" required>
                        </div>
                        
                        <div class="input-field">
                            <label>No of Days</label>
                            <input type="number" name="days" placeholder="Enter number of days" required>
                        </div>
                        <div class="input-field">
                            <label>Reason</label>
                            <input type="text" name="reason" placeholder="Enter your reason" required>
                        </div>

                          <div class="input-field">
                            <label>Upload</label>
                            <input type="file" name="file" placeholder="Enter your reason"   >
                        </div>
                    </div>
                </div>

                                   
                    <button type="submit" name="submit" class="submitBtn">
                        <span class="btnText">Submit</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                
            </div>

            
        </form>
        <h1 class="success">
        <?php
    if (isset($_POST['submit'])) {
        include("..//database/Databasedemo.php");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name = $_POST['name'];
    $id = $_POST['id'];
    $department = $_POST['department'];
    $leaveType = $_POST['Ltype'];
    $startDate = $_POST['start'];
    $endDate = $_POST['end'];
    $numDays = $_POST['days'];
    $reason = $_POST['reason'];
    $hod = 3;
    $aqict = 3;
    $principal = 3;

        $target_directory = __DIR__ . "\uploads";
        $file_name = $_FILES['file']['name'];
        $file_path = $target_directory . $file_name;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
            // Insert form data into the database
            $sql = "INSERT INTO faculty1 (Name, id,department, LType, start, end, ndays, reason, file)
                    VALUES ('$name', '$id','$department', '$leaveType', '$startDate', '$endDate', '$numDays','$reason', '$file_path')";

            if ($conn->query($sql) === TRUE) {
                echo "Leave application submitted successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading file.";
        }

        
        $conn->close();
    }
    ?>
        </h1>
       
      
    </div>

    

</body>
</html>