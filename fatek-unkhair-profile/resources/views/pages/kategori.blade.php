<x-main-layout>
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs" style="background-color: #073f24;">
        <div class="container">
            <ol>
                <li><a href="index.html">Home</a></li>
                <li><a href="blog.html">Kategori</a></li>
                <li>Dakwah</li>
            </ol>
            <h2>Dakwah</h2>
        </div>
    </section>

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">

                <!-- Kolom Blog -->
                <div class="col-lg-8 entries">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <img src="{{ asset('assets/img/blog/blog-1.jpg') }}" class="d-block w-100"
                                style="object-fit: cover; height: 260px;" alt="">
                        </div>
                        <div class="col-lg-6">
                            <h3 class="mt-3">Bahas Program Kerja 2024, LDII Lanjutkan Pengabdian Bangsa</h3>
                            <div class="d-flex">
                                <p class="me-2">By Admin</p>
                                <span class="me-3">| 30 December 2023</span>
                                <span>Comment : 20</span>
                            </div>
                            <div class="_post-body">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. At alias corporis
                                    laboriosam quidem tempore qui maxime quis voluptatum a! Voluptates magni dolorem
                                    inventore, odio corporis quas optio nam adipisci ea.
                                <p>
                            </div>
                            <a class="text-black" href="#">Selengkapnya ></button>
                        </div>
                    </div>
                </div>

                <!-- Kolom Sidebar -->
                <div class="col-lg-4">
                    @include('partials.sidebar')
                </div>

            </div>
        </div>
    </section>
</x-main-layout>