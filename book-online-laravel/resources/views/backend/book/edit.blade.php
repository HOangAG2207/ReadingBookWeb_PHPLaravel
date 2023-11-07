@extends('backend.layouts.admin')

@section('title','Quản lý Sách')

@section('admin_content')
<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mx-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item h2">
                <p id="text-color" class="text-decoration-none badge rounded-pill bg-light border border-3">THỂ LOẠI</p>
            </li>
            <li class="breadcrumb-item h2 active" aria-current="page">Cập nhật</li>
        </ol>
    </nav>
    <div class="card mx-5">
        <div class="card-header">
            <a href="{{ route('book.index') }}" class="btn btn-primary btn-sm shadow fw-bold float-end"><i class="fa-solid fa-clipboard-list me-2"></i>Xem Danh sách</a>
        </div>
        <div class="card-body border-1">
            <form action="{{ route('book.update',['book'=> $data_book->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                    <div class="form-group col-lg-9 col-md-9 col-sm-12">
                        {{-- Tên Sách--}}
                        <div class="form-group mb-3">
                            <label for="book_name" class="form-label fw-bold">Tên thể loại <span class="text-danger fw-bolder">*</span></label>
                            <input type="search" class="form-control @error('book_name') is-invalid @enderror" id="book_name" name="book_name" value="{{ $data_book->book_name }}" placeholder="Phải có ít nhất 5 kí tự">
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
                                    @foreach($data_genre as $value => $genre)
                                    <option value="{{$genre->id}}" {{ ($genre->id == $data_book->genre_id) ? 'selected' : '' }}>{{$genre->genre_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- Tóm tắt --}}
                        <div class="form-group mb-3">
                            <label for="book_description" class="form-label fw-bold">Tóm tắt</label>
                            <textarea class="form-control" name="book_description" id="ckeditor" rows="4" placeholder="..." style="min-height: 140px;resize:none;">{{ $data_book->book_description }}</textarea>
                        </div>
                        {{-- Trạng thái --}}
                        <div class="form-group mb-3">
                            <label for="" class="form-label fw-bold">Trạng thái<span class="text-danger"></span></label>
                            <div class="input-group">
                                <label class="input-group-text bg-secondary text-white" for="book_status">Trạng thái hiển thị</label>
                                <select class="form-control fw-bold text-center" name="book_status" id="book_status">
                                    <option value="1" class="fw-bold" {{ ($data_book->book_status == 1) ? 'selected' : '' }}>HIỂN THỊ</option>
                                    <option value="0" class="fw-bold" {{ ($data_book->book_status == 0) ? 'selected' : '' }}>ẨN</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Hình ảnh mới--}}
                    <div class="form-group col-lg-3 col-md-3 col-sm-12 text-center mt-lg-5 mt-md-5">
                        <label for="book_image" class="form-label fw-bold">Hình ảnh</label>
                        <p class="text-danger fw-normal h6">(Chọn ảnh mới nếu muốn thay đổi)</p>
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
                    <button type="submit" name="create_book" class="btn btn-success btn-lg shadow w-100 fw-bold"><i class="fa-solid fa-check"></i> Cập nhật</button>
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