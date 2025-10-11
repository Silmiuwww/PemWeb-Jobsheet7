<!DOCTYPE html>
<html>
<head>
    <title>Deteksi Huruf Kecil dan Angka</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        label { font-weight: bold; }
        .hasil { margin-top: 20px; padding: 10px; border: 1px solid #ccc; background: #f9f9f9; }
    </style>
</head>
<body>
    <h2>Deteksi Huruf Kecil dan Angka dalam Teks</h2>

    <form method="post" action="">
        <label for="text">Masukkan teks:</label><br>
        <input type="text" name="text" id="text" required><br><br>
        <input type="submit" value="Cek Teks">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = isset($_POST['text']) ? $_POST['text'] : '';
        $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

        $hurufKecil = '/[a-z]/';
        $angka = '/[0-9]+/';

        echo "<div class='hasil'>";
        echo "<strong>Hasil Analisis:</strong><br>";

        if (preg_match($hurufKecil, $text)) {
            echo "Huruf kecil ditemukan.<br>";
        } else {
            echo "Tidak ada huruf kecil.<br>";
        }

        if (preg_match($angka, $text, $matches)) {
            echo "Angka ditemukan: " . $matches[0] . "<br>";
        } else {
            echo "Tidak ada angka.<br>";
        }

        echo "</div>";
    }
    ?>
</body>
</html>