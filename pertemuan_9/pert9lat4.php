<!DOCTYPE html>
<html>
<head>
    <title>Latihan Tanggal</title>
</head>
<body>
    <div style="font-size: 20px;">
        <?php
        // Menampilkan tanggal dalam format: dd-NamaBulan-YYYY
        echo "Sekarang tanggal: " . date('d-F-Y') . "<br>";
        
        // Menampilkan jam dalam format: hh:mm:ss AM/PM
        echo "dan jam: " . date('h:i:s A');
        ?>
    </div>
</body>
</html>