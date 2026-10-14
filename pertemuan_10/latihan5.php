<?php
$link = mysqli_connect("localhost", "root", "", "lat_dbase");

$hasil = mysqli_query($link, "SELECT * FROM tbl_mhs");

while ($data = mysqli_fetch_row($hasil)) {
    // Pengaksesan menggunakan index angka: [0] ID, [1] FirstName, [2] LastName, [3] Age
    echo "$data[0] $data[1] $data[2] $data[3]<br>";
}

mysqli_close($link);
?>