<?php

$nama_tabel = "transaksi";

$sql = "
    CREATE TABLE `$nama_tabel` (
    `id_transaksi` int(11) NOT NULL,
    `total` int(11) NOT NULL,
    `bayar` int(11) NOT NULL,
    `kembalian` int(11) NOT NULL,
    `method_pembayaran` enum('cash','dana','ovo') NOT NULL,
    `id_user` int(11) NOT NULL,
    `id_karyawan` int(11) NOT NULL,
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
    INSERT INTO `transaksi` (`id_transaksi`, `total`, `bayar`, `kembalian`, `method_pembayaran`, `id_user`, `id_karyawan`) VALUES
    (1, 125000, 150000, 25000, 'cash', 3, 1),
    (2, 50000, 50000, 0, 'ovo', 4, 2),
    (3, 75000, 75000, 0, 'dana', 3, 1);
";

if ($koneksi->query($sql) === true) {
    echo "Seeder dibuat!: $nama_tabel \n";
} else {
    echo "Error: saat membuat seeder $nama_tabel\n";
}