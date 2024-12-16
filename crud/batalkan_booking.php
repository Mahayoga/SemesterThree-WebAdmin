<?php
session_start();
include "../config/connection.php";

$id = $_POST['id'];

$sql = "UPDATE booking SET status = 'canceled' WHERE id_booking = '$id'";
$result = $koneksi->query($sql);

echo json_encode(["status" => "success", "title" => "Pembatalan", "message" => "Booking berhasil dibatalkan"]);

    // echo json_encode(["status" => "error", "title" => "Kesalahan", "message" => "Terjadi error"]);