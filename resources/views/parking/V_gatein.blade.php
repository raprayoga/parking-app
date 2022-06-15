@extends('/template/V_template')

@section('content')

<section class="content">
  <div class="container d-flex justify-content-center">
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Masukkan Nomor Polisi</p>

          <form action="{{ url('parking-gatein') }}" method="post" id="form">
            @csrf
            <div class="input-group mb-3">
              <input type="text" class="form-control  {{ $errors->has('nopol') ? 'error' : '' }}" placeholder="Nomor Polisi" name="nopol">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-scroll"></span>
                </div>
              </div>
              @if ($errors->get('nopol'))
              <div class="invalid-feedback" style="display: block;">
                <ul style="list-style: none;">
                  @foreach ($errors->get('nopol') as $errorNopol)
                  <li>{{ $errorNopol }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
            </div>
            <div class="row">
              <div class="col-4 offset-8">
                <button type="submit" class="btn btn-primary btn-block">
                  <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                  Submit
                </button>
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
  </div>

  <script src="{{ url('/adminlte/plugins/js/moment.min.js') }}"></script>
  <script src="{{ url('/adminlte/plugins/js/Chart.min.js') }}"></script>

</section>

<script>
  $('#form').submit(() => {
    $('.spinner-border').removeClass('d-none').addClass('d-inline-block')
  })
</script>

@if (session()->has('submitsuccess'))
<script>
  Swal.fire({
    icon: 'success',
    title: 'successfully processed',
    text: '<?= session('submitsuccess') ?>'
  })
</script>
@endif

@endsection