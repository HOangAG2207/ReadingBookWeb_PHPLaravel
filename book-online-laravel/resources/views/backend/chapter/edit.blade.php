@extends('backend.layouts.admin')

@section('title','Quản lý Sách')

@section('admin_content')
<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mx-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item h2">
                <p id="text-color" class="text-decoration-none badge rounded-pill bg-light border border-3">CHƯƠNG SÁCH</p>
            </li>
            <li class="breadcrumb-item h2 active" aria-current="page">Cập nhật</li>
        </ol>
    </nav>
    <div class="card mx-5">
        <div class="card-header">
            <a href="{{ route('chapter.index') }}" class="btn btn-primary btn-sm shadow fw-bold float-end"><i class="fa-solid fa-clipboard-list me-2"></i>Xem Danh sách</a>
        </div>
        <div class="card-body border-1">
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
                    <label for="" class="form-label fw-bold">Thuộc sách<span class="text-danger"></span></label>
                    <div class="input-group">
                        <label class="input-group-text bg-secondary text-white" for="book_id">Chọn sách</label>
                        <select class="form-control text-center" name="book_id" id="book_id">
                            <option value="">---------CHỌN---------</option>
                            @foreach($data_book as $value => $book)
                            <option value="{{$book->id}}" {{ ($book->id == $data_chapter->book_id) ? 'selected' : '' }}>{{$book->book_name}}</option>
                            @endforeach
                        </select>
                    </div>
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
                        <label class="input-group-text bg-secondary text-white" for="chapter_status">Trạng thái hiển thị</label>
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
<script src="{{asset('assets/js/backend/ckeditor.js')}}"></script>
@endsection