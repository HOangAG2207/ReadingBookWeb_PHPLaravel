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
                            <li class="breadcrumb-item fw-bold"><a href="" class="text-decoration-none">sách 1</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- tieu de -->
            <div class="mt-1 border-0 text-center">
                <div class="pb-0 pt-2 border-0 bg-white">
                    <h5 style="color:darkcyan;">SÁCH NÀY LÀ SÁCH 1</h5>
                    <i class="text-secondary small">(Cập nhật lúc: 03:03 20/23/2022)</i>
                </div>
            </div>
            <!-- truyện -->
            <div class="row mt-3">
                <div class="col-md-4 text-center">
                    <img id="" src="{{ asset('assets/images/no_image.jpg') }}" class="gallery-item rounded card-img-bottom object-fit-cover border border-2" style="height: 240px; width:180px;" />
                </div>
                <div class="col-md-8 text-center text-md-start my-auto">
                    <!-- Tổng chương -->
                    <div class="d-flex justify-content-start align-items-center mb-2">
                        <medium class="text-secondary fw-bolder me-5"><i class="fa-solid fa-hashtag me-2"></i>Số chương:</medium>
                        <medium class="text-secondary">30</medium>
                    </div>
                    <!-- Thể loại -->
                    <div class="d-flex justify-content-start align-items-center mb-2">
                        <medium class="text-secondary fw-bold me-5"><i class="fa-solid fa-tags me-2"></i>Thể loại:</medium>
                        <medium class="text-secondary">
                            <a href="" class="text-decoration-none">Văn học</a> -
                            <a href="" class="text-decoration-none">Học đường</a> -
                            <a href="" class="text-decoration-none">Đời sống</a>
                        </medium>
                    </div>
                    <!-- lượt xem -->
                    <div class="d-flex justify-content-start align-items-center mb-2">
                        <medium class="text-secondary fw-bold me-5"><i class="fa-solid fa-eye me-2"></i>Lượt xem:</medium>
                        <medium class="text-secondary">
                            1.040.203
                        </medium>
                    </div>
                    <!-- lượt thích -->
                    <div class="d-flex justify-content-start align-items-center mb-2">
                        <medium class="text-secondary fw-bold me-5"><i class="fa-solid fa-face-grin-hearts me-2"></i>Lượt yêu thích:</medium>
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
                    <div class="d-flex justify-content-start align-items-center mb-2">
                        <a href="" class="btn btn-sm mx-3 fw-bold text-white" style="background: darkcyan;">Đọc từ đầu</a>
                        <a href="" class="btn btn-sm mx-3 fw-bold text-white" style="background: darkcyan;">Đọc mới nhất</a>
                    </div>
                </div>
            </div>
            <!-- content -->
            <div class="mt-5">
                <h5 class="ms-3 fw-bold title">Tóm tắt truyện</h5>
                <hr class="my-0 fw-bold" style="border-width:3px;background:darkcyan;">
                <div class="mt-3 mx-3">
                    Võ đạo đỉnh phong, là cô độc, là tịch mịch, là dài đằng đẵng cầu tác, là cao xử bất thắng hàn
                    Phát triển trong nghịch cảnh, cầu sinh nơi tuyệt địa, bất khuất không buông tha, mới có thể có thể phá võ chi cực đạo.
                    Lăng Tiêu các thí luyện đệ tử kiêm quét rác gã sai vặt Dương Khai ngẫu lấy được một bản vô tự hắc thư, từ nay về sau đạp vào dài đằng đẵng võ đạo.
                </div>
            </div>
            <!-- chapter list -->
            <div class="mt-5">
                <h5 class="ms-3 fw-bold title"><i class="fa-solid fa-list-ol me-2"></i>Danh sách chương</h5>
                <hr class="my-0 fw-bold" style="border-width:3px;background:darkcyan;">
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
                            <tr>
                                <th scope="row"><a href="" class="text-decoration-none">Chương 1: ngày xửa ngày xưa</a></th>
                                <td class="text-end"><small class="opacity-75 chapter-time"><i class="fa-solid fa-eye me-1"></i>1200</small></td>
                                <td class="text-end"><small class="opacity-75 chapter-time"><i class="fa-regular fa-clock me-1"></i>12 giờ trước</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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