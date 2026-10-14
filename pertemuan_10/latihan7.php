<?php
$link = mysqli_connect("localhost", "root", "", "lat_dbase");

$hasil = mysqli_query($link, "SELECT * FROM tbl_mhs");
$hit = mysqli_num_rows($hasil);

echo "Jumlah record: $hit";

mysqli_close($link);
?>