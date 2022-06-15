@extends('/template/V_template')

@section('content')

<section class="content">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/responsive.bootstrap4.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/daterangepicker.css') }}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/tempusdominus-bootstrap-4.min.css') }}">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Add User</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="container">
        <form action="{{ url('manage-user/'.$data->id) }}" id="form" method="post">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">Name*</label>
            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name" name="name" value="{{ $data->name }}" required>
            @if ($errors->get('name'))
            <div class="invalid-feedback" style="display: block;">
              <ul style="list-style: none;">
                @foreach ($errors->get('name') as $errorname)
                <li>{{ $errorname }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <div class="form-group">
            <label for="email">Email*</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email" name="email" value="{{ $data->email }}" required>
            @if ($errors->get('email'))
            <div class="invalid-feedback" style="display: block;">
              <ul style="list-style: none;">
                @foreach ($errors->get('email') as $erroremail)
                <li>{{ $erroremail }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <div class="form-group">
            <label for="password">Password*</label>
            <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Enter password" name="password" value="JANGAN DISIMPAN" required>
            @if ($errors->get('password'))
            <div class="invalid-feedback" style="display: block;">
              <ul style="list-style: none;">
                @foreach ($errors->get('password') as $errorpassword)
                <li>{{ $errorpassword }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">
            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
            Submit
          </button>
        </form>
      </div>
      <!-- /.card-body -->
    </div>

</section>

<!-- InputMask -->
<script src="{{ url('/adminlte/plugins/js/moment.min.js') }}"></script>
<script src="{{ url('/adminlte/plugins/js/jquery.inputmask.bundle.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ url('/adminlte/plugins/js/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('/adminlte/plugins/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
  //Date range picker
  $('#tgl_lahir').datetimepicker({
    format: 'Y-M-D'
  });
</script>

<script>
  $('#form').submit(() => {
    $('.spinner-border').removeClass('d-none').addClass('d-inline-block')
  })
</script>

@endsection