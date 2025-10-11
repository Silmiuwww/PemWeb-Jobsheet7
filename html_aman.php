<!DOCTYPE html>
<html>
<head>
    <title>Form Input Aman</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .error { color: red; }
        .success { color: green; }
        label { font-weight: bold; }
    </style>
</head>
<body>
    <h2>Form Input Aman dengan PHP</h2>

    <form method="post" action="">
        <label for="input">Masukkan pesan:</label><br>
        <input type="text" name="input" id="input" required><br><br>

        <label for="email">Masukkan email:</label><br>
        <input type="text" name="email" id="email" required><br><br>

        <input type="submit" value="Kirim">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $input = isset($_POST['input']) ? $_POST['input'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';

        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<h3 class='success'>Hasil Input:</h3>";
            echo "<p><strong>Pesan:</strong> $input</p>";
            echo "<p><strong>Email:</strong> $email</p>";
        } else {
            echo "<p class='error'>Format email tidak valid. Silakan coba lagi.</p>";
        }
    }
    ?>
</body>
</html>