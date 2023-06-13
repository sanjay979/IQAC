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
        

        .data_table {
    margin-left: 150px;
    margin-top: 30px;
}

@media (max-width: 576px) {
    .data_table {
        margin-left: 0;
    }

    #filters {
        padding: 15px;
    }

    #search-input {
        margin-top: 10px;
    }
}

@media (min-width: 576px) {
    .text-right {
        text-align: right !important;
    }
}

    </style>
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="main-content">
        <?php include 'header.php' ?>
        <main>
            <div id="filters" class="main-content-inner">
                <div class="row">
                    <div class="col-md-6">
                        <span>Sort by:</span>
                        <select name="fetchval" id="fetchval">
                            <option value="" disabled selected>Select Filter</option>
                            <option value="hours">Last 24 hours</option>
                            <option value="week">Last 1 week</option>
                            <option value="month">Last 1 month</option>
                        </select>
                    </div>
                    <div class="col-md-6 text-right">
                        <input type="text" id="search-input" placeholder="Search Staff ID...">
                    </div>
                </div>
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
                $(document).ready(function() {
                    $("#fetchval").on('change', function() {
                        var value = $(this).val();
                        var searchValue = $("#search-input").val();

                        fetchFilteredData(value, searchValue);
                    });

                    $("#search-input").on("keyup", function() {
                        var value = $("#fetchval").val();
                        var searchValue = $(this).val();

                        fetchFilteredData(value, searchValue);
                    });

                    function fetchFilteredData(filterValue, searchValue) {
                        $.ajax({
                            url: "leave.php",
                            type: "POST",
                            data: {
                                request: filterValue,
                                search: searchValue
                            },
                            beforeSend: function() {
                                $("#table-container").html("<span>Loading...</span>");
                            },
                            success: function(data) {
                                $("#table-container").html(data);
                            },
                            error: function() {
                                $("#table-container").html("<span>Error occurred while fetching data.</span>");
                            }
                        });
                    }
                });
            </script>
        </main>
    </div>
</body>

</html>
