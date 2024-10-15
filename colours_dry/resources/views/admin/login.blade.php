@include('admin.layout.header')
@section('title')
Login
@endsection
 <div class="main-content h-100vh" style="background-image: url('{{ asset('admin/img/bg-img/bgimg.jpeg') }}');">

    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-md-8 col-lg-5">
                <!-- Middle Box -->
                <div class="middle-box">
                    <div class="card">
                       
                        <div class="card-body p-4">
                            <h4 class="font-24 mb-30"> Admin Log in.</h4>
                            @if ($message = Session::get('success'))
                        <div class="alert bg-info text-white">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                           {{ $message }}
                        </div>
                        @endif
                        @if ($message = Session::get('error'))
                        <div class="alert bg-danger text-white">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                           {{ $message }}
                        </div>
                        @endif
                            <form action="{{ route('admin.login') }}" method="POST">
                                @csrf
                             
                                <div class="form-group">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                               

                                <div class="form-group mb-0 mt-15">
                                    <button class="btn btn-primary btn-block" type="submit">Log In</button>
                                </div>

                                {{-- <div class="text-center mt-15"><span class="mr-2 font-13 font-weight-bold">Don't have an account?</span><a class="font-13 font-weight-bold" href="{{ route('register') }}">Sign up</a></div> --}}

                            </form>

                            <!-- end card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('admin.layout.footer')