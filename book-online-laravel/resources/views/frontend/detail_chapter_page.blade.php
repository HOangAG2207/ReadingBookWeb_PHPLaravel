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
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}" class="text-decoration-none">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="" class="text-decoration-none">sách 1</a></li>
                    <li class="breadcrumb-item fw-bold"><a href="" class="text-decoration-none">Chương 1: ngày đẹp sao</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- tieu de -->
    <div class="mt-1 border-0 text-center">
        <div class="pb-0 pt-2 border-0 bg-white">
            <h5 style="color:darkcyan;" class="text-start ms-3">SÁCH NÀY LÀ SÁCH 1</h5>
            <h5 class="text-secondary">Chương 1: ngày đẹp sao</h5>
            <i class="text-secondary small">(Cập nhật lúc: 03:03 20/23/2022)</i>
        </div>
    </div>

</div>
@endsection