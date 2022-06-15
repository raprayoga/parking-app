@extends('/template/V_template')

@section('content')

<section class="content">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/responsive.bootstrap4.min.css') }}">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">List Permissions</h3>
      <div class="row">
        <div class="col-12 text-right">
          <a href="{{ url('/permissions/create') }}" class="btn btn-info"><i class="fas fa-plus-circle"></i> Add Permissions</a>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr class="text-center">
            <th>ID</th>
            <th>Nama</th>
            <th>Guard Name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $data)
          <tr class="text-center">
            <td>{{ $data->id }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->guard_name  }}</td>
            <td>{{ $data->created_at  }}</td>
            <td>{{ $data->updated_at  }}</td>
            <td class="text-center">
              <form action="{{ url('/permissions/'.$data->id) }}" onsubmit="return confirm('Do you really want to delete it?');" method="POST">
                @method('DELETE')
                @csrf
                <a href="{{ url('/permissions/'.$data->id.'/edit') }}" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit" style="color: white;"></i></a>
                <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash-alt" style="color: white;"></i></button>
              </form>
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