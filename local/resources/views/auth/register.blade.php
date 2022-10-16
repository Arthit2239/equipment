<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon@2x.png') }}">

    <title>Register</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/styles.css') }}">

    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/datatable/jquery.dataTables.min.css') }}" />

    <!-- Font Awesom -->
    <link href="{{ asset('asset/css/font-awesome.min.css') }}" rel="stylesheet">

    <!--select2 css-->
    <link href="{{ asset('asset/css/select2.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-dark navbar-light bg-dark">
            <ul class="navbar-nav ml-auto">

                @if (Route::has('login'))
                    <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    @if (session('success'))
                        <div class="col-sm-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="col-sm-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                @php
                                    Session::forget('error');
                                @endphp
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0 text-dark" style="text-align: center;">สมัครสมาชิกระบบเบิกอุปกรณ์</h5>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('storeUser') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="username"
                                            class="col-md-4 col-form-label text-md-right">รูปภาพประจำตัว</label>

                                        <div class="col-md-6">
                                            <input type="file" name="image" id="image" class="form-control"
                                                value="{{ old('image') }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">ชื่อ-นามสกุล</label>

                                        <div class="col-md-6">
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" placeholder="Name" required autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="username"
                                            class="col-md-4 col-form-label text-md-right">ชื่อผู้ใช้เข้าสู่ระบบ</label>

                                        <div class="col-md-6">
                                            <input type="text" name="username" id="username"
                                                class="form-control @error('username') is-invalid @enderror"
                                                value="{{ Str::random(2) }}" placeholder="Username" required
                                                autofocus>

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">อีเมล</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" placeholder="Email"
                                                required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">รหัสผ่าน</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" value="{{ old('password') }}" placeholder="Password"
                                                required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-right">ยืนยันรหัสผ่าน</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation"
                                                value="{{ old('password_confirmation') }}"
                                                placeholder="Password Confirm" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                ยืนยัน
                                            </button>

                                            <a href="{{ route('login') }}">
                                                <button type="button" class="btn btn-primary">
                                                    ย้อนกลับ
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </div>
</body>
<!-- site scripts -->
<script src="{{ asset('asset/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset/js/script.js') }}"></script>
<!-- sweetalert -->
<script type="text/javascript" src="{{ asset('asset/js/sweetalert.min.js') }}"></script>
<!-- mask -->
<script type="text/javascript" src="{{ asset('asset/js/jquery.mask.min.js') }}"></script>
<!--select2 js-->
<script src="{{ asset('asset/js/select2.min.js') }}"></script>
<!-- Datatable -->
<script type="text/javascript" src="{{ asset('asset/datatable/jquery.dataTables.min.js') }}"></script>

</html>
