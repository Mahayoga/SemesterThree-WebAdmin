<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <div class="container mt-4">
          <h6><strong>Data Karyawan</strong></h6>
          <div>
            <button type="button" class="btn btn-success btn-sm">Tambah</button>
          </div>
        </div>
        <table class="table table-striped table-bordered mt-4">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id_karyawan</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Karyawan</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keahlian</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
            </tr>
          </thead>
          <tbody id="tbody">
            <tr>
              <td colspan="4" class="text-center">Tidak ada data pengguna</td>
            </tr>
          </tbody>
        </table>
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
        <div class="form-body mb-3">
          <label for="id_karyawan_edit">Id Karyawan</label>
          <input type="text" name="id_karyawan_edit" id="id_karyawan_edit" class="form-control" required disabled>
        </div>
        <div class="form-body mb-3">
          <label for="nama_karyawan_edit">Nama Karyawan</label>
          <input type="text" name="nama_karyawan_edit" id="nama_karyawan_edit" class="form-control" required>
        </div>
        <div class="form-body mb-3">
          <label for="keahlian_karyawan_edit">Keahlian</label>
          <input type="text" name="keahlian_karyawan_edit" id="keahlian_karyawan_edit" class="form-control" required>
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

    xhttp.onreadystatechange = function () {
      if (this.readyState === 4) {
        let tbody = document.getElementById("tbody");
        if (this.status === 200) {
          let data = JSON.parse(this.responseText);
          if (data.status === "success") {
            tbody.innerHTML = "";
            data.data.forEach((element) => {
              tbody.innerHTML += `
                <tr>
                  <td class="fs-6">${element.id_karyawan}</td>
                  <td class="fs-6">${element.nama_karyawan}</td>
                  <td class="fs-6">${element.keahlian}</td>
                  <td class="fs-6">
                    <button type="button" onclick="setEditModal(${element.id_karyawan})" class="btn btn-secondary p-2" data-bs-toggle="modal" data-bs-target="#modalEdit">
                      Edit
                    </button>
                    <button class="btn btn-danger p-2" onclick="hapusData(${element.id_karyawan})">Hapus</button>
                  </td>
                </tr>
              `;
            });
          } else {
            tbody.innerHTML = `
              <tr>
                <td colspan="4" class="text-center">Tidak ada data pengguna</td>
              </tr>
            `;
          }
        } else {
          console.error("Gagal mengambil data: " + this.status);
        }
      }
    };

    xhttp.open("GET", "crud/data_karyawan.php", true);
    xhttp.send();
  }

  function setEditModal(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        let data = JSON.parse(this.responseText);
        if (data.status === "success") {
          document.getElementById("id_karyawan_edit").value = data.data.id_karyawan;
          document.getElementById("nama_karyawan_edit").value = data.data.nama_karyawan;
          document.getElementById("keahlian_edit").value = data.data.keahlian;
          idEdit = id;
        }
      } else if (this.readyState === 4) {
        console.error("Gagal mengambil data untuk edit: " + this.status);
      }
    };

    xhttp.open("GET", "crud/single_data_karyawan.php?id=" + id, true);
    xhttp.send();
  }

  function simpanEditData() {
    let nama = document.getElementById("nama_karyawan_edit").value;
    let keahlian = document.getElementById("keahlian_edit").value;

    if (!nama || !keahlian) {
      alert("Semua kolom harus diisi");
      return;
    }

    let formData = new FormData();
    let xhttp = new XMLHttpRequest();

    formData.append("id", idEdit);
    formData.append("nama_karyawan", nama);
    formData.append("keahlian", keahlian);

    xhttp.onreadystatechange = function () {
      if (this.readyState === 4) {
        if (this.status === 200) {
          let response = JSON.parse(this.responseText);
          if (response.status === "success") {
            alert("Data berhasil diperbarui");
            ambilData();
            idEdit = null;
          } else {
            alert("Gagal memperbarui data");
          }
        } else {
          console.error("Gagal menyimpan data: " + this.status);
        }
      }
    };

    xhttp.open("POST", "crud/simpan_edit_karyawan.php", true);
    xhttp.send(formData);
  }

  function hapusData(id) {
    if (confirm("Yakin ingin menghapus data ini?")) {
      let xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState === 4) {
          if (this.status === 200) {
            let response = JSON.parse(this.responseText);
            if (response.status === "success") {
              alert("Data berhasil dihapus");
              ambilData();
            } else {
              alert("Gagal menghapus data");
            }
          } else {
            console.error("Gagal menghapus data: " + this.status);
          }
        }
      };

      xhttp.open("POST", "crud/hapus_data_user.php", true);
      xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhttp.send("id=" + id);
    }
  }

  ambilData();
</script>
