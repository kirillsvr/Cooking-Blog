<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>Cuba - Premium Admin Template</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/feather-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('assets/admin/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/responsive.css')}}">
</head>
<body>
<!-- login page start-->
<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-12 p-0">
            <div class="login-card">
                <div>
                    @if (session()->has('error'))
                        <div class="alert alert-success">
                            {{session('error')}}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="/assets/admin/images/logo/login.png" alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
                    <div class="login-main">
                        <form class="theme-form" action="{{route('auth')}}" method="post">
                            @csrf
                            <h4>Вход в аккаунт</h4>
                            <p>Введите ваш email и пароль</p>
                            <div class="form-group">
                                <label class="col-form-label">Email</label>
                                <input class="form-control" type="email" name="email" value="{{old('email')}}" required="" placeholder="Test@gmail.com">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Пароль</label>
                                <div class="form-input position-relative">
                                    <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <a class="link" href="{{route('password.request')}}">Забыли пароль?</a>
                                <div class="text-end mt-3">
                                    <button class="btn btn-primary btn-block w-100" type="submit">Вход</button>
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-center">Еще не регистрировались?<a class="ms-2" href="{{route('register.create')}}">Создать аккаунт</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/admin/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('assets/admin/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('assets/admin/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="{{asset('assets/admin/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('assets/admin/js/script.js')}}"></script>
    <!-- login js-->
</div>
</body>
</html>
