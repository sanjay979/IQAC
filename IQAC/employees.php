<?php
session_start();
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'demo');

try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    echo "Looks like you don't have any database/connection for this project. Please check your Database Connection and Try Again! </br>";
    exit("Error: " . $e->getMessage());
}

include('../database/Databasedemo.php');

if (isset($_GET['inid'])) {
    $id = $_GET['inid'];
    $status = 0;
    $sql = "UPDATE tblemployees SET Status=:status WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = 1;
    $sql = "UPDATE tblemployees SET Status=:status WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM tblemployees WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
}
?>

<!doctype html>
<html class="no-js" lang="en">

<?php include 'sidebar.php'; ?>
<?php include 'header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .main-content-inner {
            border-collapse: collapse;
            margin-top: 150px;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .status-active {
            background-color: #a1eaa5;
            color: #008000;
        }

        .status-inactive {
            background-color: #ffc6c6;
            color: #ff0000;
        }

        .dataTables_wrapper .dataTables_filter {
            float: none;
            text-align: right;
            margin-bottom: 10px;
        }

        .dataTables_wrapper .dataTables_length {
            float: left;
            margin-right: 10px;
        }

        .view-btn {
            padding: 5px 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        @media only screen and (max-width: 600px) {
            table {
                font-size: 12px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <div class="main-content">
        <div class="header-area">
            <div class="row align-items-center">
                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="nav-btn pull-left">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-content-inner">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="data-tables">
                                <center><a href="add-employee.php" class="btn btn-sm btn-info">Add New Employee</a></center>
                                <div class="table-responsive">
                                    <table id="dataTable3" class="table table-hover table-striped text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Staff ID</th>
                                                <th>Department</th>
                                                <th>Joined On</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT EmpId, FirstName, LastName, Department, Status, RegDate, id FROM tblemployees";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo htmlentities($cnt); ?></td>
                                                        <td><?php echo htmlentities($result->FirstName); ?>&nbsp;<?php echo htmlentities($result->LastName); ?></td>
                                                        <td><?php echo htmlentities($result->EmpId); ?></td>
                                                        <td><?php echo htmlentities($result->Department); ?></td>
                                                        <td><?php echo htmlentities($result->RegDate); ?></td>
                                                        <td>
                                                            <?php
                                                            $stats = $result->Status;
                                                            if ($stats) {
                                                            ?>
                                                                <span class="badge badge-pill badge-success">Active</span>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <span class="badge badge-pill badge-danger">Inactive</span>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="update-employee.php?id=<?php echo htmlentities($result->id); ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                                            <!-- <a href="view-employee.php?id=<?php echo htmlentities($result->id); ?>" class="view-btn">View</a> -->
                                                            <?php if ($result->Status == 1) { ?>
                                                                <a href="employees.php?inid=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Are you sure you want to inactive this employee?');" class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i></a>
                                                            <?php } else { ?>
                                                                <a href="employees.php?id=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Are you sure you want to active this employee?');" class="btn btn-sm btn-primary"><i class="fa fa-check"></i></a>
                                                            <?php } ?>
                                                            <a href="employees.php?delete=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Are you sure you want to delete this employee?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $cnt++;
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable3').DataTable();
        });

        function editEmployee(id) {
            window.location.href = 'edit-employee.php?id=' + id;
        }
    </script>
</body>

</html>