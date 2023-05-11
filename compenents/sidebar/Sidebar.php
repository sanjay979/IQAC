<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Staff Profile</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="sidebar.css">
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-head">
            <h2><span>SJC Staff</span></h2>
        </div>
        <div class="sidebar-menu">
        <ul>
            <li><a href="Sidebar.php" class="active"><span class="las la-igloo"></span> <span>Dashboard</span></a></li>
            <li><a href=""><span class="las la-user"></span><span>Profile</span> </a></li>
            <li><a href=""><span class="las la-clipboard-list"></span><span>Apply OD</span> </a></li>
            <li><a href=""><span class="las la-receipt"></span> <span>Pending</span></a></li>
            <li><a href=""><span class="las la-list"></span> <span>OD List</span></a></li>
        </ul>
        </div>
        

    </div>
    <div class="main-content">
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
                <h4>John</h4>
                <small>Assistant professor</small>
            </div>
           </div>
        </header>
    <main>
        <div class="cards">
                <div class="card-single">
                    <div>   
                    <h1>54</h1>
                    <span>No of days OD</span></div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div> 
                <div class="card-single">
                    <div>   
                    <h1>54</h1>
                    <span>No of days CL</span></div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div> 
                <div class="card-single">
                    <div>   
                    <h1>54</h1>
                    <span>No of days ML</span></div>
                    <div>
                        <span class="las la-hospital"></span>
                    </div>
                </div> 
        </div>
    </main>
    </div>
</body>
</html>