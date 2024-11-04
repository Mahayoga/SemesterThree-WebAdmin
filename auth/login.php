<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
      <form action="">
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
</body>
</html>