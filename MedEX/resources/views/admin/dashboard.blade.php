@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="ml-4">Welcome, Admin</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Main content -->
        <section class="content">
          <div class="row m-4">
            <div class="col-xl-6">
              <div class="bg-warning p-2">
              <div class="inner">
                <h3>{{ $counters_count }}</h3>
                <p>Registered Counters</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-notes-medical"></i>
              </div>
              <a href="{{ route('admin.counter.view') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
            </div>

            <div class="col-xl-6">
                <div class="bg-success p-2">
                  <div class="inner">
                    <h3>{{ $users_count }}</h3>

                    <p>Registered Users</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-plus"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
            </div>
          </div>


          <div class="row m-4">
            <div class="col-xl-6">
              <div class="bg-info p-2">
              <div class="inner">
                <h3>#</h3>
                <p>...</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
            </div>

            <div class="col-xl-6">
                <div class="bg-primary p-2">
                  <div class="inner">
                    <h3>{{ $doctors_count }}</h3>
                    <p>Registered Doctors</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-md"></i>
                  </div>
                  <a href="{{ route('admin.doctor.view') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
            </div>
          </div>
        </section>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
