<?php
// require('inc/db_config.php');
require ('inc/essentials.php');
require ('inc/scripts.php');
adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Settings</title>
    <?php require ('inc/links.php'); ?>
    <link rel="stylesheet" href="css/common.css">

</head>

<body class="bg-light">


    <!-- header  -->
    <?php require ('inc/header.php'); ?>
    <!-- features setting  -->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-3 overflow-hidden">
                <h3 class="mb-4">FEATURES AND FACILITIES</h3>
                <!--features settings -->
                <div class="card border-0 shadow-sm my-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Add Features</h5>
                            <button type="button" class="btn btn-dark btn-sm shadow-none" data-bs-toggle="modal"
                                data-bs-target="#features-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>

                        <div class="table-responsive-md" style="height:370px; overflow-y:scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top p-4">
                                    <tr class="bg-dark text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="features_data">

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- feature settings modal -->
    <div class="modal fade" id="features-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <!-- modal header  -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Team members settings</h5>
                </div>
                <!-- modal body -->
                <div class="modal-body">
                    <form id="features_s_form">
                        <div class="mb-3">
                            <label class="form-label text-bold">Name</label>
                            <input name="member_name" id="features_name_inp" type="text"
                                class="form-control shadow-none" required>
                        </div>
                        <!-- modal footer  -->
                        <div class="modal-footer">
                            <button type="reset" class="btn text-secondary shadow-none"
                                data-bs-dismiss="modal">CANCEL</button>
                            <button type="submit" class="btn custom-bg text-white">SUMBUT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- facilities  -->
    <div class="row">
        <div class="col-lg-10 ms-auto p-3 overflow-hidden">
            <!-- facilities settings -->
            <div class="card border-0 shadow-sm my-2">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Add Facilities</h5>
                        <button type="button" class="btn btn-dark btn-sm shadow-none" data-bs-toggle="modal"
                            data-bs-target="#facilities-s">
                            <i class="bi bi-plus-square"></i> Add
                        </button>
                    </div>

                    <div class="table-responsive-md" style="height:370px; overflow-y:scroll;">
                        <table class="table table-hover border">
                            <thead class="sticky-top p-4">
                                <tr class="bg-dark text-white">
                                    <th scope="col">#</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody id="facilities_data">

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- facilities settings modal  -->
    <div class="modal fade" id="facilities-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <!-- modal header  -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add facilities</h5>
                </div>
                <!-- modal body -->
                <div class="modal-body">
                    <form id="facilities_s_form">
                        <div class="mb-3">
                            <label class="form-label text-bold">Name</label>
                            <input name="facilities_name" id="facilities_name_inp" type="text"
                                class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-bold">Icon</label>
                            <input name="facilities_icon" id="facilities_icon_inp" type="file"
                                class="form-control shadow-none" accept=".svg" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label text-bold">Description</label>
                            <textarea name="facilities_desc" id="facilities_desc_inp" class="form-control shadow-none"
                                id="exampleFormControlTextarea1" rows="4 "></textarea>
                        </div>
                        <!-- modal footer  -->
                        <div class="modal-footer">
                            <button type="reset" class="btn text-secondary shadow-none"
                                data-bs-dismiss="modal">CANCEL</button>
                            <button type="submit" class="btn custom-bg text-white">SUMBUT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <?php require ('inc/scripts.php'); ?>

    <script src="scripts/feature_facilities.js"></script>
</body>

</html>