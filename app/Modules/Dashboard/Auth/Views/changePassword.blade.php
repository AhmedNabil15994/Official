<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ trans('auth.change') }}</title>
        <meta name="description" content="#" />
        <link rel="shortcut icon" href="{{ asset('assets/images/logo.svg') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/css/login-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css') }}">
        <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/css/login-style.css') }}">
        <link rel="shortcut icon" href="{{ asset('assets/images/groupImage.jpeg') }}">
    </head>
    <body class="authPages loading authentication-bg authentication-bg-pattern">
        <section class="main--page">
            <div class="container-fluid">
                <div class="row login-page">
                    <div class="col-lg-12 col-xl-6 control-side">
                        <div class="logo">
                            <img src="{{ asset('assets/images/Group 41588.jpg') }}" alt="logo">
                        </div>
                        <div class="user-form">
                            <form action="{{ URL::to('/completeReset') }}" method="POST">
                                @csrf
                                <div class="form--title">{{ trans('auth.change') }}</div>
                                <input type="password" name="password" placeholder="{{ trans('auth.passwordPlaceHolder') }}">
                                <input type="password" name="password_confirmation" placeholder="{{ trans('auth.passwordConfPlaceHolder') }}">
                                <button type="submit" class="loginBut">{{ trans('auth.change') }}</button>
                                <a href="{{ URL::to('/login') }}" class="nav-link theme__dark">{{ trans('auth.loginButton') }}</a>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 slogan-side">
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page -->

        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('assets/js/login-bootstrap.min.js') }}"></script>
        {{-- <script src="{{ asset('assets/js/login-main.js') }}"></script> --}}
        <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/components/notifications.js') }}"></script>
        <script src="{{ asset('assets/js/intlTelInput-jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/utils.js') }}" type="text/javascript"></script>

        @include('tenant.Partials.notf_messages')
        
    </body>
</html>