<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Staff Profile</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
    <!--font2 -->
    <script src="https://kit.fontawesome.com/668b4cc612.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="sidebar.css">
    <style>
      
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;1,200&display=swap');


:root{
    --main-color:#05b6fa;
    --color-dark:#5c6968;
    --text-grey:#8390a2;
    --difrent:#b5afaf;
    
}
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    list-style: none;
    text-decoration: none;
    font-family: 'Poppins',sans-serif;
}
.sidebar{
    width: 225px;
    position: fixed;
    left: 0;
    top: 0;
    height: 100%;
    background:var(--main-color);
    z-index: 100;
    transition: width 300ms;
}
.sidebar-head{
    height: 90px;
    padding:1rem 2rem 1rem 2rem ;
    color: #fff;
}
.sidebar-head span{
    display: inline-block;
    padding-right: 1rem;
}
.fa{
    color: #fff;
}
.dropdown-btn{
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    display: block;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
  }
  .dropdown-container {
    display: none;
    background-color:transparent;
    padding-left: 8px;
  }
#nav-toggle:checked + .sidebar{
    width: 100px;
}
#nav-toggle:checked ~ .main-content{
    margin-left: 90px;
}
#nav-toggle:checked ~ .main-content header{
    width: calc(100% - 100px);
    left: 100px;
}
.main-content{
    transition: margin-left 300ms;
    margin-left: 345px;
}
#nav-toggle:checked + .sidebar .sidebar-head h2,
#nav-toggle:checked + .sidebar li a 
{
    padding-left: 0rem;
}
#nav-toggle:checked + .sidebar li a span{
    padding-left: 2rem;
    font-size: 1.9rem;
}
#nav-toggle:checked + .sidebar li a span:last-child
{
    display: none;
}
#nav-toggle:checked + .sidebar li a
{
    padding-left: 0rem;
}
.sidebar-menu{
    margin-top: 1rem;
}
.sidebar-menu li{
    width: 100%;
    margin-top: 1.7rem;
    padding-left: 1rem;
}
.sidebar-menu a{
    padding-left: 1rem;
    display: block;
    color: #fff;
    font-size: 1.1rem;
    padding-top: 1rem;
    padding-bottom: 1rem;
}
.sidebar-menu a.active{
    background: #fff;
    padding-top: 1rem;
    padding-bottom: 1rem;
    color: var(--main-color);
    border-radius: 30px 0 0 30px;
}
.sidebar-menu a.active:hover{
    background: #fff;
    padding-top: 1rem;
    padding-bottom: 1rem;
    color: var(--main-color);
    border-radius: 30px 0 0 30px;
}
.sidebar-menu a:hover{
    background: #89d7f6;
    border-radius: 30px 0 0 30px;
    padding-top: 1rem;
    padding-bottom: 1rem;
    transition: 1s ease-in-out;
}
.sidebar-menu a span:first-child{
    font-size: 1.3rem;
    padding-right: 1rem;
}
.main-content{
    margin-left: 225px;

}
header{
    background: #fff;
    display: flex;
    justify-content: space-between;
    padding: 1rem 1.5rem;
    box-shadow: 2px 2px 5px rgba(0,0,0,.3);
    position: fixed;
    left: 225px;
    width: calc(100% - 225px);
    top: 0;
    z-index: 100;
    transition: left 300ms;
}
#nav-toggle{
    display: none;
}
header h2{
    color: #222;
}
header label span{
    font-size: 1.7rem;
    padding-left: 1rem;
}
.user-wrapper{
    display: flex;
    align-items: center;
}
.user-wrapper img{
    border-radius: 50%;
    margin-right: 1rem;
}
.user-wrapper small{
    display: inline-block;
    color: var(--text-grey);
}
main{
    margin-top: 60px;
    padding: 1rem 0.5rem;
    background:#f1f5f9;
    min-height: calc(100vh-60px);
}
.cards{
    display: grid;
    grid-template-columns: repeat(3,1fr);
    grid-gap: 1rem;
    margin-top: 0rem;
}
.card-single{
    display: flex; 
    justify-content: space-between;
    background: #fff;
    padding: 1rem;
    border-radius: 3px;
}
.card-single div:last-child span{
    font-size: 3rem;
    color: var(--main-color);
}
.card-single div:first-child span{
    color: var(--text-grey);
}
.card-single:hover{
    transition: 1s ease;
    background: #949b9c;
    color: #fff;
    
}
.card-single:hover div:first-child span,
.card-single:hover div:last-child span{
    color: #fff;
    transition: 1s;

}

