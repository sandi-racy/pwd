<?php
session_start();
if (!isset($_SESSION['user'])) {
    die("Silakan login terlebih dahulu.");
}

$nama = $_POST['nama'] ?? '';
$umur = $_POST['umur'] ?? '';
$pilihan = $_POST['pilihan'] ?? '';
$gender = $_POST['gender'] ?? '';
$setuju = isset($_POST['setuju']) ? 1 : 0;
$komentar = $_POST['komentar'] ?? '';

// Validasi wajib isi
if (empty($nama) || empty($umur) || empty($pilihan) || empty($gender) || empty($komentar)) {
    die("Semua field wajib diisi!");
}

// Validasi umur harus berupa angka bulat positif
if (!filter_var($umur, FILTER_VALIDATE_INT) || $umur < 1) {
    die("Umur harus berupa angka bulat positif!");
}

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "test");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Simpan data
$stmt = $conn->prepare("INSERT INTO form_data (username, nama, umur, pilihan, setuju, gender, komentar) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssissss", $_SESSION['user'], $nama, $umur, $pilihan, $setuju, $gender, $komentar);

if ($stmt->execute()) {
    echo "Data berhasil disimpan!<br><a href='form.php'>Kembali</a>";
} else {
    echo "Gagal menyimpan data!";
}

$stmt->close();
$conn->close();
?>
