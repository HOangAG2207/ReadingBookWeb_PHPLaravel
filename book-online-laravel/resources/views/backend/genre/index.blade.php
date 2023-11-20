@extends('backend.layouts.admin')

@section('title','Quản lý Sách')

@section('admin_content')
<div class="container-fluid">
    <div class="card mx-2 my-2">
        <div class="card-header py-0 pt-1 align-middle">
            <div class="float-start">
                <h3 class="text-darkcyan fw-bold">THỂ LOẠI</h3>
            </div>
            <div class="float-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-darkcyan fw-bold"><a>Thể loại</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('genre.index') }}">Xem danh sách</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card mx-2 border-0">
        <!-- add button -->
        <div class="card-header bg-white border-bottom border-4">
            <a href="{{ route('genre.create') }}" class="btn btn-primary btn-sm fw-bold float-end"><i class="fa-solid fa-circle-plus me-2"></i>Thêm mới</a>
        </div>
        <form id="search-form" action="" method="GET">
            <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-2 mt-3 px-3">
                <!-- status filter -->
                <div class="form-group">
                    <div class="input-group">
                        <label class="input-group-text fw-bold" for="status" style="border: solid 2px darkcyan; background:lightgrey;color:darkcyan">Trạng thái</label>
                        <select class="form-select text-center" name="status" id="status-filter" style="border: solid 2px darkcyan;">
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
                    <span class="input-group-text border-0" style="background: white;"><i class="fas fa-search" style="color:darkcyan;"></i></span>
                    <input name="searchBox" id="searchBox" value="{{ request()->input('searchBox') }}" type="text" class="form-control border-0" placeholder="Tìm kiếm&hellip;" />
                </div>
            </div>
            <hr>
            <div class="float-end px-3">
                <button type="submit" class="btn btn-sm btn-primary fw-bold shadow" style="border: solid 2px darkcyan; background:darkcyan;">Tìm kiếm - lọc danh sách</button>
            </div>
        </form>
        <div class="table-responsive" id="div-table">
            <div class="mx-3">
                <h5>Số lượng: <span class="badge rounded-pill text-bg-secondary">{{ $data_genre->total() }} trên {{ $all->count() }}</span></h5>
            </div>
            <table class="table table-bordered table-hover table-sm" id="table">
                <thead>
                    <tr class="text-center align-middle text-uppercase table-warning">
                        <th width="5%">#</th>
                        <th width="25%">Tên loại</th>
                        <th width="40%" class=" d-none d-lg-table-cell d-md-table-cell">Mô tả</th>
                        <th width="10%">Trạng<br>thái</th>
                        <th width="10%">Ngày<br>tạo</th>
                        <th width="10%">Ngày<br>cập nhật</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @include('backend.genre.table-data.table')
                </tbody>
            </table>
            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
        </div>
    </div>
</div>
<!-- style -->
<style>
    .btn-delete:hover {
        border: 2px solid #dc3545;
        /* background-color: #dc3545; */
    }

    .btn-edit:hover {
        border: 2px solid #0d6efd;
        /* background-color: #dc3545; */
    }
</style>
@include('backend.genre.script.script')
@endsection