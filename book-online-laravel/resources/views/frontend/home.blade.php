@extends('layouts.app')
@section('slide_carousel')
    @include('frontend.includes.navbar')
@endsection
@section('title','Book Online')
@section('content')
<div class="container">
    <div class="slider-area">
        <h4 class="ms-3 fw-bold title"><i class="fa-solid fa-list" style="font-size: 20px;"></i> Đề cử</h4>
        @include('frontend.includes.owl-carousel')
    </div>
    
    <div class="row justify-content-center mt-4">
        <div class="col-12 col-lg-9">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="ms-3 fw-bold title"><i class="fa-solid fa-list" style="font-size: 20px;"></i> Mới cập nhật</h4>
                <!-- <a href="" class="ms-3 fw-bold title me-5 text-decoration-none">Xem tất cả <i class="fa-solid fa-chevron-right" style="font-size: 14px;"></i></a> -->
            </div>
            @include('frontend.includes.newUpdateBook')
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