<form method="post" action="">
    <label for="text">Masukkan teks:</label><br>
    <input type="text" name="text" id="text" required><br><br>
    <input type="submit" value="Analisis">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = isset($_POST['text']) ? $_POST['text'] : '';
    $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

    $patternHurufKecil = '/[a-z]/'; 
    $hasilHurufKecil = preg_match($patternHurufKecil, $text) ? "Huruf kecil ditemukan!" : "✘ Tidak ada huruf kecil!";

    $patternAngka = '/[0-9]+/';
    $hasilAngka = preg_match($patternAngka, $text, $matchesAngka) ? "Cocokkan: " . $matchesAngka[0] : "Tidak ada yang cocok!";

    $patternGanti = '/apple/';
    $replacement = 'banana';
    $textDiganti = preg_replace($patternGanti, $replacement, $text);

    $patternGod = "/go*d/"; 
    $hasilGod = preg_match($patternGod, $text, $matchesGod) ? "Cocokkan: " . $matchesGod[0] : "Tidak ada yang cocok!";

    $patternOMinMax = "/o{2,4}/";
    $hasilOMinMax = preg_match($patternOMinMax, $text, $matchesOMinMax) ? "Cocokkan 'o' 2–4 kali: " . $matchesOMinMax[0] : "Tidak ada yang cocok dengan pola 'o{2,4}'!";

    echo "<div class='hasil'>";
    echo "<strong>Hasil Analisis:</strong><br><br>";
    echo "$hasilHurufKecil<br>";
    echo "$hasilAngka<br>";
    echo "$hasilGod<br>";
    echo "$hasilOMinMax<br><br>";
    echo "<strong>Teks setelah penggantian kata:</strong><br>";
    echo "<span class='highlight'>$textDiganti</span>";
    echo "</div>";
}
?>