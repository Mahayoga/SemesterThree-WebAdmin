<?php

$nama_tabel = "produk";

$sql = "
    CREATE TABLE `$nama_tabel` (
    `id_produk` int(11) NOT NULL,
    `nama_produk` varchar(255) NOT NULL,
    `deskripsi_produk` text NOT NULL,
    `harga_beli` int(11) NOT NULL,
    `harga_jual` int(11) NOT NULL,
    `stok` int(11) NOT NULL,
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
    INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `harga_beli`, `harga_jual`, `stok`) VALUES
    (1, 'Pomade', 'Pomade berkualitas untuk styling rambut.', 30000, 50000, 50),
    (2, 'Shampoo', 'Shampoo khusus untuk perawatan rambut.', 20000, 40000, 30),
    (3, 'Hair Tonic', 'Hair tonic untuk kesehatan rambut.', 25000, 45000, 20);
";

if ($koneksi->query($sql) === true) {
    echo "Seeder dibuat!: $nama_tabel <br>";
} else {
    echo "Error: saat membuat seeder $nama_tabel<br>";
}