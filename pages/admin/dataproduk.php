<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
          <h6><strong>Data Produk</strong></h6>
          <div class="container mt-4">
            <div>
              <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
            </div>
          </div>
          <table class="table table-striped table-bordered mt-4" style="font-size: 12px; width: 100%;">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%;">Id Produk</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 20%;">Nama Produk</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 15%;">Harga Beli</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 15%;">Harga Jual</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 15%;">Aksi</th>
              </tr>
            </thead>
            <tbody id="tbody">
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Produk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><b>Id Produk: </b><span id="id_produk_detail"></span></p>
        <p><b>Nama Produk: </b><span id="nama_produk_detail"></span></p>
        <p><b>Deskripsi Produk: </b><span id="deskripsi_produk_detail"></span></p>
        <p><b>Harga Beli: </b><span id="harga_beli_produk_detail"></span></p>
        <p><b>Harga Jual: </b><span id="harga_jual_produk_detail"></span></p>
        <p><b>Stok: </b><span id="stok_produk_detail"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Produk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-body">
          <label for="nama_produk_tambah">Nama Produk</label>
          <input type="text" id="nama_produk_tambah" class="form-control">
        </div>
        <div class="form-body">
          <label for="deskripsi_produk_tambah">Deskripsi Produk</label>
          <input type="text" id="deskripsi_produk_tambah" class="form-control">
        </div>
        <div class="form-body">
          <label for="harga_beli_produk_tambah">Harga Beli</label>
          <input type="number" id="harga_beli_produk_tambah" class="form-control">
        </div>
        <div class="form-body">
          <label for="harga_jual_produk_tambah">Harga Jual</label>
          <input type="number" id="harga_jual_produk_tambah" class="form-control">
        </div>
        <div class="form-body">
          <label for="stok_produk_tambah">Stok</label>
          <input type="number" id="stok_produk_tambah" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="simpanDataProduk()">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-body">
          <label for="nama_produk_edit">Nama Produk</label>
          <input type="text" id="nama_produk_edit" class="form-control">
        </div>
        <div class="form-body">
          <label for="deskripsi_produk_edit">Deskripsi Produk</label>
          <input type="text" id="deskripsi_produk_edit" class="form-control">
        </div>
        <div class="form-body">
          <label for="harga_beli_produk_edit">Harga Beli</label>
          <input type="number" id="harga_beli_produk_edit" class="form-control">
        </div>
        <div class="form-body">
          <label for="harga_jual_produk_edit">Harga Jual</label>
          <input type="number" id="harga_jual_produk_edit" class="form-control">
        </div>
        <div class="form-body">
          <label for="stok_produk_edit">Stok</label>
          <input type="number" id="stok_produk_edit" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" onclick="simpanEditData()">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda akan menghapus produk ini dengan nama <b id="nama_produk_hapus"></b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" onclick="hapusData()">Hapus</button>
      </div>
    </div>
  </div>
</div>

<script>
  let idEdit = null;
  let idHapus = null;

  function ambilData() {
    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        let data = JSON.parse(this.responseText);
        let tbody = document.getElementById("tbody");
        let i = 1;
        if (data.status === "success") {
          tbody.innerHTML = "";
          data.data.forEach(element => {
            tbody.innerHTML += `
              <tr>
                <td class="fs-6">${element.id_produk}</td>
                <td class="fs-6">${element.nama_produk}</td>
                <td class="fs-6">${element.harga_beli}</td>
                <td class="fs-6">${element.harga_jual}</td>
                <td>
                  <button class="btn btn-info btn-sm" 
                          data-id_produk="${element.id_produk}" 
                          data-nama_produk="${element.nama_produk}" 
                          data-deskripsi_produk="${element.deskripsi_produk}" 
                          data-harga_beli="${element.harga_beli}" 
                          data-harga_jual="${element.harga_jual}" 
                          data-stok="${element.stok}" 
                          onclick="setDetailModal(this)" 
                          data-bs-toggle="modal" data-bs-target="#modalDetail">Detail</button>
                  <button class="btn btn-secondary btn-sm" 
                          data-id_produk="${element.id_produk}" 
                          data-nama_produk="${element.nama_produk}" 
                          data-deskripsi_produk="${element.deskripsi_produk}" 
                          data-harga_beli="${element.harga_beli}" 
                          data-harga_jual="${element.harga_jual}" 
                          data-stok="${element.stok}" 
                          onclick="setEditModal(this)" 
                          data-bs-toggle="modal" data-bs-target="#modalEdit">Edit</button>
                  <button class="btn btn-danger btn-sm" 
                          data-id_produk="${element.id_produk}" 
                          onclick="setHapusModal(this)" 
                          data-bs-toggle="modal" data-bs-target="#modalHapus">Hapus</button>
                </td>
              </tr>
            `;
            i++;
          });
        } else {
          tbody.innerHTML = `<tr><td colspan="5" class="text-center">Tidak ada data produk</td></tr>`;
        }
      }
    };

    xhttp.open("GET", "crud/data_produk.php", true);
    xhttp.send();
  }

  function setDetailModal(btnData) {
    document.getElementById("id_produk_detail").innerText = btnData.getAttribute('data-id_produk');
    document.getElementById("nama_produk_detail").innerText = btnData.getAttribute('data-nama_produk');
    document.getElementById("deskripsi_produk_detail").innerText = btnData.getAttribute('data-deskripsi_produk');
    document.getElementById("harga_beli_produk_detail").innerText = btnData.getAttribute('data-harga_beli');
    document.getElementById("harga_jual_produk_detail").innerText = btnData.getAttribute('data-harga_jual');
    document.getElementById("stok_produk_detail").innerText = btnData.getAttribute('data-stok');
  }

  function setEditModal(btnData) {
  // Ambil ID produk untuk diedit
  let id = btnData.getAttribute('data-id_produk');
  let nama_produk = btnData.getAttribute('data-nama_produk');
  let deskripsi_produk = btnData.getAttribute('data-deskripsi_produk');
  let harga_beli = btnData.getAttribute('data-harga_beli');
  let harga_jual = btnData.getAttribute('data-harga_jual');
  let stok = btnData.getAttribute('data-stok');

  // Set nilai input form berdasarkan data yang dikirim
  document.getElementById("nama_produk_edit").value = nama_produk;
  document.getElementById("deskripsi_produk_edit").value = deskripsi_produk;
  document.getElementById("harga_beli_produk_edit").value = harga_beli;
  document.getElementById("harga_jual_produk_edit").value = harga_jual;
  document.getElementById("stok_produk_edit").value = stok;

  // Menyimpan id untuk keperluan edit
  idEdit = id;
}

