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
          <a href="{{ url('/manage-user/create') }}" class="btn btn-info"><i class="fas fa-plus-circle"></i> Tambah User</a>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr class="text-center">
            <th>ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Alamat</th>
            <th>Tgl Lahir</th>
            <th>Tempat Lahir</th>
            <th>Pendidikan</th>
            <th>Photo</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $data)
          <tr class="text-center">
            <td>{{ $data->id }}</td>
            <td>{{ $data->username }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->phone }}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->tgl_lahir }}</td>
            <td>{{ $data->tempat_lahir }}</td>
            <td>{{ $data->pendidikan }}</td>
            <td><img src="<?= env('BACKEND_CLIENT_URL') . '/img/profile/' . $data->photo_profile ?>" alt="profile" style="height: 100px;" class="img-fluid img-thumbnail"></td>
            <td>{{ $data->created_at }}</td>
            <td class="text-center">
              <form action="{{ url('/manage-user/'.$data->id) }}" onsubmit="return confirm('Do you really want to delete it?');" method="POST">
                @method('DELETE')
                @csrf
                <a href="{{ url('/manage-user/'.$data->id.'/edit') }}" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit" style="color: white;"></i></a>
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