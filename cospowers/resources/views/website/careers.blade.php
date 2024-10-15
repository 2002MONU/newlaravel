@extends('website.layouts.app')
@section('mainwebsite')
<!-- breadcrumb begin -->
<div class="breadcrumb-murtes" style="background: url({{asset('assets/dynamics/'.$site_setting->career_banner)}})">
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-xl-6 col-lg-6">
               <div class="breadcrumb-content text-center">
                   <h2>Career</h2>
                   <ul>
                       <li><a href="{{route('home.index')}}">Home</a></li>
                       <li>Career</li>
                   </ul>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- breadcrumb end -->

<!-- Partner Section Start -->

<div class="rs-patter-section ">

<div class="container">  
<div class="row align-items-center">

   <div class="col-lg-12">
@if (session('success'))
   <div class="alert alert-success">{{session('success')}}</div>    
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

       <div class="list-group">
        @foreach ($careers as $career)
        <div class="list-group-item">
            <div class="row align-item-center">
                <div class="col-md">
                    <h6>{{$career->job_name}}</h6>
                    <p class="mb-0">
                       {{$career->description}} </p>
                    <ul class="editor">
                                                           
                        <li><i class="fas fa-map-marker-alt mr-2"></i>{{$career->location}}</li>
                        
                        <li><i class="fas fa-clock mr-2"></i>{{$career->job_type}}</li> 
                        <li><i class="fas fa-briefcase mr-2"></i>{{$career->job_title}}</li> 
                        <li><i class="fas fa-user mr-2"></i>{{$career->job_time}}</li>
                    </ul>
                    
                </div>
                <div class="col-md-auto">
                    <a type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success res-center" class="btn btn-success res-center">Apply Now</a>
                </div>
            </div>                                                   
        </div>
        @endforeach
               
              
       </div>
   </div>
</div>
</div>
</div>
</div>
<!-- Partner Section End -->  

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Enquiry Now</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
    <form method="POST" action="{{route('home.careers-enquiry')}}" enctype="multipart/form-data" id="careersForm">
        @csrf
        <div class="form-group">
            <input type="text" name="full_name" class="form-control" placeholder="Enter Name" id="fullName" value="{{old('full_name')}}">
            <span class="text-danger" id="fullNameError"></span>
            @error('full_name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter Email" id="email" value="{{old('email')}}">
            <span class="text-danger" id="emailError"></span>
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" name="mobile_no" class="form-control" placeholder="Enter Number" id="mobileNo" value="{{old('mobile_no')}}">
           <span class="text-danger" id="mobileNoError"></span>
            @error('mobile_no')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" name="subject" class="form-control" placeholder="Enter Subject" id="subject" value="{{old('subject')}}">
            <span class="text-danger" id="subjectError"></span>
            @error('subject')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputGroupFile01">Upload Resume (PDF,WordFile)</label>
            <input type="file" name="resume" class="form-control" id="resume">
            <span class="text-danger" id="resumeError"></span>
            @error('resume')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <textarea class="form-control" name="message" placeholder="Enter Message" rows="3" id="message">{{old('message')}}</textarea>
            <span class="text-danger" id="messageError"></span>
            @error('message')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn banner-button" id="submitBtn">Submit</button>
        </div>
    </form>
</div>

</div>
</div>
</div>
<script>
document.getElementById('careersForm').addEventListener('submit', function(e) {
    let isValid = true;
    
    // Clear previous error messages
    document.getElementById('fullNameError').textContent = '';
    document.getElementById('emailError').textContent = '';
    document.getElementById('mobileNoError').textContent = '';
    document.getElementById('subjectError').textContent = '';
    document.getElementById('resumeError').textContent = '';
    document.getElementById('messageError').textContent = '';

    // Validate Full Name
    let fullName = document.getElementById('fullName').value.trim();
    if (fullName === '') {
        document.getElementById('fullNameError').textContent = 'Full Name is required';
        isValid = false;
    }

    // Validate Email
    let email = document.getElementById('email').value.trim();
    if (email === '') {
        document.getElementById('emailError').textContent = 'Email is required';
        isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address';
        isValid = false;
    }

    // Validate Mobile Number
    let mobileNo = document.getElementById('mobileNo').value.trim();
    if (mobileNo === '') {
        document.getElementById('mobileNoError').textContent = 'Mobile Number is required';
        isValid = false;
    } else if (!/^\d{10}$/.test(mobileNo)) {
        document.getElementById('mobileNoError').textContent = 'Mobile number must be exactly 10 digits';
        isValid = false;
    }

    // Validate Subject
    let subject = document.getElementById('subject').value.trim();
    if (subject === '') {
        document.getElementById('subjectError').textContent = 'Subject is required';
        isValid = false;
    }

    // Validate Resume File Type (PDF and Word)
    let resume = document.getElementById('resume').files[0];
    if (!resume) {
        document.getElementById('resumeError').textContent = 'Resume is required';
        isValid = false;
    } else if (!/\.(pdf|doc|docx)$/i.test(resume.name)) {
        document.getElementById('resumeError').textContent = 'Only PDF or Word files are allowed';
        isValid = false;
    }

    // Validate Message
    let message = document.getElementById('message').value.trim();
    if (message === '') {
        document.getElementById('messageError').textContent = 'Message is required';
        isValid = false;
    }

    // If form is invalid, prevent submission
    if (!isValid) {
        e.preventDefault();
    }
});

// Real-time validation for Mobile Number
document.getElementById('mobileNo').addEventListener('input', function() {
    let mobileNo = this.value.trim();
    const mobileNoError = document.getElementById('mobileNoError');

    // Clear any previous error message
    mobileNoError.textContent = '';

    if (mobileNo === '') {
        mobileNoError.textContent = 'Mobile Number is required';
    } else if (!/^\d{10}$/.test(mobileNo)) {
        mobileNoError.textContent = 'Mobile number must be exactly 10 digits';
    }
});

// Prevent non-numeric characters in Mobile Number field
document.getElementById('mobileNo').addEventListener('keypress', function(e) {
    if (e.which < 48 || e.which > 57) {
        e.preventDefault();
    }
});
</script>
@endsection