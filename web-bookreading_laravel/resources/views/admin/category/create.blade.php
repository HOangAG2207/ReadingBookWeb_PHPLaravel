@extends('layouts.admin')

@section('title','Quản lý Sách - Thêm Thể loại')

@section('admin_content')
<div class="container-fluid px-4">
    <h2 class="mt-4 text-success">Thể loại Sách<span class="text-info h4"> > </span><span class="h5 text-secondary fw-normal">Thêm mới</span></h2>
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
            <a href="{{ url('admin/category') }}" class="btn btn-primary btn-md float-end"><i class="fa-solid fa-clipboard-list"></i> Xem Danh sách</a>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/create_category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <!-- input category -->
                    <div class="form-group col-lg-8 col-md-6 col-sm-12">
                        <label for="category_name" class="form-label fw-bold">Tên thể loại<span class="text-danger">*</span></label>
                        <input placeholder="Gợi ý: Thể thao, đời sống, tâm lý,..." name="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror" value="{{ old('category_name') }}">
                        @error('category_name')
                        <div class="invalid-feedback"><strong>{{$message}}</strong></div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                        <label for="" class="form-label fw-bold">Trạng thái<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <label class="input-group-text" for="category_status">Kích hoạt</label>
                            <select class="form-select @error('category_status') is-invalid @enderror" name="category_status" id="category_status">
                                <option value="" selected>Chọn...</option>
                                <option value="1">Có</option>
                                <option value="0">Không</option>
                            </select>
                            @error('category_status')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- input decoration -->
                <div class="form-group mb-3">
                    <label for="category_description" class="form-label fw-bold">Mô tả thể loại</label>
                    <textarea class="form-control" name="category_description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <!-- input image -->
                <div class="form-group mb-3">
                    <label for="category_image" class="form-label fw-bold">Hình ảnh</label>
                    <input name="category_image" type="file" class="form-control @error('category_image') is-invalid @enderror">
                    @error('category_image')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <!-- save button -->
                <div class="form-group">
                    <button type="submit" name="create_category" class="btn btn-success "><i class="fa-solid fa-check"></i> Lưu thông tin</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection