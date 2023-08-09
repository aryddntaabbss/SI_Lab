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
        <div class="row">
            <div class="col-12">
                <div class="col-8 mx-3 mt-3 mb-1">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nip :</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama :</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Prodi :</label>
                        <select class="form-control" id="prodi">
                            <option value="0"></option>
                            <option value="1">Teknik Arsitek</option>
                            <option value="2">Teknik Elektro</option>
                            <option value="3">Teknik Informatika</option>
                            <option value="4">Teknik Industri</option>
                            <option value="5">Teknik Mesin</option>
                            <option value="6">Teknik Sipil</option>
                            <option value="7">Teknik Pertambangan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jumlah Mata Kuliah :</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email :</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password :</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                </div>


                <div class="d-grid gap-2 mx-4 mt-3">
                    <button type="submit" action="save" class="btn btn-success">Simpan</button>
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
