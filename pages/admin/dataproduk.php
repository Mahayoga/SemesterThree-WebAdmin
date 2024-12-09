<div class="row">
<?php
// Query untuk mendapatkan data dari tabel produk
$sql = "SELECT * FROM produk";
$result = $koneksi->query($sql);
?>
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
          <h6><strong>Data Produk</strong></h6>
          <div class="container mt-4">
            <div>
              <button type="button" class="btn btn-success btn-sm">Tambah</button>
            </div>
          </div>
          <table class="table table-striped table-bordered mt-4" style="font-size: 12px; width: 100%;">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Id Produk</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 20%;">Nama Produk</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 15%;">Harga Beli</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 15%;">Harga Jual</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 25%;">Deskripsi Produk</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Stok</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 15%;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($row['id_produk']); ?></td>
                    <td><?php echo htmlspecialchars($row['nama_produk']); ?></td>
                    <td class="text-center"><?php echo number_format($row['harga_beli'], 0, ',', '.'); ?></td>
                    <td class="text-center"><?php echo number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($row['deskripsi_produk']); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($row['stok']); ?></td>
                    <td class="align-middle text-center">
                      <!-- Tombol Edit dan Hapus dengan ukuran lebih kecil -->
                      <button type="button" class="btn btn-primary btn-sm" style="padding: 4px 8px; font-size: 12px;">Edit</button>
                      <button type="button" class="btn btn-danger btn-sm" style="padding: 4px 8px; font-size: 12px;">Hapus</button>
                    </td>
                  </tr>
                <?php endwhile; ?>
              <?php else: ?>
                <tr>
                  <td colspan="7" class="text-center">Tidak ada data produk</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </body>
      </div>
    </div>
  </div>
</div>
<?php
// Menutup koneksi database
$koneksi->close();
?>
