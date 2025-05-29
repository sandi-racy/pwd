<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Booking Tempat Wisata</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h2> Booking Tempat Wisata</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <p style="color: red;"><?php echo htmlspecialchars($_SESSION['error']); ?></p>
        <?php unset($_SESSION['error']);?>
    <?php elseif (isset($_SESSION['success'])): ?>
        <p style="color: green;"><?php echo htmlspecialchars($_SESSION['success']); ?></p>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <form action="submit.php" method="post">
        <div>
            <label>Nama Pengunjung:</label><br>
            <input type="text" name="nama_pengunjung">
        </div><br>

        <div>
            <label>Tanggal Kunjungan:</label><br>
            <input type="date" name="tanggal_kunjungan">
        </div><br>

        <div>
            <label>Jumlah Orang:</label><br>
            <input type="number" name="jumlah_orang" min="1">
        </div><br>

        <div>
            <label>Jenis Wisata:</label><br>
            <select name="jenis_wisata">
                <option value="">-- Pilih Wisata --</option>
                <option value="Pantai">Pantai</option>
                <option value="Gunung">Gunung</option>
                <option value="Air Terjun">Air Terjun</option>
                <option value="Taman Hiburan">Taman Hiburan</option>
            </select>
        </div><br>

        <div>
            <label>Layanan Tambahan:</label><br>
            <input type="checkbox" name="layanan[]" value="Pemandu"> Pemandu<br>
            <input type="checkbox" name="layanan[]" value="Makan Siang"> Makan Siang<br>
            <input type="checkbox" name="layanan[]" value="Asuransi"> Asuransi
        </div><br>

        <div class="radio-group">
            <label>Metode Pembayaran</label><br>
            <label>
            <input type="radio" name="metode_pembayaran" value="Cash" required> Cash
            </label>
            <label>
            <input type="radio" name="metode_pembayaran" value="Transfer Bank" required> Transfer Bank
            </label>
        </div>
        <div>
            <label>Keterangan Tambahan:</label><br>
            <textarea name="keterangan" rows="4" cols="40"></textarea>
        </div><br>

        <button type="submit">Booking</button>
    </form>
</body>
</html>
