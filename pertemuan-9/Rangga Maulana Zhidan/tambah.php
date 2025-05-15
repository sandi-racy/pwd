<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk</h2>
    <form action="simpan.php" method="POST">
    <input type="text" name="nama" placeholder="Nama Produk"><br>
    <input type="number" name="harga_asli" placeholder="Harga Asli"><br>
    <input type="number" name="harga_diskon" placeholder="Harga Diskon"><br>
    <input type="number" name="diskon_persen" placeholder="Diskon (%)"><br>
    <input type="text" name="lokasi" placeholder="Lokasi"><br>
    <input type="text" name="estimasi_pengiriman" placeholder="Estimasi Pengiriman"><br>
    <button type="submit">Simpan</button>
</form>
</body>
</html>