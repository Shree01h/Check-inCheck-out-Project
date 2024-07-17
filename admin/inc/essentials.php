<?php
// for frontend process 
define('SITE_URL', 'http://127.0.0.1/Hotel-Check-in-Check-out-Management-System/dbmsproject1/user/images/');
define('ABOUT_IMG_PATH', SITE_URL . 'about/');
define('CAROUSEL_IMG_PATH', SITE_URL . 'carousel/');
define('FACILITIES_IMG_PATH', SITE_URL . 'facilities/');
// echo ABOUT_IMG_PATH;


// for backend process
define('UPLOAD_IMAGE_PATH', $_SERVER["DOCUMENT_ROOT"] . '/Hotel-Check-in-Check-out-Management-System/dbmsproject1/user/images/');
// echo UPLOAD_IMAGE_PATH;
define('ABOUT_FOLDER', 'about/');
define('CAROUSEL_FOLDER', 'carousel/');
define('FACILITIES_FOLDER', 'facilities/');
// echo ABOUT_FOLDER;

function adminLogin()
{
    session_start();
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        echo "
        <script>window.location.href = 'index.php';</script>
        ";
        exit;
    }
}

function redirect($url)
{
    echo "<script>window.location.href = '$url';</script>";
    exit;
}

function alert($type, $msg)
{
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
    echo <<<alert
    <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
        <strong class="me-3">$msg</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
}

function uploadImage($file, $folder)
{
    $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
    $max_size = 2 * 1024 * 1024; // 2 MB

    if ($file['error'] !== UPLOAD_ERR_OK) {
        return 'inv_img';  // Invalid image
    }

    if ($file['size'] > $max_size) {
        return 'inv_size';  // Image size is too large
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed_ext)) {
        return 'inv_img';  // Invalid image extension
    }

    $new_name = uniqid() . '.' . $ext;
    $destination = $folder . $new_name;

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        return $new_name;  // Return the new image name
    } else {
        return 'upd failed';  // Upload failed
    }
}



function uploadSvgImage($image, $folder)
{
    $valid_mimes = ['image/svg+xml'];
    $img_mime = $image['type'];
    if (!in_array($img_mime, $valid_mimes)) {
        return 'inv_img'; //invalid mime or format 
    } else if ($image['size'] / (1024 * 1024) > 1) {
        return 'inv_size'; // invalidd size
    } else {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_' . random_int(1111, 9999) . ".$ext";
        $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;
        if (move_uploaded_file($image['tmp_name'], $img_path)) {
            return $rname;
        } else {
            return 'upd failed';
        }
    }
}

function deleteImage($folder, $image)
{
    if (unlink(UPLOAD_IMAGE_PATH . $folder . $image)) {
        return true;
    } else {
        false;
    }
}

?>