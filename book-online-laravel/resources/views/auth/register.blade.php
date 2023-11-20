
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tạo tài khoản</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('assets/css/auth.css') }}" rel="stylesheet">
    <!-- fontawsome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
</head>

<body>

    <div class="login-form">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group small clearfix">
                <a href="{{ route('home') }}" class="back-home text-decoration-none"><i class="fa-solid fa-chevron-left"></i> Trang đọc sách</a>
            </div>
            <div class="img-box"><img src="{{asset('assets/images/logos/book_logo.png')}}" alt=""></div>
            <h4 class="modal-title my-3" style="color:darkcyan;">Tạo tài khoản</h4>
            <div class="form-group">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Tên của bạn" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mật khẩu" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu" required autocomplete="new-password">
            </div>
            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Đăng ký">
        </form>
        <div class="text-center medium mt-3">Bạn đã có tài khoản? <a href="{{ route('login') }}" class="register">Đăng nhập</a></div>
    </div>
</body>

</html>