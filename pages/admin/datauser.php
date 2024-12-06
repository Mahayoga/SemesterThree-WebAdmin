<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <div class="container mt-4">
          <h6><strong>Data User</strong></h6>
          <div>
            <button type="button" class="btn btn-success btn-sm">Tambah</button>
          </div>
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
              <tr>
                <td colspan="7" class="text-center">Tidak ada data pengguna</td>
              </tr>
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

<script>
  let idEdit = null;
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
                  <button type="button" onclick="setDetailModal(${element.id_user})" class="btn btn-info p-2" data-bs-toggle="modal" data-bs-target="#modalDetail">
                    Detail
                  </button>
                  <button type="button" onclick="setEditModal(${element.id_user})" class="btn btn-secondary p-2" data-bs-toggle="modal" data-bs-target="#modalEdit">
                    Edit
                  </button>
                  <button class="btn btn-danger p-2">Hapus</button>
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

  function setDetailModal(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        if(data.status == "success") {
          console.log(data);
          document.getElementById("nama_user_detail").innerHTML = data.data.nama_user;
          document.getElementById("alamat_user_detail").innerHTML = data.data.alamat;
          document.getElementById("no_telp_user_detail").innerHTML = data.data.no_telp;
          document.getElementById("email_user_detail").innerHTML = data.data.email;
          document.getElementById("role_user_detail").innerHTML = data.data.role;
        }
      }
    };

    xhttp.open("GET", "crud/single_data_user.php?id=" + id, true);
    xhttp.send();
  }
  
  function setEditModal(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        if(data.status == "success") {
          document.getElementById("nama_user_edit").value = data.data.nama_user;
          document.getElementById("alamat_user_edit").value = data.data.alamat;
          document.getElementById("no_telp_user_edit").value = data.data.no_telp;
          document.getElementById("email_user_edit").value = data.data.email;

          idEdit = id;
        }
      }
    };

    xhttp.open("GET", "crud/single_data_user.php?id=" + id, true);
    xhttp.send();
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
        }
      }
    }

    xhttp.open("POST", "crud/simpan_edit_data.php", true);
    xhttp.send(formData);
  }
  ambilData();
</script>