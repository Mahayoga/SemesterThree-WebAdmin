<?php 
  include 'config/connection.php';
  session_start();
  if(@$_SESSION['isLogin']) {
    include 'pages/layout/admin/app.php';
  } else {
    include 'pages/layout/user/app.php';
  }
?>