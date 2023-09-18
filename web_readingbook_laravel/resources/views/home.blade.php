@extends('layouts.app')

@section('content')
@include('layouts.nav_admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">TRANG QUẢN LÝ</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection