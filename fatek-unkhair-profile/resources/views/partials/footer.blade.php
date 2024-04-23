<footer id="footer" style="background-color: #141414;">

    <div class="footer-top" style="background-color: #073f24;">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-12 footer-newsletter d-flex justify-content-center">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="">
                </div>

                <div class="col-lg-4 col-md-4 footer-contact pt-5 text-center">
                    <h3>DPW LDII MALUT</h3>
                    <p>
                        Jl. Pemuda <br>
                        Kota Ternate, Provinsi Maluku Utara<br>
                        Indonesia <br><br>
                        <strong>Phone:</strong> +62 823 456 789<br>
                        <strong>Email:</strong> ldiimalut.web@gmail.com<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-4 footer-links pt-5">
                    <h4>Informasi Lembaga</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('sejarah') }}">Sejarah LDII</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('visi-misi') }}">Visi & Misi LDII</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('tentang') }}">Tentang LDII</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('struktur-organisasi') }}">Struktur Organisasi</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-4 footer-links pt-5">
                    <h4>Kategori Berita</h4>
                    <ul>
                        @foreach ($categories as $c)
                        <li><i class="bx bx-chevron-right"></i> <a href="#">{{ $c['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>DPW LDII MALUT</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> |
                Modified by <a href="https://bootstrapmade.com/">Alriskhandy</a>
            </div>
        </div>
    </div>
</footer>