<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if (isset($_POST['get_general'])) {
    $q = "SELECT * FROM `settings` WHERE `sr_no` = 1";
    $values = [1];
    $res = select($q, $values, 'i');
    if ($res) {
        $data = mysqli_fetch_assoc($res);
        $json_data = json_encode($data);
        echo $json_data;
    } else {
        echo json_encode(['error' => 'Failed to fetch general settings']);
    }
}

if (isset($_POST['upd_general'])) {
    $frm_data = filteration($_POST);
    $q = "UPDATE settings SET site_title = ?, site_about = ? WHERE srno = ?";
    $values = [$frm_data['site_title'], $frm_data['site_about'], 1];
    $res = update($q, $values, "ssi");
    echo $res;
}

if (isset($_POST['upd_shutdown'])) {
    $frm_data = ($_POST['upd_shutdown'] == 0) ? 1 : 0;
    $q = "UPDATE settings SET shutdown = ? WHERE srno = ?";
    $values = [$frm_data, 1];
    $res = update($q, $values, "ii");
    echo $res;
}

if (isset($_POST['get_contact'])) {
    $q = "SELECT * FROM contact_details WHERE sr_no = ?";
    $values = [1];
    $res = select($q, $values, 'i');
    if ($res) {
        $data = mysqli_fetch_assoc($res);
        $json_data = json_encode($data);
        echo $json_data;
    } else {
        echo json_encode(['error' => 'Failed to fetch contact details']);
    }
}

if (isset($_POST['upd_contact'])) {
    $frm_data = filteration($_POST);
    $q = "UPDATE contact_details SET address = ?, gmap = ?, pn1 = ?, pn2 = ?, email = ?, fb = ?, insta = ?, tw = ?, iframe = ? WHERE sr_no = ?";
    $values = [
        $frm_data['address'], $frm_data['gmap'], $frm_data['pn1'], $frm_data['pn2'],
        $frm_data['email'], $frm_data['fb'], $frm_data['insta'], $frm_data['tw'],
        $frm_data['iframe'], 1
    ];
    $res = update($q, $values, "sssssssssi");
    echo $res;
}

if (isset($_POST['add_member'])) {
    $frm_data = filteration($_POST);
    $img_r = uploadImage($_FILES['picture'], ABOUT_FOLDER);
    if ($img_r == 'inv_img' || $img_r == 'inv_size') {
        echo $img_r;
    } else {
        $q = "INSERT INTO team_details (name, picture) VALUES(?, ?)";
        $values = [$frm_data['name'], $img_r];
        $res = insert($q, $values, 'ss');
        echo $res;
    }
}

if (isset($_POST['get_member'])) {
    $res = selectall('team_details');
    $path = ABOUT_IMG_PATH;
    while ($row = mysqli_fetch_assoc($res)) {
        echo <<<DATA
        <div class="col-md-2 mb-4">
            <div class="card bg-dark text-white">
                <img src="$path$row[picture]" class="card-img">
                <div class="card-img-overlay text-end">
                    <button type="button" onclick="remove_mem($row[sr_no])" class="btn btn-danger btn-sm shadow-none">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </div>
                <p class="card-text text-center px-3 py-2">$row[name]</p>
            </div>
        </div>
        DATA;
    }
}

if (isset($_POST['rem_mem'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_mem']];
    $pre_q = "SELECT picture FROM team_details WHERE sr_no = ?";
    $res = select($pre_q, $values, 'i');
    if ($res) {
        $image = mysqli_fetch_assoc($res);
        if (deleteImage(ABOUT_FOLDER, $image['picture'])) {
            $q = "DELETE FROM team_details WHERE sr_no = ?";
            $res = delete($q, $values, 'i');
            echo $res;
        } else {
            echo json_encode(['error' => 'Failed to delete image']);
        }
    } else {
        echo json_encode(['error' => 'Failed to fetch member']);
    }
}

?>
