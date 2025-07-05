<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/img/favicon.png') }}">
    <title>
        @yield('title') | Remision
    </title>

    <!--     Fonts and icons     -->
    <link href="{{ asset('assets/admin/fonts/fonts-open-sans.css') }}" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/admin/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/admin/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    <script src="{{ asset('assets/admin/js/font-awesome.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/admin/js/plugins/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/datatables.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/datatables.min.css') }}">
    @yield('head')
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('admin.layout.partials.sidebar')


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('admin.layout.partials.navbar')
        <div class="container-fluid py-4">

            @yield('content')
            <div id="preloader" style="display: none;">
                <div id="user-table_processing" class="dt-processing" role="status">
                    <div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
            @include('admin.layout.partials.footer')
        </div>
    </main>

    <script>
        function alertDelete(text, identity) {
            Swal.fire({
                title: "Please Confirm!",
                html: "Do you want to delete data with the name <b>" + text + "</b>?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteData(text, identity);
                }
            });
        }

        function confirm(name, text, identity, fNew) {
            Swal.fire({
                title: "Please Confirm!",
                html: text,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    fNew(name, identity);
                }
            });
        }

        function success(text) {
            let timerInterval;
            Swal.fire({
                icon: "success",
                title: "Success!",
                html: text,
                timer: 2000,
                timerProgressBar: false,
                didOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            });
        }

        function fail(text) {
            let timerInterval;
            Swal.fire({
                icon: "error",
                title: "I'm Sorry!",
                html: text,
                timer: 2000,
                timerProgressBar: false,
                didOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            });
        }

        function showLoader() {
            $("#preloader").css("display", "flex")
        }

        function hideLoader() {
            $("#preloader").css("display", "none")
        }
    </script>

    @if (session()->has('success'))
        <script>
            success("{{ session('success') }}");
        </script>
    @endif

    @if (session()->has('fail'))
        <script>
            fail("{{ session('fail') }}");
        </script>
    @endif


    {{-- <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg ">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
                        onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>

                <!-- Navbar Fixed -->
                <div class="mt-3">
                    <h6 class="mb-0">Navbar Fixed</h6>
                </div>
                <div class="form-check form-switch ps-0">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn bg-gradient-dark w-100"
                    href="https://www.creative-tim.com/product/soft-ui-dashboard">Free Download</a>
                <a class="btn btn-outline-dark w-100"
                    href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View
                    documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div> --}}


    <!--   Core JS Files   -->
    <script src=" {{ asset('assets/admin/js/core/popper.min.js') }}"></script>
    <script src=" {{ asset('assets/admin/js/core/bootstrap.min.js') }}"></script>
    <script src=" {{ asset('assets/admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src=" {{ asset('assets/admin/js/plugins/smooth-scrollbar.min.js') }}"></script>

    @yield('js')

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script src="{{ asset('assets/admin/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
</body>

</html>
