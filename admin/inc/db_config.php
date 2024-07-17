<?php

$host = "localhost";
$port = 3306;
$socket = "";
$user = "root";
$password = "@shab123#";
$dbname = "hotel";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

function filteration($data)
{
    foreach ($data as $key => $value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $value = strip_tags($value);
        $data[$key] = $value;
    }
    return $data;
}

// Select all data from the database
function selectall($table)
{
    $con = $GLOBALS['con'];
    $res = mysqli_query($con, "SELECT * FROM $table");
    return $res;
}

// Selection of data from the database using parameters
function select($sql, $values, $datatypes)
{
    $con = $GLOBALS['con']; // making connection global
    if ($stmt = mysqli_prepare($con, $sql)) { // prepare statement
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values); // binding parameters to prepared query
        if (mysqli_stmt_execute($stmt)) { // execute query
            $res = mysqli_stmt_get_result($stmt); // getting result from executing query
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Select");
        }
    } else {
        die("Query cannot be prepared - Select");
    }
}

function update($sql, $values, $datatypes)
{
    $con = $GLOBALS['con']; // making connection global
    if ($stmt = mysqli_prepare($con, $sql)) { // prepare statement
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values); // binding parameters to prepared query
        if (mysqli_stmt_execute($stmt)) { // execute query
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            die("Query cannot be executed - Update");
        }
    } else {
        die("Query cannot be prepared - Update");
    }
}

function insert($sql, $values, $datatypes)
{
    $con = $GLOBALS['con']; // making connection global
    if ($stmt = mysqli_prepare($con, $sql)) { // prepare statement
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values); // binding parameters to prepared query
        if (mysqli_stmt_execute($stmt)) { // execute query
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            die("Query cannot be executed - Insert");
        }
    } else {
        die("Query cannot be prepared - Insert");
    }
}

function delete($sql, $values, $datatypes)
{
    $con = $GLOBALS['con']; // making connection global
    if ($stmt = mysqli_prepare($con, $sql)) { // prepare statement
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values); // binding parameters to prepared query
        if (mysqli_stmt_execute($stmt)) { // execute query
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            die("Query cannot be executed - Delete");
        }
    } else {
        die("Query cannot be prepared - Delete");
    }
}

?>
