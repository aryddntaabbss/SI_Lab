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
                        <h1>PENGELOLAAN MATA KULIAH</h1>
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
                        <th>DOSEN YANG MENGAJAR</th>
                        <th class="col-1">KELAS</th>
                        <th class="col-1">JUMLAH SKS</th>
                        <th class="col-1">SEMESTER</th>
                        <th class="col-2">AKSI</th>
                    </tr>
                </thead>
                <!-- /.tabel-body -->
                <tbody>
                    @can('IsAdmin')
                        @foreach($mata_kuliah as $matkul)
                        <tr>
                            <td>{{ $matkul->kode_matkul }}</td>
                            <td>{{ $matkul->nama_matkul }}</td>
                            <td>{{ $matkul->user->name }}</td>
                            <td>{{ $matkul->kelas }}</td>
                            <td>{{ $matkul->sks }}</td>
                            <td>{{ $matkul->semester }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-6">
                                        <form method="GET" action="{{ route('matkul.edit', ['matkul' => $matkul->id]) }}">
                                            @csrf  
                                            <button type="submit" class="btn btn-success">EDIT</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal{{ $matkul->id }}">Hapus</button>
        
                                        <!-- Modal -->
                                        <div class="modal fade" id="confirmDeleteModal{{ $matkul->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus Mata Kuliah</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus mata kuliah ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <form method="POST" action="{{ route('matkul.delete', ['matkul' => $matkul->id]) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </td>
                        </tr>
                        @endforeach
                    @elsecan('IsDosen')
                        @foreach($mata_kuliah as $matkul)
                        @if($matkul->user->id === auth()->user()->id)
                        <tr>
                            <td>{{ $matkul->kode_matkul }}</td>
                            <td>{{ $matkul->nama_matkul }}</td>
                            <td>{{ $matkul->user->name }}</td>
                            <td>{{ $matkul->kelas }}</td>
                            <td>{{ $matkul->sks }}</td>
                            <td>{{ $matkul->semester }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-6">
                                        <form method="GET" action="{{ route('matkul.edit', ['matkul' => $matkul->id]) }}">
                                            @csrf  
                                            <button type="submit" class="btn btn-success">EDIT</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal{{ $matkul->id }}">Hapus</button>
        
                                        <!-- Modal -->
                                        <div class="modal fade" id="confirmDeleteModal{{ $matkul->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus Mata Kuliah</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus mata kuliah ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <form method="POST" action="{{ route('matkul.delete', ['matkul' => $matkul->id]) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    @endcan
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div>
            <a href="{{ route('matkul.create') }}" class="btn btn-primary mx-4">Tambah</a>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('admin.layouts.footer')
@endsection
