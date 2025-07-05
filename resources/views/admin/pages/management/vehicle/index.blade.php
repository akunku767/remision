@extends('admin.layout.app')

@section('title')
    Vehicle Management
@endsection

@section('head')
    <script>
        let rfidBuffer = ""; // Untuk menyimpan data yang terbaca

        let status = 1;
        let modalAdd = 0;
        let modalTap = 0;

        document.addEventListener("DOMContentLoaded", function() {
            // Menangkap input dari RFID Reader (dengan asumsi bertindak sebagai keyboard)
            document.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    if (status == 1) {
                        if (modalAdd == 0 || modalTap == 1) {
                            if (modalAdd == 0) {
                                document.getElementById("btnAddVehicle").click();
                                modalAdd == 1;
                            }

                            document.getElementById("RFIDCreate").value = rfidBuffer;
                            rfidBuffer = ""; // Reset buffer
                        }
                        // Jika Enter ditekan, simpan data ke input hidden dan reset buffer
                        if (status == 1 && modalTap == 1) {
                            status = 1;
                            modalAdd == 1;
                            closeTapModal();
                        }
                        // status = 0;
                    }
                } else {
                    rfidBuffer += event.key; // Tambahkan karakter ke buffer
                }
            });
        });

        function resetForm() {
            document.querySelectorAll("#formaddVehicle input, #formaddVehicle select").forEach(element => {
                if (element.type === "select-one") {
                    element.selectedIndex = 0; // Pilih opsi pertama (default)
                } else {
                    element.value = ""; // Kosongkan input
                }
            });

            modalTap = 0;
            modalAdd = 0;
            status = 1;
        }

        function openTapModal() {
            status = 1;
            modalTap = 1;

            rfidBuffer = "";
            document.getElementById("RFIDCreate").value = rfidBuffer;
            document.getElementById('btnNFCModal').click();
        }

        function closeTapModal() {
            document.getElementById("btnCloseTapModal").click();
            document.getElementById("btnCloseAdd").click();

            create();
        }

        function openAddModal() {
            modalAdd = 1;
        }

        function closeAddModal() {
            status = 1;
        }

        function btnCloseTapModal() {
            status = 1;
        }
    </script>
