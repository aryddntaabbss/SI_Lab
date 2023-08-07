@extends('layouts.login')

@section('body')
    <!-- Main content -->
    <!-- Go back -->
    <a href="{{ url('/') }}"
        class="btn btn-white btn-icon-only rounded-circle position-absolute zindex-101 left-4 top-4 d-none d-lg-inline-flex"
        data-toggle="tooltip" data-placement="right" title="Go back">
        <span class="btn-inner--icon">
            <i data-feather="arrow-left"></i>
        </span>
    </a>
    <!-- Side cover login -->
    <section>
        <div class="bg-primary position-absolute h-100 top-0 left-0 zindex-100 col-lg-6 col-xl-6 zindex-100 d-none d-lg-flex flex-column justify-content-end"
            data-bg-size="cover" data-bg-position="center">
            <!-- Cover image -->
            <img src="{{ asset('assets/img/unkhair-bg.png') }}" alt="Image" class="img-as-bg">
            <!-- Overlay text -->
            <div class="row position-relative zindex-110 p-5">
                <div class="col-md-7 text-center mx-auto">
                    <h3 class="h3 text-black">Sistem Penjadwalan LAB Komputer Fakultas Teknik</h3>
                </div>
            </div>
        </div>
        <div class="container-fluid d-flex flex-column">
            <div class="row align-items-center justify-content-center justify-content-lg-end min-vh-100">
                <div class="col-sm-7 col-lg-6 col-xl-6 py-6 py-md-0">
                    <div class="row justify-content-center">
                        <div class="col-11 col-lg-10 col-xl-6">
                            <div>
                                <div class="mb-5">
                                    <h6 class="h3 mb-1">Welcome back!</h6>
                                    <p class="text-muted mb-0">
                                        Sign in to your account to continue.
                                    </p>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-control-label">Email address</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="user"></i></span>
                                            </div>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="name@gmail.com" value="{{ old('email') }}" />
                                            @error('email')
                                                <span class="pesan-error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <label class="form-control-label">Password</label>
                                            </div>
                                            <div class="mb-2">
                                                <a href="#"
                                                    class="small text-muted text-underline--dashed border-primary"
                                                    data-toggle="password-text" data-target="#password">Show password</a>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="key"></i></span>
                                            </div>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password">
                                            @error('password')
                                                <span class="pesan-error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-primary">Masuk</button>
                                    <div class="d-flex mt-3">
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-center" href="{{ route('password.request') }}">
                                                Lupa Kata Sandi?
                                            </a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
