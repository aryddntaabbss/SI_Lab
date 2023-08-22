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
            <h3>Target tiap gen</h3>
            <h5>1. Tiap matkul tidak bertabrakan</h5>
            <h5>2. Maks matkul (senin - kamis) : 4  // (jumat) : 2</h5>
            <h5>3. Waktu matkul harus : menit ke 00, 15, 30</h5><br>
            {{-- <h5>Hari : {{ $hari->nama_hari }}</h5>
            <h5>Target 1 : {{ $target1 }}</h5>
            <h5>Target 2 : {{ $target2 }}</h5>
            <h5>Target 3 : {{ $target3 }}</h5>
            <h5>Fitness : {{ $fitness }}</h5> --}}
            {{-- <h5>Total Fitness : {{ $totalFitnessJadwal }}</h5> --}}
            {{-- <h3>Panjang : {{ $panjang }}</h3> --}}
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="table table-border-dark text-center">
                        <th class="col-2">ID</th>
                        <th class="col-2">ID MATKUL</th>
                        <th class="col-2">ID HARI</th>
                        <th class="col-4">JAM</th>
                        <th class="col-2">ID POPULASI</th>
                    </tr>
                </thead>
                <!-- /.tabel-body -->
                <tbody>
                    @foreach ([1, 2, 3, 4] as $populasi) <!-- Loop untuk setiap populasi -->
                        <tr class="table-info">
                            <td colspan="3">Populasi : {{ $populasi }}</td>
                            <td colspan="2">Fitness : {{ $fitnessJadwal->fitness }}</td>
                        </tr>
                        @foreach ($gen1->where('id_populasi', $populasi) as $gen) <!-- Loop untuk setiap jadwal dalam populasi -->
                            <tr>
                                <td>{{ $gen->id }}</td>
                                <td>{{ $gen->id_matkul }}</td>
                                <td>{{ $gen->id_hari }}</td>
                                <td>{{ $gen->waktu_mulai }} - {{ $gen->waktu_selesai }}</td>
                                <td>{{ $gen->id_populasi }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
           
        </div>
    </div>
    <!-- /.content-wrapper -->

    @include('admin.layouts.footer')
@endsection
