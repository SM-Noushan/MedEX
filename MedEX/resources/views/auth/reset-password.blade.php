@extends('layouts.app')

@section('content')
<div class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h1"><b>MedEX: </b>Reset</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">You are only one step a way, recover your password now.</p>
                <form action="{{ route('password.reset') }}" method="post">
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->token }}">
                    <!-- Password Reset Email -->
                    <input type="hidden" name="email" value="{{ $request->email }}">

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
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
                        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Reset password</button>
                        </div>
                    <!-- /.col -->
                    </div>
                </form>
                <p class="mt-3 mb-1 text-muted">
                    Back To <a href="{{ url('/') }}">Signin</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
<!-- /.login-box -->
</div>
@endsection
    
@push('title')
<script type="text/javascript">
        document.title = "Password Reset";
</script>
@endpush