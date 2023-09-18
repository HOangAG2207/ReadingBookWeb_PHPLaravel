@extends('layouts.app')

@section('content')
@include('layouts.nav_admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">THÊM THỂ LOẠI</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{route('bookcategory.store')}}">
                        <div class="form-group">
                            <label for="" class="form-label">Tên thể loại:</label>
                            <input placeholder="Ex: Thể thao, đời sống, tâm lý,..." type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Mô tả thể loại:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Trạng thái:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Kích hoạt
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Không kích hoạt
                                </label>
                            </div>
                        </div>

                        <button type="submit" name="create_bookcategory" class="btn btn-success">THÊM</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection