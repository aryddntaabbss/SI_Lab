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
                        <h1>Tambah Mata Kuliah</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="container-fluid">
            <div class="col-12">
                <form method="POST" action="{{ route('matkul.create') }}">
                    @csrf
                    <div class="col-10 mx-3 mt-3 mb-1">
                        <div class="mb-3">
                            <label for="kodeMataKuliah" class="form-label">Kode Mata Kuliah :</label>
                            <input type="text" class="form-control" id="kodeMataKuliah" placeholder="Kode Mata Kuliah" name="kode_matkul">
                        </div>

                        <div class="mb-3">
                            <label for="namaMataKuliah" class="form-label">Nama Mata Kuliah :</label>
                            <input type="text" class="form-control" id="namaMataKuliah" placeholder="Nama Mata Kuliah" name="matkul" value="{{ old('matkul') }}">
                            <x-input-error :messages="$errors->get('matkul')" class="mt-2 text-danger" />
                        </div>

                        {{-- <div class="mb-3">
                            <label for="namaDosen" class="form-label">Nama Dosen :</label>
                            <select class="form-control" id="namaDosen" name="dosen">
                                @foreach ($users as $user)  
                                    @if ($user->id_role === 2)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="mb-3">
                            <label for="namaDosen" class="form-label">Nama Dosen :</label>
                            <select class="form-control" id="namaDosen" name="dosen">
                                @can('IsAdmin')
                                    @foreach ($users as $user)  
                                        @if ($user->id_role === 2)
                                            <option value="{{ $user->id }}" {{ $user->id == ($matkul->id_dosen ?? old('dosen')) ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                @elsecan('IsDosen')
                                    <option value="{{ auth()->user()->id }}" selected>{{ auth()->user()->name }}</option>
                                @endcan
                            </select>
                        </div>
                        

                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas :</label>
                            <input type="text" class="form-control" id="kelas" placeholder="Nama Kelas" name="kelas">
                        </div>

                        <div class="mb-3">
                            <label for="sks" class="form-label">SKS :</label>
                            <input type="number" class="form-control" id="sks" placeholder="Jumlah SKS" name="sks">
                        </div>

                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester :</label>
                            <select class="form-control" id="semester" name="semester">
                                @for ($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                    </div>    
                    <div class="d-grid gap-2 mx-4 mt-3">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

    @include('admin.layouts.footer')
@endsection
