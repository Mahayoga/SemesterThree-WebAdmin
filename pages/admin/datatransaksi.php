<div class="row">
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
    <h5><Strong>History Transaksi</Strong></h5>
        <!-- Input Filter Tanggal -->
        <div class="mb-3 d-flex align-items-center">
            <label for="startDate" class="form-label me-2">Dari Tanggal:</label>
            <input type="date" id="startDate" class="form-control me-3" style="width: 200px;">
            <label for="endDate" class="form-label me-2">Sampai Tanggal:</label>
            <input type="date" id="endDate" class="form-control me-3" style="width: 200px;">
            <button class="btn btn-primary btn-sm" onclick="searchByDate()">Cari</button>
        </div>

        <!-- Tabel Data -->
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id Transaksi</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Costumer</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No HP</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Produk</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Harga</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bayar</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kembalian</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Transaksi</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">ID User</th>
                </tr>
            </thead>
            <tbody id="transactionBody">
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>08123456789</td>
                    <td>5</td>
                    <td>100,000</td>
                    <td>120,000</td>
                    <td>20,000</td>
                    <td>2024-11-28</td>
                    <td class="text-center">101</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>08129876543</td>
                    <td>3</td>
                    <td>75,000</td>
                    <td>80,000</td>
                    <td>5,000</td>
                    <td>2024-11-25</td>
                    <td class="text-center">102</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Alan Walker</td>
                    <td>08134567890</td>
                    <td>4</td>
                    <td>90,000</td>
                    <td>100,000</td>
                    <td>10,000</td>
                    <td>2024-11-28</td>
                    <td class="text-center">103</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- JavaScript untuk Filter Tanggal -->
    <script>
        function searchByDate() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const rows = document.querySelectorAll('#transactionBody tr');

            rows.forEach(row => {
                const date = row.children[7].textContent.trim();
                if (startDate && endDate) {
                    // Jika tanggal sama, hanya tampilkan baris dengan tanggal tersebut
                    if (startDate === endDate) {
                        if (date === startDate) {
                            row.style.display = ''; // Tampilkan baris
                        } else {
                            row.style.display = 'none'; // Sembunyikan baris
                        }
                    } 
                    // Jika rentang berbeda, tampilkan sesuai rentang
                    else if (date >= startDate && date <= endDate) {
                        row.style.display = ''; // Tampilkan baris
                    } else {
                        row.style.display = 'none'; // Sembunyikan baris
                    }
                } else {
                    row.style.display = ''; // Tampilkan semua jika input kosong
                }
            });
        }
    </script>
</body>