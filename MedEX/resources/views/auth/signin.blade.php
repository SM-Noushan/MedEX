@extends('layouts.app')

@section('content')

<div class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <a href="{{ url('/') }}" class="h1"><b>MedEx: </b>Signin</a>
          </div>
          <div class="card-body">
            <p class="login-box-msg">Enter your signin information</p>
      
            <form action="{{ route('user.login') }}" method="post">
                @csrf
              <div class="input-group mb-3">
                <input type="text" name="email" class="form-control" placeholder="Email/Username" @if(Cookie::has('usermail')) value={{ Cookie::get('usermail') }} @endif required autocomplete="email" autofocus>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" @if(Cookie::has('userpass')) value={{ Cookie::get('userpass') }} @endif required autocomplete="password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" @if(Cookie::has('remember')) checked @endif>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }} 
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
      
            <p class="mb-1"><a href="{{ route('password.request') }}">Forgot Password?</a> </p>

            <p class="mb-0">Don't have an account?
              <a href="{{ route('user.register') }}">Signup now</a>
            </p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.login-box -->

</div>

@endsection

@push('title')
<script type="text/javascript">
    // // $(document).ready(function(){
        document.title = "Signin";
    //     // bsCustomFileInput.init();
    // // });
</script>
@endpush