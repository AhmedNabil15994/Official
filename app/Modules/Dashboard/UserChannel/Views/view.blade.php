@extends('tenant.Layouts.master')
@section('title',trans('main.channels'))
@section('styles')
<livewire:styles />
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<style>
    .attention {
        border: 1px solid #DBDBDB;
        padding: 14px 70px 14px 20px;
        border-radius: 10px;
        color: #000000;
        font-size: 14px;
        position: relative;
        font-family: "Tajawal-Medium";
        margin-bottom: 20px;
    }
    .attention i {
        position: absolute;
        right: 15px;
        top: 7px;
        width: 30px;
        height: 30px;
        text-align: center;
        line-height: 30px;
        border-radius: 50%;
        font-size: 17px;
        color: #000;
        font-style: normal;
        border: 1px solid #E2E2E2;
    }
    .attention span {
        font-size: 16px;
        text-align: center;
    }
    .stepQr {
        margin-bottom: 20px;
        background-color: #F8F8F8;
        border-radius: 5px;
        padding: 13px;
        font-size: 13px;
        display: block;
    }
    table.basic-datatable2.dataTable{
        width: 100% !important;
        overflow-x: scroll;
    }
    table.basic-datatable2.dataTable.nowrap th, table.dataTable.nowrap td{
        white-space: pre-line;
    }
