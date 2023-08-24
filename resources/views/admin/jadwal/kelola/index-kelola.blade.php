@extends('admin.layouts.main')
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row my-4">
                    <div class="col-sm-6">
                        <h1>PENGELOLAAN JADWAL</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.card-header -->
        <div class="card-body mt-1 pt-0 mb-5">
            <div class="row">
                <div class="d-grid gap-2">
                    <form method="POST" action="{{ route('kelolaJadwal.create') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg mx-1">Buat {{ isset($jadwalMatkul) ? 'Ulang' : 'Jadwal' }}</button>
                    </form>
                </div>
                <div class="d-grid gap-2">
                    <form method="POST" action="{{ route('kelolaJadwal.next') }}">
                        @csrf
                        <button type="submit" class="btn btn-success btn-lg mx-1">Tambah Generasi</button>
                    </form>
                </div>
            </div>
            <div class="row d-flex justify-content-between mx-1 mt-4">
                <div class="col-lg-6 col-sm-12 my-1 align-bottom">
                    <p>Generasi ke : {{ $generasi }}</p>            
                    <p>Waktu Proses : {{ $totalWaktuProses }}</p>            
                    <p>Nilai Fitness: {{ isset($populasi[0]) ? $populasi[0]->fitness . ' %' : 'N/A' }}</p>
                </div>
                @if ($populasi[0]->fitness < 80)     
                <div class="col-lg-6 col-sm-12 my-1">
                    <h3 class="text-danger align-bottom">Nilai Fitnes Rendah, Silahkan Tambah Generasi Atau Buat Ulang Jadwal</h3>
                </div>
                @else 
                @endif
            </div>
            
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="table table-border-dark text-center">
                        <th class="col-1">NO</th>
                        <th class="col-1">KODE</th>
                        <th class="col-2">NAMA MATA KULIAH</th>
                        <th class="col-2">DOSEN YANG MENGAJAR</th>
                        <th class="col-1">KELAS</th>
                        <th class="col-1">JUMLAH SKS</th>
                        <th class="col-1">HARI</th>
                        <th class="col-2">JAM</th>
                        <th class="col-1">POPULASI KE</th>
                    </tr>
                </thead>
                <!-- /.tabel-body -->
                <tbody>
                    @foreach ($jadwalMatkul as $i => $jadwal)
                        <tr>
                            {{-- <td>{{ dd($gen) }}</td> --}}
                            <td>{{ $i+1 }}</td>
                            <td>{{ $jadwal->matkul->kode_matkul }}</td>
                            <td>{{ $jadwal->matkul->nama_matkul }}</td>
                            <td>{{ $jadwal->matkul->user->name }}</td>
                            <td>{{ $jadwal->matkul->kelas }}</td>
                            <td>{{ $jadwal->matkul->sks }}</td>
                            <td>{{ $jadwal->hari->nama_hari }}</td>
                            <td>{{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_selesai }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editJadwalModal{{ $jadwal->id }}">Edit</button>
        
                                        <!-- Modal -->
                                        <div class="modal fade" id="editJadwalModal{{ $jadwal->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Edit Jadwal Mata Kuliah</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="{{ route('kelolaJadwal.update', ['jadwal' => $jadwal->id]) }}">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="hari" class="form-label">Hari :</label>
                                                                <select class="form-control" id="hari" name="hari">
                                                                    @foreach ($hari as $h)
                                                                        <option value="{{ $h->id }}" {{ ($h->id === ($jadwal->id_hari ?? old('hari'))) ? 'selected' : '' }}>{{ $h->nama_hari}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="sks" class="form-label">Jam Masuk :</label>
                                                                <input type="time" class="form-control" id="waktu_mulai" placeholder="Jam Masuk Mata Kuliah" name="waktu_mulai" value="{{ $jadwal->waktu_mulai ?? old('waktu_mulai')}}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('admin.layouts.footer')
@endsection
