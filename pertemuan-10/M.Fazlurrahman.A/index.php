<?php session_start(); ?>
<html>
<head>
    <title>TUGAS Validasi</title>
</head>
<body>
    <?php
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        } else if(isset($_SESSION['success'])){
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
    ?>
    <form action="submit.php" method="post">
        <div>
            <label>Nama Produk</label>
            <input type="text" name="produk">
        </div>
        <div>
            <label>MEREK</label>
            <select name="produk_select" id="">
                <option value="">Pilih Produk nya</option>
                <option value="NUVO">NUVO</option>
                <option value="LIFEBOY">LIFEBOY</option>
                <option value="GIV">GIV</option>
            </select>
        </div>
         <div>
        <label>PILIH PARIAN</label><br>
        <input type="checkbox" name="parian[]" value="Anti Nuklir"> Anti Nuklir<br>
        <input type="checkbox" name="parian[]" value="Wangi 7 Daun Kembang"> Wangi 7 Daun Kembang<br>
        <input type="checkbox" name="parian[]" value="Membersihkan Dosa"> Membersihkan Dosa<br>
    </div>
            <label>JENIS SABUN</label>
            <br>
            <input type="radio" name="jenis" value="Sabun Cair">Sabun Cair <br>
            <input type="radio" name="jenis" value="Sabun Batang">Sabun Batang
        </div>
        <div>
            <label>Quantity</label>
            <input type="text" name="quantity">
        </div>
        <div>
            <label>Pesan Untuk Kami</label><br>
            <textarea name="deskripsi"></textarea>
        </div>
        <div>
            <label>Masukan Email Anda</label>
            <input type="email" name="email">
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
