<?php
  session_start();
  include '../config/connection.php';

  $username = $_POST['username'];
  $password = $_POST['password'];
  // echo password_hash('admin1234', PASSWORD_BCRYPT, ['cost' => 12]);
  
  $sql = "SELECT * FROM users WHERE email = '" . $username . "'";

  $result = mysqli_query($conn, $sql);
  
  while($row = mysqli_fetch_assoc($result)) {
    echo print_r($row);
    if(password_verify($password, $row['password'])) {
      $_SESSION['isLoggedIn'] = true;
      $_SESSION['email'] = $username;
      $_SESSION['password'] = $password;

      $_SESSION['error'] = '';
      header('Location: /SemesterThree-WebAdmin/pages/admin/dashboard.php');
      return false;
    }
  }

  $_SESSION['error'] = 'Username atau password salah!';
  header('Location: /SemesterThree-WebAdmin/auth/login.php');