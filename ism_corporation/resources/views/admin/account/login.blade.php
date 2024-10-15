<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 May 2024 12:45:40 GMT -->
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{$site_setting->site_name}}| Login</title>
      <!-- Meta -->
      <meta name="description" content="Urban Build for Bootstrap Admin Dashboards ">
      <meta property="og:title" content="Urban Build">
      <meta property="og:description" content="Urban Build">
      <meta property="og:type" content="Urban Build">
      <link rel="shortcut icon" href="{{asset('assets/dynamics/setting/'.$site_setting->favicon)}}">
      <!-- *************
         ************ CSS Files *************
         ************* -->
      <link rel="stylesheet" href="{{asset('dash_assets/fonts/remix/remixicon.css')}}">
      <link rel="stylesheet" href="{{asset('dash_assets/css/main.min.css')}}">
   </head>
   <body class="login-bg">
      <!-- Container starts -->
      <div class="container">
         <!-- Auth wrapper starts -->
         <div class="auth-wrapper">
            <!-- Form starts -->
            <form action="{{route('admin.post-login')}}" method="POST">
               @csrf
               <div class="auth-box">
                  <a href="#" class="auth-logo mb-4  p-2">
                  <img class="bg-dark p-2" src="{{asset('assets/dynamics/setting/'.$site_setting->header_logo)}}" alt="Login Logo" >
                  </a>
                  <h4 class="mb-4">Admin Login</h4>
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
                  <div class="mb-3">
                     <label class="form-label" for="email">Your email <span class="text-danger">*</span></label>
                     <input type="text" id="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter your email">
                     @if ($errors->has('email'))
                     <span class="text-danger" role="alert">
                     <strong>{{ $errors->first('email') }}.</strong>
                     </span>
                     @endif
                  </div>
                  <div class="mb-2">
                     <label class="form-label" for="pwd">Your password <span class="text-danger">*</span></label>
                     <input type="password" id="pwd" class="form-control" name="password" placeholder="Enter password">
                     @if ($errors->has('password'))
                     <span class="text-danger" role="alert">
                     <strong>{{ $errors->first('password') }}.</strong>
                     </span>
                     @endif
                  </div>
                  <div class="mb-3 d-grid gap-2">
                     <button type="submit" class="btn btn-primary">Login</button>
                  </div>
               </div>
            </form>
            <!-- Form ends -->
         </div>
         <!-- Auth wrapper ends -->
      </div>
      <!-- Container ends -->
   </body>
   <script src="{{asset('dash_assets/js/jquery.min.js')}}"></script>
   <script src="{{asset('dash_assets/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('dash_assets/js/moment.min.js')}}"></script>
</html>