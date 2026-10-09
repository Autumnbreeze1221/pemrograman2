<?php
function repeat(string $text, int $num = 10): void
{
    echo "<ol>\r\n";
    for ($i = 0; $i < $num; $i++) {
        // Menggunakan htmlspecialchars untuk keamanan dari XSS jika teks berasal dari input user
        echo "  <li>" . htmlspecialchars($text) . "</li>\r\n";
    }
    echo "</ol>\r\n";
}

// Memanggil fungsi repeat dengan dua argumen
repeat("I'm the best", 15);

// Memanggil fungsi repeat dengan satu argumen (default $num = 10)
repeat("You're the man");
?>