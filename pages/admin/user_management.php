<?php
// Menghubungkan file koneksi
include 'koneksi.php';

// Handle Create
if (isset($_POST['create'])) {
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "INSERT INTO users (nama, no_telp, email, role) VALUES ('$nama', '$no_telp', '$email', '$role')";
    if ($koneksi->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Handle Update
if (isset($_POST['update'])) {
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET nama='$nama', no_telp='$no_telp', email='$email', role='$role' WHERE id_user=$id_user";
    if ($koneksi->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Handle Delete
if (isset($_GET['hapus'])) {
    $id_user = $_GET['hapus'];
    $sql = "DELETE FROM users WHERE id_user=$id_user";
    if ($koneksi->query($sql) === TRUE) {
        header("Location: user_management.php"); // Redirect setelah hapus
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Query untuk menampilkan data users
$sql = "SELECT * FROM users";
$result = $koneksi->query($sql);

// Handle Edit
if (isset($_GET['edit'])) {
    $id_user = $_GET['edit'];
    $sql = "SELECT * FROM users WHERE id_user=$id_user";
    $result = $koneksi->query($sql);
    $user = $result->fetch_assoc();

    // Output data for editing (for example, returning it as an associative array or JSON)
    echo json_encode($user);
}

// Menutup koneksi database
$koneksi->close();
?>
