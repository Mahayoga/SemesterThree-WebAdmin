<div class="container">
  <div class="row">
    <div class="col-md-8">
    <div class="card">
    <div class="card-body">
    <form>
            <div class="mb-3">
              <label for="id_bayar" class="form-label">ID Bayar</label>
              <input type="text" class="form-control" id="id_bayar" name="id_bayar">
            </div>
            <div class="mb-3">
              <label for="nama_customer" class="form-label">Nama Customer</label>
              <input type="text" class="form-control" id="nama_customer" name="nama_customer">
            </div>
            <div class="mb-3">
              <label for="no_hp" class="form-label">No HP</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp">
            </div>
            <div class="mb-3">
              <label for="cashier" class="form-label">Cashier</label>
              <input type="text" class="form-control" id="cashier" name="cashier">
            </div>
            <div class="mb-3">
              <label for="tanggal" class="form-label">Tanggal</label>
              <input type="date" class="form-control" id="tanggal" name="tanggal">
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
          </form>
    </div>
  </div>
    </div>
    <div class="col-md-4">
    <div class="card">
    <div class="card-body">
    <h4 class="card-title">Informasi Transaksi</h4>
          <table class="table table-bordered">
            <thead class="table-light">
              <tr>
                <th class="p-2">Produk</th>
                <th class="p-2">Jumlah</th>
                <th class="p-2">Harga</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" class="form-control" name="produk1"></td>
                <td><input type="text" class="form-control" name="jumlah1"></td>
                <td><input type="text" class="form-control" name="harga1"></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" name="produk2"></td>
                <td><input type="text" class="form-control" name="jumlah2"></td>
                <td><input type="text" class="form-control" name="harga2"></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" name="produk3"></td>
                <td><input type="text" class="form-control" name="jumlah3"></td>
                <td><input type="text" class="form-control" name="harga3"></td>
              </tr>
            </tbody>
          </table>
    </div>
    <div class="total-container mt-3">
        <div class="form-group">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="text" class="form-control" id="total_harga" name="total_harga">
        </div>
        <div class="form-group">
            <label for="bayar" class="form-label">Bayar</label>
            <input type="text" class="form-control" id="bayar" name="bayar" onchange="calculateChange()">
        </div>
        <div class="form-group">
            <label for="kembali" class="form-label">Kembalian</label>
            <input type="text" class="form-control" id="kembali" name="kembali">
        </div>
</div>
  </div>
    </div>
  </div>
  
</div>