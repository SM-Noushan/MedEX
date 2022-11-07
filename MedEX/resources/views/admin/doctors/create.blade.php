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
                              <li class="breadcrumb-item active"><a href="{{ route('admin.doctor.view') }}">Doctor</a></li>
                              <li class="breadcrumb-item active">Add</li>
                            </ol>
                            <strong style="float: left; font-size:1.2em"> Fill The Doctor's Information </strong>
                        </div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.doctor.create') }}" role="form" enctype="multipart/form-data">
                                @csrf
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

                                <hr class="divider bg-dark my-3">

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}<span class="text-danger" >*</span></label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus required>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

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
                                    <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}<span class="text-danger" >*</span></label>
        
                                    <div class="col-md-6">
                                        <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" autocomplete="department" autofocus required>
        
                                        @error('department')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="degree" class="col-md-4 col-form-label text-md-right">{{ __('Degree') }}<span class="text-danger">*</span></label>
        
                                    <div class="col-md-6">
                                        <textarea id="degree" class="form-control @error('degree') is-invalid @enderror" name="degree" rows="3" autocomplete="degree" autofocus required>{{ old('degree') }}</textarea>
        
                                        @error('degree')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-right">{{ __('Phones') }}<span class="text-danger" >*</span></label>
        
                                    <div class="col-md-3">
                                        <input id="phone1" type="tel" class="form-control @error('phone1') is-invalid @enderror" name="phone1" value="{{ old('phone1') }}" autocomplete="phone1" autofocus required>
        
                                        @error('phone1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <input id="phone2" type="tel" class="form-control @error('phone2') is-invalid @enderror" name="phone2" value="{{ old('phone2') }}" autocomplete="phone2" placeholder="(optional)" autofocus/>
        
                                        @error('phone2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="bloodgroup" class="col-md-4 col-form-label text-md-right">{{ __('Bloodgroup') }}<span class="text-danger" >*</span></label>
                                    <div class="col-md-3">
                                        <select class="form-control @error('bloodgroup') is-invalid @enderror" name="bloodgroup" id="bloodgroup" required> 
                                                <option value="Select"  selected > --Select-- </option>    
                                                <option value="A pos" > A pos </option>    
                                                <option value="B pos" > B pos </option>    
                                                <option value="O pos" > O pos </option>    
                                                <option value="AB pos" > AB pos </option>    
                                                <option value="AB neg" > Ab neg </option>    
                                                <option value="O neg" > O neg </option>    
                                                <option value="B neg" > B neg</option>    
                                                <option value="A neg" > A neg</option>    
                                        </select>
                                        @error('bloodgroup')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                        {{-- <label  class="col-md-4 col-form-label">{{ __('Sex') }}<span class="text-danger" >*</span> --}}
                                            <div class="col-md-4 col-form-label inline"> <strong class="pr-4"> {{ __('Sex') }}<span class="text-danger" >*</span> </strong>
                                                <input type="radio" name="gender"  id="gender" value="Male" required>
                                                <label for="gender" class="mr-2">Male</label>
                                                <input type="radio" name="gender"  id="gender" value="Female" required>
                                                <label for="gender" class="mr-2">Female</label>
                                                <input type="radio" name="gender"  id="gender" value="Other" required>
                                                <label for="gender">Other</label>
                                            </div>
                                            
                                        {{-- </label> --}}

                                </div>

                                <div class="row mb-3">
                                    <label for="religion" class="col-md-4 col-form-label text-md-right">{{ __('Religion') }}<span class="text-danger" >*</span></label>
        
                                    <div class="col-md-6">
                                        <select class="form-control @error('religion') is-invalid @enderror" name="religion" id="religion" required> 
                                                <option value="Select"  selected > --Select-- </option>    
                                                <option value="Islam" > Islam </option>    
                                                <option value="Hinduism" > Hinduism </option>    
                                                <option value="Christianity" > Christianity </option>    
                                                <option value="Buddhism" > Buddhism </option>       
                                                <option value="Other" > Other </option>       
                                        </select>
                                        @error('religion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                

                                <div class="row mb-3">
                                    <div class="col-md-4 text-md-right col-form-label py-0">
                                    <label class="col-form-label">{{ __('Image') }}<span class="text-danger" >*</span></label></div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="imagefile">Select Photo</label>
                                                <input type="file" class="custom-file-input @error('imagefile') is-invalid @enderror" id="imagefile" name="imagefile" required>

                                                @error('imagefile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
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
        document.title = "Doctor: Add";
        bsCustomFileInput.init();
    });
</script>
@endpush