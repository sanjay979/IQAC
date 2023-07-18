<?php
session_start();
if ($_SESSION['s_id'] && $_SESSION['position'] == 'iqac') {
?>
<!DOCTYPE html>
<html>
<head>
    <title>IQAC Approve</title>
    <link rel="stylesheet" type="text/css" href="ApproveForm2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function openTab(tabName) {
            // Hide all tab content
            var tabContent = document.getElementsByClassName("tab-content");
            for (var i = 0; i < tabContent.length; i++) {
                tabContent[i].style.display = "none";
            }

            // Show the selected tab content
            var selectedTab = document.getElementById(tabName);
            selectedTab.style.display = "block";

            // Highlight the active tab button
            var tabButtons = document.getElementsByClassName("tab-button");
            for (var i = 0; i < tabButtons.length; i++) {
                tabButtons[i].classList.remove("active");
            }
            document.getElementById(tabName + "-button").classList.add("active");
        }
    </script>
</head>
<body>
    <?php include "sidebar.php"?>
    <div class="main-content">
    <?php include "header.php"?>
    
    
        <main style="padding-top: 0;">
            <div class="tab-container">
                <button id="page1-button" class="tab-button active" onclick="openTab('page1')">Pre Leave</button>
                <button id="page2-button" class="tab-button" onclick="openTab('page2')">Post Leave</button>
            </div>

            <div id="page1" class="tab-content" style="display: block;">
                <?php include "preLeaveForm.php"?>
            </div>

            <div id="page2" class="tab-content">
                <?php include "postLeaveForm.php" ?>
            </div>
        </main>
    </div>

    <script>
        // Run the openTab function with 'page1' as the default tab on page load
        document.addEventListener("DOMContentLoaded", function() {
            openTab('page1');
        });
    </script>
</body>
</html>
<?php
} else {
    header("location:../Login/home.php");
}
?>
