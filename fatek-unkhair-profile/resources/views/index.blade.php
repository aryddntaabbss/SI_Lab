<x-main-layout title="Beranda - Website LDII MALUT">
    @include('partials.hero')
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container-fluid" data-aos="fade-up">

            <div class="row">

                <!-- Kolom Sidebar -->
                <div class="col-md-4">
                    @include('partials.sidebar')
                </div>

                <!-- Kolom Blog -->
                <div class="col-md-8 px-3 entries">
                    @if (count($mainArticle) > 0)
                    <div class="mb-5">
                        <div class="_img-wrapper _main-post-img">
                            <img src="{{ $storage . $mainArticle[0]['image_path'] }}" class="img-fluid"
                                alt="Gambar {{ $mainArticle[0]['title'] }}">
                        </div>
                        <h3 class="mt-4">{{ $mainArticle[0]['title'] }}</h3>
                        <div class="d-flex">
                            <p class="me-2">By {{ $mainArticle[0]['user']['name'] }} | </p>
                            <span class="me-2">{{ $mainArticle[0]['category']['name'] }} | </span>
                            <span class="me-2" style="color: #00923f"><i class="fa-regular fa-calendar-days"></i></span>
                            <span>{{ $mainArticle[0]['created_at'] }}</span>
                        </div>
                        <div class="_post-body mb-2">
                            {!! $mainArticle[0]['excerpt'] !!}
                        </div>
                        <a href="#" class="text-decoration-underline text-black">Baca Selengkapnya..</a>
                    </div>
                    @endif

                    <div class="row" id="postContainer">
                        @foreach ($articles as $index => $post)
                        <div class="col-sm-6 col-md-4">
                            <div class="_img-wrapper _post-img">
                                <img src="{{ $storage . $post['image_path'] }}" class="img-fluid"
                                    alt="Gambar {{ $post['title'] }}">
                            </div>
                            <h6 class="mt-3">{{ $post['title'] }}</h6>
                            <div class="text-sm d-flex">
                                <a href="#" class="me-2 text-black">{{ $post['category']['name'] }} | </a>
                                <span style="color: #00923f"><i class="fa-regular fa-calendar-days"></i></span>
                                <p class="ms-2">{{ $post['created_at'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="auto-load text-center my-2" style="display: none;">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border me-2" role="status">
                            </div>
                        </div>
                    </div>

                    <div class="my-3 text-center">
                        <button class="btn btn-primary load-more">Load More</button>
                    </div>
                </div>
            </div>
    </section>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script>
        var ENDPOINT = "{{ route('home') }}";
        var page = 1;

        $(".load-more").click(function(){
            page++;
            LoadMore(page);
        });

        function LoadMore(page){
            $.ajax({
                url: ENDPOINT,
                data: { page: page },
                dataType: "json", // Berubah dari 'datatype' menjadi 'dataType'
                type: "get",
                beforeSend: function() {
                    $('.auto-load').show();
                }
            }).done(function(response){
                console.log(response);
                if (response.json == ''){
                    $('.auto-load').json("End :(");
                    return;
                }
                $('.auto-load').hide();
                $('#postContainer').append(response.html);
                if (!response.hasNextPage) {
                    $('.load-more').hide();
                }
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                console.log('Server error occurred');
                console.log(jqXHR.responseText);
            });
        }
    </script>
    @endpush
</x-main-layout>