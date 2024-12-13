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
            <button class="btn btn-secondary btn-sm" onclick="resetFilter()">Reset</button>
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Tanggal Transaksi</th>
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
          <p><b>Nama User:</b> <span id="detail_nama_user">-</span></p>
          <p><b>Nama Karyawan:</b> <span id="detail_nama_karyawan">-</span></p>
          <p><b>Created At:</b> <span id="detail_created_at">-</span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Fungsi untuk mengubah format tanggal menjadi '25 Desember 2024'
    function formatTanggalSimple(tanggal) {
      if (!tanggal) return "Tanggal tidak tersedia"; // Penanganan jika tanggal kosong

      const months = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
      ];

      const parts = tanggal.split("-"); // Pisahkan tanggal menjadi [mm, dd, yyyy]
      if (parts.length !== 3) return "Format tanggal salah"; // Penanganan format tidak sesuai

      const month = months[parseInt(parts[1], 10) - 1]; // Ambil nama bulan
      const day = parts[2]; // Ambil tanggal (dd)
      const year = parts[0]; // Ambil tahun (yyyy)

      return `${day} ${month} ${year}`;
    }

    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        const data = JSON.parse(this.responseText);
        const tbody = document.getElementById("transactionBody");

        if (data.status === "success") {
          tbody.innerHTML = "";
          data.data.forEach((element) => {
            // Pastikan `created_at` ada sebelum diproses
            const originalDate = element.created_at ? element.created_at.split(" ")[0] : null;
            const formattedDate = originalDate ? formatTanggalSimple(originalDate) : "Tanggal tidak tersedia";

            tbody.innerHTML += `
              <tr>
                <td>${element.id_transaksi}</td>
                <td>${element.total}</td>
                <td>${element.bayar}</td>
                <td>${element.kembalian}</td>
                <td>${formattedDate}</td>
                <td>
                  <button type="button"
                    data-id_transaksi="${element.id_transaksi}"
                    data-total="${element.total}"
                    data-bayar="${element.bayar}"
                    data-kembalian="${element.kembalian}"
                    data-method_pembayaran="${element.method_pembayaran}"
                    data-nama_user="${element.nama_user}"
                    data-nama_karyawan="${element.nama_karyawan}"
                    data-created_at="${element.created_at}"
                    onclick="setDetailModal(this)"
                    class="btn btn-info btn-sm"
                    data-bs-toggle="modal" data-bs-target="#modalDetail">
                    Detail
                  </button>
                </td>
              </tr>`;
          });
        } else {
          tbody.innerHTML = `<tr><td colspan="6" class="text-center">Tidak ada data transaksi</td></tr>`;
        }
      }
    };

    xhttp.open("GET", "crud/data_transaksi.php", true);
    xhttp.send();

    // Fungsi untuk menampilkan detail transaksi di modal
    function setDetailModal(btnData) {
      let id_transaksi = btnData.getAttribute("data-id_transaksi");
      let total_transaksi = btnData.getAttribute("data-total");
      let bayar_transaksi = btnData.getAttribute("data-bayar");
      let kembalian_transaksi = btnData.getAttribute("data-kembalian");
      let method_pembayaran_transaksi = btnData.getAttribute("data-method_pembayaran");
      let nama_user_transaksi = btnData.getAttribute("data-nama_user");
      let nama_karyawan_transaksi = btnData.getAttribute("data-nama_karyawan");
      let created_at_transaksi = btnData.getAttribute("data-created_at");

      // Update data transaksi ke modal
      document.getElementById("detail_id_transaksi").innerHTML = id_transaksi;
      document.getElementById("detail_total").innerHTML = total_transaksi;
      document.getElementById("detail_bayar").innerHTML = bayar_transaksi;
      document.getElementById("detail_kembalian").innerHTML = kembalian_transaksi;
      document.getElementById("detail_method_pembayaran").innerHTML = method_pembayaran_transaksi;
      document.getElementById("detail_created_at").innerHTML = created_at_transaksi;

      // Ambil nama pengguna dan nama karyawan berdasarkan id_user dan id_karyawan
      
      document.getElementById("detail_nama_user").innerHTML = nama_user_transaksi; // Update nama pengguna di modal
      document.getElementById("detail_nama_karyawan").innerHTML = nama_karyawan_transaksi; // Update nama karyawan di modal
    }

    // Fungsi untuk mengambil nama pengguna berdasarkan id_user
    function ambilNamaUser(id_user, callback) {
      let xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if (data.status == "success") {
            callback(data.data.nama_user); // Panggil callback dengan nama pengguna
          } else {
            callback("Nama tidak ditemukan");
          }
        }
      };
      xhttp.open("GET", "crud/single_datatransaksi.php?id=" + id_user, true); // Ganti dengan API yang sesuai untuk mengambil nama pengguna
      xhttp.send();
    }

    // Fungsi untuk mengambil nama karyawan berdasarkan id_karyawan
    function ambilNamaKaryawan(id_karyawan, callback) {
      let xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if (data.status == "success") {
            callback(data.data.nama_karyawan); // Panggil callback dengan nama karyawan
          } else {
            callback("Nama tidak ditemukan");
          }
        }
      };
      xhttp.open("GET", "crud/data_karyawan.php?id=" + id_karyawan, true); // Ganti dengan API yang sesuai untuk mengambil nama karyawan
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
          const dateOnly = dateCell.textContent.trim().split(" ")[0]; // Ambil bagian tanggal saja (YYYY-MM-DD)

          // Bandingkan tanggal
          row.style.display = (dateOnly >= startDate && dateOnly <= endDate) ? "" : "none";
        }
      });
    }

    // Fungsi untuk mereset filter tanggal
    function resetFilter() {
      document.getElementById("startDate").value = "";
      document.getElementById("endDate").value = "";
      const rows = document.querySelectorAll("#transactionBody tr");
    
      rows.forEach(row => {
        row.style.display = ""; // Tampilkan semua baris
      });
    }

    // Panggil fungsi untuk memuat data saat halaman selesai dimuat
    ambilData();
  </script>
</div>
