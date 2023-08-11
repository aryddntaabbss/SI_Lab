@extends('admin.layouts.main')
@include('admin.layouts.header')
@include('admin.layouts.sidebar')

@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{-- <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Profile</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section> --}}

        <!-- /.row -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mt-4">
                        <div class="card-body">
                            
                            
                            <form method="post" action="{{ route('profile.updateInfo', $user->id) }}">
                                @method('patch')
                                @csrf
                                <div class="col-11 mx-3 mt-3 mb-1">
                                    <div class="mb-3 mt-3">
                                        <h3>Informasi Profil</h3>
                                        <span>Perbarui Informasi Profil Akun Anda</span>
                                    </div>
            
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama :</label>
                                        <input type="text" class="form-control" id="nama" placeholder="Username" name="name"
                                            value="{{ $user->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
            
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email :</label>
                                        <input type="email" class="form-control" id="email" placeholder="tes@gmail.com"
                                            name="email" value="{{ $user->email }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="prodi" class="form-label">Prodi :</label>
                                        <select class="form-control" id="prodi" name="prodi">
                                            @foreach ($prodis as $prodi)
                                                <option value="{{ $prodi->id }}" {{ $user->prodi->id == $prodi->id ? 'selected' : '' }}>
                                                    {{ $prodi->nama_prodi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>            
                                </div>
            
                                <div class="d-grid gap-2 mx-4 mt-3">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>

                            <br><br>
                            <form method="post" action="{{ route('profile.updatePassword', $user->id) }}">
                                @method('patch')
                                @csrf
                                <div class="col-11 mx-3 mt-3 mb-1">
                                    <div class="mb-3 mt-3">
                                        <h3>Perbarui Kata Sandi</h3>
                                        <span>Pastikan akun Anda menggunakan kata sandi acak yang panjang agar tetap aman.</span>
                                    </div>
                                    <div class="row mb-3 justify-content-between">
                                        <div class="col-lg-8 col-md-12">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password Lama :</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="password" name="password">
                                                    <button class="btn btn-outline-hidden" type="button" id="togglePassword">
                                                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="newPassword" class="form-label">Password Baru :</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="newPassword" name="newPassword">
                                                    <button class="btn btn-outline-hidden" type="button" id="toggleNewPassword">
                                                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Konfirmasi Password :</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="password_confirmation"
                                                        name="password_confirmation" required autocomplete="new-password">
                                                    <button class="btn btn-outline-hidden" type="button" id="toggleConfirmPassword">
                                                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
            
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <p class="mb-2">Password requirements</p>
                                            <p class="text-muted mb-2"> To create a new password, you have to meet all of the
                                                following requirements: </p>
                                            <ul class="text-muted pl-4 mb-0">
                                                <li> Minimum 8 character </li>
                                                <li>At least one special character</li>
                                                <li>At least one number</li>
                                                <li>Can’t be the same as a previous password </li>
                                            </ul>
                                        </div>
                                    </div>
            
                                </div>
            
                                <div class="d-grid gap-2 mx-4 mt-3">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePasswordButton = document.getElementById('togglePassword');
            const toggleNewPasswordButton = document.getElementById('toggleNewPassword');
            const toggleConfirmPasswordButton = document.getElementById('toggleConfirmPassword');
            const passwordField = document.getElementById('password');
            const newPasswordField = document.getElementById('newPassword');
            const confirmPasswordField = document.getElementById('password_confirmation');

            togglePasswordButton.addEventListener('click', function() {
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                } else {
                    passwordField.type = 'password';
                }
            });

            toggleNewPasswordButton.addEventListener('click', function() {
                if (newPasswordField.type === 'password') {
                    newPasswordField.type = 'text';
                } else {
                    newPasswordField.type = 'password';
                }
            });

            toggleConfirmPasswordButton.addEventListener('click', function() {
                if (confirmPasswordField.type === 'password') {
                    confirmPasswordField.type = 'text';
                } else {
                    confirmPasswordField.type = 'password';
                }
            });
        });
    </script>

    @include('admin.layouts.footer')
@endsection
