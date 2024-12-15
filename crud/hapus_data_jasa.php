<?php
include "../config/connection.php";

$id = $_POST['id'];

try {
    $stmt = $koneksi->prepare("DELETE FROM jasa WHERE id_jasa = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    echo json_encode(["status" => "success"]);
} catch (Exception $e) {
    echo json_encode(["status" => "error"]);
}