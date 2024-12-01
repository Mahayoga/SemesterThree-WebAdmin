<?php
    $koneksi = new mysqli('localhost', 'root', '', 'barbershop');
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    } 
?>