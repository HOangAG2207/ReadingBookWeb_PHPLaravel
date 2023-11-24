<div class="album my-3">
    <div class="container">
        @if($book_with_lastest_chapter->count()==0)
        <div class="d-flex align-items-center mb-2 ms-3">
            <p class="text-decoration-none">Đang cập nhật sách...</p>
        </div>
        @endif
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 g-3">
            @foreach($book_with_lastest_chapter as $value => $book)
            {{--@if($book->chapter->count() > 0)--}}
            <div class="col">
                <div class="card shadow-md border-0">
                    <div class="" style="position:relative;">
                        <img id="frame" src="{{ $book->book_image==null ? 
                                        asset('assets/images/no_image.jpg') 
                                        : asset('storage/uploads/Sach/'.$book->book_image) }}" class="rounded card-img-bottom object-fit-cover" width="130px" height="200px">
                        <div class="content bg-secondary w-100 text-white text-center" style="position:absolute; bottom:0;opacity:0.9">
                            <div class="book_content d-flex justify-content-center align-items-center my-1">
                                <small class="">
                                    <i class="fa-solid fa-eye me-1"></i>
                                    @if ($book->book_view > 10000000)
                                    {{number_format($book->book_view / 1000000, 0, '.', '') . 'M'}}
                                    @elseif ($book->book_view > 1000000)
                                    {{number_format($book->book_view / 1000000, 3, '.', '') . 'K'}}
                                    @elseif ($book->book_view > 1000)
                                    {{number_format($book->book_view / 1000, 0, '.', '') . 'K'}}
                                    @else
                                    {{number_format($book->book_view, 0, '.', '')}}
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="card-body content border-0">
                        <div class="top-title text-start mb-2">
                            <a href="{{ route('home.detail_book',[$book->book_slug]) }}" class="book_title" style="color: darkcyan;">{{$book->book_name}}</a>
                        </div>
                        @if($book->chapter->count()<=2) @for($i=1;$i<=(3-$book->chapter->count());$i++)
                            <div class="chapter d-block d-md-flex justify-content-between align-items-center mb-1 opacity-0">
                                <div class=""><a class="fw-bold">Chương 1</a></div>
                                <div class=""><small class="opacity-50 chapter-time"><i class="fa-regular fa-clock"></i> 12 giờ trước</small></div>
                            </div>
                            @endfor
                            @endif
                            @foreach($book->chapter->take(3) as $value => $chapter)
                            <div class="chapter d-block d-md-flex justify-content-between align-items-center mb-1">
                                <div class=""><a href="{{ route('home.detail_chapter',[$book->book_slug,$chapter->chapter_slug]) }}" class="fw-bold">Chương {{$chapter->chapter_number}}</a></div>
                                <div class="">
                                    <small class="opacity-50 chapter-time">
                                        <i class="fa-regular fa-clock me-1"></i>
                                        @if (Carbon\Carbon::parse($chapter->created_at)->diffInYears(Carbon\Carbon::now()) >= 1)
                                        {{ $chapter->created_at->format('d-m-Y') }}
                                        @else
                                        {{ $chapter->created_at->diffForHumans() }}
                                        @endif

                                    </small>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
            {{--@endif--}}
            @endforeach
        </div>
    </div>
</div>