<?php
session_start();
include "../config/connection.php";
if(!isset($_SESSION['id_user'])) {
    echo json_encode(["status" => "warning", "title" => "Tidak ada data", "message" => "Belum ada data"]);
    return;
}
$id_user = $_SESSION['id_user'];

$sql = "SELECT j.nama_jasa, j.harga_jasa, b.tgl_booking, b.status, b.id_booking FROM booking b INNER JOIN users u ON b.id_user = u.id_user INNER JOIN jasa j ON b.id_jasa = j.id_jasa WHERE b.id_user = $id_user LIMIT 4";
$result = $koneksi->query($sql);

$data = [];
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo json_encode(["status" => "warning", "title" => "Tidak ada data", "message" => "Belum ada data"]);
    return;
}

echo json_encode($data);