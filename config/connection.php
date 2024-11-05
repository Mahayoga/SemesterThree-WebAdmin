<?php
  $conn = mysqli_connect('localhost', 'phpmyadmin', 'HelloWorld', 'barbershop');

  if($conn->connect_error) {
    die('Koneksi Gagal');
  }