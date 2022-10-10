<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<!-- Chart JS -->
<!-- Sweet Alerts js -->
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Sweet alert init js-->
<script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/libs/mohithg-switchery/switchery.min.js')}}"></script>
<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
<script src="{{ asset('assets/libs/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery.scrollto/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>
@yield('topScripts')
<!-- Chat app -->
{{-- <script src="{{ asset('assets/js/pages/jquery.chat.js') }}"></script> --}}
<!-- Todo app -->
{{-- <script src="{{ asset('assets/js/pages/jquery.todo.js') }}"></script> --}}
<!-- Dashboard init JS -->
<!-- App js-->
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/components/notifications.js') }}"></script>
<script src="{{ asset('assets/components/multi-lang.js') }}"></script>
<script src="{{ asset('assets/components/multi-channels.js') }}"></script>

<!-- Loading buttons js -->
<script src="{{ asset('assets/libs/ladda/spin.min.js') }}"></script>
<script src="{{ asset('assets/libs/ladda/ladda.min.js') }}"></script>

<!-- Buttons init js-->
<script src="{{ asset('assets/js/pages/loading-btn.init.js') }}"></script>
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" charset="UTF-8"></script>

<script src="{{ asset('assets/js/intlTelInput-jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/utils.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/components/globals.js') }}"></script>
<!-- third party js -->
@yield('scripts')
<!-- third party js ends -->