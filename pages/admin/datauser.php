<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-body pb-0">
        <div class="container mt-4">
          <h6><strong>Data User</strong></h6>
          <table class="table table-striped table-bordered mt-4">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Telepon</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pengguna</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><b>Nama: </b><span id="nama_user_detail"></span></p>
        <p><b>Alamat: </b><span id="alamat_user_detail"></span></p>
        <p><b>No telepon: </b><span id="no_telp_user_detail"></span></p>
        <p><b>Email: </b><span id="email_user_detail"></span></p>
        <p><b>Role: </b><span id="role_user_detail"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <!-- <button type="button" class="btn btn-primary"></button> -->
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pengguna</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-body">
          <label for="">Nama</label>
          <input type="text" name="nama-user-edit" id="nama_user_edit" class="form-control">
        </div>
        <div class="form-body">
          <label for="">Alamat</label>
          <input type="text" name="nama-user-edit" id="alamat_user_edit" class="form-control">
        </div>
        <div class="form-body">
          <label for="">No telepon</label>
          <input type="text" name="nama-user-edit" id="no_telp_user_edit" class="form-control">
        </div>
        <div class="form-body">
          <label for="">Email</label>
          <input type="text" name="nama-user-edit" id="email_user_edit" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-edit-simpan" onclick="simpanEditData()">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pengguna</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda akan menghapus user ini dengan nama <b id="nama_user_hapus"></b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="btn-edit-simpan" onclick="hapusData()">Hapus</button>
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
      if(this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        let tbody = document.getElementById("tbody");
        let i = 1;
        if(data.status == "success") {
          tbody.innerHTML = "";
          data.data.forEach(element => {
            tbody.innerHTML += `
              <tr>
                <td class="fs-6">${i}</td>
                <td class="fs-6">${element.nama_user}</td>
                <td class="fs-6">${element.no_telp}</td>
                <td class="fs-6">${element.email}</td>
                <td class="fs-6">${element.role}</td>
                <td class="fs-6">
                  <button type="button"
                   data-id_user="${element.id_user}"
                   data-nama_user="${element.nama_user}"
                   data-alamat="${element.alamat}"
                   data-no_telp="${element.no_telp}"
                   data-email="${element.email}"
                   data-role="${element.role}"
                   onclick="setDetailModal(this)" class="btn btn-info p-2" data-bs-toggle="modal" data-bs-target="#modalDetail">
                    Detail
                  </button>
                  <button 
                   data-id_user="${element.id_user}"
                   data-nama_user="${element.nama_user}"
                   data-alamat="${element.alamat}"
                   data-no_telp="${element.no_telp}"
                   data-email="${element.email}"
                   data-role="${element.role}"
                  type="button" onclick="setEditModal(this)" class="btn btn-secondary p-2" data-bs-toggle="modal" data-bs-target="#modalEdit">
                    Edit
                  </button>
                  <button 
                   data-id_user="${element.id_user}"
                  type="button" onclick="setHapusModal(this)" class="btn btn-danger p-2" data-bs-toggle="modal" data-bs-target="#modalHapus">
                    Hapus
                  </button>
                </td>
              </tr>
            `;
            i++;
          });
        } else if(data.status == "error") {
          tbody.innerHTML = `
            <tr>
              <td colspan="7" class="text-center">Tidak ada data pengguna</td>
            </tr>
          `;
        }
      }
    };

    xhttp.open("GET", "crud/data_user.php", true);
    xhttp.send();
  }

  function setDetailModal(btnData) {
    let nama_user = btnData.getAttribute('data-nama_user');
    let alamat_user = btnData.getAttribute('data-alamat');
    let no_telp_user = btnData.getAttribute('data-no_telp');
    let email_user = btnData.getAttribute('data-email');
    let role_user = btnData.getAttribute('data-role');
    document.getElementById("nama_user_detail").innerHTML = nama_user;
    document.getElementById("alamat_user_detail").innerHTML = alamat_user;
    document.getElementById("no_telp_user_detail").innerHTML = no_telp_user;
    document.getElementById("email_user_detail").innerHTML = email_user;
    document.getElementById("role_user_detail").innerHTML = role_user;
  }
  
  function setEditModal(btnData) {
    let id_user = btnData.getAttribute('data-id_user');
    let nama_user = btnData.getAttribute('data-nama_user');
    let alamat_user = btnData.getAttribute('data-alamat');
    let no_telp_user = btnData.getAttribute('data-no_telp');
    let email_user = btnData.getAttribute('data-email');
    document.getElementById("nama_user_edit").value = nama_user;
    document.getElementById("alamat_user_edit").value = alamat_user;
    document.getElementById("no_telp_user_edit").value = no_telp_user;
    document.getElementById("email_user_edit").value = email_user;

    idEdit = id_user;
  }
  
  function simpanEditData() {
    let formData = new FormData();
    let xhttp = new XMLHttpRequest();

    let nama = document.getElementById("nama_user_edit").value;
    let alamat = document.getElementById("alamat_user_edit").value;
    let no_telp = document.getElementById("no_telp_user_edit").value;
    let email = document.getElementById("email_user_edit").value;

    formData.append("id", idEdit);
    formData.append("nama_user", nama);
    formData.append("alamat", alamat);
    formData.append("no_telp", no_telp);
    formData.append("email", email);

    xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        let response = JSON.parse(this.responseText);
        if(response.status == "success") {
          alert("Simpan berhasil");
          ambilData();
          tutupModal();
        }
      }
    }

    xhttp.open("POST", "crud/simpan_edit_data.php", true);
    xhttp.send(formData);
  }
  
  function setHapusModal(btnData) {
    let xhttp = new XMLHttpRequest();
    let id_user = btnData.getAttribute('data-id_user');
    xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        if(data.status == "success") {
          document.getElementById("nama_user_hapus").innerText = data.data.nama_user;

          idHapus = id_user;
        }
      }
    };

    xhttp.open("GET", "crud/single_data_user.php?id=" + id_user, true);
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

    xhttp.open("POST", "crud/hapus_data_user.php", true);
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