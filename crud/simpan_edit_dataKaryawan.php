<?php
include "../config/connection.php";

$id = $_POST['id'];
$nama = $_POST['nama_karyawan'];
$keahlian = $_POST['keahlian'];

$stmt = $koneksi->prepare("UPDATE karyawan SET nama_karyawan = ?, keahlian =   ? WHERE id_karyawan = ?");
$stmt->bind_param("sss", $nama, $keahlian, $id);
$stmt->execute();

echo json_encode(["status" => "success"]);