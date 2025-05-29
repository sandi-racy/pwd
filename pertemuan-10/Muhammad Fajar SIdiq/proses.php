<?php
session_start();
require_once 'koneksi.php'; 

$errors = [];

$nama = trim($_POST['nama'] ?? '');
$umur = $_POST['umur'] ?? null;
$gender = $_POST['gender'] ?? '';
$pekerjaan = $_POST['pekerjaan'] ?? '';
$negara = $_POST['negara'] ?? '';
$hobi = $_POST['hobi'] ?? [];
$komentar = trim($_POST['komentar'] ?? '');
$setuju = isset($_POST['setuju']) ? 1 : 0;

if (empty($nama)) {
    $errors[] = "Nama wajib diisi.";
} elseif (strlen($nama) > 100) {
    $errors[] = "Nama maksimal 100 karakter.";
}

if (!filter_var($umur, FILTER_VALIDATE_INT) || $umur <= 0) {
    $errors[] = "Umur harus berupa angka positif.";
}

$allowedGenders = ['Laki-laki', 'Perempuan'];
if (!in_array($gender, $allowedGenders)) {
    $errors[] = "Gender tidak valid.";
}

$allowedPekerjaan = ['Pelajar', 'Mahasiswa', 'Pekerja'];
if (!in_array($pekerjaan, $allowedPekerjaan)) {
    $errors[] = "Pekerjaan tidak valid.";
}

if (!empty($negara) && strlen($negara) > 50) {
    $errors[] = "Nama negara maksimal 50 karakter.";
}

if (!is_array($hobi)) {
    $errors[] = "Format hobi tidak valid.";
}
$hobiStr = implode(", ", $hobi);

if (strlen($komentar) > 500) {
    $errors[] = "Komentar maksimal 500 karakter.";
}

if (!$setuju) {
    $errors[] = "Anda harus menyetujui syarat dan ketentuan.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = implode('<br>', $errors);
    header("Location: form.php");
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO user_form (nama, umur, gender, pekerjaan, negara, hobi, komentar, setuju) 
                           VALUES (:nama, :umur, :gender, :pekerjaan, :negara, :hobi, :komentar, :setuju)");
    $stmt->execute([
        ':nama' => htmlspecialchars($nama),
        ':umur' => $umur,
        ':gender' => $gender,
        ':pekerjaan' => $pekerjaan,
        ':negara' => $negara,
        ':hobi' => $hobiStr,
        ':komentar' => htmlspecialchars($komentar),
        ':setuju' => $setuju,
    ]);

    $_SESSION['flash'] = "Data berhasil disimpan!";
    header("Location: form.php");
    exit;

} catch (PDOException $e) {
    $_SESSION['flash'] = "Gagal menyimpan: " . $e->getMessage();
    header("Location: form.php");
    exit;
}
