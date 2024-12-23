<div class="row">
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
          <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Uang Hari ini</p>
              <h5 class="font-weight-bolder" id="uangHariIni">Rp. 0</h5>
              <p class="mb-0">
                <span class="text-success text-sm font-weight-bolder">+55%</span>
                Sejak Kemarin
              </p>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
              <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Produk terjual</p>
              <h5 class="font-weight-bolder">
                12
              </h5>
              <p class="mb-0">
                <span class="text-success text-sm font-weight-bolder">+3%</span>
                sejak minggu kemarin
              </p>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
              <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Customer</p>
              <h5 class="font-weight-bolder">
                +3
              </h5>
              <p class="mb-0">
                <span class="text-danger text-sm font-weight-bolder">-3,2%</span>
                sejak kuartal terakhir
              </p>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
              <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Tabungan</p>
              <h5 class="font-weight-bolder">
                Rp. 950.000
              </h5>
              <p class="mb-0">
                <span class="text-success text-sm font-weight-bolder">+5%</span> Bulan kemarin
              </p>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
              <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-7">
  <div class="col-lg-12">
    <iframe title="Transaksi" class="w-100" height="541.25" 
      src="<?= $env['POWER_BI_DASHBOARD']?>" 
      frameborder="0" allowFullScreen="true">
    </iframe>
  </div>
</div>
<div class="row mt-4">
  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card ">
      <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
          <h6 class="mb-2">Penjualan Teratas</h6>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center ">
          <td class="w-30">
            <div class="d-flex px-2 py-1 align-items-center">
              <div>
                <img src="assets/img/icons/flags/BR.png" alt="Country flag">
              </div>
              <div class="ms-4">
                <p class="text-xs font-weight-bold mb-0">Country:</p>
                <h6 class="text-sm mb-0">Brayzilllll</h6>
              </div>
            </div>
          </td>
          <td>
            <div class="text-center">
              <p class="text-xs font-weight-bold mb-0">Sales:</p>
              <h6 class="text-sm mb-0">562</h6>
            </div>
          </td>
          <td>
            <div class="text-center">
              <p class="text-xs font-weight-bold mb-0">Value:</p>
              <h6 class="text-sm mb-0">$143,960</h6>
            </div>
          </td>
          <td class="align-middle text-sm">
            <div class="col text-center">
              <p class="text-xs font-weight-bold mb-0">Bounce:</p>
              <h6 class="text-sm mb-0">32.14%</h6>
            </div>
          </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-5">
    <div class="card">
      <div class="card-header pb-0 p-3">
        <h6 class="mb-0">Kategori</h6>
      </div>
      <div class="card-body p-3">
        <ul class="list-group">
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                <i class="ni ni-mobile-button text-white opacity-10"></i>
              </div>
              <div class="d-flex flex-column">
                <h6 class="mb-1 text-dark text-sm">Paket 1</h6>
                <span class="text-xs">Stok 100, <span class="font-weight-bold">150+ sold</span></span>
              </div>
            </div>
            <div class="d-flex">
              <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
            </div>
          </li>
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                <i class="ni ni-tag text-white opacity-10"></i>
              </div>
              <div class="d-flex flex-column">
                <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                <span class="text-xs">123 closed, <span class="font-weight-bold">15 open</span></span>
              </div>
            </div>
            <div class="d-flex">
              <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
            </div>
          </li>
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                <i class="ni ni-box-2 text-white opacity-10"></i>
              </div>
              <div class="d-flex flex-column">
                <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                <span class="text-xs">1 is active, <span class="font-weight-bold">40 closed</span></span>
              </div>
            </div>
            <div class="d-flex">
              <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
            </div>
          </li>
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                <i class="ni ni-satisfied text-white opacity-10"></i>
              </div>
              <div class="d-flex flex-column">
                <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                <span class="text-xs font-weight-bold">+ 430</span>
              </div>
            </div>
            <div class="d-flex">
              <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Script untuk Fetch Data -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Fetch data pendapatan harian
    fetch("fetch_pendapatan.php")
      .then(response => {
        if (!response.ok) {
          throw new Error("HTTP status " + response.status);
        }
        return response.text();
      })
      .then(data => {
        document.getElementById("uangHariIni").textContent = "Rp. " + data;
      })
      .catch(error => {
        console.error("Gagal memuat data pendapatan:", error);
      });
  });
</script>