<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon.png') }}" >
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon@2x.png') }}" >
    <title>Reset</title>
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
                        <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">{{ __('Login') }}</a></li>
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
                                <div class="card-header">Reset Password</div>
                                     <div class="card-body">
                                         <form method="POST" action="{{ route('reset-password') }}">
                                          @csrf
                                          <input type="hidden" name="token" value="{{ $token }}">
                                       <div class="form-group row">
                                           <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                         <div class="col-md-6">
                                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('username') }}" required  autofocus>

                                               @error('email')
                                                   <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $message }}</strong>
                                                   </span>
                                               @enderror
                                           </div>
                                       </div>

                                       <div class="form-group row">
                                           <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                           <div class="col-md-6">
                                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                               @error('password')
                                                   <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $message }}</strong>
                                                   </span>
                                               @enderror
                                           </div>

                                       </div>

                                     <div class="form-group row">
                                           <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                           <div class="col-md-6">
                                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                           </div>
                                       </div>

                                    <div class="form-group row mb-0">
                                          <div class="col-md-6 offset-md-4">
                                               <button type="submit" class="btn btn-primary">
                                                   Reset Password
                                               </button>
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
