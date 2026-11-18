
<?php

include "koneksi.php";

// Cek tombol Submit
if (isset($_POST['Submit'])) {

    $id_mahasiswa = $_POST['id_mahasiswa'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    // Validasi data kosong
    if (
        empty($id_mahasiswa) ||
        empty($nama) ||
        empty($alamat) ||
        empty($telepon)
    ) {
        echo "<script>
            alert('Data Harap Dilengkapi!');
            window.location='download-script-form-input-data.php';
        </script>";
        exit;
    }

    // Cek NIM di database
    $cek = mysqli_prepare(
        $conn,
        "SELECT id_mahasiswa FROM mahasiswa WHERE id_mahasiswa = ?"
    );

    mysqli_stmt_bind_param($cek, "s", $id_mahasiswa);
    mysqli_stmt_execute($cek);
    mysqli_stmt_store_result($cek);

    if (mysqli_stmt_num_rows($cek) > 0) {
        echo "<script>
            alert('NIM sudah dipakai!, silahkan ganti NIM yang lain');
            window.location='download-script-form-input-data.php';
        </script>";
        exit;
    }

    // Masukkan data ke tabel
    $query = mysqli_prepare(
        $conn,
        "INSERT INTO mahasiswa
        (id_mahasiswa, nama, jurusan, alamat, telepon)
        VALUES (?, ?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $query,
        "sssss",
        $id_mahasiswa,
        $nama,
        $jurusan,
        $alamat,
        $telepon
    );

    if (mysqli_stmt_execute($query)) {
        echo "<script>
            alert('Input Data Mahasiswa Berhasil');
            window.location='download-script-form-input-data.php';
        </script>";
    } else {
        echo "Input Data Mahasiswa Gagal: " .
             mysqli_error($conn);
    }

    mysqli_stmt_close($cek);
    mysqli_stmt_close($query);
    mysqli_close($conn);
}
?>
