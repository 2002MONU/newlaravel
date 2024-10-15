<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Register </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('assets/font/flaticon.css')}}">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
</head>

<body>
   
    <section class="fxt-template-animation fxt-template-layout34" data-bg-image="{{asset('assets/img/elements/bg1.png')}}">
        <div class="fxt-shape">
            <div class="fxt-transformX-L-50 fxt-transition-delay-1">
                <img src="{{asset('assets/img/elements/shape1.png')}}" alt="Shape">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="fxt-column-wrap justify-content-between">
                        <div class="fxt-animated-img">
                            <div class="fxt-transformX-L-50 fxt-transition-delay-10">
                                <img src="{{asset('assets/img/figure/bg34-1.png')}}" alt="Animated Image">
                            </div>
                        </div>
                        <div class="fxt-transformX-L-50 fxt-transition-delay-3">
                            <a href="login-34.html" class="fxt-logo"><img src="{{asset('assets/img/logo-34.png')}}" alt="Logo"></a>
                        </div>
                        <div class="fxt-transformX-L-50 fxt-transition-delay-5">
                            <div class="fxt-middle-content">
                                <h1 class="fxt-main-title">Sign Up </h1>
                              
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="fxt-column-wrap justify-content-center">
                        <div class="fxt-form">
                            <div id="successMessage" class="alert alert-success" style="display: none;"></div>

                            <!-- Error Messages -->
                            <div id="errorMessages" class="alert alert-danger" style="display: none;">
                                <ul id="errorList"></ul>
                            </div>
                            <form method="POST" action="{{route('user.register')}}" id="registrationForm">
                               
                                <div class="form-group">
                                    <input type="text" id="full_name" class="form-control" name="full_name" placeholder="Full Name" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="email" id="email" class="form-control" name="email" placeholder="E-mail Address" required="required">
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="password***" required="required">
                                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                </div>
                                <div class="form-group">
                                    <input id="confirm_password" type="password" class="form-control" name="confirm_password" placeholder="confirm password********" required="required">
                                    <i toggle="#confirm_password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-checkbox-box">
                                        <input id="checkbox1" type="checkbox" name="checkbox">
                                        <label for="checkbox1" class="ps-4">I agree with <a
                                        class="terms-link" href="#">Terms</a> and <a class="terms-link" href="#">Privacy Policy</a></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="fxt-btn-fill">Sign Up</button>
                                </div>
                            </form>
                        </div>
                        <div class="fxt-style-line">
                            <span>Or Continus with</span>
                        </div>
                        <ul class="fxt-socials">
                            <li class="fxt-google">
                                <a href="#" title="google"><i class="fab fa-google-plus-g"></i></a>
                            </li>
                            <li class="fxt-apple">
                                <a href="#" title="apple"><i class="fab fa-apple"></i></a>
                            </li>
                            <li class="fxt-facebook">
                                <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jquery-->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- Imagesloaded js -->
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <!-- Validator js -->
    <script src="{{asset('assets/js/validator.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#registrationForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the form from submitting the traditional way
    
                // Clear previous messages
                $('#successMessage').hide().text('');
                $('#errorMessages').hide().find('#errorList').empty();
    
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status) {
                            $('#successMessage').text(response.message).show();
                            $('#registrationForm')[0].reset(); // Reset form fields
                        } else {
                            $('#errorMessages').find('#errorList').append('<li>' + response.message + '</li>');
                            $('#errorMessages').show();
                        }
                    },
                    error: function(response) {
                        let errors = response.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('#errorMessages').find('#errorList').append('<li>' + value[0] + '</li>');
                        });
                        $('#errorMessages').show();
                    }
                });
            });
        });
    </script>
</body>


</html>