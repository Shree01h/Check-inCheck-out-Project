<?php
require ('inc/essentials.php');
adminLogin();

// Include the database configuration file
require ('inc/db_config.php');

// Fetch table names from the database
$query = "SHOW TABLES";
$result = mysqli_query($con, $query);
$tables = [];
while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <?php require ('inc/links.php'); ?>
    <link rel="stylesheet" href="css/common.css">
</head>

<body class="bg-light">
    <!-- header  -->
    <?php require ('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h1 class="display-4 fw-bold text-center">Welcome Admin</h1>

                <!-- Table to show database tables -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Database Table</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tables as $table): ?>
                            <tr>
                                <td><?php echo $table; ?></td>
                                <td><button class="btn btn-primary show-table-data"
                                        data-table="<?php echo $table; ?>">Show</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Div to display table data -->
                <div id="table-data-container"></div>
            </div>
        </div>
    </div>
    <!-- main-content ends -->

    <?php require ('inc/scripts.php'); ?>
    <script>
        document.querySelectorAll('.show-table-data').forEach(button => {
            button.addEventListener('click', function () {
                const tableName = this.getAttribute('data-table');
                fetch('fetch_table_data.php?table=' + tableName)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('table-data-container').innerHTML = data;
                    });
            });
        });
    </script>
</body>

</html>