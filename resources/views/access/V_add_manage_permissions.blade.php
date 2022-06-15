@extends('/template/V_template')

@section('content')

<section class="content">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/responsive.bootstrap4.min.css') }}">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Add Permisions</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="container">
        <form action="{{ url('permissions') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="permissions">Nama Permissions*</label>
            <input type="text" class="form-control" id="permissions" aria-describedby="permissionsHelp" placeholder="Enter Permission" name="permissions" value="{{ old('permissions') }}" required>
            @if ($errors->get('permissions'))
            <div class="invalid-feedback" style="display: block;">
              <ul style="list-style: none;">
                @foreach ($errors->get('permissions') as $errorpermissions)
                <li>{{ $errorpermissions }}</li>
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

<script>
  $('#form').submit(() => {
    $('.spinner-border').removeClass('d-none').addClass('d-inline-block')
  })
</script>

@endsection