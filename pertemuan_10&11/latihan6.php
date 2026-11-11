<?php
$link = mysqli_connect("localhost", "root", "", "lat_dbase");

$hasil = mysqli_query($link, "SELECT * FROM tbl_mhs");

while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
    // Pengaksesan menggunakan nama kolom/field
    echo "$data[FirstName] $data[LastName] $data[Age]<br>";
}

mysqli_close($link);
?>