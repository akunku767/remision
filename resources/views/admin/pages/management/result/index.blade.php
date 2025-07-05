@extends('admin.layout.app')

@section('title')
    Car Management
@endsection

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4 p-2">
                    <div class="card-header p-3">
                        <div class="d-flex flex-row justify-content-between">
                            {{-- <div>
                                <h5 class="mb-0">Semua Kendaraan</h5>
                            </div> --}}
                            {{-- <button type="button" id="btnAddVehicle" class="btn bg-gradient-primary btn-block mb-3"
                                data-bs-toggle="modal" data-bs-target="#addVehicleModal" onclick="openAddModal()">
                                <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah kendaraan
                            </button> --}}
                        </div>
                    </div>
                    <div class="card-body px-2 pt-0 pb-2">
                        <div class="table-responsive">
                            <table id="result-table" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>License Number</th>
                                        <th>Brand</th>
                                        <th>O2</th>
                                        <th>CO2</th>
                                        <th>CO</th>
                                        <th>HC</th>
                                        <th>Result</th>
                                        <th>Time</th>
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

    <script>
        $(document).ready(function() {
            showAll();
        });

        function showAll() {
            // Jika DataTable sudah ada, hancurkan dulu
            if ($.fn.dataTable.isDataTable('#result-table')) {
                $('#result-table').DataTable().clear().destroy();
            }

            // Inisialisasi DataTables
            var table = $('#result-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.management.result.index') }}",
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
                        data: 'brand',
                        name: 'brand'
                    },
                    {
                        data: 'O2',
                        name: 'O2',
                        render: function(data, type, row) {
                            return data + ' %';
                        }
                    },
                    {
                        data: 'CO2',
                        name: 'CO2',
                        render: function(data, type, row) {
                            return data + ' %';
                        }
                    },
                    {
                        data: 'CO',
                        name: 'CO',
                        render: function(data, type, row) {
                            return data + ' %';
                        }
                    },
                    {
                        data: 'HC',
                        name: 'HC',
                        render: function(data, type, row) {
                            return data + ' ppm';
                        }
                    },
                    {
                        data: 'test_result',
                        name: 'test_result'
                    },
                    {
                        data: 'tested_at',
                        name: 'tested_at'
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
