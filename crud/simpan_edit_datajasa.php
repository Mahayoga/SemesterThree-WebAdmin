<?php
include "../config/connection.php";

$id = $_POST['id'];
$nama = $_POST['nama_jasa'];
$harga = $_POST['harga_jasa'];

$stmt = $koneksi->prepare("UPDATE jasa SET nama_jasa = ?, harga_jasa = ? WHERE id_jasa = ?");
$stmt->bind_param("sss", $nama, $harga, $id);
$stmt->execute();

echo json_encode(["status" => "success"]);