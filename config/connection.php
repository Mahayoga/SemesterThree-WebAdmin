<?php
    $env = parse_ini_file(".env");
    $koneksi = new mysqli($env["DATABASE_HOST"], $env["DATABASE_USERNAME"], $env["DATABASE_PASSWORD"], $env["DATABASE_NAME"]);
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    } 
    $result = $koneksi->query("SHOW TABLES");
    $d = $result->fetch_array();
    if(isset($d) != 1) {
        include "dependencies/index.php";
    }
?>