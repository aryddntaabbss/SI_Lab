<x-main-layout title="{{ $data['title'] }} - Website LDII MALUT">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs" style="background-color: #073f24;">
        <div class="container">

            <ol>
                <li><a href="index.html">Beranda</a></li>
                <li><a href="blog.html">Visi-Misi</a></li>
            </ol>
            <h2>Visi & Misi LDII</h2>

        </div>
    </section>

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <!-- Main Content -->
                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        <div class="entry-img">
                            <img src="{{ $gambar }}" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            {{ $data['title'] }}
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> {{
                                    $data['admin_name'] }}</li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="blog-single.html"><time datetime="{{ $data['created_at'] }}">{{
                                            $tanggal }}</time></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-eye"></i> {{ $data['view'] ?
                                    $data['view'] : 0 }}</li>
                                <li class="d-flex align-items-center"><i class="bi bi-share"></i> {{ $data['share'] ?
                                    $data['share'] : 0 }}</li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            {!! $data['body'] !!}
                        </div>

                    </article><!-- End blog entry -->
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    @include('partials.sidebar')
                </div>

            </div>

        </div>
    </section>
</x-main-layout>