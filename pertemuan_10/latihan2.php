<?php
$link = mysqli_connect("localhost", "root", "");
$dbname = "lat_dbase";

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$cek = mysqli_query($link, $sql);

if ($cek) {
    echo "Database $dbname berhasil dibuat";
} else {
    echo "Couldn't Create Database: " . mysqli_error($link);
}

mysqli_close($link);
?>