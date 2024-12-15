<?php

$nama_tabel = "karyawan";

$sql = "
    CREATE TABLE `$nama_tabel` (
    `id_karyawan` int(11) NOT NULL,
    `nama_karyawan` varchar(255) NOT NULL,
    `keahlian` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
    )
";

if ($koneksi->query($sql) === true) {
    echo "Tabel dibuat!: $nama_tabel <br>";
} else {
    echo "Error: saat membuat tabel $nama_tabel<br>";
}

$sql = "
    INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `keahlian`) VALUES
    (1, 'John Doe', 'Cukur Rambut'),
    (2, 'Jane Smith', 'Cukur dan Styling');

";

if ($koneksi->query($sql) === true) {
    echo "Seeder dibuat!: $nama_tabel <br>";
} else {
    echo "Error: saat membuat seeder $nama_tabel<br>";
}