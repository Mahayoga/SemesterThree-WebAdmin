<?php

$nama_tabel = "users";

$sql = "
    CREATE TABLE `$nama_tabel` (
    `id_user` int(11) NOT NULL,
    `nama_user` varchar(255) NOT NULL,
    `alamat` varchar(255) NOT NULL,
    `no_telp` char(15) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `role` enum('admin','user','karyawan') NOT NULL,
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
    INSERT INTO `users` (`id_user`, `nama_user`, `alamat`, `no_telp`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
    (1, 'Mahayoga', 'Probolinggo', '081234567890', 'myoga.bahtiar@gmail.com', '$2y$12\$x4mOtUHmIyw.GY9E2QmAouX6Wo5C1ibKHON9yZJPKBCNFzQEkfq2y', 'admin', '2024-12-06 02:28:56', '2024-12-06 02:27:57'),
    (2, 'Irsyad', 'Gresik', '081234567891', 'syadd@gmail.com', '$2y$12$2eTYQYN5t36xQVuTCO/fLe.U9BnaU7Bko4hRytcojTKwHmf5YQA8K', 'admin', '2024-12-06 02:28:56', '2024-12-06 02:27:57'),
    (3, 'Nisa', 'Banyuwangi', '081234567892', 'nisa@gmail.com', '$2y$12$4UEdFSnLaVGRgXGLFXV9JuHqO8XOEw659Lya.QBJoTOFrBbMCrBGS', 'admin', '2024-12-06 02:28:56', '2024-12-06 02:27:57'),
    (4, 'Citra', 'Jember', '081234567893', 'citra@gmail.com', '$2y$12\$Z6i8HOhUO3MCABZdB598Ne0h8aYbJnGJeN8Qa6u2TCknVl0E/GcHW', 'admin', '2024-12-06 02:28:56', '2024-12-06 02:27:57'),
    (5, 'Fila', 'Probolinggo', '081234567894', 'fila@gmail.com', '$2y$12\$HcTHEPYmVdtG5Cys2VsJkOuf.oHqGHtesFr2VrBkAqA/6D0SKa5Wi', 'admin', '2024-12-06 02:28:56', '2024-12-06 02:27:57'),
    (6, 'User Test', 'Jakarta', '081234567895', 'user@gmail.com', '$2y$12\$E8LIl.8HKaLfeSI9FiyRG.OmxBoM0.MATGFakIuI.kHxHNNAx76hC', 'user', '2024-12-06 02:28:56', '2024-12-06 02:27:57'),
    (7, 'Mahayoga', 'Probolinggo', '081234567896', 'myoga.bhtr@gmail.com', ' $2a$12\$z8Pm9IOgLsPXcG8tb9pSJ.3Rc5qShGbasu0ytmqoVCRP5NG4LPKkG ', 'karyawan', '2024-12-06 02:28:56', '2024-12-06 02:27:57');
";

if ($koneksi->query($sql) === true) {
    echo "Seeder dibuat!: $nama_tabel \n";
} else {
    echo "Error: saat membuat seeder $nama_tabel\n";
}