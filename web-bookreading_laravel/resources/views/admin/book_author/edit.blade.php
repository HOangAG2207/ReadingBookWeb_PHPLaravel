@extends('layouts.admin')

@section('title','Quản lý Sách - Cập nhật Thể loại')

@section('admin_content')
<div class="container-fluid px-4">
    <h2 class="mt-4 text-success">Thể loại Sách<span class="text-info h4"> > </span><span class="h5 text-secondary fw-normal">Cập nhật</span></h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @endif
    <div class="card mt-4">
        <div class="card-header">
            <a href="{{ url('admin/book_author') }}" class="btn btn-primary btn-md float-end"><i class="fa-solid fa-clipboard-list"></i> Xem Danh sách</a>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/update_book_author/'.$author->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <!-- input author -->
                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                        <label for="author_name" class="form-label fw-bold">Tên tác giả<span class="text-danger">*</span></label>
                        <input placeholder="" name="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" value="{{ $author->author_name }}">
                        @error('author_name')
                        <div class="invalid-feedback"><strong>{{$message}}</strong></div>
                        @enderror
                    </div>
                    <!-- input gender -->
                    <div class="form-group col-lg-4 col-md-12 col-sm-12">
                        <label for="" class="form-label fw-bold">Giới tính<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <!-- <label class="input-group-text" for="author_gender">Kích hoạt</label> -->
                            <select class="form-select @error('author_gender') is-invalid @enderror" name="author_gender" id="author_gender">
                                <option value="" selected>Chọn...</option>
                                <option value="1" {{ ($author->author_gender == 1) ? 'selected' : '' }}>Nam</option>
                                <option value="0" {{ ($author->author_gender == 0) ? 'selected' : '' }}>Nữ</option>
                            </select>
                            @error('author_gender')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-lg-4 col-md-12 col-sm-12">
                        <label for="" class="form-label fw-bold">Trạng thái<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <label class="input-group-text" for="author_state">Kích hoạt</label>
                            <select class="form-select @error('author_state') is-invalid @enderror" name="author_state" id="author_state">
                                <option value="">Chọn...</option>
                                <option value="1" {{ ($author->author_state == 1) ? 'selected' : '' }}>Có</option>
                                <option value="0" {{ ($author->author_state == 0) ? 'selected' : '' }}>Không</option>
                            </select>
                            @error('author_state')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- input decoration -->
                <div class="form-group mb-3">
                    <label for="author_overview" class="form-label fw-bold">Mô tả thể loại</label>
                    <textarea class="form-control" name="author_overview" id="exampleFormControlTextarea1" rows="3">{{ $author->author_overview }}</textarea>
                </div>
                <!-- input image -->
                <div class="form-group mb-3">
                    <label for="author_image" class="form-label fw-bold">Hình ảnh <span class="text-danger fw-normal h6">(Chọn ảnh mới nếu muốn thay đổi)</span></label>
                    <input name="author_image" type="file" class="form-control @error('author_image') is-invalid @enderror">
                    @error('author_image')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <!-- save button -->
                <div class="form-group">
                    <button type="submit" name="create_book_author" class="btn btn-success "><i class="fa-solid fa-check"></i> Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection