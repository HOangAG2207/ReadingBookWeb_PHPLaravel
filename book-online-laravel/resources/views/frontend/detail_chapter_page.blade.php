@extends('layouts.app')
@section('slide_carousel')
@include('frontend.includes.navbar')
@endsection
@section('title','Book Online')
@section('content')
<div class="container">
    <!-- breadscrumbs -->
    <div class="card border-0" style="background: #c0ebe2;">
        <div class="card-header pb-0 pt-2 border-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home.detail_book',[$book->book_slug]) }}" class="text-decoration-none">{{$book->book_name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <span class="ms-2 text-dark fw-normal">
                            Chương {{$current_chapter->chapter_number}}{{$current_chapter->chapter_name!=''?':':''}}
                            {{$current_chapter->chapter_name}}
                        </span>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- tieu de -->
    <div class="mt-1 border-0 text-center">
        <div class="pb-0 pt-2 border-0 bg-white">
            <h5 style="color:darkcyan;" class="text-start ms-3">{{$book->book_name}}</h5>
            <h5 class="text-secondary">
                Chương {{$current_chapter->chapter_number}}{{$current_chapter->chapter_name!=''?':':''}}
                {{$current_chapter->chapter_name}}
            </h5>
            <i class="text-secondary small">(Cập nhật lúc: {{$current_chapter->created_at->format('H:i d/m/Y')}})</i>
        </div>
    </div>
    <!-- hướng dẫn chuyển chapter -->
    <div class="py-2 border-0 text-center mt-3" style="background: #C3E4F3;">
        <p class="my-auto text-danger">
            <i class="fa-solid fa-circle-info me-2"></i>
            Sử dụng mũi tên trái (<i class="fa-solid fa-chevron-left"></i>) hoặc phải (<i class="fa-solid fa-chevron-right"></i>) để chuyển chapter
        </p>
        <p class="my-auto text-danger">
            <i class="fa-solid fa-circle-info me-2"></i>
            Sử dụng mũi tên trái (<i class="fa-solid fa-angles-left"></i>) chương đầu hoặc phải (<i class="fa-solid fa-angles-right"></i>) chương cuối
        </p>
    </div>
    <!-- button previous - dropdown chapter top - button next -->
    <div class="mt-3 border-0 mx-5">
        <div class="form-group mx-auto d-flex justify-content-center">
            <!-- first_ chapter -->
            @if($current_chapter->id != $first_chapter->id)
            <a href="{{ route('home.detail_chapter',[$book->book_slug,$first_chapter->chapter_slug]) }}" class="btn btn-warning text-white btn-md mx-1 fw-bold"><i class="fa-solid fa-angles-left"></i></a>
            @else
            <a class="btn btn-warning text-white btn-md mx-1 fw-bold opacity-25 disabled"><i class="fa-solid fa-angles-left"></i></a>
            @endif
            <!-- previous_ chapter -->
            @if($current_chapter->id != $first_chapter->id)
            <a href="{{ route('home.detail_chapter',[$book->book_slug,$previous_chapter]) }}" class="btn btn-primary btn-md mx-1"><i class="fa-solid fa-chevron-left"></i></a>
            @else
            <a class="btn btn-primary btn-md mx-1 opacity-25 disabled"><i class="fa-solid fa-chevron-left"></i></a>
            @endif
            <select id="" name="select_chapter" class="form-select text-start mx-2 select-chapter" style="border:2px solid darkcyan;">
                @foreach($chapter_list as $list)
                <option value="{{ route('home.detail_chapter',[$book->book_slug,$list->chapter_slug]) }}">
                    Chương {{$list->chapter_number}}{{$list->chapter_name!=''?':':''}}
                    {{$list->chapter_name}}
                </option>
                @endforeach
            </select>
            <!-- next_ chapter -->
            @if($current_chapter->id != $last_chapter->id)
            <a href="{{ route('home.detail_chapter',[$book->book_slug,$next_chapter]) }}" class="btn btn-primary btn-md mx-1"><i class="fa-solid fa-chevron-right"></i></a>
            @else
            <a class="btn btn-primary btn-md mx-1 opacity-25 disabled"><i class="fa-solid fa-chevron-right"></i></a>
            @endif
            <!-- last_ chapter -->
            @if($current_chapter->id != $last_chapter->id)
            <a href="{{ route('home.detail_chapter',[$book->book_slug,$last_chapter->chapter_slug]) }}" class="btn btn-warning text-white btn-md mx-1 fw-bold"><i class="fa-solid fa-angles-right"></i></a>
            @else
            <a class="btn btn-warning text-white btn-md mx-1 fw-bold opacity-25 disabled"><i class="fa-solid fa-angles-right"></i></a>
            @endif
        </div>
    </div>
    <hr class="my-3 mx-3 fw-bold" style="border-width:3px;background:darkcyan;">
    <!-- content -->
    <div class="mt-3 mx-5">
        <div class="mt-3 mx-3">
            {!! $current_chapter->chapter_content !=null ? $current_chapter->chapter_content : 'Đang cập nhật...'!!}
        </div>
    </div>
    <hr class="my-3 mx-3 fw-bold" style="border-width:3px;background:darkcyan;">
    <!-- button previous - dropdown chapter bottom - button next -->
    <div class="mt-3 border-0 mx-5">
        <div class="form-group mx-auto d-flex justify-content-center">
            <!-- first_ chapter -->
            @if($current_chapter->id != $first_chapter->id)
            <a href="{{ route('home.detail_chapter',[$book->book_slug,$first_chapter->chapter_slug]) }}" class="btn btn-warning text-white btn-md mx-1 fw-bold"><i class="fa-solid fa-angles-left"></i></a>
            @else
            <a class="btn btn-warning text-white btn-md mx-1 fw-bold opacity-25 disabled"><i class="fa-solid fa-angles-left"></i></a>
            @endif
            <!-- previous_ chapter -->
            @if($current_chapter->id != $first_chapter->id)
            <a href="{{ route('home.detail_chapter',[$book->book_slug,$previous_chapter]) }}" class="btn btn-primary btn-md mx-1"><i class="fa-solid fa-chevron-left"></i></a>
            @else
            <a class="btn btn-primary btn-md mx-1 opacity-25 disabled"><i class="fa-solid fa-chevron-left"></i></a>
            @endif
            <select id="" name="select_chapter" class="form-select text-start mx-2 select-chapter" style="border:2px solid darkcyan;">
                @foreach($chapter_list as $list)
                <option value="{{ route('home.detail_chapter',[$book->book_slug,$list->chapter_slug]) }}">
                    Chương {{$list->chapter_number}}{{$list->chapter_name!=''?':':''}}
                    {{$list->chapter_name}}
                </option>
                @endforeach
            </select>
            <!-- next_ chapter -->
            @if($current_chapter->id != $last_chapter->id)
            <a href="{{ route('home.detail_chapter',[$book->book_slug,$next_chapter]) }}" class="btn btn-primary btn-md mx-1"><i class="fa-solid fa-chevron-right"></i></a>
            @else
            <a class="btn btn-primary btn-md mx-1 opacity-25 disabled"><i class="fa-solid fa-chevron-right"></i></a>
            @endif
            <!-- last_ chapter -->
            @if($current_chapter->id != $last_chapter->id)
            <a href="{{ route('home.detail_chapter',[$book->book_slug,$last_chapter->chapter_slug]) }}" class="btn btn-warning text-white btn-md mx-1 fw-bold"><i class="fa-solid fa-angles-right"></i></a>
            @else
            <a class="btn btn-warning text-white btn-md mx-1 fw-bold opacity-25 disabled"><i class="fa-solid fa-angles-right"></i></a>
            @endif
        </div>
    </div>
</div>
<script>
    // Start page
    $(document).ready(function() {
        var url = window.location.href;
        $('.select-chapter').find('option[value="' + url + '"]').attr("selected", true);
    });
    $('.select-chapter').on('change', function() {
        var url = $(this).val();
        if (url) {
            window.location = url;
        }
    });
</script>
@endsection