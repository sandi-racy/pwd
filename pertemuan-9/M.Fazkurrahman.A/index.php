<html>
    <head>

    </head>
    <body>
        <a href="tambah.php">Tambah</a>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Merek</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Lokasi</th>
                    <th>Estimasi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                     $db = new PDO('mysql:host=localhost;dbname=pwd_2025','root','');
                    $query = $db->prepare('SELECT * FROM barang');
                    $query->execute();
                    $barangs = $query->fetchAll();
                    foreach($barangs as $barang){
                ?>
                         <tr>
                            <td><?php echo $barang['id_barang'];?></td>
                            <td><?php echo $barang['merek'];?></td>
                            <td><?php echo $barang['harga'];?></td>
                            <td>
                                <a href="diskon.php?id_barang=<?php echo $barang['diskon'];?>">30%</a>
                            </td>
                            <td><?php echo $barang['lokasi']?></td>
                            <td><?php echo $barang['estimasi']?></td>
                            <td>
                                <a href="delete.php?id_barang=<?php echo $barang['id_barang'];?>">Delete</a>
                            </td>
                        </tr>
                        
                        <?php
                    }
                    ?>
            </tbody>
        </table>       
    </body>
</html>
