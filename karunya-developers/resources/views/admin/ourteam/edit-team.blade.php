@extends('admin.layout.main')
@section('title') Edit Team  @endsection
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
        @if ($errors->any())
        <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
      <!-- Row starts -->
      <div class="row gx-3">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">@yield('title')</h5>
            </div>
            <div class="card-body">
            <form action="{{route('teams.update',['team' => $our_team->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
              @method('PUT')
              <!-- Row starts -->
              <div class="row gx-3">
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label" for="a1">Client Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$our_team->name}}">
                        @error('name')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror  
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label" for="a1">Designation <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="designation" placeholder="Enter Title" value="{{$our_team->designation}}">
                        @error('designation')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror  
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                      <label class="form-label" for="a1">Facebook <span class="text-danger">*</span></label>
                      <textarea type="text" class="form-control" name="facebook" placeholder="Enter facebook" value="">{{$our_team->facebook}}</textarea>
                      @error('designation')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
              </div>
              <div class="col-xxl-6 col-lg-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label" for="a1">Twitter <span class="text-danger">*</span></label>
                    <textarea type="text" class="form-control" name="twitter" placeholder="Enter twitter" value="">{{$our_team->twitter}}</textarea>
                    @error('twitter')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror  
                </div>
            </div>
            <div class="col-xxl-6 col-lg-6 col-sm-12">
              <div class="mb-3">
                  <label class="form-label" for="a1">Linkedin <span class="text-danger">*</span></label>
                  <textarea type="text" class="form-control" name="linkedin" placeholder="Enter linkedin" value="">{{$our_team->linkedin}}</textarea>
                  @error('linkedin')
                  <div class="error text-danger">{{ $message }}</div>
                  @enderror  
              </div>
          </div>
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a2">Client Image <span class="text-danger">*</span></label>
                    ( <span>Note:IMG TYPE:- JPEG,PNG,JPG,SIZE:2MB</span>)
                    <input type="file" id="fileInput1" class="form-control file-input" name="image"  >
                    <td><a href="{{asset('assets/dynamics/'.$our_team->image)}}" target="_blank"><img src="{{asset('assets/dynamics/'.$our_team->image)}}" style="width:80px;height:80px;"></a></td>
                    <span id="messagefileInput1" class="text-danger"></span>
                   @error('image')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror 
                </div>
              </div>
              <div class="col-xxl-6 col-lg-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="a2">Priority <span class="text-danger">*</span></label>
                  <input type="number" class="form-control"  name="priority" placeholder="Enter priority " value="{{$our_team->priority}}">
                  @error('priority')
                  <div class="error text-danger">{{ $message }}</div>
                  @enderror 
              </div>
            </div>
            <div class="col-xxl-6 col-lg-6 col-sm-12">
              <div class="mb-3">
                <label class="form-label" for="a2">Status <span class="text-danger">*</span></label>
                <select name="status" id="" class="form-control">
                  <option default >Status</option>
                  <option value="1" {{$our_team->status == 1 ? 'selected' : ''}}>Active</option>
                  <option value="0" {{$our_team->status == 0 ? 'selected' : ''}} >Inactive</option>
                </select>
                @error('status')
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
   
    <script src="https://cdn.ckeditor.com/4.17.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor', {
            toolbar: [
                { name: 'document', items: ['Source'] },
                { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'Undo', 'Redo'] },
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote'] },
                { name: 'insert', items: ['Table'] },
                { name: 'styles', items: ['Styles', 'Format'] },
                { name: 'tools', items: ['Maximize'] },
                { name: 'insert', items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe'] },
              ],
        });
    </script>
    
    @endsection