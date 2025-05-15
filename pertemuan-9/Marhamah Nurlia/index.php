<?php
session_start();

if (!isset($_SESSION['product'])) {
    $_SESSION['product'] = [
        "title" => "Apple Macbook Air M3 13\" inch 2024",
        "price" => "Rp19.999.000",
        "old_price" => "Rp28.499.000",
        "discount" => "30%",
        "location" => "Jakarta Utara",
        "date" => "Tiba 10 - 13 May"
    ];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create']) || isset($_POST['update'])) {
        $_SESSION['product'] = [
            "title" => $_POST['title'],
            "price" => $_POST['price'],
            "old_price" => $_POST['old_price'],
            "discount" => $_POST['discount'],
            "location" => $_POST['location'],
            "date" => $_POST['date']
        ];
    } elseif (isset($_POST['delete'])) {
        $_SESSION['product'] = [
            "title" => "",
            "price" => "",
            "old_price" => "",
            "discount" => "",
            "location" => "",
            "date" => ""
        ];
    }
}

$product = $_SESSION['product'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas CRUD PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tugas</h2>
    <p>Buatlah create, read, update, dan delete (CRUD) untuk gambar di bawah</p>

    <div class="container">
        <div class="product">
            <div class="product-title"><?= htmlspecialchars($product['title']) ?></div>
            <div class="price"><?= htmlspecialchars($product['price']) ?></div>
            <div>
                <span class="old-price"><?= htmlspecialchars($product['old_price']) ?></span>
                <span class="discount"><?= htmlspecialchars($product['discount']) ?></span>
            </div>
            <div class="location">📍 <?= htmlspecialchars($product['location']) ?></div>
            <div class="date"><?= htmlspecialchars($product['date']) ?></div>
        </div>

        <form method="POST">
            <input type="text" name="title" placeholder="Judul produk" value="<?= htmlspecialchars($product['title']) ?>" />
            <input type="text" name="price" placeholder="Harga sekarang" value="<?= htmlspecialchars($product['price']) ?>" />
            <input type="text" name="old_price" placeholder="Harga lama" value="<?= htmlspecialchars($product['old_price']) ?>" />
            <input type="text" name="discount" placeholder="Diskon (%)" value="<?= htmlspecialchars($product['discount']) ?>" />
            <input type="text" name="location" placeholder="Lokasi" value="<?= htmlspecialchars($product['location']) ?>" />
            <input type="text" name="date" placeholder="Tanggal tiba" value="<?= htmlspecialchars($product['date']) ?>" />

            <button type="submit" name="create">Create</button>
            <button type="submit" name="update">Update</button>
            <button type="submit" name="delete">Delete</button>
            <a href="edit.php"><button type="button">Edit di Halaman Baru</button></a>
        </form>
    </div>
</body>
</html>
