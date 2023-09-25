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
                        <td class="px-3">{{ $cate->category_description }}</td>
                        <td class="px-3 text-center">
                            @if($cate->category_image==null)
                            <img src="{{ asset('uploads/no_image.jpg') }}" width="60px" height="60px" class="img-thumbnail border-info" alt="img">
                            @else
                            <img src="{{ asset('uploads/images/category/'.$cate->category_image) }}" width="50px" height="50px" class="img-thumbnail border-info" alt="img">
                            @endif
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
                            <button type="submit" class="btn mt-1"><i class="fa-solid fa-pen-to-square text-primary h5"></i>
                        </td>
                        <td class="text-center">
                            <button type="submit" class="btn mt-1"><i class="fa-solid fa-trash-can text-danger h5"></i>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection