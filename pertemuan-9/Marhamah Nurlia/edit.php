<?php
session_start();

if (!isset($_SESSION['product'])) {
    header("Location: index.php");
    exit;
}

$product = $_SESSION['product'];

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['product'] = [
        "title" => $_POST['title'],
        "price" => $_POST['price'],
        "old_price" => $_POST['old_price'],
        "discount" => $_POST['discount'],
        "location" => $_POST['location'],
        "date" => $_POST['date']
    ];
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Produk</h2>
    <div class="container">
        <form method="POST">
            <input type="text" name="title" placeholder="Judul produk" value="<?= htmlspecialchars($product['title']) ?>" />
            <input type="text" name="price" placeholder="Harga sekarang" value="<?= htmlspecialchars($product['price']) ?>" />
            <input type="text" name="old_price" placeholder="Harga lama" value="<?= htmlspecialchars($product['old_price']) ?>" />
            <input type="text" name="discount" placeholder="Diskon (%)" value="<?= htmlspecialchars($product['discount']) ?>" />
            <input type="text" name="location" placeholder="Lokasi" value="<?= htmlspecialchars($product['location']) ?>" />
            <input type="text" name="date" placeholder="Tanggal tiba" value="<?= htmlspecialchars($product['date']) ?>" />

            <button type="submit">Simpan Perubahan</button>
            <a href="index.php"><button type="button">Batal</button></a>
        </form>
    </div>
</body>
</html>
