<?php
$con = mysqli_connect("localhost", "root", "", "lat_dbase");

if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "DELETE FROM tbl_mhs WHERE LastName = 'Prabowo'";

if (mysqli_query($con, $query)) {
    if (mysqli_affected_rows($con) > 0) {
        echo "Data dengan LastName Prabowo berhasil dihapus.";
    } else {
        echo "Tidak ada data dengan LastName Prabowo.";
    }
} else {
    echo "Query gagal: " . mysqli_error($con);
}

mysqli_close($con);
?>