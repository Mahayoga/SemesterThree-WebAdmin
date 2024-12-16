<?php
include "../config/connection.php";
// id_booking 	id_user 	id_jasa 	tgl_booking 	status 	created_at 	updated_at 	
$id_user = $_POST['id_user'];
$id_jasa = $_POST['id_jasa'];
$date = $_POST['tgl_booking'];

try {
    $sql = "INSERT INTO booking VALUES (0, ?, ?, ?, 'pending', null, null)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('iis', $id_user, $id_jasa, $date);
    $stmt->execute();
    echo json_encode(["status" => "success", "title" => "Booking ditambahkan", "message" => "Silahkan periksa status booking anda dibawah"]);
} catch(Exception $e) {
    echo json_encode(["status" => "error", "title" => "Terjadi kesalahan", "message" => "Coba lagi nanti"]);
}