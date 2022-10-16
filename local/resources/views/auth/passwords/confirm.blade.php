<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon.png') }}" >
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon@2x.png') }}" >
    <title>Confirm</title>
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
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin') }}">{{ __('Login') }}</a></li>
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
                                <div class="card-header">{{ __('Confirm Password') }}</div>

                                <div class="card-body">
                                    {{ __('Please confirm your password before continuing.') }}

                                    <form method="POST" action="{{ route('password.confirm') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Confirm Password') }}
                                                </button>

                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
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
