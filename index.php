<?php 
  include 'config/connection.php';
  session_start();
  if(@$_SESSION['isLogin'] && @$_SESSION['role'] == "user") {
    include 'pages/layout/user/app2.php';
  } else if(@$_SESSION['isLogin'] && @$_SESSION['role'] == "karyawan") {
    include 'pages/layout/admin/app.php';
  } else if(@$_SESSION['isLogin'] && @$_SESSION['role'] == "admin") {
    include 'pages/layout/admin/app.php';
  } else {
    if(@$_GET['hal'] == 'login' || @$_GET['hal'] == 'register') {
      include 'pages/layout/user/app.php';
    } else {
      include 'pages/layout/user/app2.php';
    }
  }
?>