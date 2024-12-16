<?php
include "../config/connection.php";	
$nama = $_POST['nama'];

try {
    $sql = "INSERT INTO users (`nama_user`, `role`, `cara_tercatat`) VALUES (?, 'user', 'didaftarkan')";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('s', $nama);
    $stmt->execute();

    $sql = "SELECT * FROM users WHERE nama_user = '$nama' ORDER BY created_at DESC LIMIT 1";
    $result = $koneksi->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode(["status" => "success", "title" => "User ditambahkan", "message" => "Tambah data user berhasil", "data" => $row['id_user']]);
} catch(Exception $e) {
    echo json_encode(["status" => "error", "title" => "Terjadi kesalahan", "message" => "Coba lagi nanti"]);
}