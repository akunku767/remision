@extends('visitor.layout.app')

@section('title')
    Pencarian
@endsection

@section('content')
    <!-- Start Main Banner -->
    <section class="main-banner" style="background-image: url(assets/img/bg/banner.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <h2>Pencarian</h2>
                    <p>
                        <a href="{{ route('home.index') }}">Beranda</a> <i class='bx bx-chevrons-right'></i> Pencarian
                    </p>
                </div>
            </div>
        </div>
        <div class="blshape">
            <svg fill="none" viewBox="0 0 279 416">
                <path fill-rule="evenodd" stroke="#0D5FF9" stroke-width="3"
                    d="M109.755-38.798c33.905 36.978 10.442 93.21 19.059 142.218 9.073 51.606 27.114 80.839 0 125.08-27.292 44.529-62.477 54.631-114.663 62.005-53.094 7.503-112.908 37.432-155.043 3.451-41.916-33.803-18.759-98.921-28.438-151.421-10.342-56.091-57.129-112.778-29.34-161.951 28.69-50.767 97.898-59.728 156.705-63.423 54.331-3.414 114.658 3.619 151.72 44.041z"
                    clip-rule="evenodd" />
                <path fill-rule="evenodd" stroke="#0D5FF9" stroke-width="3"
                    d="M135.755-23.798c33.905 36.978 10.442 93.21 19.059 142.218 9.073 51.606 27.114 80.839 0 125.08-27.292 44.529-62.477 54.631-114.663 62.005-53.094 7.503-112.908 37.432-155.043 3.451-41.916-33.803-18.759-98.921-28.438-151.421-10.342-56.091-57.129-112.778-29.34-161.951 28.69-50.767 97.898-59.728 156.705-63.423 54.331-3.414 114.658 3.619 151.72 44.041z"
                    clip-rule="evenodd" />
            </svg>
        </div>
    </section>
    <!-- End Main Banner -->

    <!-- Start Courses -->
    <section class="courses-details section-padding">
        <div class="row">
            <center>
                <div class="col-xl-8 banner_search_form w-75">
                    <form action="#" method="get">
                        <input type="text" class="form-control" id="inputRangka" placeholder="Masukkan nomor rangka"
                            value="{{ $chassis ?? '' }}">
                        <button type="button" class="bsearch_btn" id="btnSearch" onclick="searchData(event)">Cari</button>
                    </form>
                </div>
            </center>
        </div>

        <center>
            <h4>Hasil pencarian</h4>
        </center>

        @foreach ($results as $result)
            <div class="container mb-3">
                <div class="row justify-content-center">
                    <div class="col-xl-8 border rounded p-3 shadow-sm bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span>{{ $result->tested_at }}</span>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn btn-outline-primary" href="{{ route('search.test', [$chassis, $result->identity]) }}">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <!-- End Courses -->
@endsection

@section('js')
    <script>
        function searchData(e) {
            e.preventDefault(); // mencegah reload
            let input = document.getElementById('inputRangka').value;
            if (input) {
                window.location.href = "{{ route('search.index') }}/" + encodeURIComponent(input);
            } else {
                fail("Silakan masukkan nomor rangka terlebih dahulu.");
            }
        }
    </script>
@endsection
