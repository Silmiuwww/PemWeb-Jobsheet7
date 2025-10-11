<!DOCTYPE html>
<html>
<head>
    <title>Form Input Aman</title>
</head>
<body>
    <h2>Form Input Aman dengan PHP</h2>

    <form method="post" action="">
        <label for="input">Masukkan pesan:</label><br>
        <input type="text" name="input" id="input" required><br><br>
        <input type="submit" value="Kirim">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['input'];
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

        echo "<h3>Hasil Input:</h3>";
        echo "Anda memasukkan: <strong>" . $input . "</strong>";
    }
    ?>
</body>
</html>