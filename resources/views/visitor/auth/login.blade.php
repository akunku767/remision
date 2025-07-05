@extends('visitor.layout.app')

@section('title')
    Masuk
@endsection

@section('content')
    <!-- Start Main Banner -->
    <section class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <h2>Masuk</h2>
                    <p>
                        <a href="{{ route('home.index') }}">Beranda</a> <i class='bx bx-chevrons-right'></i> Masuk
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

    <!-- START LOGIN -->
    <section class="login_register section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-xs-12 wow fadeIn">
                    <div class="login">
                        <h4 class="login_register_title">Sudah punya akun?</h4>
                        <form method="POST" action="{{ route('auth.login.post') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email-address">Alamat Email</label>
                                <input type="email" placeholder="Masukkan alamat email" id="email-address"
                                    class="form-control " name="email">
                            </div>
                            <div class="form-group">
                                <label for="contact-email">Kata Sandi</label>
                                <input type="password" placeholder="Masukkan kata sandi" id="password" class="form-control"
                                    name="password">
                            </div>

                            <div class="form-group col-lg-12">
                                <button class="bg_btn bt" type="submit" name="submit">Masuk</button>
                            </div>
                        </form>
                        <p>Belum punya akun? <a href="#">Klaim Sekarang</a></p>
                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END LOGIN -->
@endsection

@section('js')
@endsection
