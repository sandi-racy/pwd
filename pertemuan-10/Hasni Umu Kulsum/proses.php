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

try {
    $stmt = $conn->prepare("INSERT INTO user_form (nama, umur, gender, pekerjaan, negara, hobi, komentar, setuju) VALUES (:nama, :umur, :gender, :pekerjaan, :negara, :hobi, :komentar, :setuju)");
    $stmt->execute([
        ':nama' => $nama,
        ':umur' => $umur,
        ':gender' => $gender,
        ':pekerjaan' => $pekerjaan,
        ':negara' => $negara,
        ':hobi' => $hobi,
        ':komentar' => $komentar,
        '':setuju' => $setuju
    ]);
    $_SESSION['flash'] = "Data berhasil disimpan!";
    header("Location: form.html");
    exit;
} catch (PDOException $e) {
 $_SESSION['flash'] = "Gagal menyimpan data: " . $e->getMessage();
 header("Location: form.html");
 exit;
}
