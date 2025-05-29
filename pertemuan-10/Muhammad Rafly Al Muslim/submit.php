<?php
session_start();

if (!isset($_SESSION['user'])) {
    die("<div class='error'>User belum login.</div>");
}

$nama = $_POST['nama'] ?? '';
$umur = $_POST['umur'] ?? '';
$pilihan = $_POST['pilihan'] ?? '';
$gender = $_POST['gender'] ?? '';
$setuju = isset($_POST['setuju']) ? 1 : 0;
$komentar = $_POST['komentar'] ?? '';

// Validasi dasar
if (empty($nama) || empty($umur) || empty($pilihan) || empty($gender) || empty($komentar)) {
    die("<div class='error'>Semua field wajib diisi!</div>");
}

if (!filter_var($umur, FILTER_VALIDATE_INT) || $umur < 1) {
    die("<div class='error'>Umur harus berupa angka bulat positif!</div>");
}

// Koneksi dan simpan data
try {
    $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("INSERT INTO form_data (username, nama, umur, pilihan, setuju, gender, komentar)
                           VALUES (:username, :nama, :umur, :pilihan, :setuju, :gender, :komentar)");

    $stmt->execute([
        ':username' => $_SESSION['user'],
        ':nama' => $nama,
        ':umur' => $umur,
        ':pilihan' => $pilihan,
        ':setuju' => $setuju,
        ':gender' => $gender,
        ':komentar' => $komentar
    ]);

    echo "<div class='success'>Data berhasil disimpan!</div>";
    echo "<div><a href='index.php'>Kembali ke Form</a></div>";

} catch (PDOException $e) {
    echo "<div class='error'>Gagal menyimpan data: " . htmlspecialchars($e->getMessage()) . "</div>";
}
?>
