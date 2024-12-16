<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="assets/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/user/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/user/vendor/aos/aos.css" rel="stylesheet">

  <link href="assets/user/css/main.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="assets/img/logobaru.png">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <title>GreenHead</title>
</head>

<body class="index-page" id="hehe">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <h1 class="sitename"><b>GreenHead</b></h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#">Tentang</a></li>
          <li><a href="#why-us">Kenapa Kami?</a></li>
          <li><a href="#services">Services</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
          <?php
            if(@$_SESSION['isLogin']) {
          ?>
          <li>
            <p id="data-user" class="d-none" data-id_user="<?= @$_SESSION['id_user']?>"></p>
            <a href=""><?= @$_SESSION['name']?></a>
          </li>
          <li>
            <form method="POST">
              <button type="submit" class="btn btn-danger mx-4" name="btn-logout">Logout</button>
            </form>
          </li>
          <?php
            } else {
          ?>
          <li><a id="data-user" href="?hal=login">Login</a></li>
          <?php 
            } 
            if(isset($_POST['btn-logout'])) {
              session_destroy();
              header('Location: ?hal=login');
            }
          ?>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <section id="hero" class="hero section">
      <img src="assets/user/img/hero-bg.jpg" alt="" data-aos="fade-in" class="">
      <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h2>Selamat Datang di GreenHead</h2>
            <a href="#about" class="btn-get-started">Lanjutkan</a>
          </div>
        </div>
      </div>
    </section>

    <section id="about" class="about section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang</h2>
        <p>Anda telah menemukan tempat yang pas untuk Glow Up</p>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-6">
            <img src="assets/user/img/newlogo.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 content">
            <h3>Mengenal apa itu GreenHead?</h3>
            <p class="fst-italic">
              Green Head adalah tempat Cukur para Pria, dimana orang orang ingin mengubah tampilan khususnya di area kepala (Rambut) sehingga dapat terlihat lebih menawan.
            </p>
            <ul>
              <li><i class="bi bi-check2-all"></i> <span>Harga Sopan</span></li>
              <li><i class="bi bi-check2-all"></i> <span>Pemotong Handal dan Terverifikasi</span></li>
              <li><i class="bi bi-check2-all"></i> <span>Hasil Memuaskan</span></li>
            </ul>
            <p>
              sekali saja anda potong rambut disini, akan ada 1000 bidadari yang menemani.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="why-us" class="why-us section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Kenapa Harus Memilih Kami?</h2>
        <p>Karena kami adalah Barber Profesional di Kota Jember.</p>
      </div>

      <div class="container">
        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
          <div class="col-md-4">
            <div class="card">
              <div class="img">
                <img src="assets/user/img/why-us-1.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-hdd-stack"></i></div>
              </div>
              <h2 class="title"><a href="#" class="stretched-link">Visi Kami</a></h2>
              <p>
              Mitra dan Solusi bagi masyarakat dengan memberikan pelayanan prima atas kebutuhan dalam hal penataan rambut pria yang up to date untuk memberikan gaya dan kerapihan dalam kehidupan.
              </p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <div class="img">
                <img src="assets/user/img/why-us-2.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-brightness-high"></i></div>
              </div>
              <h2 class="title"><a href="#" class="stretched-link">Misi Kami</a></h2>
              <p>
              Memberikan pelayanan yang baik/full dan berkualitas demi kepuasan pelanggan, 
              Menerapkan Akhlaq yang baik senyum, salam, sapa, sopan, santun demi kenyamanan konsumen serta 
              Menjalin hubungan yang baik kepada konsumen maupun kepada seluruh karyawan demi kemajuan bersama
              </p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <div class="img">
                <img src="assets/user/img/why-us-3.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-calendar4-week"></i></div>
              </div>
              <h2 class="title"><a href="#" class="stretched-link">Rencana Kami</a></h2>
              <p>
                Mengembangkan
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="services" class="services section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2>Paket Kami</h2>
      </div>

      <div class="container-fluid">
        <div class="row gy-4">
          <div class="col-md-6">
            <div class="row mb-4 p-2">
              <div class="col-lg-6 col-md-6 my-3" onclick="checkBooking(1)" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative item-booking">
                  <div class="icon">
                    <i class="bi bi-emoji-grin"></i>
                  </div>
                  <h3>Anak-Anak</h3>
                  <p>Khusus Untuk Kelas 1 - 6 SD</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 my-3" onclick="checkBooking(2)" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item position-relative item-booking">
                  <div class="icon">
                    <i class="bi bi-emoji-sunglasses"></i>
                  </div>
                  <h3>Dewasa</h3>
                  <p>SMP - Lanjut Usia</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 my-3" onclick="checkBooking(3)" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative item-booking">
                  <div class="icon">
                    <i class="bi bi-emoji-grin"></i>
                  </div>
                  <h3>Anak-Anak</h3>
                  <p>Khusus Untuk Kelas 1 - 6 SD</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 my-3" onclick="checkBooking(4)" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item position-relative item-booking">
                  <div class="icon">
                    <i class="bi bi-emoji-sunglasses"></i>
                  </div>
                  <h3>Dewasa</h3>
                  <p>SMP - Lanjut Usia</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row mb-4 h-100 p-2 align-items-center">
              <div class="col-lg-12 col-md-12">
                <div class="card rounded h-50">
                  <div class="card-body d-flex justify-content-center flex-column">
                    <input type="date" name="booking-date" id="booking-date" class="form-control mb-4" placeholder="Pilih tanggal">
                    <button type="button" class="btn btn-info text-white mb-4" onclick="checkDate()">Check Tanggal</button>
                    <button type="button" class="btn btn-danger text-white" onclick="addBooking()">Booking Sekarang</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
            if(@$_SESSION['isLogin']) {
          ?>
          <div class="col-md-12">
            <h4 class="text-center my-4">List Booking Kamu</h4>
            <table class="table">
              <thead>
                <th>No</th>
                <th>Nama Jasa</th>
                <th>Harga Jasa</th>
                <th>Tanggal Booking (Real)</th>
                <th>Status</th>
                <th>Aksi</th>
              </thead>
              <tbody id="tbody">
              <tr>
                <td colspan="6" class="text-center bg-light">Belum ada data</td>
              </tr>
              </tbody>
            </table>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
  </main>

  <footer id="footer" class="footer bg-white">
    <div class="container">
      <h3 class="sitename">Green Head</h3>
      <div class="social-links d-flex justify-content-center">
        <a href="https://www.instagram.com/greenheadbarber/"><i class="bi bi-instagram"></i></a>
        <a href="https://wa.me/085785089258"><i class="bi bi-whatsapp"></i></a>
      </div>
      <div class="container">
        <div class="copyright">
          <span>Copyright</span> <strong class="px-1 sitename">Green Head</strong> <span>All Rights Reserved</span>
        </div>
        <div class="credits">
          Made With ♡ by <a href="https://bootstrapmade.com/">C2</a>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <script src="assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/user/vendor/php-email-form/validate.js"></script>
  <script src="assets/user/vendor/aos/aos.js"></script>

  <script src="assets/user/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Detail -->
  <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Bookings</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img id="gambar-detail" style="max-width: 100px;" src="" alt="" srcset="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit -->
  <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Bookings</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-4">
            <input type="file" name="gambar" id="gambar">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="simpanBookingEdit()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Batal -->
  <div class="modal fade" id="modalBatal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Batalkan Bookings</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah anda ingin membatalkan booking ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Tutup</button>
          <button onclick="batalkanBooking()" type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
        </div>
      </div>
    </div>
  </div>


  <script>
    let dateTime = null;
    let idJasa = null;
    let idEdit = null;
    let idBatal = null;
    flatpickr("#booking-date", {
      enableTime: true,
      dateFormat: "Y-m-d H:i",
      minDate: "today",
      maxDate: new Date().fp_incr(3),
      minTime: "10:00",
      maxTime: "21:00",
      onChange: function(selectedDates, dateStr, instance) {
        dateTime = selectedDates[0];
      }
    });
    function checkDate() {
      if(document.getElementById("data-user").getAttribute("data-id_user") == null) {
        Swal.fire({
          title: "Kesalahan",
          text: "Silahkan lakukan login terlebih dahulu",
          icon: "error"
        });
        return;
      }
      if(idJasa == null) {
        Swal.fire({
          title: "Kesalahan",
          text: "Silahkan pilih paket terlebih dahulu",
          icon: "error"
        });
        return;
      } else if(dateTime == null) {
        Swal.fire({
          title: "Kesalahan",
          text: "Silahkan pilih tanggal dan jam terlebih dahulu",
          icon: "error"
        });
      }
      let theDate = dateTime.getFullYear() + "-" + (dateTime.getMonth() + 1) + "-" + dateTime.getDate() + " " + dateTime.getHours();
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      formData.append("date", theDate);

      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          let data = JSON.parse(this.responseText);
          Swal.fire({
            title: data.title,
            text: data.message,
            icon: data.status
          });
        }
      };

      xhttp.open("POST", "crud/data_booking.php", true);
      xhttp.send(formData);
    }
    function checkBooking(id) {
      let elem = document.querySelectorAll(".item-booking");
      elem.forEach(element => {
        element.style.transform = "translateY(0px)";
        element.style.borderColor = "white";
      });
      if(id == idJasa) {
        elem[id - 1].style.transform = "translateY(0px)";
        elem[id - 1].style.borderColor = "white";
        idJasa = null;
      } else {
        elem[id - 1].style.transform = "translateY(-10px)";
        elem[id - 1].style.borderColor = "var(--accent-color)";
        idJasa = id;
      }
    }
    function addBooking() {
      if(document.getElementById("data-user").getAttribute("data-id_user") == null) {
        Swal.fire({
          title: "Kesalahan",
          text: "Silahkan lakukan login terlebih dahulu",
          icon: "error"
        });
        return;
      }
      if(idJasa == null) {
        Swal.fire({
          title: "Kesalahan",
          text: "Silahkan pilih paket terlebih dahulu",
          icon: "error"
        });
        return;
      } else if(dateTime == null) {
        Swal.fire({
          title: "Kesalahan",
          text: "Silahkan pilih tanggal dan jam terlebih dahulu",
          icon: "error"
        });
      }
      let theDate = dateTime.getFullYear() + "-" + (dateTime.getMonth() + 1) + "-" + dateTime.getDate() + " " + dateTime.getHours() + ":" + dateTime.getMinutes() + ":" + dateTime.getSeconds();
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      // id_booking 	id_user 	id_jasa 	tgl_booking 	status 	created_at 	updated_at 	

      formData.append("id_user", document.getElementById("data-user").getAttribute("data-id_user"));
      formData.append("id_jasa", idJasa);
      formData.append("tgl_booking", theDate);

      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          console.log(this.responseText);
          let data = JSON.parse(this.responseText);
          Swal.fire({
            title: data.title,
            text: data.message,
            icon: data.status
          });
          ambilData();
        }
      };

      xhttp.open("POST", "crud/simpan_data_booking.php", true);
      xhttp.send(formData);
    }
    function ambilData() {
      if(document.getElementById("data-user").getAttribute("data-id_user") == null) {
        return;
      }
      let xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          console.log(this.responseText);
          let data = JSON.parse(this.responseText);
          let tbody = document.getElementById("tbody");
          let i = 1;
          tbody.innerHTML = "";
          if(data.status == "warning") {
            tbody.innerHTML = `<tr>
                <td colspan="6" class="text-center bg-light">${data.message}</td>
              </tr>`;
            return;
          }
          data.forEach(item => {
            let pending = "success";
            'pending','confirmed','canceled','complete'
            if(item.status == "pending") {
              pending = "warning";
            } else if(item.status == "confirmed") {
              pending = "info";
            } else if(item.status == "canceled") {
              pending = "dark";
            } else if(item.status == "complete") {
              pending = "success";
            }
            tbody.innerHTML += `
              <tr>
                <td>${i}</td>
                <td>${item.nama_jasa}</td>
                <td>${item.harga_jasa}</td>
                <td>${item.tgl_booking}</td>
                <td class="bg-${pending}">${item.status}</td>
                <td>
                  <button class="btn btn-dark p-2" onclick="ambilDataImage(${item.id_booking})" data-bs-toggle="modal" data-bs-target="#modalDetail">Detail</button>
                  <button class="btn btn-primary p-2" onclick="setIDEdit(${item.id_booking})" data-bs-toggle="modal" data-bs-target="#modalEdit">Upload Bukti</button>
                  <button class="btn btn-danger p-2" onclick="setIDBatal(${item.id_booking})" data-bs-toggle="modal" data-bs-target="#modalBatal">Batalkan</button>
                </td>
              </tr>
            `;
          });
        }
      };

      xhttp.open("POST", "crud/data_booking_all.php", true);
      xhttp.send();
    }
    function ambilDataImage(id) {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      formData.append("id", id);

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          document.getElementById("gambar-detail").setAttribute("src", `data:image/png;base64,${data.message}`);
        }
      };

      xhttp.open("POST", "crud/data_gambar_bukti_pembayaran.php", true);
      xhttp.send(formData);
    }
    function setIDEdit(id) {
      idEdit = id;
    }
    function simpanBookingEdit() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      formData.append("id", idEdit);
      formData.append("gambar", document.getElementById("gambar").files[0]);

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          ambilData();
          Swal.fire({
            title: data.title,
            text: data.message,
            icon: data.status
          });
        }
      };

      xhttp.open("POST", "crud/simpan_edit_booking.php", true);
      xhttp.send(formData);
    }
    function setIDBatal(id) {
      idBatal = id;
    }
    function batalkanBooking() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      formData.append("id", idBatal);

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          ambilData();
          Swal.fire({
            title: data.title,
            text: data.message,
            icon: data.status
          });
        }
      };

      xhttp.open("POST", "crud/batalkan_booking.php", true);
      xhttp.send(formData);
    }
    ambilData();
  </script>
</body>
</html>