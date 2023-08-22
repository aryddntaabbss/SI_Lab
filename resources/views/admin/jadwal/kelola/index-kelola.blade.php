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
            <div class="row">
                <div class="col-9">
                    <form method="POST" action="{{ route('kelolaJadwal.create') }}">
                        @csrf
                        <button type="submit" class="btn btn-success mx-2 mb-4">Buat Jadwal</button>
                    </form>
                    <button class="btn btn-success mx-2 mb-4">Evaluasi Jadwal</button>
                    <button class="btn btn-success mx-2 mb-4">Simpan</button>
                </div>
                <div class="col-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                      </div>
                </div>
            </div>
            
            @foreach ($populasi as $pop)
                <h3 class="my-5">Jadwal Ke {{ $pop->id }}</h3>

                @if (isset($pop))
                    <p>Nilai Fitness Populasi Ke {{ $pop->id }} : {{ $pop->fitness }} %</p>
                @else
                    <p>Nilai Fitness Populasi Ke {{ $pop->id }} : N/A</p>
                @endif
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="table table-border-dark text-center">
                            <th class="col-1">KODE</th>
                            <th class="col-2">NAMA MATA KULIAH</th>
                            <th class="col-2">DOSEN YANG MENGAJAR</th>
                            <th class="col-1">KELAS</th>
                            <th class="col-1">JUMLAH SKS</th>
                            <th class="col-1">SEMESTER</th>
                            <th class="col-1">HARI</th>
                            <th class="col-2">JAM</th>
                            <th class="col-1">POPULASI KE</th>
                        </tr>
                    </thead>
                    <!-- /.tabel-body -->
                    <tbody>
                        @foreach ($gen1->where('id_populasi', $pop->id) as $gen)
                            <tr>
                                <td>{{ $gen->matkul->kode_matkul }}</td>
                                <td>{{ $gen->matkul->nama_matkul }}</td>
                                <td>{{ $gen->matkul->user->name }}</td>
                                <td>{{ $gen->matkul->kelas }}</td>
                                <td>{{ $gen->matkul->sks }}</td>
                                <td>{{ $gen->matkul->semester }}</td>
                                <td>{{ $gen->hari->nama_hari }}</td>
                                <td>{{ $gen->waktu_mulai }} - {{ $gen->waktu_selesai }}</td>
                                <td>{{ $gen->id_populasi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach

        </div>
        <!-- /.card-body -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('admin.layouts.footer')
@endsection
