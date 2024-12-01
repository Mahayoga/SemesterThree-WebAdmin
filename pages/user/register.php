<script>
    function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<?php
if(isset($_POST['btn-register'])){
  $nama = $_POST['Nama'];
  $email = $_POST['Email'];
  $pass = $_POST['Password'];

  $stmt = $koneksi->prepare("INSERT INTO users (nama, email, password, role) VALUES (?, ?, ?, 'user')");
  $stmt->bind_param("sss", $nama, $email, password_hash($pass, PASSWORD_BCRYPT, ["cost" => 12]));
  $stmt->execute();

  // $_SESSION['btn-register'] = true;

  echo "<script>alert('Selesai')</script>";
  header('Location: ?hal=login');
  exit();
}
?>
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Selamat Datang</h1>
            <p class="text-lead text-white">Memotong rambut ialah seni berkreasi tanpa penghapus</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Silahkan Registrasi</h5>
            </div>
            <div class="row px-xl-5 px-sm-4 px-3">
              <div class="col-3 ms-auto px-1">
              </div>
              <div class="col-3 px-1">                  
              </div>
              <div class="col-3 me-auto px-1">     
              </div>
            </div>
            <div class="card-body">
              <form role="form" method="post">
                <div class="mb-3">
                  <input type="text" name="Nama" class="form-control" placeholder="Nama" aria-label="Nama">
                </div>
                <div class="mb-3">
                  <input type="email" name="Email" class="form-control" placeholder="Email" aria-label="Email">
                </div>
                <div class="mb-3">
                  <input type="password" name="Password" class="form-control" placeholder="Password" aria-label="Password" id="password">
                </div>
                <div class="form-check form-switch mb-3">
                  <input class="form-check-input" type="checkbox" onclick="myFunction()">
                  <label class="form-check-label" for="Show">Tampilkan Password</label>
                </div>
                <div class="form-check form-check-info text-start">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" name="btn-register" class="btn bg-gradient-info w-100 my-4 mb-2">Daftar</button>
                </div>
                <p class="text-sm mt-3 mb-0">Sudah memiliki Akun? <a href="?hal=login" class="text-dark font-weight-bolder">Masuk</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-dribbble"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-pinterest"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright <script>
              document.write(new Date().getFullYear())
            </script> © Kelompok 2
          </p>
        </div>
      </div>
    </div>
  </footer>