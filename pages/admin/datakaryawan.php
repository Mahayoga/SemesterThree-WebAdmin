<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <div class="container mt-4">
          <h6><strong>Data Karyawan</strong></h6>
          <div>
            <button type="button" onclick="" class="btn btn-success p-2" data-bs-toggle="modal"
              data-bs-target="#modalTambah">
              Tambah
            </button>
          </div>
        </div>
        <table class="table table-striped table-bordered mt-4">
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Karyawan</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keahlian</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
          </tr>
          <tbody id="tbody">
            <tr>
              <td colspan="5" class="text-center">Tidak ada data karyawan</td>
            </tr>
          </tbody>
        </table>
        </body>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Karyawan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-body">
          <label for="">Nama</label>
          <input type="text" name="nama-karyawan-tambah" id="nama_karyawan_tambah" class="form-control">
        </div>
        <div class="form-body">
          <label for="">Keahlian</label>
          <input type="text" name="keahlian-tambah" id="keahlian_karyawan_tambah" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" id="btn-edit-simpan" onclick="simpanDataKaryawan()">Simpan</button>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Karyawan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-body">
          <label for="">Nama</label>
          <input type="text" name="nama-karyawan-edit" id="nama_karyawan_edit" class="form-control">
        </div>
        <div class="form-body">
          <label for="">Keahlian</label>
          <input type="text" name="keahlian-karyawan-edit" id="keahlian_karyawan_edit" class="form-control">

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" id="btn-edit-simpan"
              onclick="simpanEditData()">Simpan</button>
          </div>
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
        Apakah anda akan menghapus user ini dengan nama <b id="nama_karyawan_hapus"></b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="btn-edit-simpan" onclick="hapusData()">Hapus</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Karyawan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><b>Nama: </b><span id="nama_karyawan_detail"></span></p>
        <p><b>Keahlian: </b><span id="keahlian_karyawan_detail"></span></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <!-- <button type="button" class="btn btn-primary"></button> -->
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
                <td class="fs-6">${element.nama_karyawan}</td>
                <td class="fs-6">${element.keahlian}</td>
                <td class="fs-6">
                  <button 
                  data-id_karyawan="${element.id_karyawan}"
                  data-nama_karyawan="${element.nama_karyawan}"
                  data-keahlian_karyawan="${element.keahlian}"
                  type="button" onclick="setDetailModal(this)" class="btn btn-info p-2" data-bs-toggle="modal" data-bs-target="#modalDetail">
                    Detail
                  </button>
                  <button 
                  data-id_karyawan="${element.id_karyawan}"
                  data-nama_karyawan="${element.nama_karyawan}"
                  data-keahlian_karyawan="${element.keahlian}"
                  type="button" onclick="setEditModal(this)" class="btn btn-secondary p-2" data-bs-toggle="modal" data-bs-target="#modalEdit">
                    Edit
                  </button>
                  <button 
                  data-id_karyawan="${element.id_karyawan}"
                  type="button" onclick="setHapusModal(this)" class="btn btn-danger p-2" data-bs-toggle="modal" data-bs-target="#modalHapus">
                    Hapus
                  </button>
                </td>
              </tr>
            `;
            i++;
          });
        } else if (data.status == "error") {
          tbody.innerHTML = `
            <tr>
              <td colspan="7" class="text-center">Tidak ada data pengguna</td>
            </tr>
          `;
        }
      }
    };

    xhttp.open("GET", "crud/data_karyawan.php", true);
    xhttp.send();
  }

  function setDetailModal(btnData) {
    let nama_karyawan = btnData.getAttribute('data-nama_karyawan');
    let keahlian_karyawan = btnData.getAttribute('data-keahlian_karyawan');
    document.getElementById("nama_karyawan_detail").innerHTML = nama_karyawan;
    document.getElementById("keahlian_karyawan_detail").innerHTML = keahlian_karyawan;
  }

  function setEditModal(btnData) {
    let id = btnData.getAttribute('data-id_karyawan');
    let nama_karyawan = btnData.getAttribute('data-nama_karyawan');
    let keahlian_karyawan = btnData.getAttribute('data-keahlian_karyawan');
    document.getElementById("nama_karyawan_edit").value = nama_karyawan;
    document.getElementById("keahlian_karyawan_edit").value = keahlian_karyawan;

    idEdit = id;
  }

  function simpanDataKaryawan() {
    let xhttp = new XMLHttpRequest();
    let formData = new FormData();

    let nama_karyawan = document.getElementById('nama_karyawan_tambah').value;
    let keahlian_karyawan = document.getElementById('keahlian_karyawan_tambah').value;

    formData.append('nama_karyawan', nama_karyawan);
    formData.append('keahlian_karyawan', keahlian_karyawan);

    xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        if(data.status == "success") {
          alert("Tambah data berhasil!");
          ambilData();
          tutupModal();
        }
      }
    };

    xhttp.open('POST', 'crud/simpan_data_karyawan.php', true);
    xhttp.send(formData);
  }

  function simpanEditData() {
    let formData = new FormData();
    let xhttp = new XMLHttpRequest();

    let nama = document.getElementById("nama_karyawan_edit").value;
    let keahlian = document.getElementById("keahlian_karyawan_edit").value;

    formData.append("id", idEdit);
    formData.append("nama_karyawan", nama);
    formData.append("keahlian", keahlian);

    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let response = JSON.parse(this.responseText);
        if (response.status == "success") {
          alert("Simpan berhasil");
          ambilData();
          tutupModal();
        }
      }
    }

    xhttp.open("POST", "crud/simpan_edit_dataKaryawan.php", true);
    xhttp.send(formData);
  }

  function setHapusModal(btnData) {
    let xhttp = new XMLHttpRequest();
    let id = btnData.getAttribute('data-id_karyawan');
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        if (data.status == "success") {
          document.getElementById("nama_karyawan_hapus").innerText = data.data.nama_karyawan;

          idHapus = id;
        }
      }
    };

    xhttp.open("GET", "crud/single_data_karyawan.php?id=" + id, true);
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
        } else if (data.status == "error") {
          alert("Terjadi error pada server!, coba lagi nanti");
        }
      }
    };

    xhttp.open("POST", "crud/hapus_data_karyawan.php", true);
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
