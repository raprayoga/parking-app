@extends('/template/V_template')

@section('content')

<section class="content">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/responsive.bootstrap4.min.css') }}">

  <div class="card">
    <div class="card-header">
      <div class="row">
        <h3 class="card-title">Manage User</h3>
      </div>
      <div class="row mt-3">
        <div class="col-12 text-right">
          <a href="{{ url('/export-parking') }}" class="btn btn-success">Export</a>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr class="text-center">
            <th>ID</th>
            <th>User</th>
            <th>Nopol</th>
            <th>Kode</th>
            <th>IN</th>
            <th>OUT</th>
            <th>Status</th>
            <th>Created At</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $data)
          <tr class="text-center">
            <td>{{ $data->id }}</td>
            <td>{{ $data->user->name }}</td>
            <td>{{ $data->nopol }}</td>
            <td>{{ $data->code }}</td>
            <td>{{ $data->intime }}</td>
            <td>{{ $data->outtime }}</td>
            <td>{{ $data->status }}</td>
            <td>{{ $data->created_at }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}" />

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
        "order": [
          [0, "desc"]
        ]
      });
    });
  </script>

</section>

@endsection