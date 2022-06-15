<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bounce Test</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/92d96e629d.js" crossorigin="anonymous"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  @if (session()->has('emailchangepass'))
  <div class="alert alert-success"> {{ session('emailchangepass') }}</div>
  @endif
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Aplikasi</b> Bounce Test</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        @if (session()->has('emailpass'))
        <div class="alert alert-danger"> {{ session()->get('emailpass') }}</div>
        @endif

        <form action="{{ url('login-process') }}" method="post" id="form">
          @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control  {{ $errors->has('email') ? 'error' : '' }}" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @if ($errors->get('email'))
            <div class="invalid-feedback" style="display: block;">
              <ul style="list-style: none;">
                @foreach ($errors->get('email') as $errorEmail)
                <li>{{ $errorEmail }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @if ($errors->get('password'))
            <div class="invalid-feedback" style="display: block;">
              <ul style="list-style: none;">
                @foreach ($errors->get('password') as $errorPassword)
                <li>{{ $errorPassword }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <div class="row">
            <div class="col-4 offset-8">
              <button type="submit" class="btn btn-primary btn-block">
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                Sign In
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ url('/adminlte/plugins/js/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ url('/adminlte/plugins/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ url('/adminlte/plugins/js/adminlte.min.js') }}"></script>

  <script>
    $('#form').submit(() => {
      $('.spinner-border').removeClass('d-none').addClass('d-inline-block')
    })
  </script>

</body>

</html>