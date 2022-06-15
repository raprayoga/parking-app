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
            <label for="email">Foto Profile</label>
            <div class="text-center img-wrap">
              <img src="<?= url('/img/profile/' . $data->photo_profile) ?>" alt="foto profil" class="img-fluid img-profile" style="max-height: 200px; max-width: 200px;">
            </div>
          </div>
          <div class="form-group">
            <div class="custom-file mb-4">
              <input type="file" name="gambarupload" class="custom-file-input" id="gambar-profile" onchange="prvwimg()">
              <label class="custom-file-label" for="gambar-profile">Choose file...</label>
              <small>Tipe file yang diperbolehkan adalah jpg, jpeg, dan png</small>
              <small>max file size 200kb</small>
              @if ($errors->get('photo_profile'))
              <div class="invalid-feedback" style="display: block;">
                <ul style="list-style: none;">
                  @foreach ($errors->get('photo_profile') as $errorphoto_profile)
                  <li>{{ $errorphoto_profile }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
            </div>
          </div>
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
            <label for="Username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" value="{{ $data->username }}" required>
            @if ($errors->get('username'))
            <div class="invalid-feedback" style="display: block;">
              <ul style="list-style: none;">
                @foreach ($errors->get('username') as $errorusername)
                <li>{{ $errorusername }}</li>
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