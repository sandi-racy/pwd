<?php
session_start();
require_once 'koneksi.php';

$nama = htmlspecialchars($_POST['nama']);
$umur = filter_var($_POST['umur'], FILTER_VALIDATE_INT);
$gender = $_POST['gender'] ?? '';
$pekerjaan = $_POST['pekerjaan'] ?? '';
$negara = $_POST['negara'] ?? '';
$hobi = isset($_POST['hobi']) ? implode(", ", $_POST['hobi']) : '';
$komentar = htmlspecialchars($_POST['komentar']);
$setuju = isset($_POST['setuju']) ? 1 : 0;

if (empty($nama) || !$umur || empty($gender) || empty($pekerjaan) || !$setuju) {
    $_SESSION['flash'] = "Semua field wajib diisi dengan benar.";
    header("Location: form.html");
    exit;
}

$stmt = $conn->prepare("INSERT INTO user_form (nama, umur, gender, pekerjaan, negara, hobi, komentar, setuju) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sisssssi", $nama, $umur, $gender, $pekerjaan, $negara, $hobi, $komentar, $setuju);
$stmt->execute();

$_SESSION['flash'] = "Data berhasil disimpan!";
header("Location: form.html");
exit;




