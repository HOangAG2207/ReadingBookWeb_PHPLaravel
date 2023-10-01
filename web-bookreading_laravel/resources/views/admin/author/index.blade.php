@extends('layouts.admin')

@section('title','Quản lý Sách - Tác giả')

@section('admin_content')
<div class="container-fluid px-4">
    <h2 class="mt-4 text-success">Tác giả<span class="text-info h4"> > </span><span class="h5 text-secondary fw-normal">Xem Danh sách</span></h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="card mt-4">
        <div class="card-header">
            <a href="{{ url('admin/create_author') }}" class="btn btn-primary btn-md float-end"><i class="fa-solid fa-plus"></i> Thêm mới</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-sm mb-0">
                <thead>
                    <tr class="text-center align-middle text-uppercase table-warning">
                        <th width="5%">#</th>
                        <th width="20%">Tên tác giả</th>
                        <th width="5%">Giới<br>tính</th>
                        <th>Tổng quan</th>
                        <th width="10%">Hình ảnh</th>
                        <th width="15%">Trạng thái</th>
                        <th width="5%">Người<br>tạo</th>
                        <th width="10%">Ngày<br>cập nhật</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data_author->count() == 0)
                    <tr>
                        <td colspan="5">Danh sách chưa có tác giả nào được thêm.</td>
                    </tr>
                    @endif
                    @foreach($data_author as $value =>$author)
                    <tr class="align-middle">
                        <td class="text-center">
                            @if($loop->iteration < 10) 0{{ $loop->iteration }} @else {{ $loop->iteration }} @endif </td>
                        <td class="px-3 text-primary">
                            <a href="" class="fw-bold text-decoration-none text-primary">{{ $author->author_name }}</a>
                            <span class="text-decoration-none text-secondary">#{{ $author->author_slug }}</span>
                        </td>
                        <td class="text-center">@if($author->author_gender==1)
                            <span class="">Nam</span>
                            @else
                            <span class="">Nữ</span>
                            @endif
                        </td>
                        <td class="px-3">
                            <a style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;">
                                {{ $author->author_overview }}
                            </a>
                        </td>
                        <td class="px-3 text-center">
                            <img id="" src="{{ $author->author_image==null ? 
                                        ($author->author_gender==1 ? asset('uploads/male_no_image.png'):asset('uploads/female_no_image.png'))
                                        : asset('uploads/images/author/'.$author->author_image) }}" class=" gallery-item img-thumbnail border-info w-75 h-75" alt="{{ $author->author_name }}" />
                        </td>
                        <td class="text-center form-switch">
                            @if($author->author_status==1)
                            <span class="text-success"><i class="fa-solid fa-circle-check"></i> Kích hoạt</span>
                            @else
                            <span class="text-danger"><i class="fa-solid fa-circle-xmark"></i> Không kích hoạt</span>
                            @endif
                            <div class="">
                                <input type="checkbox" data-id="{{ $author->id }}" name="author_status" class="js-switch" {{ $author->author_status==1 ? 'checked':''}}>
                            </div>
                        </td>
                        @foreach($user as $value)
                            @if($value->id == $author->created_by)
                        <td class="text-center">{{ $value->name }}</td>
                            @endif
                        @endforeach
                        <td class="text-center">{{ $author->updated_at }}</td>
                        <td class="text-center">
                            <a href="{{ url('admin/edit_author/'.$author->id) }}" class="btn border-0"><i class="fa-solid fa-pen-to-square text-primary h5 pe-none"></i></a>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn delete-author border-0" value="{{ $author->id }}"><i class="fa-solid fa-trash-can text-danger h5 pe-none"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-2">
        {{ $data_author->links('layouts.paginate') }}
    </div>
</div>
@endsection

@section('image_zoom')

<!-- Modal zoom image-->
<div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
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
<!-- scripts zoom image -->
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
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">XÁC NHẬN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="">Bạn có chắc chắn muốn xóa?</div>
            </div>
            <input type="hidden" id="author_id">
            <div class="modal-footer">
                <a href="javascript:void(1)" class="btn btn-danger delete_author_btn">Có</a>
                <!-- <button type="button" class="btn btn-danger delete_category_btn"></button> -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
            </div>
        </div>
    </div>
</div>
<!-- script delete confirm-->
<script>
    // JavaScript to handle the delete action
    $(document).on('click', '.delete-author', function(e) {
        e.preventDefault();
        $author_id = $(this).val();

        $('#author_id').val($author_id);
        $('#deleteModal').modal('show');
    });
    $(document).on('click', '.delete_author_btn', function(e) {
        e.preventDefault();

        $cate_id = $('#author_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            url: '/admin/delete_author/' + $author_id,
            success: function(response) {
                console.log(response);
                $('#deleteModal').modal('hide');
            }
        });
        location.reload();
    });
</script>
<!-- script change author statuss -->
<script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        let switchery = new Switchery(html, {
            size: 'small'
        });
    });
    $(document).ready(function() {
        $('.js-switch').change(function() {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let authorId = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route("update_status_author") }}',
                data: {
                    'author_status': status,
                    'author_id': authorId
                },
                // success: function(data) {
                //     console.log(data.message);
                // }
            });
            location.reload();
        });
    });
</script>
@endsection