</style>
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

                <h4 class="mb-0">{{$data->device->name}}</h4>
                <p class="text-muted channelStatus">{{$data->device->status}}</p>

                <div class="text-left mt-3">
                    <p class="text-muted mb-2 font-13"><strong>ID :</strong> <span class="ml-2">{{$data->device->id}}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>{{trans('main.token')}} :</strong><span class="ml-2">{{$data->device->token}}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>{{trans('main.identifier')}} :</strong><span class="ml-2">{{IDENTIFIER}}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>{{trans('main.days')}} :</strong> <span class="ml-2 ">{{$data->device->days}}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>{{trans('main.paidUntil')}} :</strong> <span class="ml-2 ">{{$data->device->valid_until}}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>{{trans('main.status')}} :</strong> <span class="ml-2 ">{{$data->device->validStatus}}</span></p>
                </div>

                <ul class="social-list list-inline mt-3 mb-0">
                    <li class="list-inline-item mb-2">
                        <a href="{{URL::to('/channels/'.$data->device->id.'/logout')}}" class="btn btn-light waves-effect waves-light"><i class="mdi mdi-logout"></i> {{trans('main.logout')}}</a>
                    </li>
                    <li class="list-inline-item mb-2">
                        <a href="{{URL::to('/channels/'.$data->device->id.'/clear')}}" class="btn btn-light waves-effect waves-light"><i class="mdi mdi-restore"></i> {{trans('main.clear')}}</a>
                    </li>

                    <li class="list-inline-item mb-2">
                        <a href="#transferDays-modal" data-toggle="modal" data-target="#transferDays-modal" class="btn btn-light waves-effect waves-light"><i class="mdi mdi-reply"></i> {{trans('main.transferDays')}}</a>
                    </li>
                    <li class="list-inline-item mb-2">
                        <a href="#queue-modal" data-toggle="modal" data-target="#queue-modal" class="btn btn-light waves-effect waves-light"><i class="mdi mdi-format-list-bulleted"></i> {{trans('main.messagesQueue')}}</a>
                    </li>
                    <li class="list-inline-item mb-2">
                        <a href="#history-modal" data-toggle="modal" data-target="#history-modal"  class="btn btn-light waves-effect waves-light"><i class="mdi mdi-history"></i> {{trans('main.messagesHistory')}}</a>
                    </li>
                    <li class="list-inline-item mb-2">
                        <a href="#screenshot-modal" data-toggle="modal" data-target="#screenshot-modal" class="btn btn-light waves-effect waves-light"><i class="mdi mdi-cellphone-screenshot"></i> {{trans('main.screenshot')}}</a>
                    </li>
                </ul>
            </div> <!-- end card-box -->

            <div class="card-box">
                <h4 class="header-title mb-3">{{trans('main.channelSetting')}}</h4>

                <form class="form-horizontal" action="{{URL::to('/channels/'.$data->device->id.'/updateSetting')}}" method="post">
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
        <div class="col-lg7 col-xl-7">
            <div class="card-box text-left">
                <div class="attention">
                    <i class="icon">?</i>
                    {{trans('main.alert1')}}
                </div>
                <div class="row">
                    <div class="col-6">
                        @livewire('qr-image',[
                            'id' => $data->device->id,
                            'token' => $data->device->token,
                            'identifier' => IDENTIFIER,
                            'days' => $data->device->days
                        ])
                    </div>
                    <div class="col-6 text-left">
                        <span class="stepQr">{{ trans('main.alert2') }}</span>
                        <span class="stepQr">{{ trans('main.alert3') }}</span>
                        <span class="stepQr">{{ trans('main.alert4') }}</span>
                        <span class="stepQr">{{ trans('main.alert5') }}</span>
                        <span class="stepQr">{{ trans('main.alert6') }}</span>
                        <span class="stepQr">{{ trans('main.alert7') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                <label for="field-1" class="control-label">{{trans('main.channel')}}</label>
                                <select class="form-control" data-toggle="select2" name="receiver">
                                    <option value="">{{trans('main.choose')}}</option>
                                    @foreach($data->channels as $channel)
                                    <option value="{{$channel->id}}">{{$channel->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-3" class="control-label">{{trans('main.days')}}</label>
                                <input type="tel" class="form-control" name="days" placeholder="{{trans('main.days')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">{{trans('main.close')}}</button>
                    <button type="button" class="btn btn-info waves-effect waves-light submBtn">{{trans('main.save')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div id="queue-modal" class="modal fade">
        <div class="modal-dialog modal-full-width modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('main.messagesQueue')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table dt-responsive basic-datatable nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{trans('main.message_type')}}</th>
                                        <th>{{trans('main.phone')}}</th>
                                        <th>{{trans('main.status')}}</th>
                                        <th>{{trans('main.isSent')}}</th>
                                        <th>{{trans('main.queued_at')}}</th>
                                        <th>{{trans('main.sent_at')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">{{trans('main.close')}}</button>
                    <a href="{{URL::to('/channels/'.$data->device->id.'/resend')}}" class="btn btn-primary waves-effect">{{trans('main.resendUnsent')}}</a>
                </div>
            </div>
        </div>
    </div>

    <div id="history-modal" class="modal fade">
        <div class="modal-dialog modal-full-width modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('main.messagesHistory')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table dt-responsive basic-datatable2 nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{trans('main.message_type')}}</th>
                                        <th>{{trans('main.message')}}</th>
                                        <th>{{trans('main.fromMe')}}</th>
                                        <th>{{trans('main.author')}}</th>
                                        <th>{{trans('main.phone')}}</th>
                                        <th>{{trans('main.date')}}</th>
                                        <th>{{trans('main.status')}}</th>
                                        <th>{{trans('main.device')}}</th>
                                        <th>{{trans('main.metadata')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">{{trans('main.close')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div id="screenshot-modal" class="modal fade">
        <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('main.screenshot')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4" style="height: 100vh;position:relative">
                    @if($data->device->status == 'connected')
                        @include('whatsweb.index2',[
                            'profPic' => $data->connection->image,
                            'pinned' => $data->connection->pinned,
                            'notPinned' => $data->connection->notPinned,
                        ])
                    @else
                        @if($data->device->validStatus  != trans('main.active'))
                            @include('whatsweb.index3')
                        @else
                            @include('whatsweb.index',['qr' => $data->device->image])
                        @endif
                    @endif
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
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/components/viewChannel.js')}}"></script>
<livewire:scripts />

<script>
Livewire.on('statusChanged', qrData => {
    $('p.channelStatus').html(qrData.channelStatus);
    $(document).find($('#app img.channelQR').attr('src',qrData.image))
})
</script>
@endsection
