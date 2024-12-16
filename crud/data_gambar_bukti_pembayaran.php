<?php
session_start();
include "../config/connection.php";

$id = $_POST['id'];

$sql = "SELECT * FROM booking WHERE id_booking = '$id'";
$result = $koneksi->query($sql);

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(["status" => "success", "title" => "Data gambar", "message" => base64_encode($row['bukti_pembayaran'])]);
} else {
    echo json_encode(["status" => "error", "title" => "Kesalahan", "message" => "Terjadi error"]);
}