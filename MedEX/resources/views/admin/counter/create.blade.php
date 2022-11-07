@extends('layouts.app')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 mt-5">
                    <div class="card">
                        <div class="card-header">

                            <ol class="breadcrumb float-md-right">
                              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                              <li class="breadcrumb-item active"><a href="{{ route('admin.counter.view') }}">Counter</a></li>
                              <li class="breadcrumb-item active">Add</li>
                            </ol>
                            <strong style="float: left; font-size:1.2em"> Fill The Counter's Information </strong>
                        </div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.counter.create') }}" role="form">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}<span class="text-danger" >*</span></label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus required>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}<span class="text-danger" >*</span></label>
        
                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus required>
        
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}<span class="text-danger" >*</span></label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password" autofocus required>
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" style="float:right">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.content-header -->
    <!-- /.content -->
  </div>

@endsection

@push('title')
<script type="text/javascript">
    $(document).ready(function(){
        document.title = "Counter: Add";
        bsCustomFileInput.init();
    });
</script>
@endpush