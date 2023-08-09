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
        <div class="row">
            <div class="col-12">
                <div class="col-8 mx-3 mt-3 mb-1">
                    <div class="mb-3">
                        <label for="kodeMataKuliah" class="form-label">Kode Mata Kuliah :</label>
                        <input type="text" class="form-control" id="kodeMataKuliah">
                    </div>
                    <div class="mb-3">
                        <label for="namaMataKuliah" class="form-label">Nama Mata Kuliah :</label>
                        <input type="text" class="form-control" id="namaMataKuliah">
                    </div>
                    <div class="mb-3">
                        <label for="namaDosen" class="form-label">Nama Dosen :</label>
                        <select class="form-control" id="namaDosen">
                            <option value="0"></option>
                            <option value="1">Apin</option>
                            <option value="2">Upin</option>
                            <option value="3">Ipin</option>
                            <option value="4">Epin</option>
                            <option value="5">Opin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas :</label>
                        <input type="text" class="form-control" id="kelas">
                    </div>
                    <div class="mb-3">
                        <label for="sks" class="form-label">SKS :</label>
                        <input type="text" class="form-control" id="sks">
                    </div>
                    <div class="mb-3">
                        <label for="semester" class="form-label">Semester :</label>
                        <select class="form-control" id="semester">
                            <option value="0"></option>
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                            <option value="3">Semester 3</option>
                            <option value="4">Semester 4</option>
                            <option value="5">Semester 5</option>
                            <option value="6">Semester 6</option>
                            <option value="7">Semester 7</option>
                            <option value="8">Semester 8</option>
                        </select>
                    </div>
                </div>
                
                <div class="d-grid gap-2 mx-4 mt-3">
                    <button type="submit" action="save" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.footer')
@endsection
