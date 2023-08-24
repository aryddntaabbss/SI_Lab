@extends('layouts.main')
@section('body')
    <div class="card" id="content">
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
                        <th class="col-sm-2 text-center">HARI</th>
                        <th class="col-sm-2 text-center">JAM</th>
                        <th class="col-sm-2 text-center">MATA KULIAH</th>
                        <th class="col-sm-1 text-center">KELAS</th>
                        <th class="col-sm-2 text-center">PRODI</th>
                        <th class="col-sm-2 text-center">DOSEN</th>
                        <th class="col-sm-1 text-center">SEMESTER</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $i => $j)
                        <tr id="row{{ $i+1 }}">
                            <td>{{ $j->hari->nama_hari }}</td>
                            <td>{{ $j->waktu_mulai }} - {{ $j->waktu_selesai }}</td>
                            <td>{{ $j->matkul->nama_matkul }}</td>
                            <td>{{ $j->matkul->kelas }}</td>
                            <td>{{ $j->matkul->user->prodi->nama_prodi }}</td>
                            <td>{{ $j->matkul->user->name }}</td>
                            <td>{{ $j->matkul->semester }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    @include('layouts.footer')
    <style>
        /* Definisikan warna highlight */
        .highlight {
            background-color: #e0fbfc; /* Warna abu muda */
            transition: background-color 0.5s ease-in-out; /* Animasi perpindahan warna */
        }
    </style>
    <script>
        let cursorActive = false;
        let cursorTimeout;

        // Mengatur event listener untuk memantau pergerakan cursor
        document.addEventListener('mousemove', () => {
            cursorActive = true;
            clearTimeout(cursorTimeout);
            cursorTimeout = setTimeout(() => {
                cursorActive = false;
            }, 1000);
        });

        // Timeout untuk menghentikan animasi jika cursor tidak aktif
        cursorTimeout = setTimeout(() => {
            cursorActive = false;
            animateScroll();
        }, 3000); // Setelah 3 detik cursor tidak bergerak, mulai animasi kembali

        // Fungsi untuk melakukan animasi scroll bolak-balik
        function animateScroll() {
            let currentRowIndex = 0;
            const rows = document.querySelectorAll('tbody tr');
            
            setInterval(function() {
                if (!cursorActive) {
                    rows.forEach((row, index) => {
                        if (index === currentRowIndex) {
                            row.classList.add('highlight');
                        } else {
                            row.classList.remove('highlight');
                        }
                    });

                    currentRowIndex++;
                    if (currentRowIndex >= rows.length) {
                        currentRowIndex = 0;
                    }
                }
            }, 3000); // Interval animasi (ms)
        }

        // Mulai animasi saat halaman dimuat
        animateScroll();

    </script>
@endsection
