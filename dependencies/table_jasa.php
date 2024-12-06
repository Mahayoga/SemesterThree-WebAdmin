<?php

$nama_tabel = "jasa";

$sql = "
    CREATE TABLE `$nama_tabel` (
    `id_jasa` int(11) NOT NULL,
    `nama_jasa` varchar(255) NOT NULL,
    `harga_jasa` char(10) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
    )
";

if ($koneksi->query($sql) === true) {
    echo "Tabel dibuat!: $nama_tabel \n";
} else {
    echo "Error: saat membuat tabel $nama_tabel\n";
}

$sql = "
    INSERT INTO `jasa` (`id_jasa`, `nama_jasa`, `harga_jasa`) VALUES
    (1, 'Cukur Rambut', '50000'),
    (2, 'Cukur + Styling', '75000'),
    (3, 'Cukur Anak', '35000');

";

if ($koneksi->query($sql) === true) {
    echo "Seeder dibuat!: $nama_tabel \n";
} else {
    echo "Error: saat membuat seeder $nama_tabel\n";
}