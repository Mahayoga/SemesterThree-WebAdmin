<?php

$nama_tabel = "transaksi";

$sql = [
    "ALTER TABLE `booking` ADD PRIMARY KEY (`id_booking`);",
    "ALTER TABLE `jasa` ADD PRIMARY KEY (`id_jasa`);",
    "ALTER TABLE `karyawan` ADD PRIMARY KEY (`id_karyawan`);",
    "ALTER TABLE `produk` ADD PRIMARY KEY (`id_produk`);",
    "ALTER TABLE `transaksi` ADD PRIMARY KEY (`id_transaksi`);",
    "ALTER TABLE `customers` ADD PRIMARY KEY (`id_customers`);",
    "ALTER TABLE `transactions` ADD PRIMARY KEY (`id_transaction`);",
    "ALTER TABLE `transaction_items` ADD PRIMARY KEY (`id_items`);",
    "ALTER TABLE `users` ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `email` (`email`);",
    "ALTER TABLE `booking` MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT;",
    "ALTER TABLE `jasa` MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT;",
    "ALTER TABLE `karyawan` MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT;",
    "ALTER TABLE `produk` MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT;",
    "ALTER TABLE `transaksi` MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;",
    "ALTER TABLE `users` MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;",
];

foreach($sql as $item) {
    if ($koneksi->query($item) === true) {
    } else {
        echo "Error: saat membuat tabel index!<br>";
    }
}

echo "Tabel index berhasil dibuat! <br>";