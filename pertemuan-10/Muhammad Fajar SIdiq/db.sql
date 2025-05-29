CREATE TABLE IF NOT EXISTS user_form (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    umur INT NOT NULL,
    gender ENUM('Laki-laki', 'Perempuan') NOT NULL,
    pekerjaan ENUM('Pelajar', 'Mahasiswa', 'Pekerja') NOT NULL,
    negara VARCHAR(50),
    hobi TEXT,
    komentar TEXT,
    setuju TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
