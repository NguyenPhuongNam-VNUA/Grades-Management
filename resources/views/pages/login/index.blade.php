<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/login.css') }}">
</head>
<body>
    <section>
        <div class="container">
            <div class="form admin-form active">
                <div class="wrapper">
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <h1>Đăng nhập</h1>
                        <input type="text" name="username" value="{{ old('username') }}" placeholder="Tài khoản...">
                        <input type="password" name="password" value="{{ old('password') }}" placeholder="Mật khẩu...">
                        <button>Đăng nhập</button>
                    </form>
                </div>
            </div>
            <div class="form lecture-form active">
                <div class="wrapper">
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <h1>Đăng nhập</h1>
                        <input type="text" name="lecturer_code" placeholder="Nhập mã giảng viên" value="{{ old('lecturer_code') }}">
                        @if($errors->has('lecturer_code') )
                            <p class="error text-danger">{{ $errors->first('lecturer_code') }}</p>
                        @endif
                        <button>Đăng nhập</button>
                    </form>
                </div>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-left">
                        <h1><b>Giảng viên</b></h1>
                        <p>Hoặc</p>
                        <button id="adminButton">Admin</button>
                    </div>
                    <div class="overlay-right">
                        <h1><b>Admin</b></h1>
                        <p>Hoặc</p>
                        <button id="lectureButton">Giảng viên</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/admin/js/login.js') }}"></script>
</body>
</html>
