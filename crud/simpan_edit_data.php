<?php
include "../config/connection.php";

$id = $_POST['id'];
$nama = $_POST['nama_user'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];

$stmt = $koneksi->prepare("UPDATE users SET nama_user = ?, alamat = ?, no_telp = ?, email = ? WHERE id_user = ?");
$stmt->bind_param("sssss", $nama, $alamat, $no_telp, $email, $id);
$stmt->execute();

echo json_encode(["status" => "success"]);