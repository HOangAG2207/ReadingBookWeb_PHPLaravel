@extends('backend.layouts.admin')

@section('title','Quản lý Sách')

@section('admin_content')
<section>
    <form action="{{route('admin.personal-update')}}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="container py-5">
        <div class="text-center pb-2">
                <h3 class="text-darkcyan fw-bold">Thông tin cá nhân</h3>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4 shadow-sm bg-light">
                        <div class="card-body text-center">
                            <img id='frame' src="{{ Auth::guard('admin')->user()->avatar==null ? 
                                        asset('assets/images/logos/admin-panel.png') 
                                        : asset('storage/uploads/Admin_image/'.Auth::guard('admin')->user()->avatar) }}" alt="avatar" class="rounded-circle img-fluid border border-3" onchange="preview()" style="width: 110px; height:110px;">
                            <h5 class="my-3">{{Auth::guard('admin')->user()->name }}</h5>
                            <h6 class="my-3 fw-normal">{{Auth::guard('admin')->user()->email }}</h6>
                            <div class="d-flex justify-content-center mb-2">
                                <div class="btn btn-sm btn-outline-primary w-50">
                                    <label class="form-label fw-bold" for="image"><i class="fa-solid fa-arrow-up-from-bracket me-2"></i>Đổi ảnh</label>
                                    <input type="file" accept=".jpeg, .png, .jpg" class="form-control d-none" id="image" name="ad_avatar" onchange="preview()" accept="image/*" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4 shadow-sm bg-light">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Tên tài khoản:</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="admin_name" value="{{Auth::guard('admin')->user()->name }}" class="form-control">
                                    <!-- <p class="text-muted mb-0">{{Auth::guard('admin')->user()->name }}</p> -->
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Số điện thoại</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="admin_phone" value="{{Auth::guard('admin')->user()->phone }}" class="form-control">
                                    <!-- <p class="text-muted mb-0">{{Auth::guard('admin')->user()->phone }}</p> -->
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Địa chỉ</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="admin_address" value="{{Auth::guard('admin')->user()->address }}" class="form-control">
                                    <!-- <p class="text-muted mb-0">{{Auth::guard('admin')->user()->address }}</p> -->
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Trạng thái</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-{{Auth::guard('admin')->user()->status?'success':'danger'}} fw-bold mb-0">
                                        @if(Auth::guard('admin')->user()->status)
                                        Kích hoạt
                                        @else
                                        Khóa
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <a href="{{ route('admin.personal') }}" class="btn btn-outline-secondary fw-bold">Hủy bỏ</a>
                        <button type="submit" class="btn btn-outline-success fw-bold">Cập nhật thông tin cá nhân</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
</section>

@endsection