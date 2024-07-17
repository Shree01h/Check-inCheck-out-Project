<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['checkin_date']) && isset($_POST['checkout_date']) && isset($_POST['adult']) && isset($_POST['children'])) {
        $data = filteration($_POST);

        $query = "INSERT INTO `bookroom`(`check_in_date`, `check_out_date`, `adult`, `children`) VALUES (?,?,?,?)";
        $values = [$data['checkin_date'], $data['checkout_date'], $data['adult'], $data['children']];

        if (insert($query, $values, 'ssii')) {
            echo '1';
        } else {
            echo 'ins_failed';
        }
    } else {
        echo 'Invalid Request';
    }
}
