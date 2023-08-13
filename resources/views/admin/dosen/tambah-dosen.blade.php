@extends('admin.layouts.main')
@include('admin.layouts.header')
@include('admin.layouts.sidebar')

@section('body')
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Data</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="container-fluid">
            <div class="col-12">
                <form method="POST" action="{{ route('dosen.create') }}">
                    @csrf
                    <div class="col-10 col-sm-12 mx-3 mt-3 mb-1">
                        <div class="mb-3">
                            <label for="nip" class="form-label">Nip :</label>
                            <input type="text" class="form-control" id="nip" placeholder="NIP Dosen"
                                name="id">
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama :</label>
                            <input type="text" class="form-control" id="nama" placeholder="Username" name="name"
                                value="{{ old('name') }}">
                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                        </div>

                        <div class="mb-3">
                            <label for="prodi" class="form-label">Prodi :</label>
                            <select class="form-control" id="prodi" name="prodi">
                                @foreach ($prodis as $prodi)
                                    <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email :</label>
                            <input type="email" class="form-control" id="email" placeholder="tes@gmail.com"
                                name="email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                        </div>

                        <div class="row mb-3 justify-content-between">
                            <div class="col-lg-8 col-md-12">

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password :</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password">
                                        <button class="btn btn-outline-hidden" type="button" id="togglePassword">
                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
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
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                                </div>
                                
                                <div class="d-grid gap-2 my-3">
                                    <button id="responsiveButton" type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <p class="mb-2">Ketentuan Password</p>
                                <p class="text-muted mb-2"> Untuk membuat password baru, pastikan untuk mengikuti ketentuan berikut : </p>
                                <ul class="text-muted pl-4 mb-0">
                                    <li> Minimal 8 karakter </li>
                                    <li> Memiliki karakter spesial ($@#) </li>
                                    <li> Memiliki Angka (123)</li>
                                    <li> Tidak bisa sama dengan password sebelumnya </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </form>

                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        var button = document.getElementById('responsiveButton');
        var isMobile = window.matchMedia('(max-width: 767px)').matches;

        if (isMobile) {
            button.classList.add('btn-block');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const togglePasswordButton = document.getElementById('togglePassword');
            const toggleConfirmPasswordButton = document.getElementById('toggleConfirmPassword');
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('password_confirmation');

            togglePasswordButton.addEventListener('click', function() {
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                } else {
                    passwordField.type = 'password';
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
