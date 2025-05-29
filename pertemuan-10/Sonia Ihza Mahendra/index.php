<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Validasi</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h2>Form Input Produk</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <p style="color: red;"><?php echo htmlspecialchars($_SESSION['error']); ?></p>
        <?php unset($_SESSION['error']);?>
    <?php elseif (isset($_SESSION['success'])): ?>
        <p style="color: green;"><?php echo htmlspecialchars($_SESSION['success']); ?></p>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <form action="submit.php" method="post">
        <div>
            <label>Nama Produk:</label><br>
            <input type="text" name="nama_produk" required>
        </div>
        <br>

        <div>
            <label>Kategori:</label><br>
            <select name="kategori" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Elektronik">Elektronik</option>
                <option value="Pakaian">Pakaian</option>
                <option value="Makanan">Makanan</option>
            </select>
        </div>
        <br>

        <div>
            <label>Fitur Tambahan:</label><br>
            <input type="checkbox" name="fitur[]" value="Bergaransi"> Bergaransi<br>
            <input type="checkbox" name="fitur[]" value="Diskon"> Diskon<br>
            <input type="checkbox" name="fitur[]" value="Free Ongkir"> Free Ongkir
        </div>
        <br>

        <div>
            <label>Kondisi:</label><br>
            <input type="radio" name="kondisi" value="Baru"> Baru<br>
            <input type="radio" name="kondisi" value="Bekas"> Bekas
        </div>
        <br>

        <div>
            <label>Deskripsi Produk:</label><br>
            <textarea name="deskripsi" rows="4" cols="40" required></textarea>
        </div>
        <br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>