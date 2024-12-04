
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
    nama VARCHAR(255) NOT NULL,
    no_telp CHAR(12) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL
)";
if ($koneksi->query($sql) === true) {
    echo "Tabel dibuat!: users \n";
} else {
    echo "Error: saat membuat tabel \n";
}

// Create Seeder users
$sql = "INSERT INTO users (nama, no_telp, email, password, role) VALUES 
    ('Mahayoga', '0812345671', 'myoga.bahtiar@gmail.com', '" . password_hash('admin1234', PASSWORD_BCRYPT, ['cost' => 12]) . "', 'admin'),
    ('Irsyad','0812345672', 'syadd@gmail.com', '" . password_hash('admin1234', PASSWORD_BCRYPT, ['cost' => 12]) . "', 'admin'),
    ('Nisa','0812345673', 'nisa@gmail.com', '" . password_hash('admin1234', PASSWORD_BCRYPT, ['cost' => 12]) . "', 'admin'),
    ('Citra','0812345674', 'citra@gmail.com', '" . password_hash('admin1234', PASSWORD_BCRYPT, ['cost' => 12]) . "', 'admin'),
    ('Fila','0812345675', 'fila@gmail.com', '" . password_hash('admin1234', PASSWORD_BCRYPT, ['cost' => 12]) . "', 'admin'),
    ('User Test','0812345678', 'user@gmail.com', '" . password_hash('user1234', PASSWORD_BCRYPT, ['cost' => 12]) . "', 'user')
    ";
    if($koneksi->query($sql) === true) {
        echo "Seeder users dibuat!: users \n";
    } else {
        echo "Error: saat memasukkan seeder users \n";
    }

    // Create Table Users
    $sql = "CREATE TABLE IF NOT EXISTS produk (
        id_produk INT(11) AUTO_INCREMENT PRIMARY KEY,
        nama_produk VARCHAR(255) NOT NULL,
        harga_beli CHAR(12) NOT NULL,
        harga_jual CHAR(12) NOT NULL,
        deskripsi_produk VARCHAR(255) NOT NULL,
        stok INT NOT NULL
    )";
    if($koneksi->query($sql) === true) {
        echo "Tabel dibuat!: produk \n";
    } else {
        echo "Error: saat membuat tabel \n";
    }

    // Create Seeder users
    $sql = "INSERT INTO produk (nama_produk, harga_beli, harga_jual, deskripsi_produk, stok) VALUES 
        ('Shampo','33000','40000','Shampo anti ketombe','45'),
        ('Pomade','45000','55000','Pomade varians','55'),
        ('Powder','47000','55000','Powder pelembut','30'),
        ('Conditioner','30000','40000','Conditioner pelembut','40'),
        ('Vitamin','70000','80000','Menutrisi dan merawat','47'),
        ('Hairmask','55000','65000','Membantu melembutkan','30')
    ";
    if($koneksi->query($sql) === true) {
        echo "Seeder produk dibuat! \n";
    } else {
        echo "Error: saat memasukkan seeder produk \n";
    }

    // Create Table karyawan
    $sql = "CREATE TABLE IF NOT EXISTS karyawan (
        id_karyawan INT(11) AUTO_INCREMENT PRIMARY KEY,
        nama_karyawan VARCHAR(255) NOT NULL,
        no_telepon CHAR(15) NOT NULL,
        alamat CHAR(12) NOT NULL
       )";
    if($koneksi->query($sql) === true) {
        echo "Tabel dibuat!: karyawan \n";
    } else {
        echo "Error: saat membuat tabel \n";
    }  

     // Create Seeder karyawan
     $sql = "INSERT INTO karyawan (nama_karyawan, no_telepon, alamat) VALUES 
     ('Mahayoga','085372638944','Probolinggo'),
     ('Nisa','0813838452985','Banyuwangi'),
     ('Citra','08324674634','Jember'),
     ('Filla','0812445446','Probolinggo'),
     ('Irsyad','08251575715','Gresik'),
     ('Samsul','08327547252','Jember')
     ";
if($koneksi->query($sql) === true) {
    echo "Seeder produk dibuat! \n";
} else {
    echo "Error: saat membuat tabel \n";
}  

// Create Table Transaksi
$sql = "CREATE TABLE IF NOT EXISTS transaksi (
    transaksi_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_user INT(11) NOT NULL,
    nama_customer VARCHAR(100) NOT NULL,
    total_produk INT(3) NOT NULL,
    total_harga DECIMAL(10,2) NOT NULL,
    bayar DECIMAL(10,2) NOT NULL,
    kembalian DECIMAL(10,2) NOT NULL,
    payment_method ENUM('cash','transfer') DEFAULT 'cash',
    tanggal_transaksi DATE NOT NULL,
    status ENUM('completed','pending','failed') DEFAULT 'completed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
if ($koneksi->query($sql) === true) {
    echo "Tabel dibuat!: transaksi \n";
} else {
    echo "Error: saat membuat tabel transaksi \n";
}

// Create Seeder transaksi
$sql = "INSERT INTO transaksi (id_user, nama_customer, total_produk, total_harga, bayar, kembalian, payment_method, tanggal_transaksi, status) VALUES
    (3, 'Nisa', 2, 50000.00, 100000.00, 50000.00, 'cash', '2024-11-24', 'completed'),
    (2, 'Irsyad', 4, 150000.00, 200000.00, 50000.00, 'cash', '2024-11-25', 'completed'),
    (4, 'Citra', 3, 100000.00, 100000.00, 0.00, 'cash', '2024-11-25', 'completed')
";
if ($koneksi->query($sql) === true) {
    echo "Seeder transaksi dibuat!: transaksi \n";
} else {
    echo "Error: saat memasukkan seeder transaksi \n";
}
?>