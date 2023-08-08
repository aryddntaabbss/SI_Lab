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
                        <h1>Tambah Dosen</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row">
            <div class="col-12">
                <form action="POST" href="#">
                    <div class="col-8 mx-3 mt-3 mb-1">
                        <div class="mb-3">
                            <label for="nama" class="form-label ">Nama Dosen</label>
                            <input type="text" id="nama" class="form-control" placeholder="Nama" name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <span class="pesan-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="pesan-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}">
                            @error('password')
                                <span class="pesan-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Konfirmasi Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password" name="confirm-password" value="{{ old('password') }}">
                            @error('password')
                                <span class="pesan-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 mx-4 mt-3">
                        <button type="submit" action="save" class="btn btn-primary">Tambah</button>
                    </div>
                    
                </form>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('admin.layouts.footer')
@endsection
