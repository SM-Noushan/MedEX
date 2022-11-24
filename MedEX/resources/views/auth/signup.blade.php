@extends('layouts.app')

@section('content')

<div class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <a href="{{ url('/') }}" class="h1"><b>MedEX: </b>Signup</a>
          </div>
          <div class="card-body">
            <p class="login-box-msg">Fill up the signup form</p>
      
            <form action="{{ route('user.register.store') }}" method="post">
            @csrf

              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Full name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>

                @if($errors->has('name'))
                <div class="input-group">
                    <span class="text-danger">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                </div>
                @endif
              </div>

              <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>

                @if($errors->has('email'))
                <div class="input-group">
                    <span class="text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                </div>
                @endif
              </div>

              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="NID or Birth Certificate" name="brn_nid" value="{{ old('brn_nid') }}" maxlength=17 required autocomplete="brn_nid" autofocus>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-id-card-clip" style="width: 0.95rem"></span>
                  </div>
                </div>

                @if($errors->has('brn_nid'))
                <div class="input-group">
                    <span class="text-danger">
                        <strong>{{ $errors->first('brn_nid') }}</strong>
                    </span>
                </div>
                @endif
              </div>

              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>

                @if($errors->has('password'))
                <div class="input-group">
                    <span class="text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                </div>
                @endif
              </div>

              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required autocomplete="password_confirmation">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-8">
                  <div class="text-muted">
                    <span>
                        Already have an account? <a href="{{ url('/') }}">Signin now</a>
                    </span>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
      </div>
</div>
@endsection

@push('title')
<script type="text/javascript">
    $(function(){
        document.title = "Signup";
    });
</script>
@endpush