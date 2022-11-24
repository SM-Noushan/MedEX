@extends('layouts.app')
@push('myCSS')
    <link rel="stylesheet" href="{{ asset('css') }}/prescription.css">
@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">

        @if(Auth::user()->email_verified_at != null)
        <!-- Main content -->
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-md-12 col-xl-10">
        
                @if (!$data)
                <div class="card">
                  <div class="card-header p-3 row">
                    <div class="col">
                      <h5 class="pt-3 mb-0"><i class="fas fa-tasks me-2"></i>Latest Prescription</h5>
                    </div>
                  </div>
                  @endif
                  
                  <div class="card-body">
                    @if (!$data)
                        <div class="alert alert-warning text-center" id="notask" >
                            No Latest Prescription Available
                        </div>
        
                    @else    
                    <div class="main">
                      <div class="header">
                                <h1 class="mb-2">Latest Prescription</h1>
                        <div class="card">
                          <div class="containers">
                            <span style="font-size: 30px">
                              {{ $prescription->doctors->name }}
                            </span><br>
                            <span style="font-size: 20px">
                                            Email: {{ $prescription->doctors->email }} <br>
                                            Contact: {{ $prescription->doctors->phone1 }} <br> 
                                            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                            {{ $prescription->doctors->phone2 }} 
                                        </span> <hr class="m-2 p-0">
                            <span style="font-size: 30px">Patient Name: {{ Auth::user()->userdetail->name }} </span>
                          </div>
                        </div>
                      </div>
                
                      <div class="body"><br>
                                    <div class="row">
                                            <div class="col-lg-4 mb-4">
                                                <div class="card_2">
                                                    <img class="card-img-top size" src="https://www.pngall.com/wp-content/uploads/2/Medicine-PNG-Image-HD.png">
                                  
                                                    <div class="card-body">
                                                        <h3 class="card-title">Notes</h3> &nbsp--------------------------------------
                                                        <textarea id="notes" name="notes" rows="15" cols="30" placeholder="{{ $data->notes }}" disabled></textarea>
                                                        {{-- Show Errors --}}
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-8 mb-4">
                                                <div class="card_2">
                                                    <img class="card-img-top size" src="https://www.pngall.com/wp-content/uploads/2/Medicine-Pills-Background-PNG-Image.png">
                                  
                                                    <div class="card-body">
                                                        <h5 class="card-title">Medicines</h5> &nbsp------------------------------------------------------------------------------------------
                
                
                                                        <table class="table mb-0">
                                                            <thead>
                                                              <tr>
                                                                  <th scope="col">Medicine Name</th>
                                                                  <th scope="col">Schedule</th>
                                                                  <th scope="col">Take Medicine For</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody id="myTable">
                                                              @for ($keys=0; $keys<4; $keys++)
                                                              <tr class="fw-normal">
                                                                  <td class="col-4">
                                                                    {{ $data->name[$keys] }}
                                                                  </td>
                                                                  <td class="col-4">
                                                                    {{ $data->desc[$keys] }}
                                                                  </td>
                                                                  <td class="col-4 text-center">
                                                                    @if ($data->days[$keys] != 0)
                                                                       {{ $data->days[$keys] }}
                                                                       {{ $data->daystype[$keys] }}
                                                                    @elseif ($data->daystype[$keys] == 'continue' )
                                                                        {{ $data->daystype[$keys] }}
                                                                    @endif                  
                                                                  </td>
                                                              </tr>
                                                              @endfor
                                                            </tbody>
                                                          </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                      </div>
                    @endif
        
                  </div>
                  {{-- {{ $todos->links('pagination::bootstrap-5') }} --}}
                  
                @if (!$data)
                </div>
                @endif
        
              </div>
            </div>
        </div>
        @else
        <div class="container py-4">
          <div class="row d-flex">
            <div>
              <p class="lead">
                @if (session()->has('message'))
                  A new verification link has been sent to the email address you provided during registration.
                @else
                  Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?
                @endif
                  If you didn't receive the email, we will gladly send you another.
                <form method="POST" action="{{ route('verification.send') }}">
                  @csrf
                    <button type="submit" class="btn btn-info">
                      @if (session()->has('message'))
                        Resend Verification Email
                      @else
                        Send Verification Email
                      @endif
                    </button>
                </form>
              </p>
            </div>
          </div>
        </div>
        @endif

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
