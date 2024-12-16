<?php
// session_start();
include "../config/connection.php";

// id_transaksi 	total 	bayar 	kembalian 	method_pembayaran 	id_user 	id_karyawan 	created_at 	updated_at
$total = $_POST['total'];
$bayar = $_POST['bayar'];
$kembalian = $_POST['kembalian'];
$method_pembayaran = $_POST['method_pembayaran'];
$id_user = $_POST['id_user'];
$id_karyawan = $_POST['id_karyawan'];

$sql = "INSERT INTO transaksi VALUES (0, ?, ?, ?, ?, ?, ?, null, null)";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param('iiisii', $total, $bayar, $kembalian, $method_pembayaran, $id_user, $id_karyawan);
$stmt->execute();

echo json_encode(["status" => "success", "title" => "Transaksi ditambahkan", "message" => "Tambah data transaksi berhasil"]);
