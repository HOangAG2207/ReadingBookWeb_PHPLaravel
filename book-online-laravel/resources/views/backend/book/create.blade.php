@extends('backend.layouts.admin')

@section('title','Quản lý Sách')

@section('admin_content')
<div class="container-fluid">
<div class="card mx-2 my-2">
        <div class="card-header py-0 pt-1 align-middle">
            <div class="float-start">
                <h3 class="text-darkcyan fw-bold">SÁCH</h3>
            </div>
            <div class="float-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-darkcyan fw-bold"><a>Sách</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a>Thêm mới</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card mx-5 border-0">
        <div class="card-header mb-3 border-0 bg-white">
            <a href="{{ route('book.index') }}" class="btn btn-primary btn-sm shadow fw-bold float-end"><i class="fa-solid fa-clipboard-list me-2"></i>Xem Danh sách</a>
        </div>
        <div class="card-body border border-2 shadow rounded">
            <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="form-group col-lg-9 col-md-9 col-sm-12">
                        {{-- Tên Sách --}}
                        <div class="form-group mb-3">
                            <label for="book_name" class="form-label fw-bold">Tên sách <span class="text-danger fw-bolder">*</span></label>
                            <input type="search" class="form-control @error('book_name') is-invalid @enderror" id="book_name" name="book_name" value="{{ old('book_name') }}" placeholder="Phải có ít nhất 5 kí tự">
                            @error('book_name')
                            <div class="invalid-feedback"><strong>{{$message}}</strong></div>
                            @enderror
                        </div>
                        {{-- Thể loại --}}
                        <div class="form-group mb-3">
                            <label for="" class="form-label fw-bold">Thể loại<span class="text-danger"></span></label>
                            <div class="input-group">
                                <label class="input-group-text bg-secondary text-white" for="genre_id">Chọn thể loại</label>
                                <select class="form-control text-center" name="genre_id" id="genre_id">
                                    <option value="">---------CHỌN---------</option>
                                    @foreach($book_genre as $value => $genre)
                                    <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- Tóm tắt truyện --}}
                        <div class="form-group">
                            <label for="book_description" class="form-label fw-bold">Tóm tắt</label>
                            <textarea class="form-control" name="book_description" id="ckeditor" rows="5" placeholder="..." style="min-height: 140px; resize:none;"></textarea>
                        </div>
                    </div>
                    {{-- Hình ảnh --}}
                    <div class="form-group col-lg-3 col-md-3 col-sm-12 text-center mt-lg-5 mt-md-5">
                        <label for="book_image" class="form-label fw-bold">Hình ảnh</label>
                        <div class="d-flex justify-content-center align-items-center">
                            <img id="frame" src="{{asset('assets/images/no_image.jpg')}}" class="rounded card-img-bottom object-fit-cover border border-2 border-info" style="height: 180px; width:150px;">
                        </div>
                        <div class="mt-1 mx-auto d-flex" style="height: 40px; width: 150px;">
                            <div class="btn btn-danger mx-1" onclick="clearImage()">
                                <label class="form-label text-white" for=""><i class="fa-solid fa-circle-xmark"></i></label>
                            </div>
                            <div class="btn btn-secondary mx-1 w-100">
                                <label class="form-label text-white" for="image"><i class="fa-solid fa-arrow-up-from-bracket"></i></label>
                                <input type="file" accept=".jpeg, .png, .jpg" class="form-control d-none" id="image" name="book_image" onchange="preview()" accept="image/*" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- save button -->
                <div class="form-group">
                    <button type="submit" name="create_book" class="btn btn-success btn-lg shadow w-100 fw-bold"><i class="fa-solid fa-check"></i> Thêm sách</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function clearImage() {
        document.getElementById('image').value = null;
        frame.src = "{{asset('assets/images/no_image.jpg')}}";
    }
</script>
<script src="{{asset('assets/js/backend/ckeditor.js')}}"></script>
<script src="{{asset('assets/js/backend/image_preview.js')}}"></script>
@endsection