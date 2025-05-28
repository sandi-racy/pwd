<?php
session_start();
require_once 'koneksi.php';

$nama = htmlspecialchars($_POST['nama']);
$umur = filter_var($_POST['umur'], FILTER_VALIDATE_INT);
$gender = $_POST['jk'] ?? '';
$pekerjaan = $_POST['pekerjaan'] ?? '';
$negara = $_POST['negara'] ?? '';
$hobi = isset($_POST['hobi']) ? implode(", ", $_POST['hobi']) : '';
$komentar = htmlspecialchars($_POST['komentar']); 
$setuju = isset($_POST['setuju']) ? 1 : 0;

if (empty($nama) || !$umur || empty($gender) || empty($pekerjaan) || !$setuju) {
    $_SESSION['flash'] = "Semua field wajib diisi dengan benar.";
    header("Location: form.php");
    exit;
}

$stmt = $conn->prepare("INSERT INTO form_validasi (nama, umur, gender, pekerjaan, negara, hobi, komentar, setuju) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sisssssi", $nama, $umur, $gender, $pekerjaan, $negara, $hobi, $komentar, $setuju);
$stmt->execute();

$_SESSION['flash'] = "Data berhasil disimpan!";
header("Location: form.php");
exit;
