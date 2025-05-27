CREATE TABLE form_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    umur INT NOT NULL,
    kelas VARCHAR(10) NOT NULL,
    hobi TEXT,
    agama VARCHAR(20) NOT NULL,
    pesan TEXT NOT NULL
);