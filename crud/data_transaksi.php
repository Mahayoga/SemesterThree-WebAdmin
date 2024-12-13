<?php
include "../config/connection.php";

$sql = "SELECT * FROM transaksi tr INNER JOIN users ur ON tr.id_user = ur.id_user INNER JOIN karyawan kr ON tr.id_karyawan = kr.id_karyawan";
$result = $koneksi->query($sql);

$data = [];
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode(["data" => $data, "status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}