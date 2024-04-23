@foreach ($data as $index => $post)
<div class="col-sm-6 col-md-4">
    <div class="_img-wrapper _post-img">
        <img src="{{ $storage . $post['image_path'] }}" class="img-fluid" alt="Gambar {{ $post['title'] }}">
    </div>
    <h6 class="mt-3">{{ $post['title'] }}</h6>
    <div class="text-sm d-flex">
        <a href="#" class="me-2 text-black">{{ $post['category']['name'] }} | </a>
        <span style="color: #00923f"><i class="fa-regular fa-calendar-days"></i></span>
        <p class="ms-2">{{ $post['created_at'] }}</p>
    </div>
</div>
@endforeach