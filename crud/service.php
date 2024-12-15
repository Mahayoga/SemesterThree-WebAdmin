<?php
include ('../config/connection.php');

// Query untuk jasa
$service = "SELECT id_jasa, nama_jasa FROM jasa ORDER BY nama_jasa";
$result_jasa = $koneksi->query($service);
$service_list = $result_jasa->fetch_all(MYSQLI_ASSOC);

// Query untuk produk
$product = "SELECT id_produk, nama_produk FROM produk ORDER BY nama_produk";
$result_produk = $koneksi->query($product);
$product_list = $result_produk->fetch_all(MYSQLI_ASSOC);
?>
