<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Input</title>
</head>
<body>
    <h2>Form Data (User: <?= htmlspecialchars($_SESSION['user']) ?>)</h2>
    <form method="post" action="simpan.php">
        Nama: <input type="text" name="nama" required><br><br>

        Umur: <input type="number" name="umur" required min="1"><br><br>

        Kelas:
        <select name="pilihan" required>
            <option value="">-- Kelas --</option>
            <option value="A">Kelas A</option>
            <option value="B">Kelas B</option>
        </select><br><br>

        Gender:
        <input type="radio" name="gender" value="Pria" required> Pria
        <input type="radio" name="gender" value="Wanita" required> Wanita<br><br>

        <label><input type="checkbox" name="setuju" value="1" required> Saya Setuju</label><br><br>

        Komentar:<br>
        <textarea name="komentar" rows="4" cols="40" required></textarea><br><br>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>
