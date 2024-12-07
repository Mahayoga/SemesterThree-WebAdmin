<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-body">
        <div class="container mt-4">
          <h5><strong>History Transaksi</strong></h5>
          <!-- Input Filter Tanggal -->
          <div class="mb-3 d-flex align-items-center">
            <label for="startDate" class="form-label me-2">Dari Tanggal:</label>
            <input type="date" id="startDate" class="form-control me-3" style="width: 200px;">
            <label for="endDate" class="form-label me-2">Sampai Tanggal:</label>
            <input type="date" id="endDate" class="form-control me-3" style="width: 200px;">
            <button class="btn btn-primary btn-sm" onclick="searchByDate()">Cari</button>
          </div>
          <!-- Tabel Data -->
          <div class="row">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Transaksi</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bayar</th> 
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kembalian</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Created At</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Aksi</th>
                </tr>
              </thead>
              <tbody id="transactionBody">
                <tr>
                  <td colspan="6" class="text-center">Tidak ada data transaksi</td>
                </tr>
              </tbody>
            </table>
          </div>          
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Detail -->
  <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Transaksi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><b>ID Transaksi:</b> <span id="detail_id_transaksi">-</span></p>
          <p><b>Total:</b> <span id="detail_total">-</span></p>
          <p><b>Bayar:</b> <span id="detail_bayar">-</span></p>
          <p><b>Kembalian:</b> <span id="detail_kembalian">-</span></p>
          <p><b>Method Pembayaran:</b> <span id="detail_method_pembayaran">-</span></p>
          <p><b>ID User:</b> <span id="detail_id_user">-</span></p>
          <p><b>ID Karyawan:</b> <span id="detail_id_karyawan">-</span></p>
          <p><b>Created At:</b> <span id="detail_created_at">-</span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Fungsi untuk memuat data transaksi
    function ambilData() {
      let xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          let data = JSON.parse(this.responseText);
          let tbody = document.getElementById("transactionBody");

          if (data.status === "success" && data.data.length > 0) {
            tbody.innerHTML = "";
            data.data.forEach((element, index) => {
              tbody.innerHTML += `
                <tr>
                  <td>${element.id_transaksi}</td>
                  <td>${element.total}</td>
                  <td>${element.bayar}</td>
                  <td>${element.kembalian}</td>
                  <td>${element.created_at}</td>
                  <td>
                    <button class="btn btn-info btn-sm" onclick="setDetailModal(${element.id_transaksi})" data-bs-toggle="modal" data-bs-target="#modalDetail">Detail</button>
                  </td>
                </tr>
              `;
            });
          } else {
            tbody.innerHTML = '<tr><td colspan="6" class="text-center">Tidak ada data transaksi</td></tr>';
          }
        }
      };

      xhttp.open("GET", "crud/data_transaksi.php", true);
      xhttp.send();
    }

    // Fungsi untuk menampilkan detail transaksi di modal
    function setDetailModal(id) {
      let xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          let data = JSON.parse(this.responseText);

          if (data.status === "success" && data.data) {
            document.getElementById("detail_id_transaksi").textContent = data.data.id_transaksi || "-";
            document.getElementById("detail_total").textContent = data.data.total || "-";
            document.getElementById("detail_bayar").textContent = data.data.bayar || "-";
            document.getElementById("detail_kembalian").textContent = data.data.kembalian || "-";
            document.getElementById("detail_method_pembayaran").textContent = data.data.method_pembayaran || "-";
            document.getElementById("detail_id_user").textContent = data.data.id_user || "-";
            document.getElementById("detail_id_karyawan").textContent = data.data.id_karyawan || "-";
            document.getElementById("detail_created_at").textContent = data.data.created_at || "-";
          } else {
            alert("Data detail tidak ditemukan.");
          }
        }
      };

      xhttp.open("GET", `crud/single_datatransaksi.php?id_transaksi=${id}`, true);
      xhttp.send();
    }

    // Fungsi untuk memfilter data berdasarkan tanggal
    function searchByDate() {
  const startDate = document.getElementById("startDate").value;
  const endDate = document.getElementById("endDate").value;
  const rows = document.querySelectorAll("#transactionBody tr");

  if (!startDate || !endDate) {
    alert("Harap isi kedua tanggal untuk memfilter.");
    return;
  }

  rows.forEach(row => {
    const dateCell = row.children[4]; // Kolom "Created At" berada di indeks ke-4

    if (dateCell) {
      const timestamp = dateCell.textContent.trim();
      const dateOnly = timestamp.split(" ")[0]; // Ambil bagian tanggal saja (YYYY-MM-DD)

      // Bandingkan tanggal
      row.style.display = (dateOnly >= startDate && dateOnly <= endDate) ? "" : "none";
    }
  });
}


    // Memuat data saat halaman selesai dimuat
    document.addEventListener("DOMContentLoaded", ambilData);
  </script>
</div>
