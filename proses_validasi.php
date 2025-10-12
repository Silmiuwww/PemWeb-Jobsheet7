<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $errors = array();

    if (empty($nama)) {
        $errors[] = "Nama harus diisi.";
    }

    if (empty($email)) {
        $errors[] = "Email harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    if (empty($password)) {
        $errors[] = "Password harus diisi.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password minimal 8 karakter.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<span style='color:red'>" . htmlspecialchars($error) . "</span><br>";
        }
    } else {
        echo "<strong>Data berhasil dikirim:</strong><br>";
        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Password: " . str_repeat("*", strlen($password)); // tampilkan sebagai bintang
    }
}
?>