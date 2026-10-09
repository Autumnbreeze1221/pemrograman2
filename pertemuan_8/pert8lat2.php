<!DOCTYPE html>
<html>
<head>
    <title>Contoh Penggunaan UDF</title>
</head>
<body>

    <!-- Menentukan Form Input -->
    <form method="POST" action="">
        Masukkan Bilangan Pertama : <br>
        <input type="text" name="A" size="10"> <br>
        Masukkan Bilangan Kedua : <br>
        <input type="text" name="B" size="10"> <br>
        <input type="submit" value="Hitung">
    </form>

    <!-- Membandingkan 2 buah bilangan yang diinput -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil input dari form dan menangani variabel case-sensitivity
        $A = isset($_POST["A"]) ? floatval($_POST["A"]) : 0;
        $B = isset($_POST["B"]) ? floatval($_POST["B"]) : 0;

        // Deklarasi User Defined Function (UDF)
        function jumlah($a, $b) {
            return $a + $b;
        }

        function kurang($a, $b) {
            return $a - $b;
        }

        function kali($a, $b) {
            return $a * $b;
        }

        function bagi($a, $b) {
            if ($b == 0) {
                return "Tidak dapat dibagi dengan nol";
            }
            return $a / $b;
        }

        echo "<br>";
        echo "Bilangan Pertama : " . $A;
        echo "<br>";
        echo "Bilangan Kedua : " . $B;
        echo "<br><br>";

        echo "Hasil Penjumlahan 2 buah bilangan<br>";
        $jumlahbil = jumlah($A, $B);
        printf("Penjumlahan antara : %.2f + %.2f = %.2f", $A, $B, $jumlahbil);
        echo "<br><br>";

        echo "Hasil Pengurangan 2 buah bilangan<br>";
        $kurangbil = kurang($A, $B);
        printf("Pengurangan antara : %.2f - %.2f = %.2f", $A, $B, $kurangbil);
        echo "<br><br>";

        echo "Hasil Perkalian 2 buah bilangan<br>";
        $kalibil = kali($A, $B);
        printf("Perkalian antara : %.2f * %.2f = %.2f", $A, $B, $kalibil);
        echo "<br><br>";

        echo "Hasil Pembagian 2 buah bilangan<br>";
        $bagibil = bagi($A, $B);
        if (is_numeric($bagibil)) {
            printf("Pembagian antara : %.2f / %.2f = %.2f", $A, $B, $bagibil);
        } else {
            echo $bagibil;
        }
        echo "<br><br>";
    }
    ?>

</body>
</html>