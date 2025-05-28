<html>
    <head>
        <title>Tugas 10</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['error'])){
                echo '<div class="error">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            } else if(isset($_SESSION['success'])){
                echo '<div class="success">' . $_SESSION['success'] . '</div>';
                unset($_SESSION['success']);
            }
        ?>
        <form action="submit.php" method="post">
            <div>
                <label>Nama: </label>
                <input type="text" name="nama" required>
            </div>

            <div>
                <label>Umur: </label>
                <input type="number" name="umur" required min="1" max="120">
            </div>


            <div>
                <label>Kelas: </label>
                <select name="kelas" required>
                    <option value="">-- Pilih Kelas --</option>
                    <option value="IFA">IF A</option>
                    <option value="IFB">IF B</option>
                </select>
            </div>

            <div>
                <label>Hobi: </label>
                <div class="hobi-container">
                    <label><input type="checkbox" name="hobi[]" value="game"> Game</label>
                    <label><input type="checkbox" name="hobi[]" value="bola"> bola</label>
                    <label><input type="checkbox" name="hobi[]" value="traveling"> Traveling</label>
                </div>
            </div>

            <div>
                <label>Agama: </label>
                <input type="radio" name="agama" value="Islam" required> Islam
                <input type="radio" name="agama" value="Katolik"> Katolik
            </div>

            <div>
                <label>Pesan: </label>
                <textarea name="pesan" rows="4" cols="30" required></textarea>
            </div>

            <button type="submit">Submit</button>
        </form>
    </body>
</html>