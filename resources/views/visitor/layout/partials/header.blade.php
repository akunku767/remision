<!-- Start Header -->
<header id="navigation">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 left-col align-self-center">
                <div class="site-logo">
                    <a href="{{ route('home.index') }}"><img src="{{ asset('assets/img/favicons/logo.jpg') }}"
                            height="60px" width="auto" alt="Remision"></a>
                </div>
            </div><!-- End Col -->

            <div class="col-6 justify-content-center d-flex align-self-center">
                <nav id="main-menu">
                    <ul>
                        <li>
                            <a href="{{ route('home.index') }}">
                                <i class="fa-solid fa-house"></i>&nbsp;Beranda
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('search.index') }}">
                                <i class="fa-solid fa-magnifying-glass"></i>&nbsp;Pencarian
                            </a>
                        </li>

                        {{-- <li>
                            <a href="contact.html">
                                <i class="fa-solid fa-chart-column"></i>&nbsp;Rekap
                            </a>
                        </li> --}}

                        <li>
                            <a href="{{ asset('assets/pdf/PERMEN LHK_8_2023.pdf') }}">
                                <i class="fa-solid fa-scale-balanced"></i>&nbsp;Regulasi
                            </a>
                        </li>

                        @if ((Auth::check() && Auth::user()->role_id == '1') || (Auth::check() && Auth::user()->role_id == '2'))
                            <li>
                                <a href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-key"></i>&nbsp;Dasbor
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div><!-- End Col -->

            @if (Auth::check())
            <div class="col-3 right-col align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <!-- Info user: 2 baris, benar-benar rata kanan -->
                    <div class="d-flex flex-column text-end" style="line-height: 1;">
                        <span class="fw-bold fs-5 text-white w-100">
                            {{ Auth::user()->name }}
                        </span>
                        <span class="fs-6 text-white w-100">
                            {{ Auth::user()->role->name }}
                        </span>
                    </div>

                    <!-- Tombol logout -->
                    <a href="{{ route('auth.logout') }}" class="white-btn bt ms-2" style="padding: 8px 15px!important;">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </div>
            </div><!-- End Col -->

            @else
                <div class="col-3 right-col align-self-center text-end">
                    <a href="{{ route('auth.login.index') }}" class="white-btn bt">Masuk</a>
                </div><!-- End Col -->
            @endif

            <ul class='mobile_menu'>
                <li>
                    <a href="{{ route('home.index') }}">
                        <i class="fa-solid fa-house"></i>&nbsp;Beranda
                    </a>
                </li>

                <li>
                    <a href="{{ route('search.index') }}">
                        <i class="fa-solid fa-magnifying-glass"></i>&nbsp;Pencarian
                    </a>
                </li>

                <li>
                    <a href="contact.html">
                        <i class="fa-solid fa-chart-column"></i>&nbsp;Rekap
                    </a>
                </li>

                <li>
                    <a href="contact.html">
                        <i class="fa-solid fa-scale-balanced"></i>&nbsp;Regulasi
                    </a>
                </li>

                @if ((Auth::check() && Auth::user()->role_id == '1') || (Auth::check() && Auth::user()->role_id == '2'))
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa-solid fa-key"></i>&nbsp;Dasbor
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</header>
<!-- End Header -->
