<?php
    $koneksi = new mysqli('localhost', 'phpmyadmin', 'HelloWorld', 'barbershop');
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    } 
?>