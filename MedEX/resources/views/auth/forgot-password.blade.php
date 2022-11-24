@extends('layouts.app')

@section('content')

<div class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h1"><b>MedEX: </b>Request</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg text-justify">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                <form action="{{ route('password.request') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" autofocus>
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
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
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
        document.title = "Password Request";
</script>
@endpush