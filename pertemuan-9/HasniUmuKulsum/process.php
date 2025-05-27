<?php
require_once 'koneksi.php';

$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? 0;

if ($action == 'create') {
    $nama_produk = $_POST['nama_produk'] ?? '';
    $harga = $_POST['harga'] ?? '';
    $harga_awal = $_POST['harga_awal'] ?? '';
    $lokasi = $_POST['lokasi'] ?? '';
    $pengiriman = $_POST['pengiriman'] ?? '';

    $sql = "INSERT INTO produk (nama_produk, harga, harga_awal, lokasi, pengiriman) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nama_produk, $harga, $harga_awal, $lokasi, $pengiriman);

    if ($stmt->execute()) {
        header("Location: index.php?message=Data produk berhasil ditambahkan");
    } else {
        header("Location: index.php?error=" . urlencode("Gagal menambahkan data produk: " . $stmt->error));
    }

    $stmt->close();

} elseif ($action == 'update') {
    $nama_produk = $_POST['nama_produk'] ?? '';
    $harga = $_POST['harga'] ?? '';
    $harga_awal = $_POST['harga_awal'] ?? '';
    $lokasi = $_POST['lokasi'] ?? '';
    $pengiriman = $_POST['pengiriman'] ?? '';

    $sql = "UPDATE produk SET nama_produk = ?, harga = ?, harga_awal = ?, lokasi = ?, pengiriman = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $nama_produk, $harga, $harga_awal, $lokasi, $pengiriman, $id);

    if ($stmt->execute()) {
        header("Location: index.php?message=Data produk berhasil diupdate");
    } else {
        header("Location: index.php?error=" . urlencode("Gagal mengupdate data produk: " . $stmt->error));
    }

    $stmt->close();

} elseif ($action == 'delete') {
    $sql = "DELETE FROM produk WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?message=Data produk berhasil dihapus");
    } else {
        header("Location: index.php?error=" . urlencode("Gagal menghapus data produk: " . $stmt->error));
    }

    $stmt->close();
}

$conn->close();
?>