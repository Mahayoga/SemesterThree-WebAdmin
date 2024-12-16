<?php
include "../config/connection.php";
// id_booking 	id_user 	id_jasa 	tgl_booking 	status 	created_at 	updated_at 	
$id_booking = $_POST['id'];
$gambar = $_FILES['gambar'];

try {
    $sql = "UPDATE booking  SET `bukti_pembayaran` = ? WHERE id_booking = ?";
    $stmt = $koneksi->prepare($sql);
    $bin = file_get_contents($gambar['tmp_name']);
    $stmt->bind_param('ss', $bin, $id_booking);
    $stmt->execute();
    echo json_encode(["status" => "success", "title" => "Booking ditambahkan", "message" => "Silahkan periksa status booking anda dibawah"]);
} catch(Exception $e) {
    echo json_encode(["status" => "error", "title" => "Terjadi kesalahan", "message" => "Coba lagi nanti"]);
}