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
                        <h1>Edit Jadwal Pemakaian Lab Komputer-FT</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="#" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Form fields for editing -->
                            <div class="form-group">
                                <label for="hari">Hari:</label>
                                <input type="text" class="form-control" name="hari" value="">
                            </div>
                            <div class="form-group">
                                <label for="jam">Jam:</label>
                                <input type="text" class="form-control" name="jam" value="">
                            </div>
                            <div class="form-group">
                                <label for="mata_kuliah">Mata Kuliah:</label>
                                <input type="text" class="form-control" name="mata_kuliah" value="">
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas:</label>
                                <input type="text" class="form-control" name="kelas" value="">
                            </div>
                            <div class="form-group">
                                <label for="prodi">Prodi:</label>
                                <input type="text" class="form-control" name="prodi" value="">
                            </div>
                            <div class="form-group">
                                <label for="dosen">Dosen:</label>
                                <input type="text" class="form-control" name="dosen" value="">
                            </div>
                            <div class="form-group">
                                <label for="pertemuan">Pertemuan:</label>
                                <input type="text" class="form-control" name="pertemuan" value="">
                            </div>



                            <button type="submit" class="btn btn-primary">Update Jadwal</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
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
