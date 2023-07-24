@extends('layouts.main')
@include('layouts.header')
@section('body')
<body>
    <!-- Main content -->
    <section class="slice py-5">
        <div class="container">
            <div class="row row-grid align-items-center">
                <div class="col-12 col-md-5 col-lg-6 order-md-2">
                    <!-- Image -->
                    <figure class="w-100">
                        <img alt="Image placeholder" src="assets/img/svg/illustrations/illustration-3.svg" class="img-fluid mw-md-120">
                    </figure>
                </div>
                <div class="col-12 col-md-7 col-lg-6 order-md-1 pr-md-5">
                    <!-- Heading -->
                    <h1 class="display-4 text-center text-md-left mb-3">
                        Selamat Datang di<strong class="text-primary"> Aplikasi Sistem Penjadwalan Lab Komputer Fakultas Teknik</strong>
                    </h1>
                    <!-- Text -->
                    <p class="lead text-center text-md-left text-muted">
                        Build a beautiful, modern website with flexible Bootstrap components built from scratch.
                    </p>
                    <!-- Buttons -->
                    <div class="text-center text-md-left mt-5">
                        <a href="{{ url('/tampilanjadwal') }}" class="btn btn-primary btn-icon">
                            <span class="btn-inner--text">Get started</span><span class="btn-inner--icon">
                                <i data-feather="arrow-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
</body>
    @include('layouts.footer')
@endsection
