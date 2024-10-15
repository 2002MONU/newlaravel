</div>
</div>

<!-- Footer Area -->
<div class="container-fluid" style=" position: fixed;
left: 0;
bottom: 0;
/* top:10%; */
width: 100%;
text-align: center;">
    {{-- <div class="row">
        <div class="col-12">
            <!-- Footer Area -->
            <footer class="footer-area d-flex align-items-center flex-wrap">
                <!-- Copywrite Text -->
                <div class="copywrite-text">
                    <p>Created by <a href="#">Theme-zome</a></p>
                </div>
                <!-- Footer Nav -->
                <ul class="footer-nav d-flex align-items-center">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Purchase</a></li>
                </ul>
            </footer>
        </div>
    </div> --}}
</div>
</div>
</div>
</div>

<!-- ======================================
********* Page Wrapper Area End ***********
======================================= -->

<!-- Must needed plugins to the run this Template -->
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/bundle.js') }}"></script>
<script src="{{ asset('admin/js/default-assets/setting.js') }}"></script>
<script src="{{ asset('admin/js/default-assets/fullscreen.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<!-- Include Summernote plugin JS (replace [plugin script] with your actual plugin script path) -->
<script src="[folder where script is located]/[plugin script].js"></script>
</head>
<body>


<script>
  $(document).ready(function() {
    $('.ckeditor').summernote({
      toolbar: [
        // Basic formatting - bold, italic, underline, strikethrough, clear formatting
        ['style', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],

        // Font settings - font name, font size
        ['style', ['fontname', 'fontsize']],

        // Text alignment - left align, center align, right align, justify
        ['style', ['ul', 'ol', 'paragraph', 'height']],

        // Lists - unordered list, ordered list
        ['para', ['ul', 'ol']],

        // Inserting links and pictures - link, picture, video, table, hr
        ['insert', ['link', 'picture', 'video', 'table', 'hr']],

        // Various plugins and custom buttons - code view, fullscreen, examplePlugin
        ['custom', ['codeview', 'fullscreen', 'examplePlugin']]
      ],
      // Additional plugin options and callbacks can be added here
    });
  });
</script>

<!-- Active JS -->
<script src="{{ asset('admin/js/default-assets/active.js') }}"></script>

<!-- These plugins only need for the run this page -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@yield('js_code')