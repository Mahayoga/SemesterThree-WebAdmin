<?php

$sql = [
    "ALTER TABLE transaksi ADD FOREIGN KEY (id_user) REFERENCES users (id_user)",
    "ALTER TABLE transaksi ADD FOREIGN KEY (id_karyawan) REFERENCES karyawan (id_karyawan)",
    "ALTER TABLE transaksi ADD FOREIGN KEY (id_karyawan) REFERENCES karyawan (id_karyawan)",
    "ALTER TABLE detail_transaksi ADD FOREIGN KEY (id_produk) REFERENCES produk (id_produk)",
    "ALTER TABLE detail_transaksi ADD FOREIGN KEY (id_jasa) REFERENCES jasa (id_jasa)",
    "ALTER TABLE detail_transaksi ADD FOREIGN KEY (id_transaksi) REFERENCES transaksi (id_transaksi)",
    "ALTER TABLE booking ADD FOREIGN KEY (id_user) REFERENCES users (id_user)",
    "ALTER TABLE booking ADD FOREIGN KEY (id_jasa) REFERENCES jasa (id_jasa)",
];

foreach($sql as $item) {
    if ($koneksi->query($item) === true) {
    } else {
        echo "Error: saat membuat tabel index foreign key!<br>";
    }
}

echo "Tabel index foreign key berhasil dibuat! <br>";