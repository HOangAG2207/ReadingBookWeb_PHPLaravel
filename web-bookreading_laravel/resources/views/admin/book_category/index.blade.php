@extends('layouts.admin')

@section('title','Quản lý Sách - Thể loại')

@section('admin_content')
<div class="container-fluid px-4">
    <h2 class="mt-4 text-success">Thể loại Sách<span class="text-info h4"> > </span><span class="h5 text-secondary fw-normal">Xem Danh sách</span></h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="card mt-4">
        <div class="card-header">
            <a href="{{ url('admin/create_book_category') }}" class="btn btn-primary btn-md float-end"><i class="fa-solid fa-plus"></i> Thêm mới</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-sm mb-0">
                <thead>
                    <tr class="text-center align-middle text-uppercase table-warning">
                        <th width="5%">#</th>
                        <th width="20%">Tên loại</th>
                        <th>Mô tả</th>
                        <th width="10%">Hình ảnh</th>
                        <th width="10%">Trạng thái</th>
                        <th width="10%">Người tạo</th>
                        <th width="10%">Ngày<br>cập nhật</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_cate as $value =>$cate)
                    <tr class="align-middle">
                        <td class="text-center">
                            @if($loop->iteration < 10) 0{{ $loop->iteration }} @else {{ $loop->iteration }} @endif </td>
                        <td class="px-3 text-primary">
                            <a href="" class="fw-bold text-decoration-none text-primary">{{ $cate->category_name }}</a>
                            <span class="text-decoration-none text-secondary">#{{ $cate->category_slug }}</span>
                        </td>
                        <td class="px-3" style="display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;">{{ $cate->category_description }}</td>
                        <td class="px-3 text-center">
                            <img id="" src="{{ $cate->category_image==null ? 
                                        asset('uploads/no_image.jpg') 
                                        : asset('uploads/images/category/'.$cate->category_image) }}" class=" gallery-item img-thumbnail border-info w-75 h-75" alt="{{ $cate->category_name }}" />
                        </td>
                        <td class="px-3">@if($cate->category_state==1)
                            <span class="text-success"><i class="fa-solid fa-circle-check"></i> Hiện</span>
                            @else
                            <span class="text-danger"><i class="fa-solid fa-circle-xmark"></i> Ẩn</span>
                            @endif
                        </td>
                        <td class="text-center">{{ $cate->created_by }}</td>
                        <td class="text-center">{{ $cate->updated_at }}</td>
                        <td class="text-center">
                            <a href="{{ url('admin/edit_book_category/'.$cate->id) }}" class="btn border-0"><i class="fa-solid fa-pen-to-square text-primary h5 pe-none"></i></a>
                            <!-- <button type="submit" class="btn mt-1"><i class="fa-solid fa-pen-to-square text-primary h5"></i> -->
                        </td>
                        <td class="text-center">
                            <!-- <a href="{{ url('admin/delete_book_category/'.$cate->id) }}" class="btn"><i class="fa-solid fa-trash-can text-danger h5"></i></a> -->
                            <button type="button" class="btn deleteCategoryBtn" value="{{ $cate->id }}"><i class="fa-solid fa-trash-can text-danger h5 pe-none"></i>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@section('image_zoom')

<!-- Modal -->
<div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content w-100">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="modal title">Modal title</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{asset('uploads/no_image.jpg')}}" alt="modal img" class="modal-img w-75 img-thumnail border-info border rounded">
            </div>
        </div>
    </div>
</div>
<!-- style -->
<style>
    #gallery-modal .modal-img {
        width: 100%;
    }
</style>
<!-- scripts -->
<script>
    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("gallery-item")) {
            const src = e.target.getAttribute("src");
            document.querySelector(".modal-img").src = src;
            const myModal = new bootstrap.Modal(document.getElementById('gallery-modal'));
            myModal.show();
        };
    });
</script>

@endsection

@section('deleteConfirm')
<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">XÁC NHẬN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="">Bạn có chắc chắn muốn xóa?</div>

            </div>
            <form action="{{ url('admin/delete_book_category') }}" method="POST">
                @csrf

                <input type="hidden" name="category_delete_id" id="category_id">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Có</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // $(document).ready(function(){
    //     $('.deleteCategoryBtn').click(function(e){
    //         e.preventDefault();

    //         var category_id = $(this).val();
    //         $('#delete-modal').modal('show');
    //     });
    // });
    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("deleteCategoryBtn")) {
            e.preventDefault();

            $cate_id = e.target.getAttribute("value");
            document.querySelector("#category_id").value = $cate_id;
            const myModal = new bootstrap.Modal(document.getElementById('delete-modal'));
            myModal.show();
        }
    });
</script>

@endsection