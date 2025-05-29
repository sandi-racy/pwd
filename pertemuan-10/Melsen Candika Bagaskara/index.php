<html>
    <head>
        <title>Validasi</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            session_start();
            if (isset($_SESSION['error'])) {
            echo '<div class="error">' . htmlspecialchars($_SESSION['error']) . '</div>';
            unset($_SESSION['error']);
        } elseif (isset($_SESSION['success'])) {
            echo '<div class="success">' . htmlspecialchars($_SESSION['success']) . '</div>';
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
                    <option value="IFC">IF C</option>
                    <option value="IFD">IF D</option>
                </select>
            </div>

            <div>
                <label>Hobi: </label>
                <div class="hobi-container">
                    <label><input type="checkbox" name="hobi[]" value="game"> Game</label>
                    <label><input type="checkbox" name="hobi[]" value="mancing"> Mancing</label>
                    <label><input type="checkbox" name="hobi[]" value="traveling"> Traveling</label>
                </div>
            </div>

            <div>
                <label>Agama: </label>
                <input type="radio" name="agama" value="Islam" required> Islam
                <input type="radio" name="agama" value="Katolik"> Katolik
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