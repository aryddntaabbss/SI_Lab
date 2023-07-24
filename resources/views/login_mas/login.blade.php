@extends('layouts.login')
@section('body')
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-cookies" data-backdrop="false" aria-labelledby="modal-cookies"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-aside left-4 right-4 bottom-4">
            <div class="modal-content bg-dark-dark">
                <div class="modal-body">
                    <!-- Text -->
                    <p class="text-sm text-white mb-3">
                        We use cookies so that our themes work for you. By using our website, you agree to our use of
                        cookies.
                    </p>
                    <!-- Buttons -->
                    <a href="pages/utility/terms.html" class="btn btn-sm btn-white" target="_blank">Learn more</a>
                    <button type="button" class="btn btn-sm btn-primary mr-2" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <!-- Go back -->
    <a href="index.html"
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
            <img src="assets/img/theme/light/img-v-2.jpg" alt="Image" class="img-as-bg">
            <!-- Overlay text -->
            <div class="row position-relative zindex-110 p-5">
                <div class="col-md-8 text-center mx-auto">
                    <span class="badge badge-warning badge-pill">News</span>
                    <h5 class="h5 text-white mt-3">The all new Quick is here</h5>
                    <p class="text-white opacity-8">
                        Everything you need to create amazing websites at scale.
                    </p>
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
                                <form>
                                    <div class="form-group">
                                        <label class="form-control-label">Email address</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="user"></i></span>
                                            </div>
                                            <input type="email" class="form-control" id="input-email"
                                                placeholder="name@example.com">
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
                                                    data-toggle="password-text" data-target="#input-password">Show
                                                    password</a>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="key"></i></span>
                                            </div>
                                            <input type="password" class="form-control" id="input-password"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-block btn-primary">Sign in</button>
                                </form>
                                <div class="py-3 text-center">
                                    <span class="text-xs text-uppercase">or</span>
                                </div>
                                <!-- Alternative login -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-block btn-neutral btn-icon mb-3 mb-sm-0">
                                            <span class="btn-inner--icon"><img src="assets/img/icons/brands/github.svg"
                                                    alt="Image placeholder"></span>
                                            <span class="btn-inner--text">Github</span>
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-block btn-neutral btn-icon">
                                            <span class="btn-inner--icon"><img src="assets/img/icons/brands/google.svg"
                                                    alt="Image placeholder"></span>
                                            <span class="btn-inner--text">Google</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
