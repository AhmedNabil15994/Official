@extends('tenant.Layouts.master')
@section('title',trans('main.dashboard'))
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
                        <li class="breadcrumb-item active">{{ trans('main.dashboard') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ trans('main.dashboard') }}</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 


    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                <h4 class="mt-0 font-16">{{trans('main.channels')}}</h4>
                <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{$data->channels}}</span> {{trans('main.channel')}}</h2>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                <h4 class="mt-0 font-16">{{trans('main.activeChannels')}}</h4>
                <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{$data->activeChannels}}</span> {{trans('main.channel')}}</h2>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                <h4 class="mt-0 font-16">{{trans('main.unactiveChannels')}}</h4>
                <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{$data->unActiveChannels}}</span> {{trans('main.channel')}}</h2>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                <h4 class="mt-0 font-16">{{trans('main.deletedChannels')}}</h4>
                <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{$data->deletedChannels}}</span> {{trans('main.channel')}}</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
    
    <div class="row">
        <div class="col-md-4 col-xl-4">
            <div class="card-box">
                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                <h4 class="mt-0 font-16">{{trans('main.queuedMessages')}}</h4>
                <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{$data->queues}}</span> {{trans('main.message')}}</h2>
            </div>
        </div>

        <div class="col-md-4 col-xl-4">
            <div class="card-box">
                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                <h4 class="mt-0 font-16">{{trans('main.sentMessages')}}</h4>
                <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{$data->sentQueues}}</span> {{trans('main.message')}}</h2>
            </div>
        </div>

        <div class="col-md-4 col-xl-4">
            <div class="card-box">
                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                <h4 class="mt-0 font-16">{{trans('main.notSentMessages')}}</h4>
                <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{$data->notSentQueues}}</span> {{trans('main.message')}}</h2>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-md-6 col-xl-6">
            <div class="card-box">
                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                <h4 class="mt-0 font-16">{{trans('main.days')}}</h4>
                <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{$data->days}}</span> {{trans('main.day')}}</h2>
            </div>
        </div>

        <div class="col-md-6 col-xl-6">
            <div class="card-box">
                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                <h4 class="mt-0 font-16">{{trans('main.storages')}}</h4>
                <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{$data->storage}}</span> {{$data->storageText}}</h2>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-4 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">{{trans('main.channelMostQueues')}}</h4>
                    @foreach($data->channelMostQueues as $oneQueue)
                    <div class="inbox-widget" data-simplebar style="max-height: 407px;">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="{{ asset('assets/images/groupImage.jpeg') }}" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">{{$oneQueue->sessionId}}</p>
                            <p class="inbox-item-date">
                                <a href="{{URL::to('/channels/view/'.str_replace('wlChannel','',$oneQueue->sessionId))}}" class="btn btn-sm btn-link text-info font-13"> {{$oneQueue->total .' '.trans('main.message')}} </a>
                            </p>
                        </div>
                    </div> <!-- end inbox-widget -->
                    @endforeach
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-xl-4 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">{{trans('main.channelMostDays')}}</h4>
                    @foreach($data->channelMostDays as $oneDay)
                    @if($oneDay->actualDays > 0)
                    <div class="inbox-widget" data-simplebar style="max-height: 407px;">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="{{ asset('assets/images/groupImage.jpeg') }}" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">{{$oneDay->name}}</p>
                            <p class="inbox-item-date">
                                <a href="{{URL::to('/channels/view/'.str_replace('wlChannel','',$oneDay->name))}}" class="btn btn-sm btn-link text-info font-13"> {{$oneDay->actualDays .' '.trans('main.day')}} </a>
                            </p>
                        </div>
                    </div> <!-- end inbox-widget -->
                    @endif
                    @endforeach
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-xl-4 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">{{trans('main.channelMostStorage')}}</h4>
                    @foreach($data->channelMostStorage as $oneStorage)
                    @if($oneStorage['size'] > 0)
                    <div class="inbox-widget" data-simplebar style="max-height: 407px;">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="{{ asset('assets/images/groupImage.jpeg') }}" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">{{'wlChannel'.$oneStorage['id']}}</p>
                            <p class="inbox-item-date">
                                <a href="{{URL::to('/channels/view/'.$oneStorage['id'])}}" class="btn btn-sm btn-link text-info font-13"> {{$oneStorage['size'] .' '.$data->storageText}} </a>
                            </p>
                        </div>
                    </div> <!-- end inbox-widget -->
                    @endif
                    @endforeach
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
    
</div> <!-- container -->
@endsection

{{-- Scripts Section --}}
@section('topScripts')
<script src="{{ asset('assets/js/pages/dashboard-3.init.js') }}"></script>
@endsection
