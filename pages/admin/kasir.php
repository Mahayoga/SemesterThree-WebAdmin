<?php
$koneksi = new mysqli("localhost", "root", "", "barbershop");
?>

<div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <form>
              <div class="mb-4">
                <label for="id_bayar" class="form-label">ID Transaksi</label>
                <input type="text" class="form-control" id="transaksi_id" name="transaksi_id" readonly>
              </div>
              <div class="mb-4">
                <label for="nama_customer" class="form-label">Nama Customer</label>
                <input type="text" class="form-control" id="nama_customer" name="nama_customer">
              </div>
              <div class="mb-4">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp">
              </div>
              <div class="mb-4">
                <label for="cashier" class="form-label">Cashier</label>
                <input type="text" class="form-control" id="cashier" name="cashier">
              </div>
              <div class="mb-4">
                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                <select class="form-select" id="payment_method" name="payment_method">
                  <option value="Cash">Cash</option>
                  <option value="Transfer">Transfer</option>
                </select>
              </div>
              <div class="mb-4">
                <label for="tanggal_transaksi" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi">
              </div>
              <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Informasi Transaksi</h4>
            <table class="table table-bordered" id="produkTable">
              <thead class="table-light">
                <tr>
                  <th style="width: 40%;">Produk</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <select class="form-select produk-select" onchange="updateHarga(this)">
                      <option value="">Pilih Produk</option>
                      <option value="Haircut">Haircut</option>
                      <option value="Hairwash">Hairwash</option>
                      <option value="Keratin">Keratin</option>
                    </select>
                  </td>
                  <td><input type="number" class="form-control" min="1" value="1" onchange="updateTotal()"></td>
                  <td><input type="text" class="form-control" readonly></td>
                  <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">Hapus</button></td>
                </tr>
              </tbody>
            </table>
            <button class="btn btn-success w-100 mt-3" onclick="addRow()">Tambah Produk</button>
          </div>
          <div class="total-container mt-4">
            <div class="form-group">
              <label for="total_harga" class="form-label">Total Harga</label>
              <input type="text" class="form-control" id="total_harga" name="total_harga" readonly>
            </div>
            <div class="form-group">
              <label for="bayar" class="form-label">Bayar</label>
              <input type="text" class="form-control" id="bayar" name="bayar" onchange="calculateChange()">
            </div>
            <div class="form-group">
              <label for="kembalian" class="form-label">Kembalian</label>
              <input type="text" class="form-control" id="kembalian" name="kembalian" readonly>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const hargaProduk = {
      Haircut: 35000,
      Hairwash: 10000,
      Keratin: 150000
    };

    function updateHarga(selectElement) {
      const row = selectElement.closest('tr');
      const produk = selectElement.value;
      const harga = hargaProduk[produk] || 0;
      row.querySelector('input[readonly]').value = harga.toFixed(2);
      updateTotal();
    }

    function addRow() {
      const table = document.getElementById("produkTable").querySelector("tbody");
      const newRow = `
        <tr>
          <td>
            <select class="form-select produk-select" onchange="updateHarga(this)">
              <option value="">Pilih Produk</option>
              <option value="Haircut">Haircut</option>
              <option value="Hairwash">Hairwash</option>
              <option value="Keratin">Keratin</option>
            </select>
          </td>
          <td><input type="number" class="form-control" min="1" value="1" onchange="updateTotal()"></td>
          <td><input type="text" class="form-control" readonly></td>
          <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">Hapus</button></td>
        </tr>`;
      table.insertAdjacentHTML("beforeend", newRow);
    }

    function removeRow(button) {
      const row = button.closest('tr');
      row.remove();
      updateTotal();
    }

    function updateTotal() {
      const rows = document.querySelectorAll("#produkTable tbody tr");
      let total = 0;
      rows.forEach(row => {
        const jumlah = parseInt(row.querySelector('input[type="number"]').value) || 0;
        const harga = parseFloat(row.querySelector('input[readonly]').value) || 0;
        total += jumlah * harga;
      });
      document.getElementById("total_harga").value = total.toFixed(2);
    }

    function calculateChange() {
      const total = parseFloat(document.getElementById("total_harga").value) || 0;
      const bayar = parseFloat(document.getElementById("bayar").value) || 0;
      const kembalian = bayar - total;
      document.getElementById("kembalian").value = kembalian.toFixed(2);
    }

    function generateNota() {
      // Ambil data dari formulir
      const transaksiId = document.getElementById("transaksi_id").value;
      const namaCustomer = document.getElementById("nama_customer").value;
      const noHp = document.getElementById("no_hp").value;
      const cashier = document.getElementById("cashier").value;
      const metodePembayaran = document.getElementById("payment_method").value;
      const tanggal = document.getElementById("tanggal").value;
      const totalHarga = document.getElementById("total_harga").value;
      const bayar = document.getElementById("bayar").value;
      const kembalian = document.getElementById("kembalian").value;

      // Ambil data tabel produk
      const rows = document.querySelectorAll("#produkTable tbody tr");
      let produkDetail = "";
      rows.forEach((row, index) => {
        const produk = row.querySelector(".produk-select").value;
        const jumlah = row.querySelector('input[type="number"]').value;
        const harga = row.querySelector('input[readonly]').value;
        produkDetail += `<tr>
          <td>${index + 1}</td>
          <td>${produk}</td>
          <td>${jumlah}</td>
          <td>${harga}</td>
          <td>${(jumlah * harga).toFixed(2)}</td>
        </tr>`;
      });

      // Nota
      const nota = `
        <div style="font-family: Arial, sans-serif; width: 400px; margin: auto; padding: 20px; border: 1px solid #000;">
          <h2 style="text-align: center;">Nota Transaksi</h2>
          <p><strong>ID Transaksi:</strong> ${transaksiId}</p>
          <p><strong>Nama Customer:</strong> ${namaCustomer}</p>
          <p><strong>No HP:</strong> ${noHp}</p>
          <p><strong>Cashier:</strong> ${cashier}</p>
          <p><strong>Metode Pembayaran:</strong> ${metodePembayaran}</p>
          <p><strong>Tanggal:</strong> ${tanggal}</p>
          <hr>
          <table style="width: 100%; border-collapse: collapse;" border="1">
            <thead>
              <tr>
                <th>#</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              ${produkDetail}
            </tbody>
          </table>
          <hr>
          <p><strong>Total Harga:</strong> ${totalHarga}</p>
          <p><strong>Bayar:</strong> ${bayar}</p>
          <p><strong>Kembalian:</strong> ${kembali}</p>
          <hr>
          <p style="text-align: center;">Terima Kasih telah berbelanja!</p>
        </div>
      `;

      // Buka jendela baru untuk mencetak nota
      const win = window.open("", "_blank");
      win.document.write(nota);
      win.document.close();
      win.print();
    }

    document.addEventListener("DOMContentLoaded", function() {
      fetchNextTransactionId();
    });

    function fetchNextTransactionId() {
      fetch("pages/admin/datatransaksi.php")
        .then(response => response.json())
        .then(data => {
          // Assuming the returned data contains the next transaction ID
          const nextTransactionId = data.next_id;
          document.getElementById("transaksi_id").value = nextTransactionId;
        })
        .catch(error => {
          console.error("Error fetching transaction ID:", error);
        });
    }
  </script>
<?php
// Menutup koneksi database
$koneksi->close();
?>