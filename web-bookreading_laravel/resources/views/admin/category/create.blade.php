@extends('layouts.admin')

@section('title','Quản lý Sách - Thêm Thể loại')

@section('admin_content')
<div class="container-fluid px-4 ">
    <h2 class="mt-2 text-success">Thể loại Sách<span class="text-info h4"> > </span><span class="h5 text-secondary fw-normal">Thêm mới</span></h2>
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
                <div class="row d-flex align-items-center mb-3">
                    <div class="form-group col-lg-9 col-md-8 col-sm-12">
                        <label for="category_image" class="form-label fw-bold">Hình ảnh</label>
                        <div class="file-upload text-secondary">
                            <input type="file" id="formFile" class="img-fluid form-control @error('category_image') is-invalid @enderror" name="category_image" onchange="preview()" accept="image/*">
                            <span class=" btn border border-2">Chọn ảnh...</span>
                            <span>hoặc <span class="text-primary">kéo thả ảnh vào đây</span></span>
                        </div>

                        <!-- <input name="category_image" type="file" id="formFile" onchange="preview()" class="form-control @error('category_image') is-invalid @enderror"> -->
                        @error('category_image')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-3 col-md-4 col-sm-12 flex-column align-item-center justify-content-center">


                        <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                            <img id="frame" src="{{asset('uploads/no_image.jpg')}}" class="rounded card-img-bottom object-fit-cover border border-2 border-info" style="height: 180px; width:150px;">
                            <button type="button" onclick="clearImage()" class="btn btn-danger my-2">Xóa ảnh</button>
                        </div>

                        <!-- <div class="d-flex justify-content-center mt-2">
                            <button type="button"  class="btn btn-danger mb-2" onclick="deleteImage()">Xóa ảnh</button>
                        </div> -->

                        <!-- <div class="border border-dark d-flex justify-content-center align-items-center" style="width: 120px; height: 150px; position: relative; overflow: hidden;">
                            <img id="frame" src="{{asset('uploads/no_image.jpg')}}" class="img-fluid" style="object-fit: cover;" />

                        </div>
                        <button type="button" onclick="clearImage()" class="btn btn-primary">Xóa ảnh</button> -->
                    </div>

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

@section('script_category')
<style>
    .file-upload {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 150px;
        padding: 30px;
        border: 1px solid silver;
        border-radius: 8px;
    }

    .file-upload:hover {
        border: 2px dashed blue;
    }

    .file-upload-dragover {
        border: 2px dashed blue;
    }

    .file-upload input {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        cursor: pointer;
        opacity: 0;
    }
</style>
<script>
    $('.file-upload').on('dragover', function() {
        $(this).addClass('file-upload-dragover');
        return false;
    });
    $('.file-upload').on('dragleave', function() {
        $(this).removeClass('file-upload-dragover');
        return false;
    });
    $('.file-upload').on('drop', function(e) {
        // e.preventDefault();
    });

    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }

    function clearImage() {
        document.getElementById('formFile').value = null;
        frame.src = "{{asset('uploads/no_image.jpg')}}";
    }
</script>
@endsection