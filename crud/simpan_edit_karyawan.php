<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
include "../config/connection.php";

$id = $_POST['id'];
$nama = $_POST['nama_karyawan'];
$keahlian = $_POST['keahlian'];

$query = "UPDATE karyawan SET nama_karyawan = ?, keahlian = ? WHERE id_karyawan = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssi', $nama_karyawan, $keahlian, $id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data']);
    }

    $stmt->close();
    $conn->close();
}
?>