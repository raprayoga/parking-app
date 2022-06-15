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
            <label for="phone">Phone*</label>
            <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="Enter phone" name="phone" value="{{ $data->phone }}" required>
            @if ($errors->get('phone'))
            <div class="invalid-feedback" style="display: block;">
              <ul style="list-style: none;">
                @foreach ($errors->get('phone') as $errorphone)
                <li>{{ $errorphone }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" placeholder="Place some text here" rows="3">{{ $data->alamat }}</textarea>
            <small class="text-primary">Tidak boleh lebih dari 255 karakter</small>
            @if ($errors->get('alamat'))
            <div class="invalid-feedback" style="display: block;">
              <ul style="list-style: none;">
                @foreach ($errors->get('alamat') as $erroralamat)
                <li>{{ $erroralamat }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <div class="form-group">
            <label>Tgl Lahir</label>
            <div class="input-group date" id="tgl_lahir" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#tgl_lahir" name="tgl_lahir" id="tgl_lahir_value" value="{{ $data->tgl_lahir }}" />
              <div class="input-group-append" data-target="#tgl_lahir" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
            @if ($errors->get('tgl_lahir'))
            <div class="invalid-feedback" style="display: block;">
              <ul style="list-style: none;">
                @foreach ($errors->get('tgl_lahir') as $errortgl_lahir)
                <li>{{ $errortgl_lahir }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahirHelp" placeholder="Enter tempat_lahir" name="tempat_lahir" value="{{ $data->tempat_lahir }}">
            @if ($errors->get('tempat_lahir'))
            <div class="invalid-feedback" style="display: block;">
              <ul style="list-style: none;">
                @foreach ($errors->get('tempat_lahir') as $errortempat_lahir)
                <li>{{ $errortempat_lahir }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <div class="form-group">
            <label for="pendidikan">Pendidikan</label>
            <select class="custom-select" id="pendidikan" name="pendidikan">
              <option selected>Choose...</option>
              <option value="sd" <?php if ($data->pendidikan  == 'sd') echo 'selected' ?>>SD</option>
              <option value="smp" <?php if ($data->pendidikan  == 'smp') echo 'selected' ?>>SMP</option>
              <option value="sma" <?php if ($data->pendidikan  == 'sma') echo 'selected' ?>>SMA</option>
              <option value="s1" <?php if ($data->pendidikan  == 's1') echo 'selected' ?>>S1</option>
              <option value="s2" <?php if ($data->pendidikan  == 's2') echo 'selected' ?>>S2</option>
              <option value="s3" <?php if ($data->pendidikan  == 's3') echo 'selected' ?>>S3</option>
              <option value="s1" <?php if ($data->pendidikan  == 'lainnya') echo 'selected' ?>>Lainnya</option>
            </select>
            @if ($errors->get('pendidikan'))
            <div class="invalid-feedback" style="display: block;">
              <ul style="list-style: none;">
                @foreach ($errors->get('pendidikan') as $errorpendidikan)
                <li>{{ $errorpendidikan }}</li>
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