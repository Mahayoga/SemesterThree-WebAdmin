<?php
    $koneksi = new mysqli('localhost', 'root', '*Nisa!23', 'barbershop');
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    } 
?>