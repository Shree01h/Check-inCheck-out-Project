<?php
require ('../inc/db_config.php');
require ('../inc/essentials.php');
adminLogin();

if (isset($_POST['add_img'])) {
    $frm_data = filteration($_POST);
    $img_r = uploadImage($_FILES['picture'], CAROUSEL_FOLDER);
    if ($img_r == 'inv_img') {
        echo $img_r;
    } else if ($img_r == 'inv_size') {
        echo $img_r;
    } else {
        $q = "INSERT INTO carousel (picture) VALUES(?)";
        $values = [$img_r];
        $res = insert($q, $values, 's');
        echo $res;
    }
}

if (isset($_POST['get_img'])) {
    $res = selectall('carousel');
    while ($row = mysqli_fetch_assoc($res)) {
        $path = CAROUSEL_IMG_PATH;
        echo <<<data
        <div class="col-md-2 mb-4">
                                <div class="card bg-dark text-white">
                                    <img src="$path$row[picture]" class="card-img">
                                    <div class="card-img-overlay text-end">
                                        <button type="button" onclick="remove_img($row[sr_no])" class="btn btn-danger btn-sm shadow-none"><i class="bi bi-trash"></i> Delete</button>
                                    </div>
                                </div>
                            </div>
        data;
    }
}

if (isset($_POST['rem_img'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_img']];
    $pre_q = "SELECT * FROM carousel WHERE sr_no=?";
    $res = select($pre_q, $values, 'i');
    $image = mysqli_fetch_assoc($res);
    // echo $image;
    if (deleteImage(CAROUSEL_FOLDER, $image['picture'])) {
        $q = "DELETE FROM carousel WHERE sr_no=?";
        $res = delete($q, $values, 'i');
        echo $res;
    } else
        echo 0;
}


?>