<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon@2x.png') }}">
    <title>เข้าสู่ระบบ</title>
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/styles_login.css') }}">
</head>

<body>
    <main class="login">
        <div class="box bg_l">
        </div>
        <div class="box bg_r">
            <form action="{{ route('postlogin') }}" method="POST">
                @csrf
                <h1 class="site-title">
                    <span>ยินดีต้อนรับเข้าสู่ระบบเบิกอุปกรณ์</span>
                </h1>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                        @php
                            Session::forget('error');
                        @endphp
                    </div>
                @endif

                @if (isset($errors) && count($errors) > 0)
                    <div class="alert alert-warning" role="alert">
                        <ul class="list-unstyled mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-4">
                    <label>ชื่อผู้ใช้งาน หรือ อีเมล์</label>
                    <input type="text" name="username" id="username"
                        class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"
                        autofocus>
                    <span class="text-danger">{{ $errors->first() }}</span>
                </div>

                <div class="mb-4">
                    <label>รหัสผ่าน</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">
                    <span class="text-danger">{{ Util::checkArray($errors->all(), 1) }}</span>
                </div>

                <div class="mb-4 form-check">
                    <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me">
                    <label class="form-check-label" for="flexCheckDefault">
                        จดจำเข้าสู่ระบบ
                    </label>
                </div>

                <div class="mb-4">
                    <a class="btn btn-link" href="{{ url('register') }}">สมัครสมาชิก</a>
                    <a class="btn btn-link" href="{{ url('forget-password') }}">ลืมรหัสผ่านหรือไม่?</a>
                </div>

                <div class="mb-4">
                    <button class="btn btn-block btn-primary my-4" type="submit"> ลงชื่อเข้าใช้</button>
                </div>
            </form>
        </div>
    </main>

    <!-- Site JS -->
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Site JS -->
</body>

</html>
