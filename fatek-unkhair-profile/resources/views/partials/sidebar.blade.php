<div class="sidebar">

    <h3 class="sidebar-title">Artikel Terkini</h3>
    <div class="sidebar-item recent-posts">
        @foreach ($side as $post)
        <div class="post-item clearfix">
            <img src="{{ $storage . $post['image_path'] }}" alt="">
            <h4><a href="blog-single.html">{{ $post['title'] }}</a></h4>
            <time datetime="2020-01-01">{{ $post['created_at'] }}</time>
        </div>
        @endforeach
    </div>

    <h3 class="sidebar-title">Kategori Artikel</h3>
    <div class="sidebar-item categories">
        <ul>
            @foreach ($categories as $category)
            <li><a href="#">{{ $category['name'] }}</a></li>
            @endforeach
        </ul>
    </div>

</div>