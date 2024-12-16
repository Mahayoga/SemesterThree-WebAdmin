<?php
include "../config/connection.php";

$time = $_POST['date'];

$sql = "SELECT * FROM booking WHERE created_at LIKE '%$time%'";
$result = $koneksi->query($sql);

if($result->num_rows > 0) {
    echo json_encode(["status" => "error", "title" => "Tidak Tersedia", "message" => "Tanggal dan jam ini sudah terisi!"]);
} else {
    echo json_encode(["status" => "success", "title" => "Tersedia", "message" => "Tanggal dan jam ini tersedia!"]);
}