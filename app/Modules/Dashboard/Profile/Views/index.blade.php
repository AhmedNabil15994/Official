@extends('tenant.Layouts.master')
@section('title',trans('main.myAccount'))
@section('styles')

@endsection


{{-- Content --}}
@section('content')
<!-- Start Content-->
<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">{{ trans('main.myAccount') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ trans('main.myAccount') }}</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <form class="updateProf" action="{{URL::to('/profile/updateProfile')}}" method="POST">
                    @csrf
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">{{trans('main.name')}}</label>
                                <input type="text" class="form-control" name="name" placeholder="{{trans('main.name')}}" value="{{$data->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">{{trans('main.identifier')}}</label>
                                <input type="text" class="form-control" readonly disabled placeholder="{{trans('main.identifier')}}" value="{{$data->identifier}}">
                                <span class="form-text text-muted"><small>{{trans('main.identifier_p')}}</small></span>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    <div class="row">
                        <input type="hidden" name="check" value="">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">{{trans('main.phone')}}</label>
                                <input type="tel" class="form-control" id="telephone" name="phone" placeholder="{{ trans('auth.phonePlaceHolder') }}" value="{{'+'.$data->phone}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">{{trans('main.email')}}</label>
                                <input type="email" class="form-control" name="email" placeholder="{{trans('main.email')}}" value="{{$data->email}}">
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userpassword">{{trans('main.password')}}</label>
                                <input type="password" class="form-control" name="password" placeholder="{{trans('main.password')}}">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userpassword">{{trans('main.passwordConf')}}</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="{{trans('main.passwordConf')}}">
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="text-right">
                        <button type="submit" class="btn updateProfile btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> {{trans('main.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div> <!-- container -->
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{asset('assets/components/profile.js')}}"></script>
@endsection
