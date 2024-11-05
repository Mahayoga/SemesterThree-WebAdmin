<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | BarberShop</title>
</head>
<body>
  <div class="container-fluid vh-100 flex-column d-flex justify-content-center align-items-center">
    <div class="logo-section">
      <div class="d-flex flex-column align-items-center">
        <div class="p-4">
          <img src="../assets/img/AGROFILIA LOGO.png" alt="Logo" width="100px">
        </div>
        <h2>SELAMAT DATANG</h2>
      </div>
    </div>
    <div class="form-section mt-5">
      <?php
        if(isset($_SESSION['error'])) {
          echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Email atau password yang anda masukkan salah atau tidak terdaftar
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          ';
          session_destroy();
        }
      ?>
      <form action="checkUser.php" method="post">
        <div class="row">
          <div class="col-md-12 col-lg-12 mb-4">
            <input type="text" name="username" class="form-control" id="username" placeholder="Username">
          </div>
          <div class="col-md-12 col-lg-12 mb-4">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          </div>
          <div class="d-flex justify-content-center">
            <div class="w-50">
              <button type="submit" name="submit" class="btn btn-dark w-100" id="submit">Login</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="reg-section my-5">
      <div class="text-gray">
        Belum memiliki akun?
        <a href="register.php" class="font-weight-bold">Daftar Sekarang</a>
      </div>
    </div>
  </div>

  <script src="../dist/bundle.js" type="module"></script>
</body>
</html>