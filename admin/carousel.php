<?php
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
    <link rel="stylesheet" href="common.css">
</head>

<body class="bg-light">


    <!-- header  -->
    <?php require ('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">CAROUSEL</h3>
                <!-- team management settings -->
                <div class="card border-0 shadow-sm my-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Carousel setting</h5>
                            <button type="button" class="btn btn-dark btn-sm shadow-none" data-bs-toggle="modal"
                                data-bs-target="#carousel-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>
                        <div class="row" id="carousel_img">
                            <div class="col-md-4 col-lg-4 mb-4">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- team management settings modal -->
                <div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <!-- modal header  -->
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Upload Carousel Image</h5>
                            </div>
                            <!-- modal body -->
                            <div class="modal-body">
                                <form id="carousel_s_form">
                                    <div class="mb-3">
                                        <label class="form-label text-bold">Image</label>
                                        <input name="caro_img" id="caro_img_inp" type="file"
                                            class="form-control shadow-none" accept=".jpg,.jpeg,.png,.web" required>
                                    </div>
                                    <!-- modal footer  -->
                                    <div class="modal-footer">
                                        <button type="reset" class="btn text-secondary shadow-none"
                                            data-bs-dismiss="modal">CANCEL</button>
                                        <button type="submit" class="btn custom-bg text-white">SUBMIT</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require ('inc/scripts.php'); ?>
    <script src="scripts/carousel.js"></script>
</body>

</html>