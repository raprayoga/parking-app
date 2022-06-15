@extends('/template/V_template')

@section('content')

<section class="content">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/responsive.bootstrap4.min.css') }}">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Admin Profile</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="container">
        <div class="row mt-3">
          <div class="col-5 col-md-3 text-right">
            Nem :
          </div>
          <div class="col-7 col-md-9 text-left">
            {{ $data->name }}
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-5 col-md-3 text-right">
            Email :
          </div>
          <div class="col-7 col-md-9 text-left">
            {{ $data->email }}
          </div>
        </div>
        <div class="row mt-1 text-right">
          <div class="col-4 offset-8">
            <a class="btn btn-sm btn-info" href="{{ url('edit-profile') }}">Edit Profile</a>
          </div>
        </div>
        <div class=" row mt-3">
          <div class="col-5 col-md-3 text-right">
            Passwod :
          </div>
          <div class="col-7 col-md-9 text-left">
            ********
          </div>
        </div>
        <div class="row mt-1 text-right">
          <div class="col-4 offset-8">
            <a class="btn btn-sm btn-info text-right" href="{{ url('edit-password') }}">Change Password</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>

  <!-- AdminLTE App -->

  @if (session()->has('updatesuccess'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'successfully processed',
      text: '<?= session('updatesuccess') ?>'
    })
  </script>
  @endif

</section>

@endsection