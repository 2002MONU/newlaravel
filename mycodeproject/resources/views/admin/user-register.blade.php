<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
</head>
<style>
    .gradient-custom-3 {
/* fallback for old browsers */
background: #84fab0;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
}
.gradient-custom-4 {
/* fallback for old browsers */
background: #84fab0;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
}
</style>
<body>
    <section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form action="{{route('user-register-post')}}" method="POST">
                @csrf
                  <div data-mdb-input-init class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name="name" class="form-control " />
                  <label class="form-label" for="form3Example1cg">Your Name</label><br>
                  @error('name')
                    <span class="alert alert-danger">{{$message}}</span>
                  @enderror
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" name="email" class="form-control " />
                  <label class="form-label" for="form3Example3cg">Your Email</label><br>
                  @error('email')
                  <span class="alert alert-danger">{{$message}}</span>
                @enderror
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="form3Example3cg" name="mobile_no" class="form-control " />
                    <label class="form-label" for="form3Example3cg">Your Mobile No</label><br>
                    @error('mobile_no')
                      <span class="alert alert-danger">{{$message}}</span>
                    @enderror
                    </div>
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" name="password" class="form-control " />
                  <label class="form-label" for="form3Example4cg">Password</label><br>
                  @error('password')
                  <span class="alert alert-danger">{{$message}}</span>
                @enderror
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" name="confirm_password" class="form-control " />
                  <label class="form-label" for="form3Example4cdg">Confirm  password</label><br>
                  @error('confirm_password')
                  <span class="alert alert-danger">{{$message}}</span>
                @enderror
                </div>
                <div class="d-flex justify-content-center">
                  <button  type="submit" data-mdb-button-init
                    data-mdb-ripple-init class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{route('user-login')}}"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
</body>
</html>