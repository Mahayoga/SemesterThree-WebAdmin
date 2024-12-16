<?php
include "../config/connection.php";

$nama_produk = $_POST['nama_produk'];
$deskripsi_produk = $_POST['deskripsi_produk'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];

$stmt = $koneksi->prepare("INSERT INTO produk (nama_produk, deskripsi_produk, harga_beli, harga_jual, stok) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssddd", $nama_produk, $deskripsi_produk, $harga_beli, $harga_jual, $stok);
$stmt->execute();

echo json_encode(["status" => "success"]);
