<div id="carouselExampleDark" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach ($hero as $index => $post)
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $index }}"
            class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}"
            aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach ($hero as $index => $post)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-bs-interval="5000">
            <img src="{{ $storage . $post['image_path'] }}" class="d-block w-100"
                style="object-fit: cover; height: 600px;" alt="...">
            <div class="carousel-overlay"></div>
            <div class="carousel-caption d-none d-md-block" style="z-index: 99;">
                <a href="#" class="px-2 text-white" style="background-color: #ED8D0F;">{{ $post['category']['name']
                    }}</a>
                <h2 class="mt-2">{{ $post['title'] }}</h2>
                <p>By {{ $post['user']['name'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev"
        style="z-index: 99;">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next"
        style="z-index: 99;">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>