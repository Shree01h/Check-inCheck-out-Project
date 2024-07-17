<?php
require ('inc/db_config.php');
require ('inc/essentials.php');
require ('inc/scripts.php');
adminLogin();

if (isset($_GET['seen'])) {
    $frm_data = filteration($_GET);
    if ($frm_data['seen'] == 'all') {
        $q = "UPDATE contactus_tb SET seen = ?";
        $values = [1];
        if (update($q, $values, "i")) {
            alert('success', 'marked as read');
        }
    } else {
        $q = "UPDATE contactus_tb SET seen=? WHERE sr_no=?;";
        $values = [1, $frm_data['seen']];
        if (update($q, $values, "ii")) {
            alert('success', 'marked as read');
        }
    }
}

if (isset($_GET['del'])) {
    $frm_data = filteration($_GET);
    if ($frm_data['del'] == 'all') {
        $q = "DELETE FROM contactus_tb";
        if (mysqli_query($con, $q)) {
            alert('success', 'All Deleted');
        }
    } else {
        $q = "DELETE FROM contactus_tb WHERE sr_no=?;";
        $values = [$frm_data['del']];
        if (delete($q, $values, "i")) {
            alert('success', 'Deleted');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Settings</title>
    <?php require ('inc/links.php'); ?>
    <link rel="stylesheet" href="css/comon.css">
</head>

<body class="bg-light">


    <!-- header  -->
    <?php require ('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-3 overflow-hidden">
                <h3 class="mb-4">USERS QUERIES</h3>
                <!-- team management settings -->
                <div class="card border-0 shadow-sm my-2">
                    <div class="card-body">
                        <!-- all action at the same time button -->
                        <div class="text-end mb-4">
                            <a href='?seen=all' class="btn btn-sm btn-primary rounded-pill shadow-none"><i
                                    class="bi bi-check-all"></i> marks all read</a>
                            <a href='?del=all' class="btn btn-sm btn-danger rounded-pill shadow-none"><i
                                    class="bi bi-trash3-fill"></i> Delete all </a>
                        </div>

                        <div class="table-responsive-md" style="height:370px; overflow-y:scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top p-4">
                                    <tr class="bg-dark text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" style="width:20%">Subject</th>
                                        <th scope="col" style="width:30%">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM contactus_tb ORDER BY sr_no DESC";
                                    $res = mysqli_query($con, $query);
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        // print_r($row);
                                        $seen = '';
                                        if ($row['seen'] != 1) {
                                            $seen = "<a href='?seen=$row[sr_no]' class='btn btn-sm rounded btn-primary shadow-none'>Marks as Read</a><br>";
                                        }
                                        $seen .= "<a href='?del=$row[sr_no]'class='btn btn-sm rounded-pill btn-danger shadow-none mt-3'>Delete</a>";
                                        echo <<<data
                                            <tr>
                                            <th scope="row">$i</th>
                                            <td>$row[name]</td>
                                            <td>$row[email]</td>
                                            <td>$row[subject]</td>
                                            <td>$row[message]</td>
                                            <td>$row[date]</td>
                                            <td>$seen</td>
                                            </tr>
                                            data;
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require ('inc/scripts.php'); ?>
    <script src="scripts/Carousel.js"></script>
</body>

</html>