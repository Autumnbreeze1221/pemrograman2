<?php
$conn = mysqli_connect("localhost", "root", "", "lat_dbase");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$pesan = "";

if (isset($_POST['simpan'])) {
    $tgl_input = $_POST['tgl_input'];
    $kode = strtoupper(trim($_POST['kode']));
    $nama = trim($_POST['nama']);
    $jk = $_POST['jk'];
    $asal_sekolah = trim($_POST['asal_sekolah']);
    $pekerjaan_ortu = trim($_POST['pekerjaan_ortu']);
    $tempat_lahir = trim($_POST['tempat_lahir']);
    $tgl_lahir = $_POST['tgl_lahir'];
    $mat = (int) $_POST['mat'];
    $bing = (int) $_POST['bing'];
    $umum = (int) $_POST['umum'];

    $rata = ($mat + $bing + $umum) / 3;

    if ($rata >= 70) {
        $keterangan = "Lulus";
    } elseif ($rata >= 60) {
        $keterangan = "Cadangan";
    } else {
        $keterangan = "Tidak Lulus";
    }

    $kode_awal = substr($kode, 0, 1);

    if ($kode_awal == "A") {
        $tempat_tes = "Gedung A";
    } elseif ($kode_awal == "B") {
        $tempat_tes = "Gedung B";
    } elseif ($kode_awal == "V") {
        $tempat_tes = "Viktor";
    } else {
        $tempat_tes = "Tidak Diketahui";
    }

    $sql = "INSERT INTO calon_mhs (
        tgl_input, kode, nama, jk, asal_sekolah,
        pekerjaan_ortu, tempat_lahir, tgl_lahir,
        mat, bing, umum, rata_rata, keterangan, tempat_tes
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param(
            $stmt,
            "ssssssssiiidss",
            $tgl_input,
            $kode,
            $nama,
            $jk,
            $asal_sekolah,
            $pekerjaan_ortu,
            $tempat_lahir,
            $tgl_lahir,
            $mat,
            $bing,
            $umum,
            $rata,
            $keterangan,
            $tempat_tes
        );

        if (mysqli_stmt_execute($stmt)) {
            $pesan = "Data berhasil disimpan!";
        } else {
            $pesan = "Gagal menyimpan data: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        $pesan = "Gagal menyiapkan query: " . mysqli_error($conn);
    }
}

$query = mysqli_query($conn, "SELECT * FROM calon_mhs ORDER BY id DESC");

if (!$query) {
    die("Gagal mengambil data: " . mysqli_error($conn));
}

$data_pendaftar = [];
$jumlah_pendaftar = 0;
$jumlah_lulus = 0;
$jumlah_cadangan = 0;
$jumlah_tidak_lulus = 0;

while ($row = mysqli_fetch_assoc($query)) {
    $data_pendaftar[] = $row;
    $jumlah_pendaftar++;

    if ($row['keterangan'] == "Lulus") {
        $jumlah_lulus++;
    } elseif ($row['keterangan'] == "Cadangan") {
        $jumlah_cadangan++;
    } elseif ($row['keterangan'] == "Tidak Lulus") {
        $jumlah_tidak_lulus++;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS PHP - Pendaftaran Mahasiswa</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 30px;
            background: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 12px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        input[type=text],
        input[type=number],
        input[type=date] {
            width: 100%;
            box-sizing: border-box;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .btn {
            background: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn:hover {
            background: darkblue;
        }

        .info {
            margin-top: 20px;
            padding: 10px;
            background: #eef;
        }

        .pesan {
            margin-top: 15px;
            padding: 12px;
            background: #e4f7e7;
            border: 1px solid #80c98b;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        @media (max-width: 600px) {
            body {
                margin: 10px;
            }

            .container {
                padding: 12px;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <h2>FORM PENDAFTARAN MAHASISWA BARU</h2>

    <form method="POST">
        <label>Tanggal Input</label>
        <input type="date" name="tgl_input" required>

        <label>Kode Pendaftaran</label>
        <input type="text" name="kode" placeholder="Contoh: A2" required>

        <label>Nama Pendaftar</label>
        <input type="text" name="nama" required>

        <label>Jenis Kelamin</label>
        <input type="radio" name="jk" value="Laki-Laki" required> Laki-Laki
        <input type="radio" name="jk" value="Perempuan"> Perempuan

        <br><br>

        <label>Asal Sekolah</label>
        <input type="text" name="asal_sekolah" required>

        <label>Pekerjaan Orang Tua</label>
        <input type="text" name="pekerjaan_ortu" required>

        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" required>

        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" required>

        <label>Matematika</label>
        <input type="number" name="mat" min="0" max="100" required>

        <label>Bahasa Inggris</label>
        <input type="number" name="bing" min="0" max="100" required>

        <label>Umum</label>
        <input type="number" name="umum" min="0" max="100" required>

        <button type="submit" name="simpan" class="btn">SIMPAN</button>
    </form>

    <?php if ($pesan != "") { ?>
        <div class="pesan">
            <?= htmlspecialchars($pesan) ?>
        </div>
    <?php } ?>

    <h2>DATA PENDAFTAR MAHASISWA</h2>

    <div class="table-wrapper">
        <table>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Tgl Lahir</th>
                <th>Asal Sekolah</th>
                <th>Pekerjaan Ortu</th>
                <th>Tempat Tes</th>
                <th>MAT</th>
                <th>B. Inggris</th>
                <th>Umum</th>
                <th>Rata-rata</th>
                <th>Keterangan</th>
            </tr>

            <?php if (count($data_pendaftar) > 0) { ?>
                <?php foreach ($data_pendaftar as $row) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['kode']) ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['jk']) ?></td>
                        <td>
                            <?= htmlspecialchars($row['tempat_lahir']) ?>,
                            <?= htmlspecialchars($row['tgl_lahir']) ?>
                        </td>
                        <td><?= htmlspecialchars($row['asal_sekolah']) ?></td>
                        <td><?= htmlspecialchars($row['pekerjaan_ortu']) ?></td>
                        <td><?= htmlspecialchars($row['tempat_tes']) ?></td>
                        <td><?= htmlspecialchars($row['mat']) ?></td>
                        <td><?= htmlspecialchars($row['bing']) ?></td>
                        <td><?= htmlspecialchars($row['umum']) ?></td>
                        <td><?= number_format((float)$row['rata_rata'], 2) ?></td>
                        <td><?= htmlspecialchars($row['keterangan']) ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="12">Belum ada data pendaftar.</td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <div class="info">
        <h3>Rekap Data:</h3>
        <p>Jumlah Pendaftar: <b><?= $jumlah_pendaftar ?></b></p>
        <p>Jumlah Peserta Lulus: <b><?= $jumlah_lulus ?></b></p>
        <p>Jumlah Peserta Cadangan: <b><?= $jumlah_cadangan ?></b></p>
        <p>Jumlah Tidak Lulus: <b><?= $jumlah_tidak_lulus ?></b></p>
    </div>

    <div class="info">
        <h3>Keterangan:</h3>
        <p><b>Kode Tempat Tes:</b></p>
        <ul>
            <li>A = Gedung A</li>
            <li>B = Gedung B</li>
            <li>V = Viktor</li>
        </ul>

        <p><b>Hasil Seleksi:</b></p>
        <ul>
            <li>Rata-rata ≥ 70 = Lulus</li>
            <li>Rata-rata 60 sampai kurang dari 70 = Cadangan</li>
            <li>Rata-rata &lt; 60 = Tidak Lulus</li>
        </ul>
    </div>

</div>

</body>
</html>