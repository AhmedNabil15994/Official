@extends('tenant.Layouts.master')
@section('title',trans('main.channels'))
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
                        <li class="breadcrumb-item active">{{ trans('main.channels') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ trans('main.channels') }}</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-lg-10">
                        <form class="form-inline">
                            <div class="form-group">
                                <label for="inputPassword2" class="sr-only">{{trans('main.search')}}</label>
                                <input type="search" class="form-control" id="inputPassword2" placeholder="{{trans('main.search')}}...">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2">
                        <div class="text-lg-right mt-3 mt-lg-0">
                            <button type="button" class="btn btn-danger waves-effect waves-light mr-1"><i class="mdi mdi-plus-circle mr-1"></i> {{trans('main.addNew')}}</button>
                        </div>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div> <!-- end card-box -->
        </div><!-- end col-->
    </div>

    <div class="row">
        @foreach($data->data as $oneChannel)
        <div class="col-lg-3">
            <div class="card-box bg-pattern">
                <div class="text-center">
                    {{-- <img src="../assets/images/companies/amazon.png" alt="logo" class="avatar-xl rounded-circle mb-3"> --}}
                    <h4 class="mb-1 font-20">{{$oneChannel->id}}</h4>
                    <p class="text-muted  font-14">{{$oneChannel->name}}</p>
                </div>

                <p class="font-14 text-center text-muted">{{$oneChannel->description}}</p>

                <div class="text-center">
                    <a href="{{URL::to('/channels/'.$oneChannel->id)}}" class="btn btn-sm btn-light">{{trans('main.view')}}</a>
                </div>

                <div class="row mt-4 text-center">
                    <div class="col-4">
                        <h5 class="font-weight-normal text-muted">{{trans('main.status')}}</h5>
                        <h4>{{$oneChannel->validStatus}}</h4>
                    </div>
                    <div class="col-4">
                        <h5 class="font-weight-normal text-muted">{{trans('main.days')}}</h5>
                        <h4>{{$oneChannel->days}}</h4>
                    </div>
                    <div class="col-4">
                        <h5 class="font-weight-normal text-muted">{{trans('main.paidUntil')}}</h5>
                        <h4>{{$oneChannel->valid_until}}</h4>
                    </div>
                </div>
            </div> <!-- end card-box -->
        </div>
        @endforeach
    </div>
    @include('tenant.Partials.pagination')
</div> <!-- container -->
@endsection

{{-- Scripts Section --}}
@section('topScripts')
@endsection
