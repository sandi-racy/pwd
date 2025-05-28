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

<form action="validasi.php" method="POST">
    <div class="form-group">
        <label>Nama:</label>
        <input type="text" name="nama" required>
    </div>

    <div class="form-group">
        <label>Umur:</label>
        <input type="number" name="umur" required>
    </div>

    <div class="form-group">
        <label>Jenis Kelamin:</label>
        <label><input type="radio" name="jk" value="Laki-laki"> Laki-laki</label>
        <label><input type="radio" name="jk" value="Perempuan"> Perempuan</label>
    </div>

    <div class="form-group">
        <label>Pekerjaan:</label>
        <select name="pekerjaan" required>
            <option value="">-- Pilih --</option>
            <option value="Pelajar">Pelajar</option>
            <option value="Mahasiswa">Mahasiswa</option>
            <option value="Pekerja">Pekerja</option>
        </select>
    </div>

    <div class="form-group">
        <label>Negara:</label>
        <select name="negara">
            <option value="Indonesia">Indonesia</option>
            <option value="Malaysia">Korea</option>
            <option value="Singapura">Jepang</option>
        </select>
    </div>

    <div class="form-group">
        <label>Hobi:</label>
        <label><input type="checkbox" name="hobi[]" value="Membaca"> Membaca</label>
        <label><input type="checkbox" name="hobi[]" value="Menulis"> Menulis</label>
        <label><input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga</label>
    </div>

    <div class="form-group full-width">
        <label>Komentar:</label>
        <textarea name="komentar"></textarea>
    </div>

    <div class="form-group full-width">
        <label><input type="checkbox" name="setuju" value="1"> Saya menyetujui syarat dan ketentuan</label>
    </div>

    <div class="button-container">
        <button type="submit">Submit</button>
    </div>
</form>

</body>
</html>
