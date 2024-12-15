<?php
include "../config/connection.php";

$nama = $_POST['nama_jasa'];
$harga = $_POST['harga_jasa'];

$stmt = $koneksi->prepare("INSERT INTO jasa (nama_jasa, harga_jasa) VALUES (?, ?)");
$stmt->bind_param("ss", $nama, $harga);
$stmt->execute();

echo json_encode(["status" => "success"]);