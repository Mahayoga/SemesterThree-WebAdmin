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
<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
            <div class="card card-plain">
              <div class="card-header pb-0 text-start">
                <h4 class="font-weight-bolder">Login</h4>
                <p class="mb-0">Masukkan Email dan Password</p>
              </div>
              <div class="card-body">
                <div class="mb-3">
                  <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email">
                </div>
                <div class="mb-3">
                  <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" id="password">
                </div>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" onclick="myFunction()">
                  <label class="form-check-label" for="Show">Tampilkan Password</label>
                </div>
                <div class="text-center">
                  <button type="button" onclick="login()" name="btn-login" class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0">Masuk</button>
                </div>
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                  Belum memiliki Akun?
                  <a href="?hal=register" class="text-info text-gradient font-weight-bold">Daftar</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
        background-size: cover;">
              <span class="mask bg-gradient-primary opacity-6"></span>
              <h4 class="mt-5 text-white font-weight-bolder position-relative">"Semakin Tampan Bersama Kami"</h4>
              <p class="text-white position-relative">Anda tampan kami Segan</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<script>
  function login() {
    let xhttp = new XMLHttpRequest();
    let formData = new FormData();

    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    formData.append('email', email);
    formData.append('password', password);

    xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        Swal.fire({
          title: data.title,
          text: data.message,
          icon: data.status
        });
        if(data.status == 'success') {
          window.location.href = window.location.href.replace('hal=login', 'hal=dashboard');
        }
      }
    };

    xhttp.open('POST', 'crud/login.php', true);
    xhttp.send(formData);
  }
</script>