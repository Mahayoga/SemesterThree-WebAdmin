<?php

$nama_tabel = "detail_transaksi";

$sql = "
    CREATE TABLE `$nama_tabel` (
    `id_detail` int(11) NOT NULL,
    `id_produk` int(11) DEFAULT NULL,
    `id_jasa` int(11) DEFAULT NULL,
    `jumlah` int(11) NOT NULL,
    `sub_total` int(11) NOT NULL,
    `id_transaksi` int(11) NOT NULL,
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
    INSERT INTO `detail_transaksi` (`id_detail`, `id_produk`, `id_jasa`, `jumlah`, `sub_total`, `id_transaksi`) VALUES
    (1, 1, NULL, 1, 50000, 1),
    (2, NULL, 2, 1, 75000, 1),
    (3, 2, NULL, 2, 80000, 2),
    (4, NULL, 1, 1, 50000, 3);
";

if ($koneksi->query($sql) === true) {
    echo "Seeder dibuat!: $nama_tabel \n";
} else {
    echo "Error: saat membuat seeder $nama_tabel\n";
}