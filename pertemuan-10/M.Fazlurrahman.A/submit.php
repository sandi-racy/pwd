<?php
session_start();


$produk = htmlspecialchars(trim($_POST['produk']));
$merek = $_POST['produk_select'];
$parian = isset($_POST['parian']) ? $_POST['parian'] : [];
$jenis = isset($_POST['jenis']) ? $_POST['jenis'] : '';
$quantity = htmlspecialchars(trim($_POST['quantity']));
$deskripsi = htmlspecialchars(trim($_POST['deskripsi']));
$email = $_POST['email'];
$error = '';

if ($produk == '') {
    $error = 'Produk harus diisi';
} elseif ($merek == '') {
    $error = 'Merek Harus di isi';
} elseif (empty($parian)) {
    $error = 'Parian harus di isi';
} elseif ($jenis == '') {
    $error = 'Jenis Harus di isi';
} elseif (!filter_var($quantity, FILTER_VALIDATE_INT)) {
    $error = 'Quantity harus bilangan bulat';
} elseif ($deskripsi == '') {
    $error = 'Pesan Harus Di isi';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Email harus benar';
}

if ($error == '') {
    $conn = new mysqli("localhost", "root", "", "test");

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $parian_str = implode(", ", $parian);

    $stmt = $conn->prepare("INSERT INTO validasi_produk (nama_produk, merek, parian, jenis, quantity, pesan, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $produk, $merek, $parian_str, $jenis, $quantity, $deskripsi, $email);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Data berhasil disimpan ke database';
    } else {
        $_SESSION['error'] = 'Gagal menyimpan data: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    $_SESSION['error'] = $error;
}

header('Location: index.php');
exit;
?>
