@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Doctor's List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Doctor: All</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of All Doctors</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  
                    <thead>
                  <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Degrees</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <tbody value={{ $key=0 }}>
                    @foreach ($doctors as $doctor)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td class="align-middle">{{ $doctor->username }}</td>
                        <td class="align-middle">{{ $doctor->doctordetail->name }}</td>
                        <td class="align-middle">{{ $doctor->doctordetail->department }}</td>
                        <td class="align-middle">{{ $doctor->doctordetail->degrees }}</td>
                        <td class="align-middle">
                            {{ $doctor->doctordetail->phone1 }} <br>
                            {{ $doctor->doctordetail->phone2 }}
                        </td>
                        <td class="align-middle">{{ $doctor->doctordetail->email }}</td>
                        <td class="align-middle text-center"> <img  class="img-thumbnail" width="60" height="50" src="{{ '/'. $doctor->doctordetail->image }}" alt="doc.profile" > </td>
                        <td class="align-middle">
                            <a href="{{ route('admin.doctor.edit', $doctor->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{ route('admin.doctor.delete', $doctor->id) }}" class="btn btn-sm btn-danger delete">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                  {{-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> --}}
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


@push('all-category-page')
<!-- Page specific script -->
<script>
    $(function () {
        document.title = "All Category";
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endpush
