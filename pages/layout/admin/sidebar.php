<?php 
  if(isset($_POST['btn-logout'])) {
    session_destroy();
    header('Location: ?hal=login');
  }
?>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
      <img src="assets/img/logobaru.png" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">Barber Tim</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?php if(@$_GET['hal'] == 'dashboard') {echo 'active';}?>" href="?hal=dashboard">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if(@$_GET['hal'] == 'dataproduk') {echo 'active';}?>" href="?hal=dataproduk">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Tabel Produk</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if(@$_GET['hal'] == 'datakaryawan') {echo 'active';}?>" href="?hal=datakaryawan">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Tabel Karyawan</span>
        </a>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if(@$_GET['hal'] == 'datauser') {echo 'active';}?>" href="?hal=datauser">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Tabel User</span>
        </a>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if(@$_GET['hal'] == 'datatransaksi') {echo 'active';}?>" href="?hal=datatransaksi">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Tabel Transaksi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if(@$_GET['hal'] == 'billing') {echo 'active';}?>" href="?hal=billing">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Kasir</span>
        </a>
      </li>
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if(@$_GET['hal'] == 'profile') {echo 'active';}?>" href="?hal=profile">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Profile</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="sidenav-footer mx-3 ">
    <form method="post">
      <button type="submit" name="btn-logout" class="btn btn-dark btn-sm w-100 mb-3">Log Out</button>
    </form>
  </div>
</aside>