<?php

    include('dbconn.php');

    
    if(isset($_POST['add'])){
    $empid=$_POST['empcode'];
    $fname=$_POST['firstName'];
    $lname=$_POST['lastName'];   
    $email=$_POST['email']; 
    $password=md5($_POST['password']); 
    $gender=$_POST['gender']; 
    $dob=$_POST['dob']; 
    $department=$_POST['department']; 
    $qualification=$_POST['qualification'];
    $address=$_POST['address']; 
    $city=$_POST['city']; 
    $country=$_POST['country']; 
    $mobileno=$_POST['mobileno']; 
    $status=1;

    $sql="INSERT INTO tblemployees(EmpId,FirstName,LastName,EmailId,Password,Gender,Dob,Department,Qualification,Address,City,Country,Phonenumber,Status) VALUES(:empid,:fname,:lname,:email,:password,:gender,:dob,:department,:qualification,:address,:city,:country,:mobileno,:status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':empid',$empid,PDO::PARAM_STR);
    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
    $query->bindParam(':lname',$lname,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->bindParam(':gender',$gender,PDO::PARAM_STR);
    $query->bindParam(':dob',$dob,PDO::PARAM_STR);
    $query->bindParam(':department',$department,PDO::PARAM_STR);
    $query->bindParam(':qualification',$qualification,PDO::PARAM_STR);
    $query->bindParam(':address',$address,PDO::PARAM_STR);
    $query->bindParam(':city',$city,PDO::PARAM_STR);
    $query->bindParam(':country',$country,PDO::PARAM_STR);
    $query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId){
    $msg="Record has been added Successfully";
    } else {
    $error="ERROR";
    }

    }

 ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Panel - Employee Leave</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>




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
    align-items: center;
    justify-content: center;
    background: #4070f4;
}
.container{
    position: relative;
    max-width: 900px;
    width: 100%;
    border-radius: 6px;
    padding: 30px;
    margin: 0 15px;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.container header{
    position: relative;
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
    min-height: 490px;
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



    
     <script type="text/javascript">
        function valid(){
            if(document.addemp.password.value!= document.addemp.confirmpassword.value) {
            alert("New Password and Confirm Password Field do not match  !!");
            document.addemp.confirmpassword.focus();
            return false;
                } return true;
        }
    </script>

    <script>
        function checkAvailabilityEmpid() {
            $("#loaderIcon").show();
            jQuery.ajax({
            url: "check_availability.php",
            data:'empcode='+$("#empcode").val(),
            type: "POST",
            success:function(data){
            $("#empid-availability").html(data);
            $("#loaderIcon").hide();
            },
            error:function (){}
            });
        }
    </script>

    <script>
        function checkAvailabilityEmailid() {
            $("#loaderIcon").show();
            jQuery.ajax({
            url: "check_availability.php",
            data:'emailid='+$("#email").val(),
            type: "POST",
            success:function(data){
            $("#emailid-availability").html(data);
            $("#loaderIcon").hide();
            },
            error:function (){}
            });
        }
    </script>
</head>

<body>
                            <?php if (isset($error)) { ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                            <strong>Info:</strong> <?php echo htmlentities($error); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <?php } else if (isset($msg)) { ?>
                            <div class="alert alert-success alert-dismissible fade show">
                            <strong>Info:</strong> <?php echo htmlentities($msg); ?>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                           </div>
                           <?php } ?>
    
                           <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    
                           <script src="../assets/js/popper.min.js"></script>
                           <script src="../assets/js/bootstrap.min.js"></script>
                           <script src="../assets/js/owl.carousel.min.js"></script>
                           <script src="../assets/js/metisMenu.min.js"></script>
                           <script src="../assets/js/jquery.slimscroll.min.js"></script>
                           <script src="../assets/js/jquery.slicknav.min.js"></script>
    
                           <script src="../assets/js/plugins.js"></script>
                           <script src="../assets/js/scripts.js"></script>
                            
                            <div class="container">
                            <header>ADD EMPLOYEE</header>
                        
                            <ul class="breadcrumbs pull-left"> 
                                <li><a href="employees.php">Employee</a></li>
                                
                                
                            </ul>
                                <form name="addemp" method="POST">

                                <div class="form first">
                                <div class="details personal">    

                                    
                                        <div class="form-group">
                                        <h4>Please fill up the form in order to add employee records</h4>
                                        </div>
                                    
                                    <div class="fields">

                                        

                                        <div class="input-field">
                                           <label>FIRST NAME</label>
                                           <input class="form-control" placeholder="Enter your fname" name="firstName"  type="text" required id="example-text-input">
                                       </div>
                                    

                                        <div class="input-field">
                                           <label>LAST NAME</label>
                                           <input class="form-control" placeholder="Enter your lname" name="lastName" type="text" autocomplete="off" required id="example-text-input">
                                       </div>

                                       <div class="input-field">
                                           <label>STAFF ID</label>
                                           <input class="form-control" placeholder="Enter your ID" name="empcode" type="text" autocomplete="off" required id="empcode" onBlur="checkAvailabilityEmpid()">
                                       </div>

                                        <div class="input-field">
                                           <label>EMAIL</label>
                                           <input class="form-control" placeholder="Enter your email" name="email" type="email"  autocomplete="off" required id="example-email-input">
                                       </div>

                                    

                                        <div class="input-field">
                                            <label class="col-form-label">PREFERRED DEPARTMENT</label>
                                            <select class="custom-select" name="department" autocomplete="off">
                                                <option disabled selected>Select Department</option>
                                                <?php $sql = "SELECT DepartmentName from tbldepartments";
                                                $query = $dbh -> prepare($sql);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt=1;
                                                if($query->rowCount() > 0){
                                                foreach($results as $result)
                                                {   ?> 
                                                <option value="<?php echo htmlentities($result->DepartmentName);?>"><?php echo htmlentities($result->DepartmentName);?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>

                                        <div class="input-field">
                                           <label>QUALIFICATION</label>
                                           <input class="form-control" placeholder="Enter your Qualification" name="qualification" type="text" autocomplete="off" required id="empcode" onBlur="checkAvailabilityEmpid()">
                                       </div>

                                        <div class="input-field">
                                            <label>GENDER</label>
                                            <select class="custom-select" name="gender" autocomplete="off">
                                            <option disabled selected>Select Genter</option>
                                            <option>MALE</option>
                                            <option>FEMALE</option>
                                            </select>
                                        </div>
                                        

                                        <div class="input-field">
                                            <label>D.O.B</label>
                                            <input class="form-control" placeholder="Enter your dob" type="date" name="dob" id="birthdate" >
                                        </div>
                                        
                                        <div class="input-field">
                                            <label>CONTACT NUMBER</label>
                                            <input class="form-control" placeholder="Enter your Contactno" name="mobileno" type="tel"  maxlength="10" autocomplete="off" required>
                                        </div>

                                        <div class="input-field">
                                           <label>COUNTRY</label>
                                           <input class="form-control" placeholder="Enter your Country" name="country" type="text"   autocomplete="off" required id="example-text-input">
                                        </div>

                                        <div class="input-field">
                                           <label>ADDRESS</label>
                                           <input class="form-control" placeholder="Enter your Address" name="address" type="text"   autocomplete="off" required>
                                       </div>

                                       <div class="input-field">
                                           <label>CITY</label>
                                           <input class="form-control" placeholder="Enter your City" name="city" type="text"   autocomplete="off" required>
                                       </div>

                                    </div>   

                                      

                                       <h4>Set Password for Employee Login</h4>

                                    <div class="fields">   


                                       <div class="input-field">
                                           <label>PASSWORD</label>
                                           <input class="form-control" placeholder="Enter Password" name="password" type="password" autocomplete="off" required>
                                       </div>

                                       <div class="input-field">
                                           <label>CONFIRMATION PASSWORD</label>
                                           <input class="form-control" placeholder="Re-Enter Password" name="confirmpassword" type="password" autocomplete="off" required>
                                       </div>

                                       <button class="btn btn-primary" name="add" id="update" type="submit" onclick="return valid();">PROCEED</button>
                          
                                    </div>
                                </div>
                                </div>
                                </form>

                            </div>



                                        
        
    </div>
    
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    
    <script src="assets/js/line-chart.js"></script>
    
    <script src="assets/js/pie-chart.js"></script>
    
    
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>

<?php  ?>

