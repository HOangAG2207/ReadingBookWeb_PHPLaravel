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
                        <li class="breadcrumb-item active" aria-current="page"><a>Xem danh sách</a></li>
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
        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-2 mt-2 px-3">
            <!-- search box -->
            <div class="form-group">
                <form class="input-group w-auto my-auto rounded" style="border: solid 2px darkcyan;background: darkcyan;">
                    <span class="input-group-text border-0" style="background: white;"><i class="fas fa-search" style="color:darkcyan;"></i>
                    </span>
                    <input autocomplete="on" id="searchBox" type="text" class="form-control border-0" placeholder="Nhập từ khóa để tìm kiếm..." />
                </form>
            </div>
            <!-- status filter -->
            <div class="form-group mt-3 mt-md-0 mt-lg-0">
                <div class="input-group">
                    <label class="input-group-text text-white fw-bold" for="status" style="border: solid 2px darkcyan; background:darkcyan;">Trạng thái</label>
                    <select class="form-control text-center" name="status" id="status-filter" style="border: solid 2px darkcyan;">
                        <option value="">Tất cả</option>
                        <option value="1">HIỂN THỊ</option>
                        <option value="0">ẨN</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
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
                    @forelse($data_genre as $genre)
                    <tr class="align-middle" id="genre-item{{$genre->id}}">
                        <td class="text-center">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-3 text-center">
                            <a class="card-title text-decoration-none text-primary fw-bold">{{ $genre->genre_name }}</a>
                            <p class="card-text text-secondary d-none d-lg-block">#{{ $genre->genre_slug }}</p>
                        </td>
                        <td class="px-3 d-none d-lg-table-cell d-md-table-cell">
                            <div>
                                <p id="genre_description" style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;">
                                    {{ $genre->genre_description }}
                                </p>
                            </div>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-sm fw-bold btn-{{$genre->genre_status==1?'success':'danger'}} change-status" style="width:80px;height:30px;" data-id="{{$genre->id}}" data-name="{{$genre->genre_name}}">
                                @if($genre->genre_status==1)
                                <i class="fa-solid fa-circle-check me-1"></i>
                                @else
                                <i class="fa-solid fa-circle-xmark me-1"></i>
                                @endif
                                {{$genre->genre_status==1?'HIỆN':'ẨN'}}
                            </a>
                        </td>
                        <td class="text-center">
                            @if($genre->created_at!='')
                            <small>{{ $genre->created_at->format('H:i:s d/m/Y') }}</small><br><small class="text-info fw-bold">({{ $genre->created_at->diffForHumans() }})</small>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($genre->updated_at!='')
                            <small>{{ $genre->updated_at->format('H:i:s d/m/Y') }}</small><br><small class="text-info fw-bold">({{ $genre->updated_at->diffForHumans() }})</small>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('genre.edit',['genre'=> $genre->id]) }}" class="btn btn-edit rounded-circle"><i class="fa-solid fa-pen-to-square text-primary"></i></a>
                        </td>
                        <td class="text-center">
                            <a class="btn rounded-circle btn-delete" data-id="{{$genre->id}}" data-name="{{$genre->genre_name}}">
                                <i class="fa-solid fa-trash-can text-danger"></i>
                            </a>
                            <!-- <form action="{{ route('genre.destroy',['genre'=> $genre->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button onclick="return confirm('Bạn có chắc muốn xóa Thể loại {{ $genre->genre_name }} không?')" class="btn btn-delete rounded-circle"><i class="fa-solid fa-trash-can text-danger"></i></button>
                            </form> -->
                        </td>
                    </tr>
                    @empty
                    <tr class="align-middle">
                        <td class="text-center" colspan="8">
                            Không có dữ liệu
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {!!$data_genre->onEachSide(1)->links('backend.layouts.partial.admin-pagination')!!}
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