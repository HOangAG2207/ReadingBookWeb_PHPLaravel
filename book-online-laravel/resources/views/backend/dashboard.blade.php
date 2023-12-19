@extends('backend.layouts.admin')

@section('title','Quản lý Sách')

@section('admin_content')
<div class="bg-light">
    <div class="text-center py-2">
        <!-- heading -->
        <h3 class="text-darkcyan fw-bold">THỐNG KÊ</h3>
    </div>
    <div class="bg-body py-1 mb-2 mx-2 rounded shadow">
        <!-- container -->
        <div class="container my-2">
            <h5 class="mb-3">Số lượng:</h5>
            <div class="row gy-4">

                <!-- user count -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <!-- card -->
                    <div class="card border-top border-secondary border-5 card-hover-with-icon">
                        <!-- card body -->
                        <div class="card-body border-top border-secondary border-5">
                            <!-- icon  -->
                            <div class="d-flex align-items-center justify-content-between text-muted mx-3 mb-2 pb-0 border-bottom border-2">
                                <div class="card-icon">
                                    <h6 class="text-muted"><i class="fa-solid fa-users me-2"></i>NGƯỜI DÙNG</h6>
                                </div>
                                <!-- heading -->
                                <div class="card-title">
                                    <!-- arrow -->
                                    <a href="" class=" text-decoration-none text-primary" data-toggle="tooltip" data-placement="bottom" title="Xem danh sách">
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div>
                                    <!-- text -->
                                    <h2 class="mb-2 text-center rounded px-2 py-1 text-secondary mark">{{number_format($chapter_count, 0, ',', '.')}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- genre count -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <!-- card -->
                    <div class="card border-top border-primary border-5 card-hover-with-icon">
                        <!-- card body -->
                        <div class="card-body border-top border-primary border-5">
                            <!-- icon  -->
                            <div class="d-flex align-items-center justify-content-between text-muted mx-3 mb-2 pb-0 border-bottom border-2">
                                <div class="card-icon">
                                    <h6 class="text-muted"><i class="fa-solid fa-tags me-2"></i>THỂ LOẠI</h6>
                                </div>
                                <!-- heading -->
                                <div class="card-title">
                                    <!-- arrow -->
                                    <a href="{{route('genre.index')}}" class=" text-decoration-none text-primary" data-toggle="tooltip" data-placement="bottom" title="Xem danh sách">
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div>
                                    <!-- text -->
                                    <h2 class="mb-2 text-center rounded px-2 py-1 text-primary mark">{{number_format($genre_count, 0, ',', '.')}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- book count -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <!-- card -->
                    <div class="card border-top border-success border-5 card-hover-with-icon">
                        <!-- card body -->
                        <div class="card-body border-top border-success border-5">
                            <!-- icon  -->
                            <div class="d-flex align-items-center justify-content-between text-muted mx-3 mb-2 pb-0 border-bottom border-2">
                                <div class="card-icon">
                                    <h6 class="text-muted"><i class="fa-solid fa-book me-2"></i>SÁCH</h6>
                                </div>
                                <!-- heading -->
                                <div class="card-title">
                                    <!-- arrow -->
                                    <a href="{{route('book.index')}}" class=" text-decoration-none text-primary" data-toggle="tooltip" data-placement="bottom" title="Xem danh sách">
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div>
                                    <!-- text -->
                                    <h2 class="mb-2 text-center rounded px-2 py-1 text-success mark">{{number_format($book_count, 0, ',', '.')}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- chapter count -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <!-- card -->
                    <div class="card border-top border-info border-5 card-hover-with-icon">
                        <!-- card body -->
                        <div class="card-body border-top border-info border-5">
                            <!-- icon  -->
                            <div class="d-flex align-items-center justify-content-between text-muted mx-3 mb-2 pb-0 border-bottom border-2">
                                <div class="card-icon">
                                    <h6 class="text-muted"><i class="fa-solid fa-book-open me-2"></i>CHƯƠNG SÁCH</h6>
                                </div>
                                <!-- heading -->
                                <div class="card-title">
                                    <!-- arrow -->
                                    <a href="{{route('chapter.index')}}" class=" text-decoration-none text-primary" data-toggle="tooltip" data-placement="bottom" title="Xem danh sách">
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div>
                                    <!-- text -->
                                    <h2 class="mb-2 text-center rounded px-2 py-1 text-info mark">{{number_format($chapter_count, 0, ',', '.')}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="piechart"></div>
        </div>
    </div>
</div>

<script>
    new Chart(document.getElementById("piechart"), {
        type: "pie",
        data: {
            labels: ["Social", "Search Engines", "Direct", "Other"],
            datasets: [{
                data: [260, 125, 54, 146],
                backgroundColor: [
                    window.theme.primary,
                    window.theme.success,
                    window.theme.warning,
                    "#dee2e6"
                ],
                borderColor: "transparent"
            }]
        },
        options: {
            maintainAspectRatio: false,
            cutoutPercentage: 65,
        }
    });
</script>
@endsection