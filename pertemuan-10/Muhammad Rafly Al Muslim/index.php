<?php
session_start();

// Untuk contoh awal, simulasikan username tetap
$_SESSION['user'] = 'demo_user';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran</title>
</head>
<body>
    <form method="post" action="submit.php">
        <h2>Formulir Pendaftaran</h2>

        <div>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>
        </div>

        <div>
            <label for="umur">Umur:</label>
            <input type="number" name="umur" id="umur" required min="1">
        </div>

        <div>
            <label for="pilihan">Kelas:</label>
            <select name="pilihan" id="pilihan" required>
                <option value="">-- Pilih Kelas --</option>
                <option value="A">Kelas A</option>
                <option value="B">Kelas B</option>
            </select>
        </div>

        <div>
            <label>Gender:</label>
            <label><input type="radio" name="gender" value="Pria" required> Pria</label>
            <label><input type="radio" name="gender" value="Wanita" required> Wanita</label>
        </div>

        <div>
            <label><input type="checkbox" name="setuju" value="1" required> Saya setuju dengan syarat dan ketentuan</label>
        </div>

        <div>
            <label for="komentar">Komentar:</label>
            <textarea name="komentar" id="komentar" rows="4" required></textarea>
        </div>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>
