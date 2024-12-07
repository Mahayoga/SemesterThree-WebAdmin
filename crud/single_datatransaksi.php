<?php
include "../config/connection.php";

$id_transaksi = isset($_GET['id_transaksi']) ? intval($_GET['id_transaksi']) : 0;

if ($id_transaksi > 0) {
    // Menggunakan prepared statement untuk mencegah SQL Injection
    $stmt = $koneksi->prepare("SELECT * FROM transaksi WHERE id_transaksi = ?");
    $stmt->bind_param("i", $id_transaksi);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(["data" => $row, "status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Data transaksi tidak ditemukan."]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "ID transaksi tidak valid."]);
}

$koneksi->close();
