<?php
include "../config/connection.php";

$id = $_GET['id'];
$sql = "SELECT * FROM karyawan WHERE id_karyawan = $id";
$result = $koneksi->query($sql);

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(["data" => $row, "status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}