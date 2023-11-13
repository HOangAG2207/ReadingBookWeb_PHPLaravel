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
                        <li class="breadcrumb-item active" aria-current="page"><a>Thêm mới</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card mx-5 border-0">
        <div class="card-header mb-3 border-0 bg-white">
            <a href="{{ route('genre.index') }}" class="btn btn-primary btn-sm shadow fw-bold float-end"><i class="fa-solid fa-clipboard-list me-2"></i>Xem Danh sách</a>
        </div>
        <div class="card-body border border-2 shadow rounded">
            <form action="{{ route('genre.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Tên thể loại --}}
                <div class="form-group mb-3">
                    <label for="genre_name" class="form-label fw-bold">Tên thể loại <span class="text-danger fw-bolder">*</span></label>
                    <input type="search" class="form-control @error('genre_name') is-invalid @enderror" id="genre_name" name="genre_name" value="{{ old('genre_name') }}" placeholder="Phải có ít nhất 5 kí tự">
                    @error('genre_name')
                    <div class="invalid-feedback"><strong>{{$message}}</strong></div>
                    @enderror
                </div>
                {{-- Mô tả --}}
                <div class="form-group mb-3">
                    <label for="genre_description" class="form-label fw-bold">Mô tả</label>
                    <textarea class="form-control" name="genre_description" id="ckeditor" rows="4" placeholder="..." style="min-height: 140px;resize:none;"></textarea>
                </div>

                <!-- save button -->
                <div class="form-group">
                    <button type="submit" name="create_genre" class="btn btn-success btn-lg shadow w-100 fw-bold"><i class="fa-solid fa-check"></i> Thêm thể loại</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/backend/ckeditor.js')}}"></script>
@endsection