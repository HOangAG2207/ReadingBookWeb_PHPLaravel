@extends('layouts.app')
@section('slide_carousel')
@include('frontend.includes.navbar')
@endsection
@section('title','Book Online')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-9">
            <!-- breadscrumbs -->
            <div class="card border-0" style="background: #c0ebe2;">
                <div class="card-header pb-0 pt-2 border-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}" class="text-decoration-none">Trang chủ</a></li>
                            <!-- <li class="breadcrumb-item text-darkcyan fw-bold"><a>Trang chủ</a></li> -->
                            <li class="breadcrumb-item fw-bold"><a href="" class="text-decoration-none">{{$book->book_name}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- tieu de -->
            <div class="mt-1 border-0 text-center">
                <div class="pb-0 pt-2 border-0 bg-white">
                    <h5 style="color:darkcyan;">{{$book->book_name}}</h5>
                    <i class="text-secondary small">(Cập nhật lúc: {{$book->created_at->format('H:i d/m/Y')}})</i>
                </div>
            </div>
            <!-- truyện -->
            <div class="row mt-3">
                <div class="col-md-4 text-center">
                    <img id="" src="{{ $book->book_image==null ? 
                                        asset('assets/images/no_image.jpg') 
                                        : asset('storage/uploads/Sach/'.$book->book_image) }}" class="gallery-item rounded card-img-bottom object-fit-cover border border-2" style="height: 240px; width:180px;" />
                </div>
                <div class="col-md-8 text-center text-md-start my-auto">
                    <!-- Tổng chương -->
                    <div class="d-flex justify-content-start align-items-center mb-2">
                        <medium class="text-secondary fw-bolder me-3"><i class="fa-solid fa-hashtag me-2"></i>Số chương:</medium>
                        <medium class="text-secondary">{{$book->chapter->count()}}</medium>
                    </div>
                    <!-- Thể loại -->
                    <div class="d-block justify-content-start align-items-center mb-2">
                        <medium class="text-secondary fw-bold me-3"><i class="fa-solid fa-tags me-2"></i>Thể loại:</medium>
                        <medium class="text-secondary">
                            @if($book->genre->isNotEmpty())
                            @foreach($book->genre as $genre)
                            @if($genre->genre_status==1)
                            <a href="{{route('home.genre',[$genre->genre_slug])}}" class="text-decoration-none fw-bold">{{$genre->genre_name}}</a>
                            {{!$loop->last ? '-':''}}
                            @endif
                            @endforeach
                            @else
                            <a class="text-decoration-none">Đang cập nhật...</a>
                            @endif
                        </medium>
                    </div>
                    <!-- lượt xem -->
                    <div class="d-flex justify-content-start align-items-center mb-2">
                        <medium class="text-secondary fw-bold me-3"><i class="fa-solid fa-eye me-2"></i>Lượt xem:</medium>
                        <medium class="text-secondary">
                            {{number_format(10000000, 0, ',', '.')}}
                        </medium>
                    </div>
                    <!-- lượt thích -->
                    <div class="d-flex justify-content-start align-items-center mb-2">
                        <medium class="text-secondary fw-bold me-3"><i class="fa-solid fa-face-grin-hearts me-2"></i>Lượt yêu thích:</medium>
                        <medium class="text-secondary">
                            1.040.203
                        </medium>
                    </div>
                    <!-- đọc truyện -->
                    <div class="d-flex justify-content-start align-items-center my-3">
                        <a href="" class="btn btn-sm mx-3 fw-bold btn-secondary"><i class="fa-regular fa-heart me-2"></i>Yêu thích</a>
                    </div>
                    <hr>
                    <!-- đọc truyện -->
                    @if($chapter->count()!=0)
                    <div class="d-flex justify-content-start align-items-center mb-2">
                        <a href="{{ route('home.detail_chapter',[$book->book_slug,$first_chapter->chapter_slug]) }}" class="btn btn-sm mx-3 fw-bold text-white" style="background: darkcyan;">Đọc từ đầu</a>
                        <a href="{{ route('home.detail_chapter',[$book->book_slug,$last_chapter->chapter_slug]) }}" class="btn btn-sm mx-3 fw-bold text-white" style="background: darkcyan;">Đọc mới nhất</a>
                    </div>
                    @else
                    <div class="d-flex justify-content-start align-items-center mb-2">
                        <a class="fw-bold text-decoration-none">Sách đang cập nhật...</a>
                    </div>
                    @endif
                </div>
            </div>
            <!-- content -->
            <div class="mt-5">
                <h5 class="ms-3 fw-bold title">Tóm tắt truyện</h5>
                <hr class="my-0 fw-bold" style="border-width:3px;background:darkcyan;">
                <div class="mt-3 mx-3">
                    {!! $book->book_description !=null ? $book->book_description : 'Đang cập nhật...'!!}
                </div>
            </div>
            <!-- chapter list -->
            <div class="mt-5">
                <h5 class="ms-3 fw-bold title"><i class="fa-solid fa-list-ol me-2"></i>Danh sách chương</h5>
                <hr class="my-0 fw-bold" style="border-width:3px;">
                <div class="mt-3 mx-3">
                    <table class="table">
                        <thead>
                            <tr class="fw-bold" style="color: darkcyan;">
                                <th scope="col">CHƯƠNG SỐ</th>
                                <th scope="col" class="text-end">LƯỢT ĐỌC</th>
                                <th scope="col" class="text-end">CẬP NHẬT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($chapter as $chapter)
                            <tr>
                                <th scope="row">
                                    <a href="{{ route('home.detail_chapter',[$book->book_slug,$chapter->chapter_slug]) }}" class="text-decoration-none">
                                        Chương {{$chapter->chapter_number}}{{$chapter->chapter_name!=''?':':''}}
                                        {{$chapter->chapter_name}}
                                    </a>
                                </th>
                                <td class="text-end"><small class="opacity-75 chapter-time"><i class="fa-solid fa-eye me-1"></i>1200</small></td>
                                <td class="text-end">
                                    <small class="opacity-75 chapter-time">
                                        <i class="fa-regular fa-clock me-1"></i>
                                        @if (Carbon\Carbon::parse($chapter->created_at)->diffInYears(Carbon\Carbon::now()) >= 1)
                                        {{ $chapter->created_at->format('d-m-Y') }}
                                        @else
                                        {{ $chapter->created_at->diffForHumans() }}
                                        @endif
                                    </small>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3"><small class="opacity-75">Đang cập nhật chương...</small></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <hr class="my-0 fw-bold" style="border-width:3px;">
            </div>
        </div>
        <!-- Đọc nhiều nhất -->
        <div class="col-12 col-lg-3 pt-3 pt-lg-0">
            <div class="d-flex align-items-center">
                <h4 class="ms-3 fw-bold title"><i class="fa-solid fa-list" style="font-size: 20px;"></i> Đọc nhiều nhất</h4>
            </div>
            @include('frontend.includes.topRead')

        </div>
        <!-- Đọc nhiều nhất -->
    </div>
</div>
@endsection