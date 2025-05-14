<html>
    <head>
        <title>Menambahkan Produk</title>
    </head>
    <body>
        <form method="POST" action="simpan.php">
            <input type="text" name="nama_barang" placeholder="Nama Barang" required>
            <input type="number" name="harga_awal" placeholder="Harga Awal" required>
            <input type="number" name="diskon" placeholder="Diskon (%)" required>
            <input type="text" name="lokasi" placeholder="Lokasi" required>
            <input type="text" name="estimasi" placeholder="Estimasi" required>
            <button type="submit">Simpan</button>
        </form>
    </body>
</html>