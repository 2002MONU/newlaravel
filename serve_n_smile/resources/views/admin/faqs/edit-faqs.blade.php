@extends('admin.layout.main')
@section('title') Edit Faqs Question @endsection
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
         @yield('title')
      </li>
   </ol>
</div>
<!-- App Hero header ends -->
<!-- App body starts -->
<div class="app-body">
   <!-- Row starts -->
   <div class="row gx-3">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <h5 class="card-title">@yield('title')</h5>
            </div>
            <div class="card-body">
               <form action="{{route('faqs.update', ['faq' => $faqs->first()->service_id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <!-- Container for dynamic fields -->
                  <div id="questions-container">
                     <div class="row gx-3 mb-3">
                        <div class="col-xxl-6 col-lg-6 col-sm-12">
                           <label class="form-label" for="service">Services <span class="text-danger">*</span></label>
                           <select name="service" class="form-control">
                              @foreach ($services as $service)
                              <option value="{{$service->id}}" {{$faqs->first()->service_id == $service->id ? 'selected' :''}}>{{$service->title}}</option>
                              @endforeach
                           </select>
                           @error('service')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-sm-12">
                           <label class="form-label" for="status">Status <span class="text-danger">*</span></label>
                           <select name="status" class="form-control">
                              <option value="">Status</option>
                              <option value="1" {{$faqs->first()->status == 1 ? 'selected' : ''}}>Active</option>
                              <option value="0" {{$faqs->first()->status == 0 ? 'selected' : ''}}>Inactive</option>
                           </select>
                           @error('status')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                        @foreach ($faqs as $faq)
                        <div class="col-xxl-12 col-lg-12 col-sm-12">
                           <label class="form-label" for="question">Question <span class="text-danger">*</span></label>
                           <textarea type="text" class="form-control" name="question[]" rows="2">{{ $faq->question }}</textarea>
                           @error('question[]')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                        <div class="col-xxl-12 col-lg-12 col-sm-12">
                           <label class="form-label" for="answer">Answer <span class="text-danger">*</span></label>
                           <textarea type="text" class="form-control" name="answer[]" rows="3">{{ $faq->answer }}</textarea>
                           @error('answer[]')
                           <div class="error text-danger">{{ $message }}</div>
                           @enderror 
                        </div>
                        @endforeach
                     </div>
                  </div>
                  <!-- Add more button -->
                  <div class="mb-3">
                     <button type="button" class="btn btn-secondary" id="add-more">Add More Question</button>
                  </div>
                  <!-- Row ends -->
                  <div class="col-sm-12">
                     <div class="d-flex gap-2 justify-content-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- Row ends -->
</div>
<!-- App body ends -->

<!-- JavaScript to dynamically add fields -->
<script>
   document.getElementById('add-more').addEventListener('click', function () {
       var container = document.getElementById('questions-container');
       var newQuestion = document.createElement('div');
       newQuestion.classList.add('row', 'gx-3', 'mb-3');
       
       newQuestion.innerHTML = `
           <div class="col-xxl-12 col-lg-12 col-sm-12">
               <label class="form-label" for="question">Question <span class="text-danger">*</span></label>
               <textarea type="text" class="form-control" name="question[]" rows="2"></textarea>
           </div>
           <div class="col-xxl-12 col-lg-12 col-sm-12">
               <label class="form-label" for="answer">Answer <span class="text-danger">*</span></label>
               <textarea type="text" class="form-control" name="answer[]" rows="3"></textarea>
           </div>
       `;
       
       container.appendChild(newQuestion);
   });
</script>
@endsection
