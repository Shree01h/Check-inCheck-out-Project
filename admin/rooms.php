<?php
require ('inc/db_config.php');
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
    <title>Admin Panel - Rooms</title>
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
                <h3 class="mb-4">ROOMS</h3>
                <!--features settings -->
                <div class="card border-0 shadow-sm my-2">
                    <div class="card-body">
                        <div class="text-end mb-3">
                            <!-- <h5 class="card-title m-0">Add Features</h5> -->
                            <button type="button" class="btn btn-dark btn-sm shadow-none" data-bs-toggle="modal"
                                data-bs-target="#add-rooms">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>

                        <div class="table-responsive-lg" style="height:450px; overflow-y:scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top p-4">
                                    <tr class="bg-dark text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Guest</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="room_data">

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- feature settings modal -->
    <div class="modal fade" id="add-rooms" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <!-- modal header  -->
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Rooms</h5>
                </div>
                <!-- modal body -->
                <div class="modal-body">
                    <form id="add_room_form">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label text-bold">Name</label>
                                <input name="name" id="name_inp" type="text" class="form-control shadow-none" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label text-bold">Area</label>
                                <input name="area" id="area_inp" type="number" min="1" class="form-control shadow-none"
                                    required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label text-bold">Price</label>
                                <input name="price" id="price_inp" type="number" min="1"
                                    class="form-control shadow-none" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label text-bold">Quantity</label>
                                <input name="quantity" id="quantity_inp" type="number" min="1"
                                    class="form-control shadow-none" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label text-bold">Adult (Max.)</label>
                                <input name="adult" id="adult_inp" type="number" min="1"
                                    class="form-control shadow-none" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label text-bold">Children (Max.)</label>
                                <input name="children" id="children_inp" type="number" min="1"
                                    class="form-control shadow-none" required>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold form-label">Features</label>
                                <div class="row">
                                    <?php
                                    $res = selectall('features_tb');
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                            <div class='col-md-3'>
                                                <label>
                                                    <input type='checkbox' name='feature' value='$opt[id]' class='form-check-input shadow-none'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                            ";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold form-label">Facilities</label>
                                <div class="row">
                                    <?php
                                    $res = selectall('facilities_tb');
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                            <div class='col-md-3'>
                                                <label>
                                                    <input type='checkbox' name='facilities' value='$opt[sr_no]' class='form-check-input shadow-none'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                            ";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-bold" for="desc">Description</label>
                                <textarea class="form-control" id="desc" name="description" rows="4"></textarea>
                            </div>

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
    <script>
        function add_features() {
            let data = new FormData();
            data.append('add_room', '');
            data.append('name', add_room_form.elements['name'].value);
            data.append('area', add_room_form.elements['area'].value);
            data.append('area', add_room_form.elements['area'].value);
            data.append('Quantity', add_room_form.elements['Quantity'].value);
            data.append('adult', add_room_form.elements['adult'].value);
            data.append('children', add_room_form.elements['achildrendult'].value);
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../ajax/features_facilities_crud.php", true);
            xhr.onload = function () {
                var myModal = document.getElementById('features-s');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();
                console.log(this.responseText);
                if (this.responseText == 1) {
                    alert('success', 'Features Added')
                    features_name_inp.value = '';
                    let elem = document.getElementsByClassName('show');
                    elem[0].remove();
                    get_features();
                } else {
                    alert('error', 'Features not Added');
                }
            }
            xhr.send(data);

        }
    </script>
</body>

</html>