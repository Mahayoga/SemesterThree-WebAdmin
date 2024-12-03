<div class="row">
<?php
// Mengimpor file koneksi database
include 'config/connection.php';

// Query untuk mendapatkan data dari tabel users
$sql = "SELECT * FROM users";
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
        <h6><strong>Data User</strong></h6>
        <div>
          <button type="button" class="btn btn-success btn-sm">Tambah</button>
        </div>
        <table class="table table-striped table-bordered mt-4">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID User</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Telepon</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Password</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($row['id_user']); ?></td>
                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($row['no_telp']); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($row['email']); ?></td>
                    <td class="text-center"><?php echo str_repeat('•', strlen($row['password'])); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($row['role']); ?></td>
                    <td class="align-middle">
                      <button type="button" class="btn btn-primary btn-sm">Edit</button>
                      <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                  </tr>
                <?php endwhile; ?>
              <?php else: ?>
                <tr>
                  <td colspan="7" class="text-center">Tidak ada data pengguna</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
// Menutup koneksi database
$koneksi->close();
?>
