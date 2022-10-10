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
        <div class="col-lg-5 col-xl-5">
            <div class="card-box text-center">

                <h4 class="mb-0">{{$data->id}}</h4>
                <p class="text-muted">{{$data->status}}</p>

                <div class="text-left mt-3">
                    <p class="text-muted mb-2 font-13"><strong>ID :</strong> <span class="ml-2">{{$data->id}}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>TOKEN :</strong><span class="ml-2">{{$data->token}}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>{{trans('main.days')}} :</strong> <span class="ml-2 ">{{$data->days}}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>{{trans('main.paidUntil')}} :</strong> <span class="ml-2 ">{{$data->valid_until}}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>{{trans('main.status')}} :</strong> <span class="ml-2 ">{{$data->validStatus}}</span></p>
                </div>

                <ul class="social-list list-inline mt-3 mb-0">
                    <li class="list-inline-item mb-2">
                        <a href="{{URL::to('/channels/'.$data->id.'/logout')}}" class="btn btn-light waves-effect waves-light"><i class="mdi mdi-logout"></i> {{trans('main.logout')}}</a>
                    </li>
                    <li class="list-inline-item mb-2">
                        <a href="{{URL::to('/channels/'.$data->id.'/clear')}}" class="btn btn-light waves-effect waves-light"><i class="mdi mdi-restore"></i> {{trans('main.clear')}}</a>
                    </li>

                    <li class="list-inline-item mb-2">
                        <a href="#transferDays-modal" data-toggle="modal" data-target="#transferDays-modal" class="btn btn-light waves-effect waves-light"><i class="mdi mdi-reply"></i> {{trans('main.transferDays')}}</a>
                    </li>
                    <li class="list-inline-item mb-2">
                        <a href="javascript: void(0);" class="btn btn-light waves-effect waves-light"><i class="mdi mdi-format-list-bulleted"></i> {{trans('main.messagesQueue')}}</a>
                    </li>
                    <li class="list-inline-item mb-2">
                        <a href="javascript: void(0);" class="btn btn-light waves-effect waves-light"><i class="mdi mdi-history"></i> {{trans('main.messagesHistory')}}</a>
                    </li>
                    <li class="list-inline-item mb-2">
                        <a href="javascript: void(0);" class="btn btn-light waves-effect waves-light"><i class="mdi mdi-cellphone-screenshot"></i> {{trans('main.screenshot')}}</a>
                    </li>
                </ul>
            </div> <!-- end card-box -->

            <div class="card-box">
                <h4 class="header-title mb-3">{{trans('main.channelSetting')}}</h4>

                <form class="form-horizontal" action="" method="post">
                    @csrf
                    <div class="form-group row mb-2">
                        <label class="col-4 col-form-label">{{trans('main.messageNotifications')}}</label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="messageNotifications" placeholder="{{trans('main.messageNotifications')}}" value="{{!empty($data->details) ? $data->details->webhooks->messageNotifications : ''}}">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-4 col-form-label">{{trans('main.ackNotifications')}}</label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="ackNotifications" placeholder="{{trans('main.ackNotifications')}}" value="{{!empty($data->details) ? $data->details->webhooks->ackNotifications : ''}}">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-4 col-form-label">{{trans('main.chatNotifications')}}</label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="chatNotifications" placeholder="{{trans('main.chatNotifications')}}" value="{{!empty($data->details) ? $data->details->webhooks->chatNotifications : ''}}">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-4 col-form-label">{{trans('main.labelNotifications')}}</label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="labelNotifications" placeholder="{{trans('main.labelNotifications')}}" value="{{!empty($data->details) ? $data->details->webhooks->labelNotifications : ''}}">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-4 col-form-label">{{trans('main.sendDelay')}} (in seconds)</label>
                        <div class="col-8">
                            <input type="tel" value="{{!empty($data->details) ? $data->details->sendDelay : 0}}" class="form-control" name="sendDelay" placeholder="{{trans('main.sendDelay')}}">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-4 col-form-label">{{trans('main.statusNotificationsOn')}}</label>
                        <div class="col-8">
                            <div class="switchery-demo">
                                <input type="checkbox" name="statusNotificationsOn" {{!empty($data->details) && $data->details->statusNotificationsOn == 1 ? 'checked' : ''}} data-plugin="switchery" data-switchery="true" data-color="#64b0f2" data-size="small"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-4 col-form-label">{{trans('main.filesUploadOn')}}</label>
                        <div class="col-8">
                            <div class="switchery-demo">
                                <input type="checkbox" name="filesUploadOn" {{!empty($data->details) && $data->details->filesUploadOn == 1 ? 'checked' : ''}} data-plugin="switchery" data-switchery="true" data-color="#64b0f2" data-size="small"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-4 col-form-label">{{trans('main.ignoreOldMessages')}}</label>
                        <div class="col-8">
                            <div class="switchery-demo">
                                <input type="checkbox" name="ignoreOldMessages" {{!empty($data->details) && $data->details->ignoreOldMessages == 1 ? 'checked' : ''}} data-plugin="switchery" data-switchery="true" data-color="#64b0f2" data-size="small"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-4 col-form-label">{{trans('main.disableGroupsArchive')}}</label>
                        <div class="col-8">
                            <div class="switchery-demo">
                                <input type="checkbox" name="disableGroupsArchive" {{!empty($data->details) && $data->details->disableGroupsArchive == 1 ? 'checked' : ''}} data-plugin="switchery" data-switchery="true" data-color="#64b0f2" data-size="small"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1 justify-content-end">
                        <label class="col-4 col-form-label">{{trans('main.disableDialogsArchive')}}</label>
                        <div class="col-8">
                            <div class="switchery-demo">
                                <input type="checkbox" name="disableDialogsArchive" {{!empty($data->details) && $data->details->disableDialogsArchive == 1 ? 'checked' : ''}} data-plugin="switchery" data-switchery="true" data-color="#64b0f2" data-size="small"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-9">
                            <button type="submit" class="btn btn-info waves-effect waves-light float-right">{{trans('main.save')}}</button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                </form>

            </div> <!-- end card-box-->

        </div>
    </div>

    @if($data->status == 'connected')

    @else

    @endif
    @include('tenant.Partials.pagination')
    <div id="transferDays-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('main.transferDays')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Name</label>
                                <input type="text" class="form-control" id="field-1" placeholder="John">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-3" class="control-label">{{trans('main.days')}}</label>
                                <input type="tel" class="form-control" id="days" placeholder="{{trans('main.days')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info waves-effect waves-light">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container -->
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>
@endsection
