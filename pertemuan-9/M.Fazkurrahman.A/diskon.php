<?php 
require 'db.php';

$id_barang = $_GET['id_barang'];
$query = $db->prepare('SELECT * FROM barang WHERE id_barang = ?');
$query->execute([$id_barang]);
$barang = $query->fetch();
?>

<html>
    <head>
        <title>Edit Barang</title>
    </head>
    <body>
        <h2>Edit Barang</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id_barang" value="<?php echo $barang['id_barang']; ?>" />
            
            <div>
                <label>Diskon</label>
                <input type="text" name="diskon" value="<?php echo $barang['diskon'] ?? ''; ?>" />  
            </div>
            

            <button type="submit">Simpan</button>
        </form>
    </body>
</html>
