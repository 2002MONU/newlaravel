
          <!-- App footer starts -->
          <div class="app-footer bg-white">
            <span>© Copyright <?php echo date("Y"); ?> Sunscrip Hospitality. All Right Reserved</span>
          </div>
          <!-- App footer ends -->

        </div>
        <!-- App container ends -->

      </div>
      <!-- Main container ends -->

    </div>
    <!-- Page wrapper ends -->

    <!-- *************
			************ JavaScript Files *************
		************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{asset('dash_assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('dash_assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dash_assets/js/moment.min.js')}}"></script>

    <!-- *************
			************ Vendor Js Files *************
		************* -->

    <!-- Overlay Scroll JS -->
    <script src="{{asset('dash_assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('dash_assets/vendor/overlay-scroll/custom-scrollbar.js')}}"></script>

    <!-- Apex Charts -->
    <script src="{{asset('dash_assets/vendor/apex/apexcharts.min.js')}}"></script>
    <script src="{{asset('dash_assets/vendor/apex/custom/home/patients.js')}}"></script>
    <script src="{{asset('dash_assets/vendor/apex/custom/home/treatment.js')}}"></script>
    <script src="{{asset('dash_assets/vendor/apex/custom/home/available-beds.js')}}"></script>
    <script src="{{asset('dash_assets/vendor/apex/custom/home/earnings.js')}}"></script>
    <script src="{{asset('dash_assets/vendor/apex/custom/home/gender-age.js')}}"></script>
    <script src="{{asset('dash_assets/vendor/apex/custom/home/claims.js')}}"></script>
    <script src="{{asset('dash_assets/js/image-custom.js')}}"></script>
   <script src="{{asset('dash_assets/vendor/datatables/dataTables.min.js')}}"></script>
    <script src="{{asset('dash_assets/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('dash_assets/vendor/datatables/custom/custom-datatables.js')}}"></script>
    
    <!<!-- boostrap links  -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"  ></script>
    <!-- Custom JS files -->
    <script src="{{asset('dash_assets/js/custom.js')}}"></script>
    // ckeditor
     <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<!-- Include Summernote plugin JS (replace [plugin script] with your actual plugin script path) -->
<!--<script src="[folder where script is located]/[plugin script].js"></script>-->

<!--<textarea class="summernote"></textarea>-->

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
  </body>


</html>