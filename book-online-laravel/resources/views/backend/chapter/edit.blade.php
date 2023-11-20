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
                        <li class="breadcrumb-item active" aria-current="page"><a>Cập nhật</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card mx-5 border-0">
        <div class="card-header mb-3 border-0 bg-white">
            <a href="{{ route('chapter.index') }}" class="btn btn-primary btn-sm shadow fw-bold float-end"><i class="fa-solid fa-clipboard-list me-2"></i>Xem Danh sách</a>
        </div>
        <div class="card-body border border-2 shadow rounded">
            <form action="{{ route('chapter.update',['chapter'=> $data_chapter->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- Tên Chương --}}
                <div class="row mb-3">
                    {{-- Số chương --}}
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label for="chapter_number" class="form-label fw-bold">Số chương <span class="text-danger fw-bolder">*</span></label>
                        <input type="search" class="form-control @error('chapter_number') is-invalid @enderror" id="chapter_number" name="chapter_number" value="{{ $data_chapter->chapter_number }}" placeholder="Ví dụ: 1, 2, 2A, 2B,...">
                        @error('chapter_number')
                        <div class="invalid-feedback"><strong>{{$message}}</strong></div>
                        @enderror
                    </div>
                    {{-- Tiêu đề chương --}}
                    <div class="form-group col-lg-8 col-md-8 col-sm-12">
                        <label for="chapter_name" class="form-label fw-bold">Tiêu đề chương</label>
                        <input type="search" class="form-control @error('chapter_name') is-invalid @enderror" id="chapter_name" name="chapter_name" value="{{ $data_chapter->chapter_name }}" placeholder="Phải có ít nhất 5 kí tự">
                        @error('chapter_name')
                        <div class="invalid-feedback"><strong>{{$message}}</strong></div>
                        @enderror
                    </div>
                </div>
                {{-- Thuộc sách --}}
                <div class="form-group mb-3">
                    <label for="multi-select" class="form-label fw-bold">Chương này thuộc sách <span class="text-danger">*</span></label> 
                    <select id="multi-select" name="book_id">
                        @foreach($data_book as $book)
                        <option value="{{$book->id}}" {{ ($book->id == $data_chapter->book_id) ? 'selected' : '' }}>{{$book->book_name}}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Nội dung --}}
                <div class="form-group mb-3">
                    <label for="chapter_content" class="form-label fw-bold">Nội dung</label>
                    <textarea class="form-control" name="chapter_content" id="ckeditor" rows="10" placeholder="..." style="min-height: 140px;resize:none;">{{ $data_chapter->chapter_content }}</textarea>
                </div>
                {{-- Trạng thái --}}
                <div class="form-group mb-3">
                    <label for="" class="form-label fw-bold">Trạng thái<span class="text-danger"></span></label>
                    <div class="input-group">
                        <label class="input-group-text bg-secondary text-white" for="chapter_status">Chọn trạng thái</label>
                        <select class="form-control fw-bold text-center" name="chapter_status" id="chapter_status">
                            <option value="1" class="fw-bold" {{ ($data_chapter->chapter_status == 1) ? 'selected' : '' }}>HIỂN THỊ</option>
                            <option value="0" class="fw-bold" {{ ($data_chapter->chapter_status == 0) ? 'selected' : '' }}>ẨN</option>
                        </select>
                    </div>
                </div>
                <!-- save button -->
                <div class="form-group">
                    <button type="submit" name="create_chapter" class="btn btn-success btn-lg shadow w-100 fw-bold"><i class="fa-solid fa-check"></i> Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    VirtualSelect.init({
        ele: '#multi-select',
        placeholder: 'Chọn sách',
        search: 'true',
        searchPlaceholderText: 'Tìm kiếm...',
        noOptionsText: 'Không tìm thấy',
        noSearchResultsText: 'Không tìm thấy',
    });
</script>
<script src="{{asset('assets/js/backend/ckeditor.js')}}"></script>
@endsection