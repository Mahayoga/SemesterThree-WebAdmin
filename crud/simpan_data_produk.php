<?php
include "../config/connection.php";

$nama_produk = $_POST['nama_produk'];
$deskripsi_produk = $_POST['deskripsi_produk'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];

$stmt = $koneksi->prepare("INSERT INTO produk (nama_produk, deskripsi_produk, harga_beli, harga_jual, stok,  id_produk) VALUES (?, ?)");
$stmt->bind_param("ssssss", $nama_produk, $deskripsi_produk, $harga_beli, $harga_jual, $stok, $id);
$stmt->execute();

echo json_encode(["status" => "success"]);
