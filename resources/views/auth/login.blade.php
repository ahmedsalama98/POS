<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @lang('site.login')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<!-- Bootstrap 3.3.7 -->--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/skin-blue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/all.min.css') }}">
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE-rtl.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/rtl.css') }}">

    @else
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE.min.css') }}">
    @endif

    {{--<!-- jQuery 3 -->--}}
    <script src="{{ asset('dashboard_files/js/jquery.min.js') }}"></script>







    {{--html in  ie--}}
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


</head>
<body style="background: #eee" class="hold-transition skin-blue sidebar-mini" data-lang="{{ app()->getLocale() }}">


    <div class="login-box">
        <div class="login-logo">
          <h1> {{ config('app.name') }} </h1>


        </div>

        <div class="login-box-body">
          <p class="login-box-msg"> @lang('site.login') </p>

          <form method="POST" action="{{ route('login') }}">
              @csrf
            <div class="form-group has-feedback">
              <input type="email" class="form-control" placeholder="Email" name="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              @error('email')
              <div class="invalid-feedback" role="alert">
                  <strong style="color: red">{{ $message }}</strong>
              </div>
              @enderror
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password" name="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>

              @error('password')
              <div class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </div>
              @enderror
            </div>
            <div class="row">
              <div class="col-xs-8">
                <div class="checkbox ">
                  <label>
                    <input type="checkbox"name="remember" {{ old('remember') ? 'checked' : '' }}" >@lang('site.remember_me')
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat"> @lang('site.login') </button>
              </div>
              <!-- /.col -->
            </div>
          </form>




        </div>
        <!-- /.login-box-body -->
      </div>
      <!-- /.login-box -->



{{--<!-- Bootstrap 3.3.7 -->--}}
<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>

{{--icheck--}}
<script src="{{ asset('dashboard_files/plugins/icheck/icheck.min.js') }}"></script>


{{--<!-- AdminLTE App -->--}}
<script src="{{ asset('dashboard_files/js/adminlte.min.js') }}"></script>




</body>
</html>
