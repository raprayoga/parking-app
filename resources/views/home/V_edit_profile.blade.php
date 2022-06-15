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
        <form action="{{ url('edit-profile-process') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ $data->email }}" required>
            @if ($errors->get('email'))
            <div class="invalid-feedback" style="display: block;">
              <ul style="list-style: none;">
                @foreach ($errors->get('email') as $errorEmail)
                <li>{{ $errorEmail }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $data->name }}" required>
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
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <!-- /.card-body -->
    </div>

    <script>
      function prvwimg() {
        const gambarProfile = document.querySelector("#gambar-profile");
        const label = document.querySelector(".custom-file-label");
        const imgprvw = document.querySelector(".img-profile");

        label.textContent = gambarProfile.files[0].name;

        const filegambar = new FileReader();
        filegambar.readAsDataURL(gambarProfile.files[0]);

        filegambar.onload = function(e) {
          imgprvw.src = e.target.result;
        };
      }
    </script>

</section>

@endsection