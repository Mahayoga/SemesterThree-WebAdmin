<?php
include "../config/connection.php";

$nama = $_POST['nama_karyawan'];
$keahlian = $_POST['keahlian_karyawan'];

$stmt = $koneksi->prepare("INSERT INTO karyawan (nama_karyawan, keahlian) VALUES (?, ?)");
$stmt->bind_param("ss", $nama, $keahlian);
$stmt->execute();

echo json_encode(["status" => "success"]);