function simpanDataProduk() {
    let xhttp = new XMLHttpRequest();
    let formData = new FormData();

    let nama_produk = document.getElementById("nama_produk_tambah").value;
    let deskripsi_produk = document.getElementById("deskripsi_produk_tambah").value;
    let harga_beli = document.getElementById("harga_beli_produk_tambah").value;
    let harga_jual = document.getElementById("harga_jual_produk_tambah").value;
    let stok = document.getElementById("stok_produk_tambah").value;

    formData.append("nama_produk", nama_produk);
    formData.append("deskripsi_produk", deskripsi_produk);
    formData.append("harga_beli", harga_beli);
    formData.append("harga_jual", harga_jual);
    formData.append("stok", stok);

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            if (data.status == "success") {
                alert("Tambah data berhasil!");
                ambilData();
                tutupModal();
            } else {
                alert("Gagal menambah data!");
            }
        }
    };

    xhttp.open('POST', 'crud/simpan_data_produk.php', true);
    xhttp.send(formData);
}

function simpanEditData() {
    let xhttp = new XMLHttpRequest();
    let formData = new FormData();

    let nama_produk = document.getElementById("nama_produk_edit").value;
    let deskripsi_produk = document.getElementById("deskripsi_produk_edit").value;
    let harga_beli = document.getElementById("harga_beli_produk_edit").value;
    let harga_jual = document.getElementById("harga_jual_produk_edit").value;
    let stok = document.getElementById("stok_produk_edit").value;

    formData.append("id", idEdit);
    formData.append("nama_produk", nama_produk);
    formData.append("deskripsi_produk", deskripsi_produk);
    formData.append("harga_beli", harga_beli);
    formData.append("harga_jual", harga_jual);
    formData.append("stok", stok);

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);
            if (response.status == "success") {
                alert("Simpan berhasil!");
                ambilData();
                tutupModal();
            } else {
                alert("Gagal menyimpan perubahan!");
            }
        }
    };

    xhttp.open("POST", "crud/simpan_edit_produk.php", true);
    xhttp.send(formData);
}
  
  function setHapusModal(btnData) {
    let xhttp = new XMLHttpRequest();
    let id_produk = btnData.getAttribute('data-id_produk');
    xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        if(data.status == "success") {
          document.getElementById("nama_produk_hapus").innerText = data.data.nama_produk;

          idHapus = id_produk;
        }
      }
    };

    xhttp.open("GET", "crud/single_data_produk.php?id=" + id_produk, true);
    xhttp.send();
  }

  function hapusData() {
    let xhttp = new XMLHttpRequest();
    let formData = new FormData();

    formData.append("id", idHapus);

    xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        if(data.status == "success") {
          alert("Data berhasil dihapus!");
          ambilData();
          tutupModal();
        } else if(data.status == "error") {
          alert("Terjadi error pada server!, coba lagi nanti");
        }
      }
    };

    xhttp.open("POST", "crud/hapus_dataproduk.php", true);
    xhttp.send(formData);
  }

  function tutupModal() {
    let listModal = document.querySelectorAll('.modal [data-bs-dismiss="modal"]');
    listModal.forEach(element => {
      element.click();
    });
  }
  ambilData();
</script>