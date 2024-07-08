<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Al Mafaz - Register</title>
    <link rel="shortcut icon" href="{{ asset('admin/assets/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link href="{{ asset('admin/assets/compiled/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/compiled/css/app-dark.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/compiled/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/compiled/css/error.css') }}">
    <link href="{{ asset('admin/assets/static/css/sweetalert2.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-6 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Register</h1>
                    <p class="auth-subtitle mb-5">Register with your details to create an account.</p>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="name" placeholder="Name" value="{{ old('name') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" name="email" placeholder="Email" value="{{ old('email') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password_confirmation" placeholder="Confirm Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Register</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</body>
</html>
