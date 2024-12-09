<?php
include "../config/connection.php";

$id = $_POST['id'];
$nama_produk = $_POST['nama_produk'];
$deskripsi_produk = $_POST['deskripsi_produk'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];

$stmt = $koneksi->prepare("UPDATE produk SET nama_produk = ?, deskripsi_produk = ?, harga_beli = ?, harga_jual = ?, stok = ? WHERE id_produk = ?");
$stmt->bind_param("ssssss", $nama_produk, $deskripsi_produk, $harga_beli, $harga_jual, $stok, $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Gagal memperbarui data"]);
}

$stmt->close();
$koneksi->close();
?>
