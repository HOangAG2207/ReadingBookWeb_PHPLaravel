@extends('backend.layouts.admin')

@section('title','Quản lý Sách')

@section('admin_content')
<div class="container-fluid">
    <div class="card mx-2 my-2">
        <div class="card-header py-0 pt-1 align-middle">
            <div class="float-start">
                <h3 class="text-darkcyan fw-bold">CHƯƠNG SÁCH</h3>
            </div>
            <div class="float-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-darkcyan fw-bold"><a>Chương sách</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('chapter.index') }}">Xem danh sách</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card mx-2 border-0">
        <div class="card-header bg-white border-bottom border-4">
            <a href="{{ route('chapter.create') }}" class="btn btn-primary btn-sm fw-bold float-end"><i class="fa-solid fa-circle-plus me-2"></i>Thêm mới</a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <thead>
                    <tr class="text-center align-middle text-uppercase table-warning">
                        <th width="50px">#</th>
                        <th width="200px">Tên chương</th>
                        <th width="200px">Thuộc sách</th>
                        <!-- <th width="400px" class=" d-none d-lg-table-cell d-md-table-cell">Nội dung</th> -->
                        <th width="100px">Trạng<br>thái</th>
                        <th width="50px">Ngày<br>tạo</th>
                        <th width="50px">Ngày<br>cập nhật</th>
                        <th width="50px">Sửa</th>
                        <th width="50px">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data_chapter as $value => $chapter)
                    <tr class="align-middle" id="chapter-item{{$chapter->id}}">
                        <td class="text-center">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-3 text-start">
                            <a class="card-title text-decoration-none text-primary fw-bold"><span class="font-monospace text-dark"> Chương {{ $chapter->chapter_number }}</span><br>{{ $chapter->chapter_name }}</a>
                            <p class="card-text text-secondary d-none d-lg-block">#{{ $chapter->chapter_slug }}</p>
                        </td>
                        <td class="text-center">
                            @if($chapter->book)
                            <h5 class="badge bg-secondary rounded-pill">{{ $chapter->book->book_name }}</h5>
                            @endif
                        </td>
                        <!-- <td class="px-3 d-none d-lg-table-cell d-md-table-cell">
                            <div style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;">
                                <p id="chapter_content">
                                    {!! $chapter->chapter_content !!}
                                </p>
                            </div>
                        </td> -->
                        <td class="text-center">
                            <a href="{{ route('chapter.changeStatus',[$chapter->id]) }}" class="btn btn-sm fw-bold btn-{{$chapter->chapter_status==1?'success':'danger'}}" style="width:80px;height:30px;">
                                @if($chapter->chapter_status==1)
                                <i class="fa-solid fa-circle-check me-1"></i>
                                @else
                                <i class="fa-solid fa-circle-xmark me-1"></i>
                                @endif
                                {{$chapter->chapter_status==1?'HIỆN':'ẨN'}}
                            </a>
                        </td>
                        <td class="text-center">
                            @if($chapter->created_at!=null)
                            <small>{{ $chapter->created_at->format('H:i:s d/m/Y') }}</small><br><small class="text-info fw-bold">({{ $chapter->created_at->diffForHumans() }})</small>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($chapter->updated_at!=null)
                            <small>{{ $chapter->updated_at->format('H:i:s d/m/Y') }}</small><br><small class="text-info fw-bold">({{ $chapter->updated_at->diffForHumans() }})</small>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('chapter.edit',['chapter'=> $chapter->id]) }}" class="btn btn-edit rounded-circle"><i class="fa-solid fa-pen-to-square text-primary"></i></a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('chapter.destroy',['chapter'=> $chapter->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Bạn có chắc muốn xóa Chương {{ $chapter->chapter_number }}: {{ $chapter->chapter_name }} không?')" class="btn btn-delete rounded-circle"><i class="fa-solid fa-trash-can text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr class="align-middle">
                        <td class="text-center" colspan="8">
                            Không có dữ liệu
                        </td>
                    </tr>
                    @endforelse
                    <tr>
                        <td colspan="8" class="pt-3">
                            {!!$data_chapter->appends($_GET)->links('backend.layouts.pagination.admin-pagination')!!}
                        </td>
                    </tr>
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