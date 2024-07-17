<?php
require ('../admin/inc/db_config.php');
require ('../admin/inc/essentials.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phonenum']) && isset($_POST['address']) && isset($_POST['pincode']) && isset($_POST['dob']) && isset($_POST['pass']) && isset($_POST['cpass'])) {
        $data = filteration($_POST);
        if ($data['pass'] != $data['cpass']) {
            echo 'pass_mismatch';
            exit;
        }

        $u_exist = select(
            "SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=?",
            [$data['email'], $data['phonenum']],
            "ss"
        );

        if (mysqli_num_rows($u_exist) != 0) {
            $u_exist_fetch = mysqli_fetch_assoc($u_exist);
            echo ($u_exist_fetch['email'] == $data['email']) ? "email_already" : "phone_already";
            exit;
        }

        $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);

        // Handle file upload
        $profile_pic = $_FILES['profile']['name'];
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($profile_pic);
        move_uploaded_file($_FILES['profile']['tmp_name'], $target_file);

        $query = "INSERT INTO `user_cred`(`name`, `email`, `phonenum`, `profile`, `address`, `pincode`, `dob`, `pass`) VALUES (?,?,?,?,?,?,?,?)";
        $values = [$data['name'], $data['email'], $data['phonenum'], $profile_pic, $data['address'], $data['pincode'], $data['dob'], $enc_pass];

        if (insert($query, $values, 'ssssssss')) {
            echo '1';
        } else {
            echo 'ins_failed';
        }
    } else {
        echo 'Invalid Request';
    }
}
?>