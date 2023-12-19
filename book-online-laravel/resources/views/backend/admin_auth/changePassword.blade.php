@extends('backend.layouts.admin')

@section('title','Quản lý Sách')

@section('admin_content')
<section>
    <form action="{{route('admin.changePassword-update')}}" method="POST">
        @method('PATCH')
        @csrf
        <div class="container py-5 mx-auto">
            <div class="text-center pb-2">
                <h3 class="text-darkcyan fw-bold">Thay đổi mật khẩu</h3>
            </div>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card mb-4 shadow-sm bg-light">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mật khẩu hiện tại:</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="password" name="current_pwd" class="form-control @error('current_pwd') is-invalid @enderror" value="{{ old('current_pwd') }}">
                                    @error('current_pwd')
                                    <div class="invalid-feedback"><strong>{{$message}}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mật khẩu mới:</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="password" name="new_pwd" class="form-control @error('new_pwd') is-invalid @enderror" value="{{ old('new_pwd') }}">
                                    @error('new_pwd')
                                    <div class="invalid-feedback"><strong>{{$message}}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Xác nhận mật khẩu mới:</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="password" name="confirm_new_pwd" class="form-control @error('confirm_new_pwd') is-invalid @enderror">
                                    @error('confirm_new_pwd')
                                    <div class="invalid-feedback"><strong>{{$message}}</strong></div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <a href="{{route('admin.changePassword')}}" type="reset" class="btn btn-outline-secondary fw-bold">Hủy bỏ</a>
                        <button type="submit" class="btn btn-outline-success fw-bold">Cập nhật mật khẩu</button>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </form>
</section>

@endsection