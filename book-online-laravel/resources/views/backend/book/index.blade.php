@extends('backend.layouts.admin')

@section('title','Quản lý Sách')

@section('admin_content')
<div class="container-fluid">
    <div class="card mx-2 my-2">
        <div class="card-header py-0 pt-1 align-middle">
            <div class="float-start">
                <h3 class="text-darkcyan fw-bold">SÁCH</h3>
            </div>
            <div class="float-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-darkcyan fw-bold"><a>Sách</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('book.index') }}">Xem danh sách</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card mx-2 border-0">
        <div class="card-header bg-white border-bottom border-4">
            <a href="{{ route('book.create') }}" class="btn btn-primary btn-sm fw-bold float-end"><i class="fa-solid fa-circle-plus me-2"></i>Thêm mới</a>
        </div>
        <form id="search-form" action="" method="GET">
            <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-2 mt-3 px-3">
                <!-- status filter -->
                <div class="form-group">
                    <div class="input-group">
                        <label class="input-group-text fw-bold" for="status" style="border: solid 2px darkcyan; background:lightgrey;color:darkcyan">Trạng thái</label>
                        <select class="form-control text-center" name="status" id="status-filter" style="border: solid 2px darkcyan;">
                            <option value="">Tất cả</option>
                            <option value="1" {{Request::get('status')=='1'?'selected':''}}>HIỂN THỊ</option>
                            <option value="0" {{Request::get('status')=='0'?'selected':''}}>ẨN</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- search box -->
            <div class="form-group mt-3 px-3">
                <div class="input-group w-auto my-auto rounded" style="border: solid 2px darkcyan;background: darkcyan;">
                    <span class="input-group-text border-0" style="background: white;"><i class="fas fa-search" style="color:darkcyan;"></i>
                    </span>
                    <input name="searchBox" id="searchBox" value="{{ request()->input('searchBox') }}" type="text" class="form-control border-0" placeholder="Nhập từ khóa để tìm kiếm..." />
                    <button type="submit" class="btn btn-sm btn-primary fw-bold" style="border: solid 2px darkcyan; background:darkcyan;">Tìm kiếm - lọc danh sách</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="table-responsive" id="div-table">
            <div class="mx-3">
                <h5>Số lượng: <span class="badge rounded-pill text-bg-secondary">{{ $data_book->total() }} trên {{ $all->count() }}</span></h5>
            </div>
            <table class="table table-bordered table-hover table-sm">
                <thead>
                    <tr class="text-center align-middle text-uppercase table-warning">
                        <th width="5%"></th>
                        <th width="5%">#</th>
                        <th width="20%">Tên sách</th>
                        <th width="20%">Thể loại</th>
                        <th width="5%">Trạng<br>thái</th>
                        <th width="10%">Ngày<br>tạo</th>
                        <th width="10%">Ngày<br>cập nhật</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @include('backend.book.table-data.table')
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('backend.book.modal.modal-img')
<!-- style -->
<style>
    /* button delete */
    .btn-delete:hover {
        border: 2px solid #dc3545;
        /* background-color: #dc3545; */
    }

    /* button edit */
    .btn-edit:hover {
        border: 2px solid #0d6efd;
        /* background-color: #dc3545; */
    }
</style>

@include('backend.book.script.script')
<script src="{{asset('assets/js/backend/zoom_image_model.js')}}"></script>
@endsection