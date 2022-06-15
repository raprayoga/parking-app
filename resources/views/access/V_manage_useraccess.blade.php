@extends('/template/V_template')

@section('content')

<section class="content">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/responsive.bootstrap4.min.css') }}">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">List Roles</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr class="text-center">
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Permissions</th>
            <th>Created At</th>
            <th>Updated At</th>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $data)
          <tr class="text-center">
            <td>{{ $data->id }}</td>
            <td>{{ $data->username }}</td>
            <td>{{ $data->email  }}</td>
            <td>
              @foreach ($data->roles as $role)
              <div class="btn btn-outline-info btn-sm">{{ $role->name }}</div>
              @endforeach
            </td>
            <td>
              @foreach ($data->permissions as $permission)
              <div class="btn btn-outline-info btn-sm">{{ $permission->name }}</div>
              @endforeach
            </td>
            <td>{{ $data->created_at  }}</td>
            <td>{{ $data->updated_at  }}</td>
            <td class="text-center">
              <a href="{{ url('/admin-access/'.$data->id.'/edit') }}" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit" style="color: white;"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  <!-- DataTables -->
  <script src="{{ url('/adminlte/plugins/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('/adminlte/plugins/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ url('/adminlte/plugins/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ url('/adminlte/plugins/js/responsive.bootstrap4.min.js') }}"></script>

  <!-- AdminLTE App -->

  <script>
    $(function() {
      $(" #example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>

</section>

@endsection