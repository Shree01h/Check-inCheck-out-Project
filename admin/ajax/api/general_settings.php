<?php
require_once '../../inc/db_config.php'; // Adjusted path to inc folder
require_once '../../inc/essentials.php';
// hey

header('Content-Type: application/json');

$host = "localhost";
$port = 3306;
$socket = "";
$user = "root";
$password = "@shab123#";
$dbname = "hotel";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket);

if ($con->connect_error) {
    die(json_encode(['error' => 'Database connection failed: ' . $con->connect_error]));
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'upd_general':
            $site_title = $con->real_escape_string($_POST['site_title']);
            $site_about = $con->real_escape_string($_POST['site_about']);
            $sql = "UPDATE settings SET site_title='$site_title', site_about='$site_about' WHERE sr_no=1";
            if ($con->query($sql)) {
                echo 1;
            } else {
                echo json_encode(['error' => $con->error]);
            }
            break;

        case 'upd_shutdown':
            $value = (int) $_POST['value'];
            $sql = "UPDATE settings SET shutdownVal='$value' WHERE sr_no=1";
            if ($con->query($sql)) {
                echo 1;
            } else {
                echo json_encode(['error' => $con->error]);
            }
            break;

        case 'get_contacts':
            $sql = "SELECT addressVal, gmap, pn1, pn2, email, fb, insta, tw, iframe FROM contact_details WHERE sr_no = 1";
            $result = $con->query($sql);
            if ($result) {
                echo json_encode($result->fetch_assoc());
            } else {
                echo json_encode(['error' => $con->error]);
            }
            break;

        case 'upd_contact':
            $address = $con->real_escape_string($_POST['address']);
            $gmap = $con->real_escape_string($_POST['gmap']);
            $pn1 = $con->real_escape_string($_POST['pn1']);
            $pn2 = $con->real_escape_string($_POST['pn2']);
            $email = $con->real_escape_string($_POST['email']);
            $fb = $con->real_escape_string($_POST['fb']);
            $insta = $con->real_escape_string($_POST['insta']);
            $tw = $con->real_escape_string($_POST['tw']);
            $iframe = $con->real_escape_string($_POST['iframe']);

            $sql = "UPDATE contact_details SET addressVal='$address', gmap='$gmap', pn1='$pn1', pn2='$pn2', email='$email', fb='$fb', insta='$insta', tw='$tw', iframe='$iframe' WHERE sr_no=1";
            if ($con->query($sql)) {
                echo 1;
            } else {
                echo json_encode(['error' => $con->error]);
            }
            break;

        case 'add_member':
            $name = $con->real_escape_string($_POST['name']);
            $picture = $_FILES['picture'];

            // Call the uploadImage function
            $imageUploadResult = uploadImage($picture, 'about/');

            if ($imageUploadResult === 'inv_img') {
                echo json_encode(['success' => false, 'message' => 'Please choose a valid extension: JPG, JPEG, PNG, or WEBP']);
            } elseif ($imageUploadResult === 'inv_size') {
                echo json_encode(['success' => false, 'message' => 'Image size should be between 0-2 MB']);
            } elseif ($imageUploadResult === 'upd failed') {
                echo json_encode(['success' => false, 'message' => 'Failed to upload image']);
            } else {
                // Image upload successful
                $pictureName = $imageUploadResult;
                $sql = "INSERT INTO team_details (name, picture) VALUES ('$name', '$pictureName')";
                if ($con->query($sql)) {
                    echo json_encode(['success' => true, 'message' => 'Member added']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to add member: ' . $con->error]);
                }
            }
            break;

        case 'get_member':
            $sql = "SELECT sr_no, name, picture FROM team_details";
            $result = $con->query($sql);
            if ($result) {
                $team_data = '';
                $path = ABOUT_IMG_PATH;  // Define the path here to use in the HTML
                while ($row = $result->fetch_assoc()) {
                    $sr_no = $row['sr_no'];
                    $name = $row['name'];
                    $picture = $row['picture'];

                    $team_data .= '
                        <div class="col-md-2 mb-3">
                            <div class="card bg-dark text-white">
                                <img src="' . $path . $picture . '" class="card-img">
                                <div class="card-img-overlay text-end">
                                    <button class="btn btn-danger btn-sm shadow-none" type="button" onclick="remove_mem(' . $sr_no . ')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </div>
                                <p class="card-text text-center px-3 py-2">' . $name . '</p>
                            </div>
                        </div>';
                }
                echo $team_data;
            } else {
                echo json_encode(['error' => $con->error]);
            }
            break;



        case 'rem_mem':
            $sr_no = (int) $_POST['value'];

            // Fetch the picture path from the database
            $sql = "SELECT picture FROM team_details WHERE sr_no=$sr_no";
            $result = $con->query($sql);

            if ($result && $row = $result->fetch_assoc()) {
                $picture = $row['picture'];

                // Delete the team member from the database
                $sql = "DELETE FROM team_details WHERE sr_no=$sr_no";
                if ($con->query($sql)) {
                    // Unlink the image file from the server
                    $file_path = ABOUT_IMG_PATH . $picture;
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }

                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to remove member from the database: ' . $con->error]);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Member not found']);
            }
            break;

    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'get_general') {
    // Fetch general settings
    $sql = "SELECT site_title, site_about, shutdownVal FROM settings WHERE sr_no=1"; // Added WHERE clause to ensure we get data
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode([
            'site_title' => $row['site_title'],
            'site_about' => $row['site_about'],
            'shutdown' => $row['shutdownVal']  // Added shutdown field
        ]);
    } else {
        echo json_encode(['error' => 'No settings found']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}

$con->close();
?>