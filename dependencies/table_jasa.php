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
    echo "Tabel dibuat!: $nama_tabel <br>";
} else {
    echo "Error: saat membuat tabel $nama_tabel<br>";
}

$sql = "
    INSERT INTO `jasa` (`id_jasa`, `nama_jasa`, `harga_jasa`) VALUES
    (1, 'Haircut 1 - anak anak', '15000'),
    (2, 'Haircut 2 - dewasa', '20000'),
    (3, 'Paket 1 - haircut+hairwash', '25000'),
    (4, 'Paket 2 - haircut+hairwash+styling pomade/vitamin', '30000');
";

if ($koneksi->query($sql) === true) {
    echo "Seeder dibuat!: $nama_tabel <br>";
} else {
    echo "Error: saat membuat seeder $nama_tabel<br>";
}