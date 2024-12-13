<?php
$koneksi
?>
<div class="container mt-4">
    <!-- Form Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5>Transaction Details</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="text" class="form-control" id="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="cashier" class="form-label">Kasir</label>
                                <input type="text" class="form-control" id="cashier" value="Admin" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="customer-status" class="form-label">Customer Status</label>
                                <select class="form-select" id="customer-status">
                                    <option value="registered">Terdaftar</option>
                                    <option value="not_registered">Tidak Terdaftar</option>
                                    <option value="recorded">Pernah Tercatat</option>
                                </select>
                            </div>

                            <div class="col-md-4 mt-3" id="registered-customer">
                                <label for="customer" class="form-label">Customer</label>
                                <select class="form-select" id="customer">
                                    <option value="Umum">Umum</option>
                                    <?php
                                    $result = $koneksi->query("SELECT id_customers, nama FROM customers");
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='{$row['id_customers']}'>{$row['nama']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-4 mt-3" id="not-registered-customer" style="display: none;">
                                <label for="new-customer" class="form-label">Nama User</label>
                                <input type="text" class="form-control" id="new-customer" placeholder="Masukkan nama user">
                            </div>

                            <div class="col-md-4 mt-3" id="recorded-customer" style="display: none;">
                                <label for="recorded-customer-list" class="form-label">Customer Pernah Tercatat</label>
                                <select class="form-select" id="recorded-customer-list">
                                    <option value="">Pilih Customer</option>
                                </select>                                   
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="service" class="form-label">Service</label>
                                <select class="form-select" id="service">
                                    <option value="" disabled selected>Select Service</option>
                                    <option value="15000" data-name="Haircut 1">Haircut 1 - anak anak</option>
                                    <option value="20000" data-name="Haircut 2">Haircut 2 - dewasa</option>
                                    <option value="25000" data-name="Paket 1">Paket 1 - haircut+hairwash</option>
                                    <option value="30000" data-name="Paket 2">Paket 2 - haircut+hairwash+styling pomade/vitamin</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="qty" class="form-label">Qty</label>
                                <input type="number" class="form-control" id="qty" value="1">
                            </div>
                            <div class="col-md-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" readonly>
                            </div>
                        </div>

                        <!-- Button to Add Item -->
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-success" id="add-item">Tambah Item</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-secondary text-white">
                    <h5>Transaction Items</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Service</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="item-list">
                            <tr id="no-item">
                                <td colspan="6" class="text-center">Tidak ada item</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Button to add items to the summary -->
                    <button type="button" class="btn btn-primary" id="add-to-summary">Tambah</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Summary Section -->
    <div class="row mt-4">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h5>Summary</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label for="sub-total" class="form-label">Sub Total</label>
                        <input type="text" class="form-control" id="sub-total" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="text" class="form-control" id="discount" value="0">
                    </div>
                    <div class="mb-4">
                        <label for="grand-total" class="form-label">Grand Total</label>
                        <input type="text" class="form-control" id="grand-total" readonly>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Section -->
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-warning text-white">
                    <h5>Payment</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label for="payment-method" class="form-label">Pembayaran</label>
                        <select class="form-select" id="payment-method">
                            <option value="cash">Cash</option>
                            <option value="qris">QRIS</option>
                        </select>
                    </div>

                    <!-- Cash Input Field (Initially hidden, shown only if 'Cash' is selected) -->
                    <div class="mb-4" id="cash-div">
                        <label for="cash" class="form-label">Cash</label>
                        <input type="text" class="form-control" id="cash" value="0">
                    </div>

                    <!-- QRIS Input Field (Initially hidden, shown only if 'QRIS' is selected) -->
                    <div class="mb-4" id="qris-div" style="display: none;">
                        <label for="qris" class="form-label">QRIS</label>
                        <input type="text" class="form-control" id="qris" placeholder="Scan QRIS" readonly>
                    </div>
                    
                    <div class="mb-4">
                        <label for="change" class="form-label">Change</label>
                        <input type="text" class="form-control" id="change" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="note" class="form-label">Note</label>
                        <textarea class="form-control" id="note" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2 text-end">
            <div class="d-flex flex-column justify-content-center align-items-end h-100">
                <button class="btn btn-danger mb-2" id="cancel">Cancel</button>
                <button class="btn btn-success" id="process-payment">Process Payment</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Set price based on selected service
    document.getElementById('service').addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const price = selectedOption.value;
        document.getElementById('price').value = price;
    });

    //customer
    document.getElementById('customer-status').addEventListener('change', function () {
    const status = this.value;

    // Menampilkan atau menyembunyikan field berdasarkan status
    document.getElementById('registered-customer').style.display = status === 'registered' ? 'block' : 'none';
    document.getElementById('not-registered-customer').style.display = status === 'not_registered' ? 'block' : 'none';
    document.getElementById('recorded-customer').style.display = status === 'recorded' ? 'block' : 'none';
    });

    // Add item functionality
    document.getElementById('add-item').addEventListener('click', function () {
        const serviceSelect = document.getElementById('service');
        const serviceName = serviceSelect.options[serviceSelect.selectedIndex].dataset.name;
        const price = parseFloat(document.getElementById('price').value) || 0;
        const qty = parseInt(document.getElementById('qty').value) || 1;

        // Check if a service is selected and price is greater than 0
        if (serviceName && price > 0 && qty > 0) {
            const itemList = document.getElementById('item-list');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
                <td>#</td>
                <td>${serviceName}</td>
                <td>${price.toFixed(2)}</td>
                <td>${qty}</td>
                <td>${(price * qty).toFixed(2)}</td>
                <td><button class='btn btn-danger btn-sm remove-item'>Remove</button></td>
            `;

            itemList.appendChild(newRow);
            document.getElementById('no-item').style.display = 'none';
        } else {
            alert("Please select a service, enter a valid price and quantity.");
        }
    });

    // Remove item functionality
    document.getElementById('item-list').addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-item')) {
            event.target.closest('tr').remove();
            if (document.getElementById('item-list').rows.length === 1) {
                document.getElementById('no-item').style.display = 'table-row';
            }
        }
    });

    // Handle payment method selection (Cash or QRIS)
    document.getElementById('payment-method').addEventListener('change', function () {
        const paymentMethod = this.value;
        const cashDiv = document.getElementById('cash-div');
        const qrisDiv = document.getElementById('qris-div');

        // Show or hide the payment fields based on the selected method
        if (paymentMethod === 'cash') {
            cashDiv.style.display = 'block';
            qrisDiv.style.display = 'none';
        } else if (paymentMethod === 'qris') {
            cashDiv.style.display = 'none';
            qrisDiv.style.display = 'block';
        }
    });

    // Update Summary when the 'Update Summary' button is clicked
    document.getElementById('add-to-summary').addEventListener('click', function () {
        updateSummary();
    });

    // Update Sub Total, Grand Total, and Change
    function updateSummary() {
        let subTotal = 0;

        // Calculate Sub Total
        const rows = document.querySelectorAll('#item-list tr');
        rows.forEach(function (row) {
            if (row.id !== 'no-item') {
                const price = parseFloat(row.cells[2].textContent) || 0;
                const qty = parseInt(row.cells[3].textContent) || 0;
                subTotal += price * qty;
            }
        });

        // Update Sub Total field
        document.getElementById('sub-total').value = subTotal.toFixed(2);

        // Calculate Grand Total
        const discount = parseFloat(document.getElementById('discount').value) || 0;
        const grandTotal = subTotal - discount;
        document.getElementById('grand-total').value = grandTotal.toFixed(2);

        // Calculate Change
        const cash = parseFloat(document.getElementById('cash').value) || 0;
        const change = cash - grandTotal;
        document.getElementById('change').value = change.toFixed(2);
    }
</script>
<?php
// Menutup koneksi database
$koneksi->close();
?>