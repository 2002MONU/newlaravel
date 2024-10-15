@extends('admin.layout.main')
@section('title')Change Password  @endsection
@section('maindashboard')
 <!-- App container starts -->
 

    <!-- App hero header starts -->
    <div class="app-hero-header d-flex align-items-center">

      <!-- Breadcrumb starts -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
          <a href="{{route('admin.dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item text-primary" aria-current="page">
            <a href="javascript:history.back()"> Back</a>
        </li>
        <li class="breadcrumb-item text-primary" aria-current="page">
            Change Password
        </li>
       
      </ol>
      <!-- Breadcrumb ends -->
     </div>
    <!-- App Hero header ends -->

    <!-- App body starts -->
    <div class="app-body">
        @if(session('success'))
        <div class="alert bg-success text-white alert-dismissible fade show" role="alert">
            {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('error'))
        <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
            {{session('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
      <!-- Row starts -->
      <div class="row gx-3">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Change Password</h5>
            </div>
            <div class="card-body">
            <form id="passwordForm" action="{{route('admin.change-password-post')}}" method="POST" enctype="multipart/form-data">
                @csrf
               
              <!-- Row starts -->
              <div class="row gx-3">
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a1">Current Password</label>
                    <input type="password" class="form-control" name="old_password"  placeholder="Enter current password">
                    @error('old_password')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror  
                </div>
                </div>
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">New Password</label>
                      <input type="password" class="form-control" name="new_password" id="password" placeholder="Enter new password">
                      <span id="passwordError" class="error text-danger"></span>
                      @error('new_password')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Confirm Password</label>
                      <input type="password" class="form-control" name="confirm_password"  placeholder="Enter confirm password">
                      @error('confirm_password')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                 <div class="col-sm-12">
                  <div class="d-flex gap-2 justify-content-end">
                    <button class="btn btn-primary" type="submit">
                      Submit
                    </button>
                  </div>
                </div>
              </div>
              <!-- Row ends -->
            </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Row ends -->

    </div>
    <!-- App body ends -->
   
    <script>
      document.getElementById('password').addEventListener('input', function() {
          const password = this.value;
          const errorElement = document.getElementById('passwordError');

          if (password.length < 8) {
              errorElement.textContent = 'Password must be at least 8 characters long.';
          } else if (!password.includes('@')) {
              errorElement.textContent = 'Password must contain an @ sign.';
          } else {
              errorElement.textContent = '';
          }
      });

      document.getElementById('passwordForm').addEventListener('submit', function(event) {
          const password = document.getElementById('password').value;
          const errorElement = document.getElementById('passwordError');

          if (password.length < 8 || !password.includes('@')) {
              event.preventDefault();
              errorElement.textContent = 'Password must be at least 8 characters long and contain an @ sign.';
          }
      });
  </script>
@endsection
