<div class="row">
<?php
// Query untuk mendapatkan data dari tabel users
$sql = "SELECT * FROM users";
$result = $koneksi->query($sql);
?>
<div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
    <div class="container mt-4">
        <h6><strong>Data User</strong></h6>
        <div>
          <button type="button" class="btn btn-success btn-sm">Tambah</button>
        </div>
        <table class="table table-striped table-bordered mt-4" style="font-size: 14px;">
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID User</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Telepon</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
              </tr>
            <tbody>
              <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($row['id_user']); ?></td>
                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($row['no_telp']); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($row['email']); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($row['role']); ?></td>
                    <td class="align-middle">
                    <a href="cruduser.php?edit=<?php echo $row['id_user']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="cruduser.php?hapus=<?php echo $row['id_user']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
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
