<?php
    $localhostName = '';
    $databaseUsername = '';
    $databasePassword = '';

    if(!function_exists("readline")) {
        echo "Masukkan localhost (database): ";
        $localhostName = trim(fgets(STDIN));
        echo "Masukkan username phpMyAdmin: ";
        $databaseUsername = trim(fgets(STDIN));
        echo "Masukkan password phpMyAdmin (kosongkan jika tidak ada): ";
        $databasePassword = trim(fgets(STDIN));
    } else {
        $localhostName = readline('Masukkan localhost (database): ');
        $databaseUsername = readline('Masukkan username phpMyAdmin: ');
        $databasePassword = readline('Masukkan password phpMyAdmin (kosongkan jika tidak ada): ');
    }

    echo "Okee file config akan dibuat dengan nama database 'barbershop'.....\n";

    mkdir('config');
    $fileConnection = fopen('config/connection.php', 'w');
    fwrite($fileConnection, '<?php
    $koneksi = new mysqli("' . $localhostName . '", "' . $databaseUsername .'", "' . $databasePassword .'", "barbershop");
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    } 
?>');
    fclose($fileConnection);

    $database = 'barbershop';
    $koneksi = new mysqli($localhostName, $databaseUsername, $databasePassword, '');

    // Dropping Database
    echo "Sedang me-reset database $database \n";
    $sql = "DROP DATABASE $database";
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
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id_user INT(11) AUTO_INCREMENT PRIMARY KEY,
        nama_user VARCHAR(255) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        role ENUM('admin', 'user') NOT NULL
    )";
    if($koneksi->query($sql) === true) {
        echo "Tabel dibuat!: users \n";
    } else {
        echo "Error: saat membuat tabel \n";
    }

    // Create Seeder users
    $sql = "INSERT INTO users (nama_user, email, password, role) VALUES 
        ('Mahayoga', 'myoga.bahtiar@gmail.com', '" . password_hash('admin1234', PASSWORD_BCRYPT, ['cost' => 12]) . "', 'admin'),
        ('Irsyad', 'syadd@gmail.com', '" . password_hash('admin1234', PASSWORD_BCRYPT, ['cost' => 12]) . "', 'admin'),
        ('Nisa', 'nisa@gmail.com', '" . password_hash('admin1234', PASSWORD_BCRYPT, ['cost' => 12]) . "', 'admin'),
        ('Citra', 'citra@gmail.com', '" . password_hash('admin1234', PASSWORD_BCRYPT, ['cost' => 12]) . "', 'admin'),
        ('Fila', 'fila@gmail.com', '" . password_hash('admin1234', PASSWORD_BCRYPT, ['cost' => 12]) . "', 'admin'),

        ('User Test', 'user@gmail.com', '" . password_hash('user1234', PASSWORD_BCRYPT, ['cost' => 12]) . "', 'user')
    ";
    if($koneksi->query($sql) === true) {
        echo "Seeder users dibuat!: users \n";
    } else {
        echo "Error: saat memasukkan seeder users \n";
    }
?>