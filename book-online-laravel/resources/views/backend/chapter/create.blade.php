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
                        <li class="breadcrumb-item active" aria-current="page"><a>Thêm mới</a></li>
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
            <form action="{{ route('chapter.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    {{-- Số chương --}}
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label for="chapter_number" class="form-label fw-bold">Số chương <span class="text-danger fw-bold">*</span></label>
                        <input type="search" class="form-control @error('chapter_number') is-invalid @enderror" id="chapter_number" name="chapter_number" value="{{ old('chapter_number') }}" placeholder="Ví dụ: 1, 2, 2A, 2B,...">
                        @error('chapter_number')
                        <div class="invalid-feedback"><strong>{{$message}}</strong></div>
                        @enderror
                    </div>
                    {{-- Tiêu đề chương --}}
                    <div class="form-group col-lg-8 col-md-8 col-sm-12">
                        <label for="chapter_name" class="form-label fw-bold">Tiêu đề chương</label>
                        <input type="search" class="form-control @error('chapter_name') is-invalid @enderror" id="chapter_name" name="chapter_name" value="{{ old('chapter_name') }}" placeholder="Phải có ít nhất 5 kí tự">
                        @error('chapter_name')
                        <div class="invalid-feedback"><strong>{{$message}}</strong></div>
                        @enderror
                    </div>
                </div>
                {{-- Thuộc sách nào--}}
                <div class="form-group mb-3">
                    <label for="multi-select" class="form-label fw-bold">Chương này thuộc sách <span class="text-danger fw-bold">*</span></label>
                    <select id="multi-select" name="book_id" class="@error('book_id') is-invalid @enderror">
                        <option></option>
                        @foreach($chapter_book as $book)
                        <option value="{{$book->id}}">{{$book->book_name}}</option>
                        @endforeach
                    </select>
                    @error('book_id')
                    <div class="invalid-feedback"><strong>{{$message}}</strong></div>
                    @enderror
                </div>

                {{-- Nội dung --}}
                <div class="form-group mb-3 rounded">
                    <label for="chapter_content" class="form-label fw-bold">Nội dung</label>
                    <textarea class="form-control" name="chapter_content" id="ckeditor" rows="15" placeholder="..."></textarea>
                </div>
                <!-- save button -->
                <div class="form-group">
                    <button type="submit" name="create_chapter" class="btn btn-success btn-lg shadow w-100 fw-bold"><i class="fa-solid fa-check"></i> Thêm chương</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    VirtualSelect.init({
        ele: '#multi-select',
        autoSelectFirstOption: false,
        placeholder: 'Chọn sách',
        search: 'true',
        searchPlaceholderText: 'Tìm kiếm...',
        noOptionsText: 'Không tìm thấy',
        noSearchResultsText: 'Không tìm thấy',
        silentInitialValueSet: false,
        autoSelectFirstOption: false,
    });
</script>
<script src="{{asset('assets/js/backend/ckeditor.js')}}"></script>
@endsection