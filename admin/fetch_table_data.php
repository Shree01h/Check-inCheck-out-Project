<?php
require ('inc/db_config.php');

if (isset($_GET['table'])) {
    $table = $_GET['table'];
    $query = "SELECT * FROM $table";
    $result = mysqli_query($con, $query);

    echo "<h3 class='mt-4'>Data from table: $table</h3>";
    echo "<table class='table table-bordered'>";
    echo "<thead>";
    $columns = [];
    while ($fieldinfo = mysqli_fetch_field($result)) {
        echo "<th>{$fieldinfo->name}</th>";
        $columns[] = $fieldinfo->name;
    }
    echo "</thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($columns as $column) {
            echo "<td>{$row[$column]}</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
?>