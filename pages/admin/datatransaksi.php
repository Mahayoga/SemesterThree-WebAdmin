<div class="row">
  <?php
  // Query untuk mendapatkan data dari tabel transaksi
  $sql = "SELECT t.transaksi_id, t.id_user, u.nama AS nama_costumer, t.total_produk, t.total_harga, t.bayar, t.kembalian, t.payment_method, t.tanggal_transaksi, t.status
        FROM transaksi t
        JOIN users u ON t.id_user = u.id_user"; // Menambahkan JOIN untuk mendapatkan nama_costumer
  $result = $koneksi->query($sql);
  ?>
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Costumer</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Harga</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tgl Transaksi</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Aksi</th>
                </tr>
              </thead>
              <tbody id="transactionBody">
                <?php if ($result->num_rows > 0): $i = 1;?>
                  <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                      <td class="text-sm p-2"><?php echo $i; ?></td>
                      <td class="text-sm p-2"><?php echo $row['nama_costumer']; ?></td>
                      <td class="text-sm p-2"><?php echo $row['total_harga']; ?></td>
                      <td class="text-sm p-2"><?php echo $row['tanggal_transaksi']; ?></td>
                      <td class="text-sm p-2 text-center"><?php echo $row['status']; ?></td>
                      <td class="text-sm p-2">
                        <button type="button" class="btn btn-dark btn-sm p-2">Detail</button>
                      </td>
                    </tr>
                  <?php $i++; endwhile; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="11" class="text-center">Tidak ada transaksi ditemukan</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>          
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript untuk Filter Tanggal -->
  <script>
    function searchByDate() {
      const startDate = document.getElementById('startDate').value;
      const endDate = document.getElementById('endDate').value;
      const rows = document.querySelectorAll('#transactionBody tr');

      console.log(rows);

      rows.forEach(row => {
        const date = row.children[2].textContent.trim();
        if (startDate && endDate) {
          // Jika tanggal sama, hanya tampilkan baris dengan tanggal tersebut
          if (startDate === endDate) {
            if (date === startDate) {
              row.style.display = ''; // Tampilkan baris
            } else {
              row.style.display = 'none'; // Sembunyikan baris
            }
          }
          // Jika rentang berbeda, tampilkan sesuai rentang
          else if (date >= startDate && date <= endDate) {
            row.style.display = ''; // Tampilkan baris
          } else {
            row.style.display = 'none'; // Sembunyikan baris
          }
        } else {
          row.style.display = ''; // Tampilkan semua jika input kosong
        }
      });
    }
  </script>
  <?php
  // Menutup koneksi database
  $koneksi->close();
  ?>
</div>