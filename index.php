<?php 
  include 'config/connection.php';
  session_start();
  if(@$_SESSION['isLogin']) {
    include 'pages/layout/admin/app.php';
  } else {
    if(@$_GET['hal'] == 'login' || @$_GET['hal'] == 'register') {
      include 'pages/layout/user/app.php';
    } else {
      include 'pages/layout/user/app2.php';
    }
  }
?>