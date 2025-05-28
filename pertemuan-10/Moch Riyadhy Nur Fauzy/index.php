<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Tugas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php if (isset($_SESSION['flash'])): ?>
    <div class="flash"><?php echo $_SESSION['flash']; unset($_SESSION['flash']); ?></div>
<?php endif; ?>

<form action="proses.php" method="POST">
    <label>Nama:</label>
    <input type="text" name="nama" required>

    <label>Umur:</label>
    <input type="number" name="umur" required>

    <label>Gender:</label><br>
    <input type="radio" name="gender" value="Laki-laki"> Laki-laki
    <input type="radio" name="gender" value="Perempuan"> Perempuan<br><br>

    <label>Pekerjaan:</label>
    <select name="pekerjaan" required>
        <option value="">-- Pilih --</option>
        <option value="Pelajar">Pelajar</option>
        <option value="Mahasiswa">Mahasiswa</option>
        <option value="Pekerja">Pekerja</option>
    </select>

    <label>Negara:</label>
    <select name="negara">
        <option value="Indonesia">Indonesia</option>
        <option value="Malaysia">Malaysia</option>
        <option value="Singapura">Singapura</option>
    </select>

    <label>Hobi:</label><br>
    <input type="checkbox" name="hobi[]" value="Membaca"> Membaca
    <input type="checkbox" name="hobi[]" value="Menulis"> Menulis
    <input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga<br><br>

    <label>Komentar:</label>
    <textarea name="komentar"></textarea>

    <input type="checkbox" name="setuju" value="1"> Saya menyetujui syarat dan ketentuan<br><br>

    <button type="submit">Submit</button>
</form>

</body>
</html>
