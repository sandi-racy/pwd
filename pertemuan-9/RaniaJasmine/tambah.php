<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk</h2>
    <form action="simpan.php" method="post">
        <label>Nama Produk</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Harga Awal</label><br>
        <input type="number" name="harga_awal" required><br><br>

        <label>Harga Setelah Diskon</label><br>
        <input type="number" name="harga_setelah_diskon" required><br><br>

        <label>Lokasi</label><br>
        <input type="text" name="lokasi" required><br><br>

        <label>Estimasi Pengiriman</label><br>
        <input type="text" name="estimasi_pengiriman" required><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>