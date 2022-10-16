<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon.png') }}" >
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon@2x.png') }}" >
    <title>Email</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/styles.css') }}">
     <!-- Datatable -->
     <link rel="stylesheet" type="text/css" href="{{ asset('asset/datatable/jquery.dataTables.min.css') }}"/>
     <!-- Font Awesom -->
     <link href="{{ asset('asset/css/font-awesome.min.css') }}" rel="stylesheet">
     <!--select2 css-->
     <link href="{{ asset('asset/css/select2.min.css') }}" rel="stylesheet">
     <!-- Font Awesome 4.7.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">{{ __('Login') }}</a></li>
                    @endif
                </ul>
            </div>
        </nav>

        <main class="py-4">
            <section id="feature">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Reset Password') }}</div>

                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('forget-password') }}">
                                        @csrf
                                        <div class="text-center mb-4">
                                            <h1 class="h3 mb-0">Recover account</h1>
                                            <p>Enter your email address and an email with instructions will be sent to you.</p>
                                        </div>

                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        <div class="js-form-message mb-3">
                                            <div class="js-focus-state input-group form">
                                            <div class="input-group-prepend form__prepend">
                                                <span class="input-group-text form__text">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required  autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <button type="submit" class="btn btn-primary login-btn btn-block">Recover account</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
<!-- site scripts -->
<script src="{{ asset('asset/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset/js/script.js') }}"></script>
<!-- sweetalert -->
<script src="{{ asset('asset/js/sweetalert.min.js') }}"> </script>
<!-- mask -->
<script type="text/javascript" src="{{ asset('asset/js/jquery.mask.min.js')}}"></script>
<!--select2 js-->
<script src="{{ asset('asset/js/select2.min.js') }}"> </script>
<!-- Datatable -->
<script type="text/javascript" src="{{ asset('asset/datatable/jquery.dataTables.min.js') }}"></script>
</html>
