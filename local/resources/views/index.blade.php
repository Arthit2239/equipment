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
            <form action="" method="post">
                @csrf
                <h1 class="site-title">
                    <span>เข้าสู่ระบบ</span>
                </h1>

                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                <div class="mb-4">
                    <label>Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                </div>
                <div class="mb-4">
                    <label>Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>

                <div class="mb-4">
                    <button class="btn btn-block btn-primary my-4" type="submit"> ลงชื่อเข้าใช้</button>
                </div>

                <div class="mb-4">
                    <a href="{{ url('/') }}"><button class="btn btn-block btn-primary my-4" type="button"> ย้อนกลับ</button></a>
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
