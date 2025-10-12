<!DOCTYPE html>
<html>
<head>
    <title>Contoh Form dengan PHP dan jQuery</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Form Contoh</h2>
    <form id="myform">
        <label>Nama:</label>
        <input type="text" name="nama" />
        <br>

        <label>Pilih Buah:</label>
        <select name="buah">
            <option value="apel">Apel</option>
            <option value="pisang">Pisang</option>
            <option value="mangga">Mangga</option>
            <option value="jeruk">Jeruk</option>
        </select>
        <br>

        <label>Pilih Warna Favorit:</label>
        <input type="checkbox" name="warna[]" value="merah"> Merah
        <input type="checkbox" name="warna[]" value="biru"> Biru
        <input type="checkbox" name="warna[]" value="hijau"> Hijau
        <br>

        <label>Pilih Jenis Kelamin:</label>
        <input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki
        <input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan
        <br>

        <input type="submit" value="Kirim">
        
        <br><br>
    </form>

    <div id="hasil">
      
    </div>

    <script>
    $(document).ready(function () {
        $("#myform").submit(function (e) {
            e.preventDefault(); 
            var formData = $("#myform").serialize();

            $.ajax({
                type: "POST",
                url: "proses_lanjut.php", 
                data: formData,
                success: function (response) {
                    $("#hasil").html(response);
                }
            });
        });
    });
    </script>
</body>
</html>