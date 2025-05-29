<?php
session_start(); 

$host = "localhost";
$db = "pwd"; 
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nama_produk = htmlspecialchars(trim($_POST['nama_produk'] ?? ''));
    $kategori = htmlspecialchars(trim($_POST['kategori'] ?? ''));
    $fitur = $_POST['fitur'] ?? []; 
    $kondisi = htmlspecialchars(trim($_POST['kondisi'] ?? ''));
    $deskripsi = htmlspecialchars(trim($_POST['deskripsi'] ?? ''));

    $errors = []; 

    if (empty($nama_produk)) {
        $errors[] = "Nama Produk harus diisi!";
    }

    if (empty($kategori)) {
        $errors[] = "Kategori harus dipilih!";
    }
    if (empty($fitur)) {
        $errors[] = "Fitur Tambahan harus dipilih minimal satu!";
    }
    if (empty($kondisi)) {
        $errors[] = "Kondisi harus dipilih!";
    }
    if (empty($deskripsi)) {
        $errors[] = "Deskripsi Produk harus diisi!";
    }
    if (!is_array($fitur)) {
        $fitur = []; 
    }
    $fitur_str = implode(', ', $fitur); 

    if (!empty($errors)) {
        $_SESSION['error'] = implode('<br>', $errors); 
        header("Location: index.php");
        exit;
    }

    $sql = "INSERT INTO form_validasi (nama_produk, kategori, fitur_tambahan, kondisi, deskripsi) VALUES (:nama, :kategori, :fitur, :kondisi, :deskripsi)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nama' => $nama_produk,
        ':kategori' => $kategori,
        ':fitur' => $fitur_str,
        ':kondisi' => $kondisi,
        ':deskripsi' => $deskripsi
    ]);

    $_SESSION['success'] = "Data berhasil disimpan!";
    header("Location: index.php");
    exit;

} catch (PDOException $e) {
    $_SESSION['error'] = "Koneksi / Query Gagal: " . $e->getMessage();
    header("Location: index.php");
    exit;
}
?>