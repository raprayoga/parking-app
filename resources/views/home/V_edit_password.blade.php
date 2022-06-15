@extends('/template/V_template')

@section('content')

<section class="content">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/responsive.bootstrap4.min.css') }}">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Profile</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="container">
        <form action="{{ url('edit-password-process') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="password_lama">Password Lama</label>
            <input type="password" class="form-control" id="password_lama" aria-describedby="emailHelp" placeholder="Enter Password" name="password_lama" required>
            @if ($errors->get('password_lama'))
            <div class="invalid-feedback" style="display: block;">
              <ul style="list-style: none;">
                @foreach ($errors->get('password_lama') as $errorpassword_lama)
                <li>{{ $errorpassword_lama }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <div class="form-group">
            <label for="password">Password Baru</label>
            <input type="password" class="form-control" id="password" placeholder="Enter Password Baru" name="password" minlength="8" required>
            <small style="color: red;">Password minimal 8 karakter dengan kombinasi huruf, angka, dan simbol</small>
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
          <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" id="password_confirmation" placeholder="Enter Konfirmasi Password Baru" name="password_confirmation" minlength="8" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <!-- /.card-body -->
    </div>

    @if (session()->has('updateerror'))
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops... failed to process',
        text: '<?= session('updateerror') ?>'
      })
    </script>
    @endif

</section>

@endsection