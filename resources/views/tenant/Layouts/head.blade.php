<link rel="shortcut icon" href="{{ asset('assets/images/groupImage.jpeg') }}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/summernote/summernote-bs4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App css -->
<link href="{{ asset('assets/css/bootstrap-material.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
<link href="{{ asset('assets/css/bootstrap-material-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
@if(DIRECTION == 'ltr')
<link href="{{ asset('assets/css/app-material.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
<!-- Dark css -->
<link href="{{ asset('assets/css/app-material-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
@else
<!-- RTL css -->
<link href="{{ asset('assets/css/app-material-rtl.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
<!-- RTL css -->
<link href="{{ asset('assets/css/app-material-dark-rtl.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
@endif
<link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.datetimepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/libs/mohithg-switchery/switchery.min.css')}}">
<link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />
<!-- icons -->
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/default-skin.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/photoswipe.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/libs/ladda/ladda-themeless.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css') }}">
<link href="{{ asset('assets/css/touches.css') }}" rel="stylesheet" type="text/css">
<!-- third party css -->
@yield('styles')
<!-- third party css end -->