<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Form Input dengan Validasi</h2>
    <form id="form">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br>
        <span id="nama-error" style="color: red"></span><br><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email"><br>
        <span id="email-error" style="color: red"></span><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>
        <span id="password-error" style="color: red"></span><br><br>

        <input type="submit" value="Submit">
    </form>

    <div id="hasil" style="margin-top: 20px;"></div>

    <script>
        $(document).ready(function() {
            $("#form").submit(function(event) {
                event.preventDefault();

                var nama = $("#nama").val().trim();
                var email = $("#email").val().trim();
                var password = $("#password").val().trim();
                var valid = true;

                $("#nama-error").text("");
                $("#email-error").text("");
                $("#password-error").text("");

                if (nama === "") {
                    $("#nama-error").text("Nama harus diisi.");
                    valid = false;
                }

                if (email === "") {
                    $("#email-error").text("Email harus diisi.");
                    valid = false;
                }

                if (password.length < 8) {
                    $("#password-error").text("Password minimal 8 karakter.");
                    valid = false;
                }

                if (valid) {
                    $.ajax({
                        type: "POST",
                        url: "proses_validasi.php",
                        data: { nama: nama, email: email, password: password },
                        success: function(response) {
                            $("#hasil").html(response);
                        },
                        error: function() {
                            $("#hasil").html("<span style='color:red'>Terjadi kesalahan saat mengirim data.</span>");
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>