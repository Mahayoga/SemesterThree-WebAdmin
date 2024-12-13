<?php
include ('../config/connection.php');

$service = "SELECT id_jasa, nama_jasa FROM jasa ORDER BY nama_jasa";
$result_jasa = $koneksi->query($service);
$service_list = $result_jasa->fetch_all(MYSQLI_ASSOC);
?>
