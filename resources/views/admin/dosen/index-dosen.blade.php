@extends('admin.layouts.main')
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header mb-1">
            <div class="container-fluid">
                <div class="row my-4">
                    <div class="col-sm-6">
                        <h1>PENGELOLAAN MATA KULIAH</h1>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a href="{{ route('dosen.create') }}" class="btn btn-success btn-lg mx-1">Tambah Dosen</a>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <h5 class="mx-2">Jumlah Dosen : {{ $jumlahDosen }}</h5>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.card-header -->
        <div class="card-body mt-1 pt-0 mb-5">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="table table-border-dark text-center">
                        <th class="col-1">NIP</th>
                        <th class="col-3">NAMA</th>
                        <th class="col-2">PRODI</th>
                        <th class="col-3">EMAIL</th>
                        <th class="col-2">AKSI</th>
                    </tr>
                </thead>
                <!-- /.tabel-body -->
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->prodi->nama_prodi }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal{{ $user->id }}">Hapus</button>

                                <!-- Modal -->
                                <div class="modal fade" id="confirmDeleteModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus Akun</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus akun ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('dosen.delete', ['id' => $user->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
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