@endsection

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4 p-2">
                    <div class="card-header p-3">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Semua Kendaraan</h5>
                            </div>
                            <button type="button" id="btnAddVehicle" class="btn bg-gradient-primary btn-block mb-3"
                                data-bs-toggle="modal" data-bs-target="#addVehicleModal" onclick="openAddModal()">
                                <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah kendaraan
                            </button>
                        </div>
                    </div>
                    <div class="card-body px-2 pt-0 pb-2">
                        <div class="table-responsive">
                            <table id="vehicle-table" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nopol</th>
                                        <th>Tipe</th>
                                        <th>Merk</th>
                                        <th>Th Produksi</th>
                                        <th>Warna</th>
                                        <th style="text-align: center!important">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addVehicleModal" tabindex="-1" role="dialog" aria-labelledby="addVehicleModalTitle"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVehicleModalTitle"><b>Tambah kendaraan</b></h5>
                    <button type="button" id="btnCloseAdd" class="btn-close text-dark" data-bs-dismiss="modal"
                        aria-label="Close" onclick="closeAddModal()">
                        <span aria-hidden="true">
                            <i class="fa-solid fa-x"></i>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="formaddVehicle" class="row" enctype="multipart/form-data">
                        <input type="hidden" name="_token" id="tokenCreate" value="{{ csrf_token() }}"
                            autocomplete="off">
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="nameCreate" class="col-form-label">Nama Pemilik:</label>
                            <input type="text" class="form-control" name="name" id="nameCreate"
                                placeholder="Masukkan nama pemilik">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="accountCreate" class="col-form-label">Nama Akun:</label>
                            <select name="account" id="accountCreate" class="form-control">
                                <option value="-">Tidak ada</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->identity }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="emailCreate" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="emailCreate"
                                placeholder="Masukkan email">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="phoneCreate" class="col-form-label">No Telp:</label>
                            <input type="number" class="form-control" name="phone" id="phoneCreate"
                                placeholder="Masukkan no Telp">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="licensePlateCreate" class="col-form-label">Plat Nomor:</label>
                            <div class="row px-2">
                                <div class="col-3 px-0">
                                    <input type="text" class="form-control" name="licensePlateA" id="licensePlateACreate"
                                        placeholder="B">
                                </div>
                                <div class="col-6 px-1">
                                    <input type="number" class="form-control" name="licensePlateNumber"
                                        id="licensePlateNumberCreate" placeholder="2383">
                                </div>
                                <div class="col-3 px-0">
                                    <input type="text" class="form-control" name="licensePlateB"
                                        id="licensePlateBCreate" placeholder="HDI">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="categoryCreate" class="col-form-label">Kategori:</label>
                            <select name="category" id="categoryCreate" class="form-control">
                                <option value="Sepeda Motor 2 langkah">Sepeda Motor 2 langkah</option>
                                <option value="Sepeda Motor 4 langkah">Sepeda Motor 4 langkah</option>
                                <option value="Sepeda Motor">Sepeda Motor</option>
                                <option value="Mobil Penumpang">Mobil Penumpang</option>
                                <option value="Mobil Barang">Mobil Barang</option>
                                <option value="Truck">Truck</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="brandCreate" class="col-form-label">Merk:</label>
                            <input type="text" class="form-control" name="brand" id="brandCreate"
                                placeholder="Masukkan merk">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="productionYearCreate" class="col-form-label">Tahun pembuatan:</label>
                            <input type="number" class="form-control" name="productionYear" id="productionYearCreate"
                                placeholder="Masukkan tahun pembuatan">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="fuelCreate" class="col-form-label">Bahan bakar:</label>
                            <select name="fuel" id="fuelCreate" class="form-control">
                                <option value="Bensin">Bensin</option>
                                <option value="Solar">Solar</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="colorCreate" class="col-form-label">Warna:</label>
                            <input type="text" class="form-control" name="color" id="colorCreate"
                                placeholder="Masukkan warna">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="chassisNumberCreate" class="col-form-label">Nomor rangka:</label>
                            <input type="text" class="form-control" name="chassisNumber" id="chassisNumberCreate"
                                placeholder="Masukkan nomor rangka">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6" hidden>
                            <label for="RFIDCreate" class="col-form-label">RFID:</label>
                            <input type="text" class="form-control" name="rfid" id="RFIDCreate">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal"
                                id="btnCancelAddModal">Batal</button>
                            <button type="button" class="btn bg-gradient-primary"
                                onclick="openTapModal()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <button type="button" id="btnNFCModal" data-bs-toggle="modal" data-bs-target="#tapNFCModal" hidden>..</button>
    <div class="modal fade" id="tapNFCModal" tabindex="-1" role="dialog" aria-labelledby="tapNFCModalTitle"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="btnCloseTapModal" class="btn-close text-dark" data-bs-dismiss="modal"
                        aria-label="Close" onclick="btnCloseTapModal()">
                        <span aria-hidden="true">
                            <i class="fa-solid fa-x"></i>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <h3 class="text-secondary" id="rfidDisplay">
                            <i class="fa-brands fa-nfc-directional"></i><br>
                            Silahkan tap atau tempelkan kartu RFID.
                        </h3>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <button type="button" id="btnEditModal" data-bs-toggle="modal" data-bs-target="#editModal" hidden>..</button>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalTitle"><b>Ubah kendaraan</b></h5>
                    <button type="button" id="btnCloseEdit" class="btn-close text-dark" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">
                            <i class="fa-solid fa-x"></i>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="formEdit" class="row" enctype="multipart/form-data">
                        <input type="hidden" name="_token" id="tokenCreate" value="{{ csrf_token() }}"
                            autocomplete="off">
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="licensePlateEdit" class="col-form-label">Plat Nomor:</label>
                            <div class="row px-2">
                                <div class="col-3 px-0">
                                    <input type="text" class="form-control" name="licensePlateA"
                                        id="licensePlateAEdit" placeholder="B">
                                </div>
                                <div class="col-6 px-1">
                                    <input type="number" class="form-control" name="licensePlateNumber"
                                        id="licensePlateNumberEdit" placeholder="2383">
                                </div>
                                <div class="col-3 px-0">
                                    <input type="text" class="form-control" name="licensePlateB"
                                        id="licensePlateBEdit" placeholder="HDI">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="categoryEdit" class="col-form-label">Kategori:</label>
                            <select name="category" id="categoryEdit" class="form-control">
                                <option value="Sepeda Motor 2 langkah">Sepeda Motor 2 langkah</option>
                                <option value="Sepeda Motor 4 langkah">Sepeda Motor 4 langkah</option>
                                <option value="Sepeda Motor">Sepeda Motor</option>
                                <option value="Mobil Penumpang">Mobil Penumpang</option>
                                <option value="Mobil Barang">Mobil Barang</option>
                                <option value="Truck">Truck</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="brandEdit" class="col-form-label">Merk:</label>
                            <input type="text" class="form-control" name="brand" id="brandEdit"
                                placeholder="Masukkan merk">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="productionYearEdit" class="col-form-label">Tahun pembuatan:</label>
                            <input type="number" class="form-control" name="productionYear" id="productionYearEdit"
                                placeholder="Masukkan tahun pembuatan">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="fuelEdit" class="col-form-label">Bahan bakar:</label>
                            <select name="fuel" id="fuelEdit" class="form-control">
                                <option value="Bensin">Bensin</option>
                                <option value="Solar">Solar</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="colorEdit" class="col-form-label">Warna:</label>
                            <input type="text" class="form-control" name="color" id="colorEdit"
                                placeholder="Masukkan warna">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="chassisNumberEdit" class="col-form-label">Nomor rangka:</label>
                            <input type="text" class="form-control" name="chassisNumber" id="chassisNumberEdit"
                                placeholder="Masukkan nomor rangka">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6" hidden>
                            <label for="RFIDEdit" class="col-form-label">RFID:</label>
                            <input type="text" class="form-control" name="rfid" id="RFIDEdit">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal"
                                id="btnCancelEdit">Batal</button>
                            <button type="button" class="btn bg-gradient-primary" id="btnEdit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            showAll();
        });

        function showAll() {
            // Jika DataTable sudah ada, hancurkan dulu
            if ($.fn.dataTable.isDataTable('#vehicle-table')) {
                $('#vehicle-table').DataTable().clear().destroy();
            }

            // Inisialisasi DataTables
            var table = $('#vehicle-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.management.vehicle.index') }}",
                columns: [{
                        "data": 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        width: 28,
                    },
                    {
                        data: 'license_plate',
                        name: 'license_plate'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'brand',
                        name: 'brand'
                    },
                    {
                        data: 'production_year',
                        name: 'production_year'
                    },
                    {
                        data: 'color',
                        name: 'color'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                // Tambahkan event xhr di sini
                xhr: function() {
                    // Fungsi dipanggil setelah data selesai dimuat
                    // hideLoader();
                }
            });
        }

        function create() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            // Ambil data dari form
            const formData = $('#formaddVehicle').serialize();
            // Kirim data ke server dengan AJAX
            $.ajax({
                url: "{{ route('admin.management.vehicle.add') }}",
                type: 'POST',
                data: formData,
                success: function(response) {
                    success("A New data has been created");
                    console.log(response);
                    showAll();
                    resetForm();
                    // hideLoader();
                },
                error: function(xhr) {
                    fail(xhr.responseJSON ? xhr.responseJSON.message : 'Server tidak merespons');
                    resetForm();
                }
            });
        }

        function showEdit(identity) {
            // showLoader();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            // Kirim data ke server dengan AJAX
            $.ajax({
                url: "{{ route('admin.management.vehicle.show', 'harusGanti') }}".replace('harusGanti', identity),
                type: 'POST',
                success: function(response) {
                    $('#licensePlateAEdit').val(response.data.licensePlateA);
                    $('#licensePlateNumberEdit').val(response.data.licensePlateNumber);
                    $('#licensePlateBEdit').val(response.data.licensePlateB);
                    $('#typeEdit').val(response.data.type);
                    $('#brandEdit').val(response.data.brand);
                    $('#productionYearEdit').val(response.data.productionYear);
                    $('#fuelEdit').val(response.data.fuel);
                    $('#colorEdit').val(response.data.color);
                    $('#chassisNumberEdit').val(response.data.chassisNumber);
                    $('#RFIDEdit').val(response.data.rfid);

                    $('#btnEdit').attr('onclick', "edit('" + response.data.licensePlate + "','" + response.data
                        .identity + "')");
                    $('#btnEditModal').click();
                },
                error: function(xhr) {
                    // Tampilkan pesan error
                    fail(xhr.responseJSON ? xhr.responseJSON.message : 'Server tidak merespons');
                }
            });

        }

        function edit(text, identity) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            // Ambil data dari form
            const formData = $('#formEdit').serialize();
            // Kirim data ke server dengan AJAX
            $.ajax({
                url: "{{ route('admin.management.vehicle.edit', 'harusGanti') }}".replace('harusGanti', identity),
                type: 'POST',
                data: formData,
                success: function(response) {
                    success("Data vehicle for <b>" + text + "</b> has been updated");
                    $('#btnCloseEdit').click();
                    showAll();
                },
                error: function(xhr) {
                    fail(xhr.responseJSON ? xhr.responseJSON.message : 'Server tidak merespons');
                }
            });
        }

        function deleteData(text, identity) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            // Kirim data ke server dengan AJAX
            $.ajax({
                url: "{{ route('admin.management.vehicle.delete', 'harusGanti') }}".replace('harusGanti',
                    identity),
                type: 'POST',
                success: function(response) {
                    success("Data <b>" + text + "</b> has been deleted");
                    showAll();
                },
                error: function(xhr) {
                    // Tampilkan pesan error
                    fail(xhr.responseJSON ? xhr.responseJSON.message : 'Server tidak merespons');
                }
            });
        }

        var navbarColorOnResize = function() {
            if ($(window).width() > 991) {
                if ($('.main-content .fixed-plugin > .card').length != 0) {
                    $('.main-content .fixed-plugin > .card').removeClass('blur');
                }
            }
        };

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', navbarColorOnResize);
        } else {
            navbarColorOnResize();
        }
    </script>
@endsection
