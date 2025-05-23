<html>
    <head>
        <title>Validasi</title>
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }else if(isset($_SESSION['success'])){
                echo $_SESSION['success'];
                echo($_SESSION['success']);
            }
        ?>
        <form action="submit.php" method="post">
            <div>
                <label>Nama: </label>
                <input type="text" name="nama" required>
            </div>

            <div>
                <label>Kelas: </label>
                <select name="kelas" required>
                    <option value="">-- Pilih Kelas --</option>
                    <option value="IFA">IF A</option>
                    <option value="IFB">IF B</option>
                    <option value="IFC">IF C</option>
                    <option value="IFD">IF D</option>
                </select>
            </div>

            <div>
                <label>Hobi: </label>
                <input type="checkbox" name="hobi[]" value="game">
                <label>Game</label>
                <input type="checkbox" name="hobi[]" value="mancing">
                <label>Mancing</label>
                <input type="checkbox" name="hobi[]" value="traveling">
                <label>Traveling</label>
            </div>

            <div>
                <label>Agama: </label>
                <input type="radio" name="agama" value="Islam" required> Islam
                <input type="radio" name="agama" value="Kristen"> Kristen
                <input type="radio" name="agama" value="Hindu"> Hindu
                <input type="radio" name="agama" value="Budha"> Budha
            </div>

            <div>
                <label>Pesan: </label>
                <textarea name="pesan" rows="4" cols="30" required></textarea>
            </div>

            <button type="submit">Submit</button>
        </form>
    </body>
</html>