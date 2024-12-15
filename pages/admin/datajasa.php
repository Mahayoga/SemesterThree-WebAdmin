<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <div class="container mt-4">
          <h6><strong>Data Jasa</strong></h6>
          <div>
            <button type="button" class="btn btn-success p-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
              Tambah
            </button>
          </div>
        </div>
        <table class="table table-striped table-bordered mt-4">
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Jasa</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
          </tr>
          <tbody id="tbody">
            <tr>
              <td colspan="4" class="text-center">Tidak ada data jasa</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Jasa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-body">
          <label for="">Nama Jasa</label>
          <input type="text" name="nama-jasa-tambah" id="nama_jasa_tambah" class="form-control">
        </div>
        <div class="form-body">
          <label for="">Harga</label>
          <input type="text" name="harga-jasa-tambah" id="harga_jasa_tambah" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" id="btn-tambah-simpan" onclick="simpanDataJasa()">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Jasa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-body">
          <label for="">Nama Jasa</label>
          <input type="text" name="nama-jasa-edit" id="nama_jasa_edit" class="form-control">
        </div>
        <div class="form-body">
          <label for="">Harga</label>
          <input type="text" name="harga-jasa-edit" id="harga_jasa_edit" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary" id="btn-edit-simpan" onclick="simpanEditData()">Simpan</button>
        </div>
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
        Apakah anda akan menghapus jasa ini dengan nama <b id="nama_jasa_hapus"></b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="btn-hapus-simpan" onclick="hapusData()">Hapus</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Jasa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><b>Nama: </b><span id="nama_jasa_detail"></span></p>
        <p><b>Harga: </b><span id="harga_jasa_detail"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
  let idEdit = null;
  let idHapus = null;

  function ambilData() {
    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        let tbody = document.getElementById("tbody");
        let i = 1;
        if (data.status == "success") {
          tbody.innerHTML = "";
          data.data.forEach(element => {
            tbody.innerHTML += `
              <tr>
                <td class="fs-6">${i}</td>
                <td class="fs-6">${element.nama_jasa}</td>
                <td class="fs-6">${element.harga_jasa}</td>
                <td class="fs-6">
                  <button 
                    data-id_jasa="${element.id_jasa}"
                    data-nama_jasa="${element.nama_jasa}"
                    data-harga_jasa="${element.harga_jasa}"
                    type="button" onclick="setDetailModal(this)" class="btn btn-info p-2" data-bs-toggle="modal" data-bs-target="#modalDetail">
                    Detail
                  </button>
                  <button 
                    data-id_jasa="${element.id_jasa}"
                    data-nama_jasa="${element.nama_jasa}"
                    data-harga_jasa="${element.harga_jasa}"
                    type="button" onclick="setEditModal(this)" class="btn btn-secondary p-2" data-bs-toggle="modal" data-bs-target="#modalEdit">
                    Edit
                  </button>
                  <button 
                    data-id_jasa="${element.id_jasa}"
                    type="button" onclick="setHapusModal(this)" class="btn btn-danger p-2" data-bs-toggle="modal" data-bs-target="#modalHapus">
                    Hapus
                  </button>
                </td>
              </tr>
            `;
            i++;
          });
        } else {
          tbody.innerHTML = `
            <tr>
              <td colspan="4" class="text-center">Tidak ada data jasa</td>
            </tr>
          `;
        }
      }
    };

    xhttp.open("GET", "crud/data_jasa.php", true);
    xhttp.send();
  }

  function setDetailModal(btnData) {
    let nama_jasa = btnData.getAttribute('data-nama_jasa');
    let harga_jasa = btnData.getAttribute('data-harga_jasa');
    document.getElementById("nama_jasa_detail").innerHTML = nama_jasa;
    document.getElementById("harga_jasa_detail").innerHTML = harga_jasa;
  }

  function setEditModal(btnData) {
    let id = btnData.getAttribute('data-id_jasa');
    let nama_jasa = btnData.getAttribute('data-nama_jasa');
    let harga_jasa = btnData.getAttribute('data-harga_jasa');
    document.getElementById("nama_jasa_edit").value = nama_jasa;
    document.getElementById("harga_jasa_edit").value = harga_jasa;

    idEdit = id;
  }

  function simpanDataJasa() {
    let xhttp = new XMLHttpRequest();
    let formData = new FormData();

    let nama_jasa = document.getElementById('nama_jasa_tambah').value;
    let harga_jasa = document.getElementById('harga_jasa_tambah').value;

    formData.append('nama_jasa', nama_jasa);
    formData.append('harga_jasa', harga_jasa);

    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        if (data.status == "success") {
          alert("Tambah data berhasil!");
          ambilData();
          tutupModal();
        }
      }
    };

    xhttp.open('POST', 'crud/simpan_data_jasa.php', true);
    xhttp.send(formData);
  }

  function simpanEditData() {
    let formData = new FormData();
    let xhttp = new XMLHttpRequest();

    let nama_jasa = document.getElementById("nama_jasa_edit").value;
    let harga_jasa = document.getElementById("harga_jasa_edit").value;

    formData.append("id", idEdit);
    formData.append("nama_jasa", nama_jasa);
    formData.append("harga_jasa", harga_jasa);

    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let response = JSON.parse(this.responseText);
        if (response.status == "success") {
          alert("Simpan berhasil");
          ambilData();
          tutupModal();
        }
      }
    };

    xhttp.open("POST", "crud/simpan_edit_datajasa.php", true);
    xhttp.send(formData);
  }

  function setHapusModal(btnData) {
    let xhttp = new XMLHttpRequest();
    let id = btnData.getAttribute('data-id_jasa');
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        if (data.status == "success") {
          document.getElementById("nama_jasa_hapus").innerText = data.data.nama_jasa;
          idHapus = id;
        }
      }
    };

    xhttp.open("GET", "crud/single_data_jasa.php?id=" + id, true);
    xhttp.send();
  }

  function hapusData() {
    let xhttp = new XMLHttpRequest();
    let formData = new FormData();

    formData.append("id", idHapus);

    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        if (data.status == "success") {
          alert("Data berhasil dihapus!");
          ambilData();
          tutupModal();
        } else {
          alert("Terjadi error pada server!, coba lagi nanti");
        }
      }
    };

    xhttp.open("POST", "crud/hapus_data_jasa.php", true);
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
