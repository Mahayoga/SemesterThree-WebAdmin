
<?php
    $database = $env["DATABASE_NAME"];
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