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
                        <h1>PENGELOLAAN JADWAL</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="table table-border-dark text-center">
                        <th class="col-2">KODE MATA KULIAH</th>
                        <th>NAMA MATA KULIAH</th>
                        <th>NAMA DOSEN</th>
                        <th class="col-1">KELAS</th>
                        <th class="col-1">JUMLAH SKS</th>
                        <th class="col-1">SEMESTER</th>
                    </tr>
                </thead>
                <!-- /.tabel-body -->
                <tbody>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>8.5</td>
                        <td>C/A</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>8.5</td>
                        <td>C/A</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>8.5</td>
                        <td>C/A</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>8.5</td>
                        <td>C/A</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>8.5</td>
                        <td>C/A</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>8.5</td>
                        <td>C/A</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>8.5</td>
                        <td>C/A</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div>
            <a href="{{ url('/dashboard/tambah-matkul') }}" class="btn btn-primary mx-4">Tambah</a>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('admin.layouts.footer')
@endsection
