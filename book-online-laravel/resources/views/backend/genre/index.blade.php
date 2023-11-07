@extends('backend.layouts.admin')

@section('title','Quản lý Sách')

@section('admin_content')
<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mx-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item h2">
                <p id="text-color" class="text-decoration-none badge rounded-pill bg-light border border-3">THỂ LOẠI</p>
            </li>
            <li class="breadcrumb-item h2 active" aria-current="page">Danh sách</li>
        </ol>
    </nav>
    <div class="card mx-2">
        <div class="card-header">
            <a href="{{ route('genre.create') }}" class="btn btn-primary btn-sm fw-bold float-end"><i class="fa-solid fa-circle-plus me-2"></i>Thêm mới</a>
        </div>
        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-2 mt-3 px-3">
            <div class="form-group">
                <form class="input-group w-auto my-auto rounded" style="border: solid 2px darkcyan;background: darkcyan;">
                    <span class="input-group-text border-0" style="background: white;"><i class="fas fa-search" style="color:darkcyan;"></i>
                    </span>
                    <input autocomplete="on" id="searchBox" type="search" class="form-control border-0" placeholder="Nhập từ khóa để tìm kiếm..." />
                </form>
            </div>
            <div class="form-group mt-3 mt-md-0 mt-lg-0">
                <div class="input-group">
                    <label class="input-group-text text-white fw-bold" for="genre_status" style="border: solid 2px darkcyan; background:darkcyan;">Trạng thái</label>
                    <select class="form-control text-center" name="genre_status" id="genre_status" style="border: solid 2px darkcyan;">
                        <option value="1">HIỂN THỊ</option>
                        <option value="0">ẨN</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive table-content">
            <table class="table table-bordered table-hover table-sm">
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
                    @forelse($data_genre as $value => $genre)
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
                            <a href="{{ route('genre.changeStatus',[$genre->id]) }}" class="btn btn-sm fw-bold btn-{{$genre->genre_status==1?'success':'danger'}}" style="width:80px;height:30px;">
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
                            <form action="{{ route('genre.destroy',['genre'=> $genre->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Bạn có chắc muốn xóa Thể loại {{ $genre->genre_name }} không?')" class="btn btn-delete rounded-circle"><i class="fa-solid fa-trash-can text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center" style="color: darkcyan;">
                            <h5>Danh sách rỗng</h5>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
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

<!-- scripts -->
<script type="text/javascript">
    // Start page
    $(document).ready(function(e) {
        // e.preventDefault();
        // set up csrf-token ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });
</script>
@endsection