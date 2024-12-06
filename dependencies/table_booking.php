<?php

$nama_tabel = "booking";

$sql = "
    CREATE TABLE `$nama_tabel` (
    `id_booking` int(11) NOT NULL,
    `id_user` int(11) NOT NULL,
    `id_jasa` int(11) NOT NULL,
    `tgl_booking` date NOT NULL,
    `status` enum('pending','confirmed','canceled','complete') NOT NULL,
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
    INSERT INTO `booking` (`id_booking`, `id_user`, `id_jasa`, `tgl_booking`, `status`) VALUES
    (1, 3, 1, '2024-12-06', 'confirmed'),
    (2, 4, 2, '2024-12-07', 'pending'),
    (3, 3, 3, '2024-12-08', 'complete');
";

if ($koneksi->query($sql) === true) {
    echo "Seeder dibuat!: $nama_tabel \n";
} else {
    echo "Error: saat membuat seeder $nama_tabel\n";
}