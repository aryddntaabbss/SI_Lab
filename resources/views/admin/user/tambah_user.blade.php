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
                <div class="col-8 mx-3 mt-3 mb-1">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Dosen</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nama">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                    </div>
                </div>
                
                
                <div class="d-grid gap-2 mx-4 mt-3">
                    <button type="submit" action="save" class="btn btn-primary">Tambah</button>
                    {{-- <a href="{{ url('/tambah-jadwal') }}" class="btn btn-success btn-block">Tambah</a> --}}
                </div>
                    

                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('admin.layouts.footer')
@endsection
