<?php
    $localhostName = '';
    $databaseUsername = '';
    $databasePassword = '';

    if(!function_exists("readline")) {
        echo "Masukkan localhost (host database, misal, 'localhost'): ";
        $localhostName = trim(fgets(STDIN));
        echo "Masukkan username phpMyAdmin: ";
        $databaseUsername = trim(fgets(STDIN));
        echo "Masukkan password phpMyAdmin (kosongkan jika tidak ada): ";
        $databasePassword = trim(fgets(STDIN));
    } else {
        $localhostName = readline('Masukkan localhost (host database, misal, "localhost"): ');
        $databaseUsername = readline('Masukkan username phpMyAdmin: ');
        $databasePassword = readline('Masukkan password phpMyAdmin (kosongkan jika tidak ada): ');
    }

    $database = 'barbershop';
    echo "Okee file config akan dibuat dengan nama database '$database'.....\n";

    mkdir('config');
    $fileConnection = fopen('config/connection.php', 'w');
    fwrite($fileConnection, '<?php
    $koneksi = new mysqli("' . $localhostName . '", "' . $databaseUsername .'", "' . $databasePassword .'", "barbershop");
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    } 
?>');
    fclose($fileConnection);

    $koneksi = new mysqli($localhostName, $databaseUsername, $databasePassword, '');

    // Dropping Database
    echo "Sedang me-reset database $database \n";
    $sql = "DROP DATABASE IF EXISTS $database";
    if($koneksi->query($sql) === true) {
        echo "Reset database berhasil!: $database \n";
    } else {
        echo "Error: saat me-reset database \n";
    }

    // Create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $database";
    if($koneksi->query($sql) === true) {
        echo "Database dibuat!: $database \n";
    } else {
        echo "Error: saat membuat database \n";
    }

    // Use Database
    $sql = "USE $database";
    if($koneksi->query($sql) === true) {
        echo "Use berhasil!: $database \n";
    } else {
        echo "Error: saat men-select database \n";
    }

    // Create Table Users
    include "table_user.php";

    // Create Table Produk
    include "table_produk.php";

    // Create Table Jasa
    include "table_jasa.php";

    // Create Table Karyawan
    include "table_karyawan.php";

    // Create Table Booking
    include "table_booking.php";

    // Create Table Transaksi
    include "table_transaksi.php";

    // Create Table Detail Transaksi
    include "table_detail_transaksi.php";

    // Index
    // Create Table Indexes
    include "table_indexes.php";

    // Create Foreign Key Table
    include "table_foreign_key.php";