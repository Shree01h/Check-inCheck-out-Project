<?php
require ('../inc/db_config.php');
require ('../inc/essentials.php');
adminLogin();
if (isset($_POST['add_features'])) {
    $frm_data = filteration($_POST);
    $q = "INSERT INTO features_tb (name) VALUES(?)";
    $values = [$frm_data['name']];
    $res = insert($q, $values, 's');
    echo $res;
}

if (isset($_POST['get_features'])) {
    $res = selectall('features_tb');
    $i = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        echo <<<data
        <tr>
            <th scope="row"">$i</th>
            <td>$row[name]</td>
            <td><button type="button" onclick="remove_features($row[id])" class="btn btn-danger btn-sm shadow-none"><i class="bi bi-trash"></i> Delete</button></td>
        </tr>  
        data;
        $i++;
    }
}

if (isset($_POST['rem_features'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_features']];
    $q = "DELETE FROM features_tb WHERE id=?";
    $res = delete($q, $values, 'i');
    echo $res;
}

if (isset($_POST['add_facilities'])) {
    $frm_data = filteration($_POST);
    $img_r = uploadSvgImage($_FILES['icon'], FACILITIES_FOLDER);
    if ($img_r == 'inv_img') {
        echo $img_r;
    } else if ($img_r == 'inv_size') {
        echo $img_r;
    } else {
        $q = "INSERT INTO facilities_tb (icon,name,message) VALUES(?,?,?)";
        $values = [$img_r, $frm_data['name'], $frm_data['desc']];
        $res = insert($q, $values, 'sss');
        echo $res;
    }
}

if (isset($_POST['get_facilities'])) {
    $res = selectall('facilities_tb');
    $path = FACILITIES_IMG_PATH;
    $i = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        echo <<<data
            <tr>
            <th scope="row"">$i</th>
            <td><img src="$path$row[icon]" width="75px"></td>
            <td>$row[name]</td>
            <td>$row[message]</td>
            <td><button type="button" onclick="remove_facilities($row[sr_no])" class="btn btn-danger btn-sm shadow-none"><i class="bi bi-trash"></i> Delete</button></td>
            </tr>  
        data;
        $i++;
    }
}

if (isset($_POST['rem_facilities'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_facilities']];
    $pre_q = "SELECT * FROM facilities_tb WHERE sr_no=?";
    $res = select($pre_q, $values, 'i');
    $image = mysqli_fetch_assoc($res);
    // echo $image;
    if (deleteImage(FACILITIES_FOLDER, $image['icon'])) {
        $q = "DELETE FROM facilities_tb WHERE sr_no=?";
        $res = delete($q, $values, 'i');
        echo $res;
    } else
        echo 0;
}

?>