@media only screen and (max-width: 1200px) {
 .sidebar{
        width: 100px;
    }
    
    .main-content header{
        width: calc(100% - 100px);
        
    }
    
    .sidebar .sidebar-head h2,
    .sidebar li a 
    {
        padding-left: 1rem;
    }
    #nav-toggle:checked + .sidebar li a span:last-child
    {
        display: none;
    }
    .sidebar{
        width: 345px;
    }
   .sidebar li a
{
    padding-left: 0rem;
}
}
@media only screen and (max-width: 960px) {
    .cards{
        grid-template-columns: repeat(2,1fr);
    }
}
@media only screen and (max-width: 768px) {
    .cards{
        grid-template-columns: repeat(2,1fr);
    }
}
@media only screen and (max-width: 450px) {
    .cards{
        grid-template-columns: repeat(1,1fr);
    }
    .sidebar{
        width: 200px;
    }
    .main-content header{
        width: calc(100% - 200px);
        left: 200px;
    }
    .main-content {
        margin-left: 200px;
    }
    
}
      </style>
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1) ?>
    <div class="sidebar">
        <div class="sidebar-head">
            <h2><span>SJC Staff</span></h2>
        </div>
        <div class="sidebar-menu">

        <ul>
            <li><a href="index.php"  class="<?= $page == 'index.php'? 'active':'' ?>"><span class="las la-igloo"></span> <span>Dashboard</span></a></li>
            <li><a href="profile.php"  class="<?= $page == 'profile.php'? 'active':'' ?>"><span class="las la-user"></span><span>Profile</span> </a></li>
           
            <li> <a class="dropdown-btn"><span class="fa fa-clock" ></span>  &nbsp;<span>Pre-Leave <i class="fa fa-caret-down"></i></span>  </a>
  <div class="dropdown-container">
    <a href="leaveform.php"  class="<?= $page == 'leaveform.php'? 'active':'' ?>"><span class="las la-clipboard-list"></span><span>Apply Leave</span> </a>
    <a href="pending.php" class="<?= $page == 'pending.php'? 'active':'' ?>"><span class="las la-receipt"></span> <span>Pending</span></a>
    <a href="rejected.php" class="<?= $page == 'rejected.php'? 'active':'' ?>">Rejected</a>
    <a href="accepted.php" class="<?= $page == 'accepted.php'? 'active':'' ?>">Accepted</a>
  </div></li>
            <li> <a class="dropdown-btn"><span class="fa fa-clock" ></span> &nbsp;<span>Post-Leave <i class="fa fa-caret-down"></i></span>  </a>
  <div class="dropdown-container">
    <a href="postleave.php"  class="<?= $page == 'postleave.php'? 'active':'' ?>"><span class="las la-clipboard-list"></span><span>Apply Leave</span> </a>
    <a href="pending.php" class="<?= $page == 'pending.php'? 'active':'' ?>"><span class="las la-receipt"></span> <span>Pending</span></a>
    <a href="rejected.php" class="<?= $page == 'rejected.php'? 'active':'' ?>"><i class="fa fa-trash-can"></i>Rejected</a>
    <a href="accepted.php" class="<?= $page == 'accepted.php'? 'active':'' ?>">Accepted</a>
  </div></li>
              <li><a href="../Login/logout.php" class=""><span class="las la-igloo"></span> <span>Logout</span></a></li>
        </ul>
        </div> 
    </div>




    <script>
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
    </body>

</body>

</html>