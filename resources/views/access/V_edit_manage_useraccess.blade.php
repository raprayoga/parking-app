@extends('/template/V_template')

@section('content')

<section class="content">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/responsive.bootstrap4.min.css') }}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/select2.css') }}">
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/select2-bootstrap4.min.css') }}">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Roles</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="container">
        <form action="{{ url('admin-access/'.$data['id']) }}" method="post">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="roles">Nama Admin*</label>
            <input type="text" class="form-control" id="roles" aria-describedby="rolesHelp" placeholder="Enter Admin" name="roles" value="{{ $data['username'] }}" required>
          </div>
          <div class="form-group">
            <label>Roles</label>
            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="roles" style="width: 100%;">
              <option selected> Select Role </option>
              @foreach ($data['roles_list'] as $role)
              <option value="{{ $role->name }}" <?php if (in_array($role->name, $data['roles'])) echo 'selected' ?>>{{ $role->name }}</option>
              @endforeach
            </select>
            @if ($errors->get('roles'))
            <div class="invalid-feedback" style="display: block;">
              <ul style="list-style: none;">
                @foreach ($errors->get('roles') as $errorroles)
                <li>{{ $errorroles }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <div class="form-group">
            <label>Permissions</label>
            <div class="select2-purple">
              <select class="select2" multiple="multiple" data-placeholder="Select a Permission" data-dropdown-css-class="select2-purple" name="permissions[]" style="width: 100%;">
                @foreach ($data['permissions_list'] as $permission)
                <option value="{{ $permission->name }}" <?php if (in_array($permission->name, $data['permissions'])) echo 'selected' ?>>{{ $permission->name }}</option>
                @endforeach
              </select>
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

<!-- Select2 -->
<script src="{{ url('/adminlte/plugins/js/select2.full.min.js') }}"></script>

<script>
  $('#form').submit(() => {
    $('.spinner-border').removeClass('d-none').addClass('d-inline-block')
  })

  $('.select2').select2({
    closeOnSelect: false
  })
</script>

@endsection