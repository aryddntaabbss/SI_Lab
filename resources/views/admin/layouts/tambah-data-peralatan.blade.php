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
                        <label for="exampleFormControlInput1" class="form-label">Nama Barang :</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Hari">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode Barang :</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jam">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Merek/Tipe :</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Mata Kuliah">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tahun :</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kelas">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jumlah :</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Prodi">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Keterangan :</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Dosen">
                    </div>
                </div>
                
                
                <div class="d-grid mx-4 mt-3 mb-3">
                    <button type="submit" action="save" class="btn btn-primary">Tambah</button>
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
