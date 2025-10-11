<!DOCTYPE html>
<html>
<head>
    <title>Analisis Teks dengan Regex</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        label { font-weight: bold; }
        .hasil { margin-top: 20px; padding: 15px; border: 1px solid #ccc; background: #f9f9f9; }
        .highlight { color: green; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Form Analisis Teks dengan PHP dan Regex</h2>

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

        echo "<div class='hasil'>";
        echo "<strong>Hasil Analisis:</strong><br><br>";
        echo "$hasilHurufKecil<br>";
        echo "$hasilAngka<br>";
        echo "$hasilGod<br><br>";
        echo "<strong>Teks setelah penggantian kata:</strong><br>";
        echo "<span class='highlight'>$textDiganti</span>";
        echo "</div>";
    }
    ?>
</body>
</html>