<div class="card h-100">
    <div class="d-flex align-items-center justify-content-center card-header">
        <h5 class="fw-bold title my-auto"><i class="fa-solid fa-list" style="font-size: 20px;"></i> Thể loại</h5>
    </div>
    <div class="row row-cols-1 my-3 mx-3">
        @if($genre->count()!=0)
        @foreach($genre as $value => $genre)
        <div class="">
            <div class="list-group list-group-flush genre-link">
                <a href="{{route('home.genre',[$genre->genre_slug])}}" class="list-group-item border-bottom border-2 title fw-bold" style="font-size:12px;">{{$genre->genre_name}}</a>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <script>
        // Start page
        $(document).ready(function() {
            // Lấy đường dẫn URL hiện tại
            var currentUrl = window.location.href;

            // Tìm thẻ <a> trong menu và xử lý class "active"
            $('.genre-link a').each(function() {
                var linkUrl = $(this).attr('href');
                if (currentUrl.includes(linkUrl)) {
                    $(this).closest('.genre-link a').addClass('genre-active');
                }
            });
        });
    </script>
</div>