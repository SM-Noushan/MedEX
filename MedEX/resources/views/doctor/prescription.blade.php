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
        <div class="main">
			<div class="header">
                <h1 class="mb-2">Prescription Form</h1>
				<div class="card">
					<div class="containers">
						<span style="font-size: 30px">{{ Auth::guard('doctor')->user()->doctordetail->name }}</span><br>
						<span style="font-size: 20px">
                            Email: {{ Auth::guard('doctor')->user()->doctordetail->email }} <br>
                            Contact: {{ Auth::guard('doctor')->user()->doctordetail->phone1 }} <br> 
                            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                            {{ Auth::guard('doctor')->user()->doctordetail->phone2 }} 
                        </span> <hr class="m-2 p-0">
						<span style="font-size: 30px">Patient Name: {{ $user->name }}</span>
					</div>
				</div>
			</div>

			<div class="body"><br>

                <form action="{{ route('doctor.prescribe.store', $user->user_id) }}" method="post">
                    @csrf
                    <div class="row">
                            <div class="col-lg-4 mb-4">
                                <div class="card_2">
                                    <img class="card-img-top size" src="https://www.pngall.com/wp-content/uploads/2/Medicine-PNG-Image-HD.png">
                  
                                    <div class="card-body">
                                        <h3 class="card-title">Notes</h3> &nbsp--------------------------------------------------------
                                        <textarea id="notes" name="notes" rows="15" cols="43" placeholder="Write Down Suggessions For Patients" value="{{ old('notes') }}"></textarea>
                                        {{-- Show Errors --}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 mb-4">
                                <div class="card_2">
                                    <img class="card-img-top size" src="https://www.pngall.com/wp-content/uploads/2/Medicine-Pills-Background-PNG-Image.png">
                  
                                    <div class="card-body">
                                        <h5 class="card-title">Medicines</h5> &nbsp---------------------------------------------------------------------------------------------------------------------------


                                        <table class="table mb-0">
                                            <thead>
                                              <tr>
                                                  <th scope="col">Medicine Name</th>
                                                  <th scope="col">Schedule</th>
                                                  <th scope="col">Take Medicine For</th>
                                              </tr>
                                            </thead>
                                            <tbody id="myTable">
                                              @for ($keys=1; $keys<5; $keys++)
                                              <tr class="fw-normal">
                                                  <th class="col-6" style="width: 40%">
                                                    <input type="text" name="name[]">
                                                  </th>
                                                  <td class="col-2">
                                                    <input type="text" name="desc[]" placeholder="eg 1-0-2">
                                                  </td>
                                                  <td class="col">
                                                    <select  style="width: 35%" name="days[]">
                                                        <option value="none" selected disabled hidden> </option>
                                                        <option value="0" selected>0</option>
                                                        @for ($key=1; $key<32; $key++)
                                                        <option value="{{ $key }}">{{ $key }}</option>
                                                        @endfor
                                                      </select>
                                                      <select  style="width: 60%" name=daystype[]> 
                                                        <option value="day" selected>Days</option>
                                                        <option value="week">Weeks</option>
                                                        <option value="month">Months</option>
                                                        <option value="continue">Continue</option>
                                                      </select>
                                                  </td>
                                              </tr>
                                              @endfor
                                            </tbody>
                                          </table>
                                        <input type="submit" value="Done">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
	  </div>
    

      </div><!-- /.container-fluid -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
