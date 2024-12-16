<?php
include "../config/connection.php";

$id = $_POST['id'];

if (!empty($id) && is_numeric($id)) {
    $query = "DELETE FROM karyawan WHERE id_karyawan = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    if ($result && $stmt->affected_rows > 0) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus data atau data tidak ditemukan']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID tidak valid']);
}
?>
