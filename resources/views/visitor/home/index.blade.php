@extends('visitor.layout.app')

@section('title')
    Beranda
@endsection

@section('content')
    <!-- Start Home Banner -->
    <section class="home-banner hbstyle-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-12">
                    <div class="banner-content d-flex align-items-center">
                        <div class="banner-content-inner">
                            <h2 class="title"><span>Mari uji emisi,</span> <br> agar udara bersih <br> bukan hanya cerita
                                fiksi</h2>
                            <p>
                                Cukup menjadi seseorang yang peduli lingkungan<br>
                                untuk membuat alam menjadi senang.
                            </p>
                            <a href="#" class="white-btn bt">Mulai Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="banner_img">
                <div class="banner_img_inner">
                    <img src="{{ asset('assets/img/banner-2.png') }}" alt="Banner Image" height="522" width="auto">

                    <div class="sinfo">
                        <i class="fa-solid fa-people-group" color="#fff"></i>
                        <span>24k + Pengguna</span>
                    </div>

                    <div class="total_course_badge align-self-center eitem" value="1.5">
                        <div class="icon">
                            <i class="fa-solid fa-car-side" style="color: #fff;font-size: 30px;margin-top: 15px;"></i>
                        </div>
                        <div class="tcourse_content">
                            <h4>529+</h4>
                            <span>Total kendaraan telah uji emisi</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="circle_shape eitem" value="1"></div>
            <div class="tpshape">
                <svg fill="none" viewBox="0 0 147 297">
                    <path fill-rule="evenodd" stroke="#fff" stroke-opacity=".05" stroke-width="7"
                        d="M83.755-55.798c33.904 36.979 10.442 93.21 19.058 142.218 9.073 51.606 59.065 103.667 31.95 147.908-27.292 44.529-94.427 31.803-146.613 39.177-53.094 7.503-112.908 37.432-155.043 3.451-41.916-33.803-18.758-98.921-28.438-151.421-10.342-56.091-57.129-112.778-29.34-161.951 28.69-50.767 97.899-59.728 156.706-63.423 54.33-3.414 114.657 3.619 151.72 44.041z"
                        clip-rule="evenodd" />
                </svg>
            </div>

            <div class="btmshape">
                <svg fill="none" viewBox="0 0 236 409">
                    <path fill-rule="evenodd" stroke="#fff" stroke-opacity=".11" stroke-width="2"
                        d="M-89.755 52.094c37.15-14.894 77.387 2.568 112.843 19.565 34.705 16.637 69.624 37.842 81.693 73.691 11.968 35.549-6.127 72.04-20.797 107.193-16.373 39.233-26.341 88.982-67.167 103.584-40.895 14.626-80.23-17.547-117.945-37.376-34.682-18.235-76.17-33.695-87.396-70.589-11.017-36.203 16.557-70.85 33.888-105.254 17.307-34.357 28.555-76.251 64.881-90.814z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd" stroke="#fff" stroke-opacity=".11" stroke-width="2"
                        d="M-55.387 52.63C-19.19 39.093 19.54 57.897 53.646 76.07c33.383 17.787 66.909 40.134 78.094 76.268 11.091 35.832-6.952 71.55-21.66 106.056-16.414 38.509-26.772 87.72-66.526 100.837-39.82 13.14-77.47-20.287-113.723-41.36-33.338-19.38-73.309-36.232-83.663-73.378-10.16-36.45 17.039-70 34.313-103.666 17.251-33.62 28.738-74.961 64.132-88.197z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd" stroke="#fff" stroke-opacity=".11" stroke-width="2"
                        d="M-21.667 51.68c36.473-12.776 74.8 6.834 108.518 25.718 33.003 18.482 66.054 41.526 76.48 77.886 10.338 36.057-8.449 71.39-23.876 105.58-17.217 38.157-28.604 87.139-68.623 99.421C30.745 372.588-6.196 338.381-42 316.553c-32.925-20.073-72.534-37.759-82.108-75.114-9.395-36.654 18.501-69.627 36.477-102.925 17.95-33.251 30.3-74.342 65.964-86.834z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd" stroke="#fff" stroke-opacity=".11" stroke-width="2"
                        d="M-4.929 45.706C31.293 32.23 70.173 51.77 104.418 70.625c33.518 18.454 67.198 41.561 78.54 78.527 11.247 36.657-6.7 72.929-21.309 107.995-16.305 39.134-26.502 89.242-66.289 102.256-39.855 13.038-77.706-21.411-114.113-43.244-33.48-20.078-73.596-37.639-84.11-75.63-10.317-37.278 16.813-71.254 33.998-105.44C-51.704 100.95-40.347 58.882-4.93 45.706z"
                        clip-rule="evenodd" />
                </svg>
            </div>

            <div class="bwavehape">
                <svg fill="none" viewBox="0 0 1497 333">
                    <path stroke="url(#paint0_linear_3203_231)" stroke-opacity=".05" stroke-width="20"
                        d="M5 108.243l40.92-22.41C88.08 63.42 169.92 18.598 253 11.127c83.08-7.47 164.92 22.411 248 82.174 83.08 59.764 164.92 149.408 248 194.231 83.08 44.822 164.92 44.822 248 7.47 83.08-37.352 164.92-112.056 248-134.467 83.08-22.411 164.92 7.47 207.08 22.411l40.92 14.941" />
                    <defs>
                        <linearGradient id="paint0_linear_3203_231" x1="749" x2="749" y1="10"
                            y2="422" gradientUnits="userSpaceOnUse">
                            <stop offset=".182" stop-color="#0D5FF9" />
                            <stop offset=".844" stop-color="#fff" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </div>
    </section>
    <!-- End Home Banner -->

    <!-- Start Feature -->
    <section class="features fstyle-2 section-padding" style="padding-bottom: 0px !important;">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeInUp">
                    <div class="section-title text-center">
                        <span>Q&A</span>
                        <h2>Mengapa perlu uji emisi?</h2>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 wow fadeIn">
                    <div class="feature-item">
                        <div class="fea-icon">
                            <i class="fa-solid fa-cloud-rain"></i>
                        </div>
                        <h3>Mencegah Hujan Asam</h3>
                        <p>memastikan kendaraan tidak melepaskan gas buang melebihi batas</p>
                        <span class="fnumber">01</span>
                    </div>
                </div><!-- End Col -->

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 wow fadeIn">
                    <div class="feature-item">
                        <div class="fea-icon">
                            <i class="fa-solid fa-wind"></i>
                        </div>
                        <h3>Menjaga Kualitas Udara</h3>
                        <p>upaya pengendalian pencemaran udara dan pelestarian lingkungan</p>
                        <span class="fnumber">02</span>
                    </div>
                </div><!-- End Col -->

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 wow fadeIn">
                    <div class="feature-item">
                        <div class="fea-icon">
                            <i class="fa-solid fa-building-columns"></i>
                        </div>
                        <h3>Memenuhi Regulasi Pemerintah</h3>
                        <p>bukti kepatuhan terhadap peraturan emisi gas buang</p>
                        <span class="fnumber">03</span>
                    </div>
                </div><!-- End Col -->

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 wow fadeIn">
                    <div class="feature-item">
                        <div class="fea-icon">
                            <i class="fa-solid fa-car"></i>
                        </div>
                        <h3>Mitigasi Awal Kendaraan</h3>
                        <p>Mencegah kerusakan lebih parah pada mesin kendaraan</p>
                        <span class="fnumber">04</span>
                    </div>
                </div><!-- End Col -->
            </div>
        </div>
    </section>
    <!-- End Feature -->

    <!-- Start Remision -->
    <section class="container partner-style-2 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <center>
                    <img src="{{ asset('assets/img/Remision Original.png') }}" alt="" height="200px"
                        width="auto">
                </center>
            </div>
        </div>

        <div class="col-12 wow fadeInUp">
            <div class="counter-title text-center">
                <h2><span>"</span>Reduce Emission with IoT Solution<span>"</span></h2>
            </div>
        </div>
    </section>
    <!-- End Remision -->

    <!-- Start About -->
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 align-self-center wow fadeIn">
                    <img src="{{ asset('assets/img/UUD.png') }}" alt="regulasi">
                </div><!-- End Col -->

                <div class="col-xl-6 col-lg-6 align-self-center align-items-center wow fadeIn">
                    <div class="section-title about-title">
                        <span>Dasar Hukum</span>
                        <h2>Permen LHK RI No 8 Tahun 2023</h2>
                    </div>

                    <p class="mb25">
                        Penerapan baku mutu emisi kendaraan bermotor kategori M,
                        kategori N, kategori O, dan kategori L.
                    </p>

                    <a href="{{ asset('assets/pdf/PERMEN LHK_8_2023.pdf') }}" class="bg_btn bt">Selengkapnya</a>
                </div><!-- End Col -->
            </div>
        </div>
    </section>
    <!-- End About -->

    <!-- Start Working Process -->
    <section class="working-process section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeInUp">
                    <div class="section-title white-title text-center">
                        <span>Yuk</span>
                        <h2>Intip Prosesnya</h2>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 col-12 wow fadeIn">
                    <div class="single-work">
                        <div class="wicon">
                            <i class="fa-solid fa-car-side" style="transform: rotate(-50deg);font-size: 30px"></i>
                        </div>
                        <h4>Datang</h4>
                    </div>
                </div><!-- End Col -->

                <div class="col-xl-4 col-md-6 col-12 wow fadeIn">
                    <div class="single-work">
                        <div class="wicon">
                            <i class="fa-regular fa-rectangle-list" style="transform: rotate(-50deg);font-size: 30px"></i>
                        </div>
                        <h4>Uji Emisi</h4>
                    </div>
                </div><!-- End Col -->

                <div class="col-xl-4 col-md-6 col-12 wow fadeIn">
                    <div class="single-work">
                        <div class="wicon">
                            <i class="fa-solid fa-flag-checkered" style="transform: rotate(-50deg);font-size: 30px"></i>
                        </div>
                        <h4>Bawa Pulang Hasilmu</h4>
                    </div>
                </div><!-- End Col -->

            </div>
        </div>
    </section>
    <!-- End Working Process -->

    <!-- Start Review -->
    <section class="review section-padding">
        <div class="container">
            <div class="row">
                <div class="col-10 wow fadeInUp">
                    <div class="section-title">
                        <span>Penilaian Pengguna</span>
                        <h2>Bagaimana kata mereka?</h2>
                    </div>
                </div>

                <div class="col-xl-12 wow fadeIn">
                    <div class="review-slider owl-carousel">
                        <div class="review-item">
                            <div class="rimage">
                                <img src="{{ asset('assets/img/review/1.jpg') }}" alt="review">
                                <span class="rating-number">5.00</span>
                            </div>

                            <div class="rev-content">
                                <h4>Bayu Anugerah</h4>
                                <p>
                                    Bagus, saya tahu jika kendaraan saya tidak baik-baik saja
                                </p>

                                <div class="rev-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div><!-- End review-item -->

                        <div class="review-item">
                            <div class="rimage">
                                <img src="{{ asset('assets/img/review/2.jpg') }}" alt="review">
                                <span class="rating-number">5.00</span>
                            </div>

                            <div class="rev-content">
                                <h4>Maudi Ajak Uji Emisi</h4>
                                <p>
                                    Pengalaman pertama bagi saya melihat kendaraan saya berasap, dan saya langsung menghubungi tim remision. Pelayanan oke
                                </p>

                                <div class="rev-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div><!-- End review-item -->

                        <div class="review-item">
                            <div class="rimage">
                                <img src="{{ asset('assets/img/review/3.jpg') }}" alt="review">
                                <span class="rating-number">5.00</span>
                            </div>

                            <div class="rev-content">
                                <h4>Rendy Nugroho</h4>
                                <p>
                                    Semuanya baik-baik saja. Mobil saya siap untuk keluar kota
                                </p>

                                <div class="rev-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div><!-- End review-item -->

                        <div class="review-item">
                            <div class="rimage">
                                <img src="{{ asset('assets/img/review/1.jpg') }}" alt="review">
                                <span class="rating-number">5.00</span>
                            </div>

                            <div class="rev-content">
                                <h4>Masum BIllah</h4>
                                <p>
                                    Donec viverra posuere nibh in dapibus. Pellentesque finibus libero vel tempus
                                </p>

                                <div class="rev-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div><!-- End review-item -->

                        <div class="review-item">
                            <div class="rimage">
                                <img src="{{ asset('assets/img/review/3.jpg') }}" alt="review">
                                <span class="rating-number">5.00</span>
                            </div>

                            <div class="rev-content">
                                <h4>Motasim Billah</h4>
                                <p>
                                    Donec viverra posuere nibh in dapibus. Pellentesque finibus libero vel tempus
                                </p>

                                <div class="rev-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div><!-- End review-item -->

                    </div>
                </div>
            </div>
        </div>

        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </section>
    <!-- Start Review -->
@endsection

@section('js')
@endsection
