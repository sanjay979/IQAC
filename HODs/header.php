<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
    <!--font2 -->
    <script src="https://kit.fontawesome.com/668b4cc612.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <header>
        <h2>
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

                    $id = $_SESSION['s_id'];
                    include '../database/Databasedemo.php';
                    $sql = "SELECT name FROM faculty_details where s_id='$id'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $value = $row['name'];
                        echo  $value;
                    }
                    ?></h4>
                <small> HOD</small>
            </div>
        </div>
    </header>
</body>

</html>