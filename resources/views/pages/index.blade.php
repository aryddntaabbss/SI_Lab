@extends('layouts.main')
@section('body')
    <div class="card">
        <div class="container d-flex justify-content-center">
            <!-- Brand -->
            <a class="navbar-img" href="{{ url('/') }}">
                <img alt="Image placeholder" src="{{ asset('assets/img/unkhair.png') }}" id="navbar-logo"
                    style="max-width: 60px; max-height: 60px;">
            </a>
        </div>
        <div class="card-header">
            <h3 class="card-title text-center">JADWAL PEMAKAIAN LABORATORIUM FAKULTAS TEKNIK</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="table table-dark">
                        <th>HARI</th>
                        <th>JAM</th>
                        <th>MATA KULIAH</th>
                        <th>KELAS</th>
                        <th class="col-md-3 text-center">PRODI</th>
                        <th class="col-md-3 text-center">DOSEN</th>
                        <th>PERTEMUAN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>C/A</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>C/A</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>C/A</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>C/A</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>C/A</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>C/A</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>C/A</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>C/A</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>C/A</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                        <td>C/A</td>
                        <td>Nintendo DS</td>
                        <td>8.5</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    @include('layouts.footer')
@endsection
