<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Produk Baru</h1>
        <form action="process.php?action=create" method="post" class="product-form">
            <label for="nama_produk">Nama Produk:</label><br>
            <input type="text" id="nama_produk" name="nama_produk" required><br><br>
            <label for="harga">Harga:</label><br>
            <input type="text" id="harga" name="harga" required><br><br>
            <label for="harga_awal">Harga Awal (opsional):</label><br>
            <input type="text" id="harga_awal" name="harga_awal"><br><br>
            <label for="lokasi">Lokasi:</label><br>
            <input type="text" id="lokasi" name="lokasi"><br><br>
            <label for="pengiriman">Estimasi Pengiriman:</label><br>
            <input type="text" id="pengiriman" name="pengiriman"><br><br>
            <button type="submit" class="button save-button">Simpan</button>
            <a href="index.php" class="button cancel-button">Batal</a>
        </form>
    </div>
</body>
</html>