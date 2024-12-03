<div class="row">
<?php
// Mengimpor file koneksi database
include 'config/connection.php';

// Query untuk mendapatkan data dari tabel transaksi
$sql = "SELECT t.transaksi_id, t.id_user, u.nama AS nama_costumer, t.total_produk, t.total_harga, t.bayar, t.kembalian, t.payment_method, t.tanggal_transaksi, t.status
        FROM transaksi t
        JOIN users u ON t.id_user = u.id_user"; // Menambahkan JOIN untuk mendapatkan nama_costumer
$result = $koneksi->query($sql);
?>
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
    <style>
        table {
            width: 100%;
            margin-top: 20px;
            font-size: 12px;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            color: #6c757d;
            border-bottom: 2px solid #e9ecef;
        }
        td {
            font-size: 12px;
        }
        .btn-sm {
            padding: 4px 8px;
            font-size: 10px;
        }
    </style>
</head>
<body>
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
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id Transaksi</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID User</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Costumer</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Produk</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Harga</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bayar</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kembalian</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Payment Method</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Transaksi</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Status</th>
                </tr>
            </thead>
            <tbody id="transactionBody">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                  <tr>
                    <td><?php echo $row['transaksi_id']; ?></td>
                    <td><?php echo $row['id_user']; ?></td>
                    <td><?php echo $row['nama_costumer']; ?></td>
                    <td><?php echo $row['total_produk']; ?></td>
                    <td><?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
                    <td><?php echo number_format($row['bayar'], 0, ',', '.'); ?></td>
                    <td><?php echo number_format($row['kembalian'], 0, ',', '.'); ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                    <td><?php echo $row['tanggal_transaksi']; ?></td>
                    <td class="text-center"><?php echo $row['status']; ?></td>
                  </tr>
                <?php endwhile; ?>
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

<!-- JavaScript untuk Filter Tanggal -->
<script>
    function searchByDate() {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        const rows = document.querySelectorAll('#transactionBody tr');

        rows.forEach(row => {
            const date = row.children[8].textContent.trim();
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
