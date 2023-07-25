<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
<header><h2>
             <div class="header-list">
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label> Dashboard
            </div>
           
        </h2>
           <div class="user-wrapper">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMi1noTDjkelW0kvsZO5CgEaBM5GHrNkF9ix7Knt9Ztw&s" alt="" width="30px" height="30px">
            <div>
                <h4><?php
        $id=$_SESSION['s_id'];
        //$id= username of principal 
        
        include '../database/Databasedemo.php';
        $sql="SELECT name FROM faculty_details where s_id='$id'";
        $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $value = $row['name'];
                echo  $value;
            }
        ?></h4>
                <small> Deputy Principal</small>
            </div>
           </div>
        </header>
</body>
</html>