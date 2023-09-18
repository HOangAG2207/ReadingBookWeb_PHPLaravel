@extends('layouts.app')

@section('content')
@include('layouts.nav_admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">THÊM SÁCH</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection