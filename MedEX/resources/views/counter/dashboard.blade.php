@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="ml-4">Counter #</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Main content -->
        <div class="container py-5 h-10">
            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-md-12 col-xl-10">
                
                <div class="card">
                    <div class="card-header p-3">
                    <form class="" method="post" action="{{ route('counter.queue.add') }}">
                        @csrf
                     <div class="form-row">
                      <div class="col-4">
                        <input type="text" name="patient_name" list="datalistOptions" class="form-control" placeholder="Patient Name">
                        <datalist id="datalistOptions">
                            <option value="Abu Sakib - molla@molla">
                            <option value="SM Pavel - pavel@mail">
                        </datalist>
                      </div>  
                      <div class="col-6">
                        <input type="text" class="form-control" placeholder="Doctor Name" name="doctor_name" list="datalistOption">
                        <datalist id="datalistOption" >
                            <option value="Dr. Json - id7">
                            <option value="Dr. Ajax - id1">
                        </datalist>
                      </div>  
                      <div class="col">
                        <button type="submit" class="btn btn-primary" style="float: right">Schedule</button>
                      </div>  
                     </div>
                    </form>
                    </div>
                </div>
                <div class="row mb-2 ml-1">
                    
                </div>
        
                <div class="card">
                  <div class="card-header p-3 row">
                    <div class="col">
                      <h5 class="pt-3 mb-0"><i class="fas fa-tasks me-2"></i>Patient Queue</h5>
                    </div>
                  </div>
                  
                  <div class="card-body">
                    @if ($queuelists->isEmpty())
                        <div class="alert alert-warning text-center" id="notask" >
                            No Patient in the Queue
                        </div>
        
                    @else    
                    <table class="table mb-0">
                      <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Assigned on</th>
                        </tr>
                      </thead>
                      <tbody id="myTable">
                        @foreach ($queuelists as $key => $queue)
                        <tr class="fw-normal">
                          <th id=""> {{ ++$key }} </th>
                          <td>{{ $queue->users->name }}</td>
                          <td>{{ $queue->doctors->name }}</td>
                          <td>{{ date('d F Y, h:i A', strtotime($queue->created_at)) }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @endif
        
                  </div>
                  {{-- {{ $todos->links('pagination::bootstrap-5') }} --}}
        
                </div>
        
              </div>
            </div>
          </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
