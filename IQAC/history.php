<!DOCTYPE html>
<html>
<?php

session_start();

?>

<head>
    <title>Filter Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            
        }

        .main-content-inner {
            border-collapse: collapse;
            
        }        

        .data_table{

            margin-left: 150px;
            margin-top: 30px;

        }
</style>
</head>
<body>
<?php include 'sidebar.php'; ?>
        <div class="main-content">
            <?php include 'header.php' ?>
            <main>
            <div id="filters" class="main-content-inner">
        <span>Sort by:</span>
        <select name="fetchval" id="fetchval">
            <option value="" disabled selected>Select Filter</option>
            <option value="hours">Last 24 hours</option>
            <option value="week">Last 1 week</option>
            <option value="month">Last 1 month</option>
        </select>
    </div>  

     

    <div id="table-container" class="data_table">
        <table id="data-table" class="table">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Staff Name</th>
                    <th>Staff ID</th>
                    <th>Leave Type</th>
                    <!-- <th>Start Date</th>
                    <th>End Date</th> -->
                    <!-- <th>No of Days</th> -->
                    <th>Applied On</th>
                    <!-- <th>Reason</th> -->
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#fetchval").on('change', function(){
                var value = $(this).val();

                $.ajax({
                    url: "leave.php",
                    type: "POST",
                    data: { request: value },
                    beforeSend: function(){
                        $("#table-container").html("<span>Loading...</span>");
                    },
                    success: function(data){
                        $("#table-container").html(data);
                    },
                    error: function(){
                        $("#table-container").html("<span>Error occurred while fetching data.</span>");
                    }
                });
            });
        });
    </script>
    <main>
    </div>
</body>
</html>
