 <!-- jquery -->
 <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
 <!--end jquery -->

 <!-- core:js -->
 <script src="{{ asset('assets/admin/vendors/core/core.js') }}"></script>
 <!-- endinject -->

 <!-- Plugin js for this page -->
 <script src="{{ asset('assets/admin/vendors/flatpickr/flatpickr.min.js') }}"></script>
 <script src="{{ asset('assets/admin/vendors/apexcharts/apexcharts.min.js') }}"></script>
 <!-- End plugin js for this page -->

 <!-- inject:js -->
 <script src="{{ asset('assets/admin/vendors/feather-icons/feather.min.js') }}"></script>
 <script src="{{ asset('assets/admin/js/template.js') }}"></script>
 <!-- endinject -->

 <!-- Custom js for this page -->
 <script src="{{ asset('assets/admin/js/dashboard-dark.js') }}"></script>
 <!-- End custom js for this page -->

 <!-- toastr -->
 <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
 <!--end toastr -->

 <!-- toastr -->
 <script src="{{ asset('assets/js/image-preview.js') }}"></script>
 <!--end toastr -->

  <!-- Plugin js for this page -->
  <script src="{{ asset('assets/admin/vendors/dropify/dist/dropify.min.js') }}"></script>
  {{-- <script src="{{ asset('assets/admin/vendors/tinymce/tinymce.min.js') }}"></script> --}}

  <!-- End plugin js for this page -->

   <!-- Custom js for this page -->
   <script src="{{ asset('assets/admin/js/dropify.js') }}"></script>
   {{-- <script src="{{ asset('assets/admin/js/tinymce.js') }}"></script> --}}
   <!-- End custom js for this page -->

 <script>
     "use strict"
     @if (Session::has('success'))
         toastr.success("{{ session('success') }}");
     @endif
     @if (Session::has('error'))
         toastr.error("{{ session('error') }}");
     @endif
     @if (Session::has('info'))
         toastr.info("{{ session('info') }}");
     @endif
     @if (Session::has('warning'))
         toastr.warning("{{ session('warning') }}");
     @endif
     @if (Session::has('status'))
         toastr.info("{{ session('status') }}");
     @endif

     @if (@$errors->any())
         @foreach ($errors->all() as $error)
             toastr.error("{{ $error }}");
         @endforeach
     @endif
 </script>


