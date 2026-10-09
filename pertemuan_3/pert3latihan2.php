<!DOCTYPE html>
<html>
<head>
    <title>Contoh Penggunaan IF</title>
</head>
<body>

    <form method="POST" action="">
        Besar Pembelian : 
        <input type="text" name="total_beli">
        <br><br>
        <input type="submit" value="Tentukan Diskon">
    </form>

    <?php
    if (isset($_POST['total_beli'])) {
        $total_beli = intval($_POST['total_beli']);
        $diskon = 0;

        if ($total_beli >= 200000) {
            $diskon = 0.1;
        } elseif ($total_beli >= 100000) {
            $diskon = 0.05;
        } else {
            $diskon = 0.01;
        }

        $jumlah_diskon = $diskon * $total_beli;
        $total_bayar = $total_beli - $jumlah_diskon;

        echo "<br>";
        printf("Diskon = Rp %s <br>\n", number_format($jumlah_diskon, 0, ',', '.'));
        printf("Pembayaran = Rp %s <br>\n", number_format($total_bayar, 0, ',', '.'));
    }
    ?>

</body>
</html>