@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="ml-4">Doctor's Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Main content -->
        <div class="container py-5 h-10">
            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-md-12 col-xl-10">
                
                <div class="row mb-2 ml-1">
                    
                </div>
        
                <div class="card">
                  <div class="card-header p-3 row">
                    <div class="col">
                      <h5 class="pt-3 mb-0"><i class="fas fa-tasks me-2"></i>Patient List</h5>
                    </div>
                  </div>
                  
                  <div class="card-body">
                    @if (false)
                        <div class="alert alert-warning text-center" id="notask" >
                            No Patient in the Queue
                        </div>
        
                    @else    
                    <table class="table mb-0">
                      <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">Assigned By</th>
                            <th scope="col">Records</th>
                            <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody id="myTable">
                        @foreach ($queuelists as $key => $queue)
                        <tr class="fw-normal">
                            <th id=""> {{ ++$key }} </th>
                            <td>{{ $queue->users->name }}</td>
                            <td>{{ $queue->counters->countername }}</td>
                            <td class="pl-3">
                                <a href="#"><button type="submit" class="btn btn-sm btn-info">View</button> </a>
                            </td>
                            <td class="pl-1">
                                <a href="{{ route('doctor.prescribe.form', $queue->user_id) }}"><button class="btn btn-sm btn-success">Prescribe</button> </a>
                            </td>
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
