<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "form_validasi";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

function clean_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = clean_input($_POST['nama']);
    $kelas = clean_input($_POST['kelas']);
    $agama = clean_input($_POST['agama']);
    $pesan = clean_input($_POST['pesan']);
    $umur = clean_input($_POST['umur']);

    if (!is_numeric($umur) || $umur <= 0) {
        $_SESSION['error'] = "Umur harus berupa angka yang valid.";
        header("Location: index.php");
        exit;
    }

    if (isset($_POST['hobi']) && is_array($_POST['hobi'])) {
        $hobi_array = array_map('clean_input', $_POST['hobi']);
        $hobi = implode(",", $hobi_array);
    } else {
        $hobi = "";
    }

    if (empty($nama) || empty($kelas) || empty($agama) || empty($pesan) || empty($umur)) {
        $_SESSION['error'] = "Semua field wajib diisi.";
        header("Location: index.php");
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO form_data (nama, kelas, hobi, agama, pesan, umur) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $nama, $kelas, $hobi, $agama, $pesan, $umur);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Data berhasil disimpan!";
    } else {
        $_SESSION['error'] = "Gagal menyimpan data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit;
} else {
    header("Location: index.php");
    exit;
}
