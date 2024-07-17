<?php
require ('inc/essentials.php');
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

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">SETTINGS</h3>

                <!-- Alert Container -->
                <div id="alert-container"></div>

                <!-- General settings section  -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <button type="button" class="btn btn-dark btn-sm shadow-none" data-bs-toggle="modal"
                                data-bs-target="#general-s">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                        <p class="card-text" id="site_title"></p>

                        <h6 class="card-subtitle mb-1 fw-bold">About us</h6>
                        <p class="card-text" id="site_about"></p>
                    </div>
                </div>

                <!-- General settings Modal -->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">General Settings</h5>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label text-bold">Site Title</label>
                                    <input name="site_title" id="site_title_inp" type="text"
                                        class="form-control shadow-none">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label text-bold">About
                                        us</label>
                                    <textarea name="site_about" id="site_about_inp" class="form-control shadow-none"
                                        id="exampleFormControlTextarea1" rows="4"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="resetGen()" class="btn text-secondary shadow-none"
                                        data-bs-dismiss="modal">CANCEL</button>
                                    <button type="button"
                                        onclick="upd_general(site_title_inp.value, site_about_inp.value)"
                                        class="btn custom-bg text-white">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shutdown Section -->
                <div class="my-3 card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Shutdown Website</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input class="form-check-input" type="checkbox"
                                        onchange="upd_shutdown(this.checked)" id="shutdown_toggle">
                                </form>
                            </div>
                        </div>
                        <p class="card-text">
                            No customer will be allowed to book hotel rooms when shutdown mode is turned on.
                        </p>
                    </div>
                </div>

                <!-- Contact Settings Page -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Contact Settings</h5>
                            <button type="button" class="btn btn-dark btn-sm shadow-none" data-bs-toggle="modal"
                                data-bs-target="#contact-s">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                    <p class="card-text" id="addressVal"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                    <p class="card-text" id="gmap"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Phone Numbers</h6>
                                    <p class="card-text">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="pn1"></span>
                                        <br>
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="pn2"></span>
                                    </p>
                                </div>
                                <div>
                                    <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                                    <p class="card-text" id="email"></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-facebook me-1"></i>
                                        <span id="fb"></span>
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-instagram me-1"></i>
                                        <span id="insta"></span>
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-twitter me-1"></i>
                                        <span id="tw"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                    <iframe src=" " id="iframe" width="400" height="300" style="border:0;"
                                        allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Settings Modal -->
                <div class="modal fade" id="contact-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Contact Settings</h5>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-bold">Address</label>
                                                <input name="address" id="address_inp" type="text"
                                                    class="form-control shadow-none">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label text-bold">Google Map</label>
                                                <input name="gmap" id="gmap_inp" type="text"
                                                    class="form-control shadow-none">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label text-bold">Phone Numbers (with country code)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="bi bi-telephone-fill"></i></span>
                                                    <input type="number" class="form-control shadow-none" id="pn1_inp"
                                                        name="pn1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="bi bi-telephone-fill"></i></span>
                                                    <input type="number" class="form-control shadow-none" id="pn2_inp"
                                                        name="pn2">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label text-bold">Email</label>
                                                <input name="email" id="email_inp" type="text"
                                                    class="form-control shadow-none">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-bold">Social Links</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="bi bi-facebook"></i></span>
                                                    <input type="text" class="form-control shadow-none" id="fb_inp"
                                                        name="fb">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="bi bi-instagram"></i></span>
                                                    <input type="text" class="form-control shadow-none" id="insta_inp"
                                                        name="insta">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="bi bi-twitter"></i></span>
                                                    <input type="text" class="form-control shadow-none" id="tw_inp"
                                                        name="tw">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label text-bold">iFrame</label>
                                                <input name="iframe" id="iframe_inp" type="text"
                                                    class="form-control shadow-none">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="resetContact()"
                                        class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="button" onclick="upd_contact()"
                                        class="btn custom-bg text-white">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Management Settings -->
                <div class="card border-0 shadow-sm my-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Team Management Settings</h5>
                            <button type="button" class="btn btn-dark btn-sm shadow-none" data-bs-toggle="modal"
                                data-bs-target="#team-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>
                        <div class="row" id="team_data">
                            <!-- Example Team Member Card -->
                            <div class="col-md-2 mb-3">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Management Settings Modal -->
                <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Team Member Settings</h5>
                            </div>
                            <div class="modal-body">
                                <form id="team_s_form" action="path/to/your/script" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label text-bold">Name</label>
                                        <input name="member_name" id="member_name_inp" type="text"
                                            class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-bold">Picture</label>
                                        <input name="member_pic" id="member_pic_inp" type="file"
                                            class="form-control shadow-none" accept=".jpg,.jpeg,.png,.webp" required>
                                    </div>
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
    <script src="scripts/setting.js"></script>
</body>

</html>
