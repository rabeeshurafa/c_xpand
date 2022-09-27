@extends('layouts.admin')



@section('search')



<li class="dropdown dropdown-language nav-item hideMob">
    <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="{{trans('archive.search')}}" style="text-align: center;width: 350px; margin-top: 15px !important;">
</li>



@endsection



@section('content')

<!--<link rel="apple-touch-icon" href="https://template.expand.ps/app-assets/images/ico/apple-icon-120.png">-->

<!--  <link rel="shortcut icon" type="image/x-icon" href="https://template.expand.ps/app-assets/images/ico/favicon.ico">-->

<!--  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"-->

<!--  rel="stylesheet">-->

<!--  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"-->

<!--  rel="stylesheet">-->

  <!-- BEGIN VENDOR CSS-->

<!--  <link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/css-rtl/vendors.css">-->

  <!-- END VENDOR CSS-->

  <!-- BEGIN MODERN CSS-->

<!--  <link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/css-rtl/app.css">-->

<!--  <link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/css-rtl/custom-rtl.css">-->

  <!-- END MODERN CSS-->

  <!-- BEGIN Page Level CSS-->

  <link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/fonts/simple-line-icons/style.min.css">

  <link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/css-rtl/pages/email-application.css">

  <!-- END Page Level CSS-->

  <!-- BEGIN Custom CSS-->

  <!--<link rel="stylesheet" type="text/css" href="https://template.expand.ps/assets/css/style-rtl.css">-->

  <style>
      .selectedMsg{
              background-color: #e7e7e7;
      }
      .primary1{
          color: #1E9FF2;
      }
      hr {
    margin-top: 5px;
    margin-bottom: 5px;
      }
      .media-list .media {
    padding: 5px;
    padding-left: 15px;
}
      
@media (min-width: 992px){
body .content-right {
    width: -webkit-calc(100% - 600px);
    width: -moz-calc(100% - 600px);
    width: calc(100% - 600px);
    float: left;
}
}
.select2-container--classic .select2-selection--multiple .select2-selection__choice, .select2-container--default .select2-selection--multiple .select2-selection__choice {
    padding: 2px 6px !important;
    margin-top: 0 !important;
    background-color: #1E9FF2!important;
    border-color: #1E9FF2 !important;
    color: #FFFFFF;
    margin-left: 8px !important;
    margin-bottom: 2px;
}
  </style>

<div class="app-content container center-layout mt-2 mailmobheader">

    <div class="sidebar-left">

      <div class="sidebar">

        <div class="sidebar-content email-app-sidebar d-flex" style="width: 600px;">

          <div class="email-app-menu col-md-5 card  d-md-block hidemob">

            <div class="form-group form-group-compose text-center">

              <button type="button" class="btn btn-danger btn-block my-1 " onclick="$('#AppModal').modal('show')"><i class="ft-mail"></i> {{trans('admin.Compose')}}</button>

            </div>

            <h6 class="text-muted text-bold-500 mb-1">{{trans('admin.Messages')}}</h6>

            <div class="list-group list-group-messages">

              <a onclick="$('.allTabs').hide();$('.inboxTab').show();$('.list-group-item').removeClass('active');$(this).addClass('active');" class="list-group-item active border-0">

                <i class="ft-inbox mr-1"></i> {{trans('admin.Inbox')}}

                <span class="badge badge-secondary badge-pill float-right">{{count($rMsgemp)}}</span>

              </a>

              <a onclick="$('.allTabs').hide();$('.outboxTab').show();$('.list-group-item').removeClass('active');$(this).addClass('active');" class="list-group-item list-group-item-action border-0">
                <i class="la la-paper-plane-o mr-1"></i>
                  {{trans('admin.Sent')}}

                  

              </a>

              <a onclick="$('.allTabs').hide();$('.draftTab').show();$('.list-group-item').removeClass('active');$(this).addClass('active');" class="list-group-item list-group-item-action border-0">

                  <i class="ft-file mr-1"></i>

                  {{trans('admin.Draft')}}

              </a>

              <a onclick="$('.allTabs').hide();$('.starTab').show();$('.list-group-item').removeClass('active');$(this).addClass('active');" class="list-group-item list-group-item-action border-0">

                  <i class="ft-star mr-1"></i> 

                  {{trans('admin.Starred')}}

                  <span class="badge badge-danger badge-pill float-right">{{count($star)}}</span> 

              </a>

              <a onclick="$('.allTabs').hide();$('.trashTab').show();$('.list-group-item').removeClass('active');$(this).addClass('active');" class="list-group-item list-group-item-action border-0">

                  <i class="ft-trash-2 mr-1"></i> 

                  {{trans('admin.Trash')}}

              </a>

            </div>

            <h6 class="text-muted text-bold-500 mt-1 mb-1">
                  {{trans('admin.Labels')}}
                <i class="fa fa-plus" onclick="$('#newFolder').modal('show')"></i>
            </h6>

            <div class="list-group list-group-messages">
                @foreach($folders as $row)
              <a onclick="$('.allTabs').hide();$('.folder{{$row->id}}').show();$('.list-group-item').removeClass('active');$(this).addClass('active');" class="list-group-item list-group-item-action border-0">

                <i class="ft-circle mr-1 warning"></i> {{$row->name}}

                <span class="badge badge-warning badge-pill float-right">{{count($row->msgs)}}</span>

              </a>
            @endforeach
            </div>

          </div>

          <div class="email-app-list-wraper col-md-7 card p-0">

            <div class="email-app-list">

              <div class="card-body chat-fixed-search">
                  <!---->
                <div class="row">
                <div class="dropdown dropmob d-sm-inline d-md-none ">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </button>
                    


                      <div class="dropdown-menu menumob1" aria-labelledby="dropdownMenu2">
                            <div class="form-group form-group-compose text-center m-1">
                                <button type="button" class="btn btn-danger btn-block my-1 " onclick="$('#AppModal').modal('show')"><i class="ft-mail"></i> {{trans('admin.Compose')}}</button>
                            </div>
                
                            <h6 class="text-muted text-bold-500 mb-1">{{trans('admin.Messages')}}</h6>
                        <a onclick="$('.allTabs').hide();$('.inboxTab').show();$('.list-group-item').removeClass('active');$(this).addClass('active');" class="linkmailmob list-group-item active border-0">

                            <i class="ft-inbox mr-1"></i> الوارد
            
                            <span class="badge badge-secondary badge-pill float-right">{{count($rMsgemp)}}</span>
            
                          </a>
            
                          <a onclick="$('.allTabs').hide();$('.outboxTab').show();$('.list-group-item').removeClass('active');$(this).addClass('active');" class="linkmailmob list-group-item list-group-item-action border-0">
                            <i class="la la-paper-plane-o mr-1"></i>
                            الصادر
                        </a>
                        <a onclick="$('.allTabs').hide();$('.draftTab').show();$('.list-group-item').removeClass('active');$(this).addClass('active');" class="linkmailmob list-group-item list-group-item-action border-0">

                              <i class="ft-file mr-1"></i>
            
                              {{trans('admin.Draft')}}
            
                          </a>
            
                          <a onclick="$('.allTabs').hide();$('.starTab').show();$('.list-group-item').removeClass('active');$(this).addClass('active');" class="linkmailmob list-group-item list-group-item-action border-0">
            
                              <i class="ft-star mr-1"></i> 
            
                              {{trans('admin.Starred')}}
            
                              <span class="badge badge-danger badge-pill float-right">{{count($star)}}</span> 
            
                          </a>
            
                          <a onclick="$('.allTabs').hide();$('.trashTab').show();$('.list-group-item').removeClass('active');$(this).addClass('active');" class="linkmailmob list-group-item list-group-item-action border-0">
            
                              <i class="ft-trash-2 mr-1"></i> 
            
                              {{trans('admin.Trash')}}
            
                          </a>
                      </div>
                </div>
                
                <fieldset class="searchmob form-group position-relative has-icon-left m-0 pb-1">

                  <input type="text" class="form-control searchmailmob" id="iconLeft4" placeholder="{{trans('admin.search_email')}}">

                  <div class="form-control-position">

                    <i class="ft-search"></i>

                  </div>

                </fieldset>
                </div>
              </div>

              <div id="users-list " style="min-height: 600.406px;max-height: 600.406px;height: 600.406px;overflow-y: auto; " class="list-group messagelist">

                <div class="users-list-padding media-list allTabs inboxTab">

                  

                  @foreach($inbox as $row)

                  @foreach($row->MessageReciver as $rec)

                    @if($rec->i_receiver_id==Auth()->user()->id && $rec->is_seen==0)

                  <a class=" media bg-blue-grey bg-lighten-5 border-right-primary border-right-2" id="msg{{$row->id}}" onclick="getMsgByTypeID(1,{{$row->id}})">

                      @elseif($rec->i_receiver_id==Auth()->user()->id && $rec->is_seen==1)

                  <a class="media  border-0" onclick="getMsgByTypeID(1,{{$row->id}})" id="msg{{$row->id}}">

                  @endif

                  @endforeach

                    <div class="media-left pr-1">

                      <span class="avatar avatar-md">

                        <img class="media-object rounded-circle text-circle bg-info empimgmob" src="{{$row->admin->image}}" />

                      </span>

                    </div>

                    <div class="media-body w-100">

                      <p class="list-group-item-text text-truncate text-bold-600 mb-0">
                          <span class="primary1"> {{$row->admin->nick_name}} </span>

                      <span class="float-right font-small-2 color-mob">

                      @foreach($row->MessageReciver as $rec)

                            @if($rec->i_receiver_id==Auth()->user()->id)

                            <i class="fa fa-calendar hidemob"></i>

                          {{date('d/m/Y',strtotime($rec->created_at))}}
                            <span class="hidemob">
                            <i class="fa fa-clock-o"></i>

                          {{date('H:i',strtotime($rec->created_at))}}
                            </span>
                          @endif

                          @endforeach</span></p>

                      <h6 class="list-group-item-heading text-bold-500">{{$row->title}}

                        <span class="float-right">

                          <span class="font-small-2 primary"></span>

                        </span>

                      </h6>

                      <p class="list-group-item-text mb-0">

                          

                        <!-- <span class="float-right primary">

                          <span class="badge badge-danger mr-1">Family</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span>-->

                      </p>

                    </div>

                  </a>
                  <hr />

                  @endforeach

                </div>

                <div class="users-list-padding media-list allTabs trashTab" style="display:none">

                  

                  @foreach($trash as $row)

                  <a class="media  border-0" onclick="getMsgByTypeID(1,{{$row->id}})" id="msg{{$row->id}}">

                    <div class="media-left pr-1">

                      <span class="avatar avatar-md">

                        <img class="media-object rounded-circle text-circle bg-info empimgmob" src="{{$row->admin->image}}" />

                      </span>

                    </div>

                    <div class="media-body w-100">

                      <p class="list-group-item-text text-truncate text-bold-600 mb-0">
                          <span class="primary1"> {{$row->admin->nick_name}} </span>

                      <span class="float-right font-small-2 color-mob ">

                      @foreach($row->MessageReciver as $rec)

                            @if($rec->i_receiver_id==Auth()->user()->id)

                            <i class="fa fa-calendar hidemob"></i>

                          {{date('d/m/Y',strtotime($rec->created_at))}}
                        <span class="hidemob"></span>
                            <i class="fa fa-clock-o"></i>

                          {{date('H:i',strtotime($rec->created_at))}}
                        </span>
                          @endif

                          @endforeach</span></p>

                      <h6 class="list-group-item-heading text-bold-500">{{$row->title}}

                        <span class="float-right">

                          <span class="font-small-2 primary"></span>

                        </span>

                      </h6>

                      <p class="list-group-item-text mb-0">

                          

                        <!-- <span class="float-right primary">

                          <span class="badge badge-danger mr-1">Family</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span>-->

                      </p>

                    </div>

                  </a>
                  <hr />

                  @endforeach

                </div>
                <div class="users-list-padding media-list allTabs starTab" style="display:none">

                  

                  @foreach($star as $row)

                  <a class="media  border-0" onclick="getMsgByTypeID(1,{{$row->id}})" id="msg{{$row->id}}">

                    <div class="media-left pr-1">

                      <span class="avatar avatar-md">

                        <img class="media-object rounded-circle text-circle bg-info empimgmob" src="{{$row->admin->image}}" />

                      </span>

                    </div>

                    <div class="media-body w-100">

                      <p class="list-group-item-text text-truncate text-bold-600 mb-0">
                          <span class="primary1"> {{$row->admin->nick_name}} </span>

                      <span class="float-right font-small-2 color-mob ">

                      @foreach($row->MessageReciver as $rec)

                            @if($rec->i_receiver_id==Auth()->user()->id)

                            <i class="fa fa-calendar hidemob"></i>

                          {{date('d/m/Y',strtotime($rec->created_at))}}
                            <span class="hidemob">
                            <i class="fa fa-clock-o"></i>

                          {{date('H:i',strtotime($rec->created_at))}}
                            </span>
                          @endif

                          @endforeach</span></p>

                      <h6 class="list-group-item-heading text-bold-500">{{$row->title}}

                        <span class="float-right">

                          <span class="font-small-2 primary"></span>

                        </span>

                      </h6>

                      <p class="list-group-item-text mb-0">

                          

                        <!-- <span class="float-right primary">

                          <span class="badge badge-danger mr-1">Family</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span>-->

                      </p>

                    </div>

                  </a>

                  <hr />
                  @endforeach

                </div>

                <div class="users-list-padding media-list allTabs outboxTab" style="display:none">

                  

                  @foreach($outbox as $row)


                      @foreach($row->MessageReciver as $rec)
                  <a class="media  border-0" onclick="getMsgByTypeID(2,{{$row->id}})" id="msg{{$row->id}}">

                    <div class="media-left pr-1">

                      <span class="avatar avatar-md">

                        <img class="media-object rounded-circle text-circle bg-info empimgmob" src="{{$rec->admin->image}}" />

                      </span>

                    </div>

                    <div class="media-body w-100">

                      <p class="list-group-item-text text-truncate text-bold-600 mb-0">
                          <span class="primary1"> {{$rec->admin->nick_name}} </span>

                      <span class="float-right font-small-2 color-mob ">


                            <i class="fa fa-calendar hidemob"></i>

                          {{date('d/m/Y',strtotime($rec->created_at))}}
                                <span class="hidemob">
                            <i class="fa fa-clock-o"></i>

                          {{date('H:i',strtotime($rec->created_at))}}
                                    </span>
                          </span></p>

                      <h6 class="list-group-item-heading text-bold-500">{{$row->title}}

                        <span class="float-right">

                          <span class="font-small-2 primary"></span>

                        </span>

                      </h6>

                      <p class="list-group-item-text mb-0">

                          

                        <!-- <span class="float-right primary">

                          <span class="badge badge-danger mr-1">Family</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span>-->

                      </p>

                    </div>

                  </a>
                  <hr />
@endforeach
                  @endforeach

                </div>
                <div class="users-list-padding media-list allTabs draftTab" style="display:none">

                  

                  @foreach($draft as $row)
                    @foreach($row->MessageReciver as $rec)
                      <a class="media  border-0" onclick="getMsgByTypeID(3,{{$row->id}})" id="msg{{$row->id}}">

                    <div class="media-left pr-1">

                      <span class="avatar avatar-md">

                        <img class="media-object rounded-circle text-circle bg-info empimgmob" src="{{$rec->admin->image}}" />

                      </span>

                    </div>

                    <div class="media-body w-100">

                      <p class="list-group-item-text text-truncate text-bold-600 mb-0">
                          <span class="primary1"> {{$rec->admin->nick_name}} </span>

                      <span class="float-right font-small-2 color-mob ">


                            <i class="fa fa-calendar hidemob"></i>

                          {{date('d/m/Y',strtotime($rec->created_at))}}
                            <span class="hidemob">
                            <i class="fa fa-clock-o"></i>

                          {{date('H:i',strtotime($rec->created_at))}}
</span>
                          </span></p>

                      <h6 class="list-group-item-heading text-bold-500">{{$row->title}}

                        <span class="float-right">

                          <span class="font-small-2 primary"></span>

                        </span>

                      </h6>

                      <p class="list-group-item-text mb-0">

                          

                        <!-- <span class="float-right primary">

                          <span class="badge badge-danger mr-1">Family</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span>-->

                      </p>

                    </div>

                  </a>
                  <hr />
                    @endforeach
                  @endforeach

                </div>
                
                @foreach($folders as $row1)
                <div class="users-list-padding media-list allTabs folder{{$row1->id}}" style="display:none">

                  

                  @foreach($row1->msgs as $row)

                  <a class="media  border-0" onclick="getMsgByTypeID(1,{{$row->id}})" id="msg{{$row->id}}">

                    <div class="media-left pr-1">

                      <span class="avatar avatar-md">

                        <img class="media-object rounded-circle text-circle bg-info empimgmob" src="{{$row->admin->image}}" />

                      </span>

                    </div>

                    <div class="media-body w-100">

                      <p class="list-group-item-text text-truncate text-bold-600 mb-0">
                          <span class="primary1"> {{$rec->admin->nick_name}} </span>

                      <span class="float-right font-small-2 color-mob ">

                      @foreach($row->MessageReciver as $rec)

                            @if($rec->i_receiver_id==Auth()->user()->id)

                            <i class="fa fa-calendar hidemob"></i>

                          {{date('d/m/Y',strtotime($rec->created_at))}}
<span class="hidemob">
                            <i class="fa fa-clock-o"></i>

                          {{date('H:i',strtotime($rec->created_at))}}
</span>
                          @endif

                          @endforeach</span></p>

                      <h6 class="list-group-item-heading text-bold-500">{{$row->title}}

                        <span class="float-right">

                          <span class="font-small-2 primary"></span>

                        </span>

                      </h6>

                      <p class="list-group-item-text mb-0">

                          

                        <!-- <span class="float-right primary">

                          <span class="badge badge-danger mr-1">Family</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span>-->

                      </p>

                    </div>

                  </a>
                  <hr />
                  @endforeach

                </div>
                @endforeach
              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

    @if(count($inbox)>0)

    <div class="content-right">

      <div class="content-wrapper" style="padding:0px!important;">

        <div class="content-header row">

        </div>

        <div class="content-body">

          <div class="card email-app-details d-block">

            <div class="card-content" style=" height: 692.406px; padding-right: 40px;">

              <div class="email-app-options card-body">

                <div class="row">

                  <div class="col-xs-6">

                    <div class="btn-group" role="group" aria-label="Basic example">

                      <button style="font-size: 20px;color: #000;" type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"

                      data-placement="top" onclick="ReplayMsg()" data-original-title="{{trans('admin.Replay')}}">
                          <i class="la la-reply" style="margin-left: 13px;"></i> رد</button>

                      <button style="font-size: 20px;color: #000;" type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"

                      data-placement="top" onclick="forwordMsg()" data-original-title="{{trans('admin.Forword')}}">
                          <i class="la la-arrow-left" style="margin-left: 13px;" ></i>تحويل</button>
                      <button   type="button" class="btn btn-sm btn-outline-secondary hidemob" data-toggle="tooltip"

                      data-placement="top" onclick="StarMsg()" data-original-title="{{trans('admin.mark_star')}}">
                          <i class="ft-star"></i></button>

                      <button type="button" class="btn btn-sm btn-outline-secondary hidemob" data-toggle="tooltip" onclick="$('#moveFolder').modal('show')"

                      data-placement="top" data-original-title="{{trans('admin.move_to_folder')}}"><i class="la la la-exchange"></i></button>
                      <button type="button" class="btn btn-sm btn-outline-secondary btn-send btn-info" data-toggle="tooltip"
                      data-placement="top" style="display:none" onclick="setSend()" data-original-title="إرسال">
                          <i class="la la-paper-plane-o"></i></button>

                      <!--<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"

                      data-placement="top" data-original-title="Report SPAM"><i class="ft-alert-octagon"></i></button>-->

                      <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"

                      data-placement="top" data-original-title="{{trans('admin.Delete')}}" onclick="deleteMessage()"><i class="ft-trash-2"></i></button>

                    </div>

                  </div>

                  <div class="col-xs-6  text-right">

                    <div class="btn-group" role="group" aria-label="Basic example">

                      <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"

                      data-placement="top" data-original-title="{{trans('admin.Previous')}}" onclick="getSeqMsg($('#msg_id').val(),2)"><i class="la la-angle-right"></i></button>

                      <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"

                      data-placement="top" data-original-title="{{trans('admin.Next')}}" onclick="getSeqMsg($('#msg_id').val(),1)"><i class="la la-angle-left"></i></button>

                    </div>

                  </div>

                </div>

              </div>

              <div class="email-app-title card-body">

                <h3 class="list-group-item-heading" id="msg_title" style="text-align: center:"><b class="primary1">{{trans('admin.subject')}}</b>: {{ $inbox[0]->title}}</h3>

              </div>

              <div class="media-list">

                <div id="headingCollapse2" class="card-header p-0"  style="display:none">

                  <a data-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2"

                  class="email-app-sender media border-0">

                    <div class="media-left pr-1">

                      <span class="avatar avatar-md">

                        <img class="media-object rounded-circle" id="msg_img" src="{{ $inbox[0]->admin->image}}" alt="">

                        <input type="hidden" id="msg_id" name="msg_id" value="{{ $inbox[0]->id}}" >

                        <input type="hidden" id="msg_type" name="msg_type" value="1" >

                      </span>

                    </div>
                    <div id="allReciver" style="diplay:none"></div>

                    <div class="media-body w-100">

                      <h6 class="list-group-item-heading" id="msg_sender">{{ $inbox[0]->admin->nick_name}}</h6>

                      <p class="list-group-item-text">

                          <span id="msg_reciver">{{ Auth()->user()->nick_name}}</span><br/>

                        <span id="msg_time">

                            <i class="fa fa-calendar hidemob"></i>{{ date('d/m/Y',strtotime($inbox[0]->MessageReciver[0]->created_at)) }}
<span class="hidemob">
                            <i class="fa fa-clock-o"></i>{{ date('H:i',strtotime($inbox[0]->MessageReciver[0]->created_at)) }}
</span>
                        </span> 

                        <span class="float-right" style="display:none">

                          <i class="la la-reply mr-1"></i>

                          <i class="la la-arrow-right mr-1"></i>

                        </span>

                      </p>

                    </div>

                  </a>

                </div>

                <div id="collapse2" role="tabpanel" aria-labelledby="headingCollapse2" class="card-collapse"

                aria-expanded="false">

                  <div class="card-content">

                    <div class="email-app-text card-body">

                      <div class="email-app-message" id="msg_content">
                          <b class="primary1 hidemob">{{trans('admin.content')}}</b><hr />
                        <?php echo $inbox[0]->content ?>

                      </div>

                    </div>

                  </div>

                </div>
                <div class="email-app-text-action card-body" id="msg_related_div">

                </div>

                <div class="email-app-text-action card-body" id="msg_attach">

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

    @endif

  </div>
  <script src="https://template.expand.ps/public1/ckeditor/ckeditor.js"></script>

  <div class="modal fade text-left" id="AppModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"aria-hidden="true">

      <div class="modal-dialog docmob" role="document" style="width: 75%;">
        <div class="modal-content">
          <div class="modal-header modal-header2" style="">
            <h4 class="modal-title" id="myModalLabel1" style=""><span>{{trans('admin.new_message')}}</span></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #ffffff; margin-right: 0px;">
                <span aria-hidden="true" style="color: black; direction: rtl !important ">×</span>
            </button>
          </div>
<form method="post" id="formDataaa" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="col-md-12" style="padding-top: 10px">
            <div class="form-group">
                <div class="input-group" style="width: 100% !important;">
                    <div class="input-group-prepend prependmob" style="width: 10%">
                        <span class="input-group-text input-group-text1" id="basic-addon1" style="width: 100%;padding: 18px !important;" >
                          {{trans('admin.to')}}
                        </span>
                    </div> 
                      <select class="select2 form-control" multiple="multiple" id="to"  name="to[]" >
                          @foreach($employees as $row)
                          <option value="{{$row->id}}">{{$row->nick_name}}</option>
                          @endforeach
                      </select>
                </div>
            </div>
          </div>


          <div class="col-md-12" style="">
            <div class="form-group">
                <div class="input-group" style="width: 100% !important;">
                    <div class="input-group-prepend prependmob" style="width: 10%">
                        <span class="input-group-text input-group-text1" id="basic-addon1" style="width: 100%" >
                          {{trans('admin.cc')}}
                        </span>
                    </div>
                      <select class="select2 form-control" multiple="multiple" id="cc"  name="cc[]" >
                          @foreach($employees as $row)
                          <option value="{{$row->id}}">{{$row->nick_name}}</option>
                          @endforeach
                      </select>
                </div>
            </div>
          </div>


          <div class="col-md-12" style="">
            <div class="form-group">
                <div class="input-group" style="width: 100% !important;">
                    <div class="input-group-prepend prependmob1" style="width: 10%">
                        <span class="input-group-text input-group-text1" id="basic-addon1" style="width: 100%;padding: 7px !important;height: 40px;" >
                          {{trans('admin.subject')}}
                        </span>
                    </div>
                    <input type="text" id="subject"  name="subject" class="form-control " placeholder="" aria-describedby="basic-addon1" style="">
                    <input type="hidden" id="modal_msg_id"  name="modal_msg_id" value=0>
                    <input type="hidden" id="modal_msg_related"  name="modal_msg_related" value=0 >
                        <input type="hidden" id="is_sent" name="is_sent" value="1" >
                </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 pr-s-12" style="">
              <div class="form-group">
                  <div class="input-group w-s-87 mt-s-6" style="width: 100% !important;">
                      <textarea id="summary-ckeditor" name="summary-ckeditor"  class="form-control" style="color:darkslategrey; border-color: slategray; font-size: 14pt;"></textarea>
                      <textarea id="summaryCkeditor" name="summaryCkeditor" style="display:none"></textarea>
                  </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md attachs-section" style="margin-left: 25px; margin-right: 25px;">
                <img src="https://db.expand.ps/images/upload.png" width="40" height="40"
                onclick="document.getElementById('formDataaaupload-file[]').click(); return false">
                <span class="attach-header"> {{trans('admin.attach')}}</span>
            </div>
          </div>

          <div class="row attachs-body" style="margin-left: 25px; margin-right: 25px;">
            <div class="form-group col-12 mb-2">
        
        
                <input type="hidden" name="fromname" value="formData">
                <input type="file" class="form-control-file" id="formDataaaupload-file[]" multiple=""
                    name="formDataaaUploadFile[]" onchange="doUploadAttach('formDataaa')" style="display: none">
                <div class="row formDataaaImagesArea">
                </div>
                <div class="row formDataaaFilesArea" style="margin-left: 0px;">
                </div>
                <div class="row formDataaaLinkArea" style="margin-left: 0px;">
                </div>
            </div>
          </div>

          <div style="text-align: center; padding-bottom: 10px">
            <button type="submit" class="btn btn-info " onclick="$('#is_sent').val(1)">
              <i class="la la-paper-plane-o mr-1"></i>
               {{trans('admin.Send')}} 
            </button>
            <button type="submit" class="btn btn-danger " onclick="$('#is_sent').val(0)">
              <i class="ft-file mr-1"></i>
               {{trans('admin.Draft')}} 
            </button>
          </div>
        </form>
        </div>
      </div>

</div>
  <div class="modal fade text-left" id="newFolder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"aria-hidden="true">

    <div class="modal-dialog"  role="document">

      <div class="modal-dialog modal-dialog2" role="document">
        <div class="modal-content" style="width: 500px;">
          <div class="modal-header modal-header2" style="background-color: #ffffff; direction: ltr">
            <h4 class="modal-title" id="myModalLabel1" style="color: #000000;"><span>{{trans('admin.new_folder')}}</span></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #ffffff; margin-right: 0px;">
                <span aria-hidden="true" style="color: black; direction: rtl !important ">×</span>
            </button>
          </div>
<form method="post" id="FolderFrm" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="col-md-12" style="padding-top: 10px">
            <div class="form-group">
                <div class="input-group" style="width: 100% !important;">
                    <div class="input-group-prepend">
                        <span class="input-group-text input-group-text1" id="basic-addon1">
                          {{trans('admin.folder_name')}}
                        </span>
                    </div>
                    <input class="form-control" type="text" id="name"  name="name"  placeholder="{{trans('admin.folder_name')}}" style="direction: ltr">

                </div>
            </div>
          </div>
          <div style="text-align: center; padding-bottom: 10px">
            <button type="submit" class="btn btn-info " >
              <i class="la la-save"></i>
               {{trans('admin.save')}}
            </button>
          </div>
        </form>
        </div>
      </div>

    </div>

</div>

  <div class="modal fade text-left" id="moveFolder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"aria-hidden="true">

    <div class="modal-dialog"  role="document">

      <div class="modal-dialog modal-dialog2" role="document">
        <div class="modal-content" style="width: 500px;">
          <div class="modal-header modal-header2" style="background-color: #ffffff; direction: ltr">
            <h4 class="modal-title" id="myModalLabel1" style="color: #000000;"><span>{{trans('admin.new_folder')}}</span></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #ffffff; margin-right: 0px;">
                <span aria-hidden="true" style="color: black; direction: rtl !important ">×</span>
            </button>
          </div>
<form method="post" id="moveFolderFrm" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="movFolderMsgID" name="movFolderMsgID" value="{{ csrf_token() }}">

          <div class="col-md-12" style="padding-top: 10px">
            <div class="form-group">
                <div class="input-group" style="width: 100% !important;">
                    <div class="input-group-prepend">
                        <span class="input-group-text input-group-text1" id="basic-addon1">
                          {{trans('admin.folder_name')}}
                        </span>
                    </div>
                    <select class="form-control" type="text" id="i_folder"  name="i_folder">
                    @foreach($folders as $row1)
                        <option value="{{$row1->id}}">{{$row1->name}}</option>
                    @endforeach
                    </select>

                </div>
            </div>
          </div>
          <div style="text-align: center; padding-bottom: 10px">
            <button type="submit" class="btn btn-info " >
              <i class="la la-save"></i>
              {{trans('admin.move')}}
            </button>
          </div>
        </form>
        </div>
      </div>

    </div>

</div>
  

  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <!-- BEGIN PAGE LEVEL JS-->

  <!-- END PAGE LEVEL JS-->


@section('script')


  <script src="https://template.expand.ps/app-assets/js/scripts/pages/email-application.js" type="text/javascript"></script>
<script>
var cerIn = CKEDITOR.replace('summary-ckeditor', {
      // Define the toolbar groups as it is a more accessible solution.
      defaultLanguage : 'ar',
      font_defaultLabel : 'Arial',
       contentsCss: ["body {font-size: 18px;}"],
      language:'ar',
      height:200,
      width:'100%',
      toolbarGroups : [
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	],
      
    //   removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,PasteFromWord'
      removeButtons : 'Source,Save,Templates,Find,Replace,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Subscript,Superscript,CopyFormatting,CreateDiv,Language,Link,Unlink,Anchor,Image,Flash,Smiley,SpecialChar,PageBreak,Iframe,ShowBlocks,About,ExportPdf,NewPage,Preview,Print'

    });
var arr=Array();
function getMsgByTypeID(type,id){
    $(".loader").show()
    $(".btn-send").hide()
    if(type==3){
    $(".btn-send").show()
        type=2;
    }



    $.ajax({

        type: 'post', 

        url: "getMessage",

        data: {

            val: id,

            _token: '{{csrf_token()}}',

            

        },



   success:function(response){
       if (window.matchMedia('(max-width: 767px)').matches) {
        window.scrollTo(0, 600);
       }
        console.log(response[0]);
response=response[0]

        if(response){
            cerIn.setData(response.content)
            txt='<b>{{trans('admin.content')}}</b><hr />'+cerIn.getData()
            cerIn.setData('')
$("#msg_related_div").html('')
for(i=0;i<response.message_reciver.length;i++)
    arr[i]=response.message_reciver[i].i_receiver_id;
            if(type==1){

            $("#msg"+response.id).removeAttr('class')

            $("#msg"+response.id).attr('class','media  border-0')

            $("#msg_id").val(response.id)

            $("#msg_type").html(type)

            $("#msg_title").html('<b class="primary1">{{trans('admin.subject')}}</b>:'+ response.title)

            $("#msg_img").attr('src',response.admin.image)

            $("#msg_sender").html(response.admin.nick_name)

            $("#msg_reciver").html('{{Auth()->user()->nick_name}}')

            d=new Date(response.message_reciver[0].created_at)

            //console.log(d.getDay()+'/'+d.getMonth()+'/'+d.getFullYear())

            $("#msg_time").html('<i class="fa fa-calendar hidemob"></i>'+d.getDay()+'/'+d.getMonth()+'/'+d.getFullYear()

            +' <i class="fa fa-clock-o"></i>'+d.getHours()+':'+d.getMinutes())

            $("#msg_content").html(txt)
            if(response.replaied_to>0)
                if(response.created_by=={{Auth()->user()->id}})
                    $("#msg_related_div").html('<b>مراسلة مرتبطة:  </b><a style="color: #1E9FF2 !important; font-weight:bold;" onclick="getMsgByTypeID(2,'+response.replaied_to+')" >'+response.replaied.title+'</a>')
                else
                    $("#msg_related_div").html('<b>مراسلة مرتبطة: </b><a style="color: #1E9FF2 !important; font-weight:bold;" onclick="getMsgByTypeID(1,'+response.replaied_to+')" >'+response.replaied.title+'</a>')

            }
            else{
                

            $("#msg"+response.id).removeAttr('class')

            $("#msg"+response.id).attr('class','media  border-0')

            $("#msg_id").val(response.id)
        console.log(response[0]);

            $("#msg_type").html(type)

            $("#msg_title").html('<b class="primary1">{{trans('admin.subject')}}</b>:'+ response.title)

            $("#msg_img").attr('src',response.admin.image)

            $("#msg_sender").html('{{Auth()->user()->nick_name}}')

            $("#msg_reciver").html(response.admin.nick_name)

            d=new Date(response.message_reciver[0].created_at)

            //console.log(d.getDay()+'/'+d.getMonth()+'/'+d.getFullYear())

            $("#msg_time").html('<i class="fa fa-calendar hidemob"></i>'+d.getDay()+'/'+d.getMonth()+'/'+d.getFullYear()

            +' <i class="fa fa-clock-o"></i>'+d.getHours()+':'+d.getMinutes())

            $("#msg_content").html(txt)
            if(response.replaied_to>0)
                if(response.created_by=={{Auth()->user()->id}})
                    $("#msg_related_div").html('<b>مراسلة مرتبطة: </b><a style="color: #1E9FF2 !important; font-weight:bold;" onclick="getMsgByTypeID(2,'+response.replaied_to+')" >'+response.replaied.title+'</a>')
                else
                    $("#msg_related_div").html('<b>مراسلة مرتبطة: </b><a style="color: #1E9FF2 !important; font-weight:bold;" onclick="getMsgByTypeID(1,'+response.replaied_to+')" >'+response.replaied.title+'</a>')


            
            }
            
             var i=1;
                $actionBtn="<div class='row' style='margin-left:0px;'>";
                response.files.forEach(file => {
                    shortCutName=file.real_name;
                    shortCutName=shortCutName.substring(0, 20);
                    urlfile='{{ asset('') }}';
                    urlfile+=file.url;
                    if(file.extension=="jpg"||file.extension=="png")
                    fileimage='{{ asset('assets/images/ico/image.png') }}';
                    else if(file.extension=="pdf")
                    fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                    else if(file.extension=="excel"||file.extension=="xsc")
                    fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                    else
                    fileimage='{{ asset('assets/images/ico/file.png') }}';
                    $actionBtn += '<div id="attach" class=" col-sm-4 ">'
                        +'<div class="attach">'                                        
                          +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                            +'  <span class="attach-text">'+shortCutName+'</span>'
                            +'    <img style="width: 20px;"src="'+fileimage+'">'
                            +'</a>'
                        +'</div>'
                        +'</div>'; 
                });
                $actionBtn += '</div>';
                $("#msg_attach").html($actionBtn)

        }

        $(".loader").hide()



$(".media").removeClass("selectedMsg")
$("#msg"+id).addClass("selectedMsg")


         },



        });



}

function deleteMessage(){

    if(!confirm('هل تريد حذف السجل'))

        return;

    $(".loader").show()



    $.ajax({

        type: 'post', 

        url: "deleteMessage",

        data: {

            val: $("#msg_id").val(),

            msg_type: $("#msg_type").val(),

            _token: '{{csrf_token()}}',

            

        },



   success:function(response){

        console.log(response);

        id=$("#msg_id").val();

        if(response){

            if($("#msg"+id).next().children().length>0)

                $("#msg"+id).next().trigger('click')

            else if($("#msg"+id).prev().children().length>0)

                $("#msg"+id).prev().trigger('click')

            else

                self.location=document.URL

                

                $("#msg"+id).remove();

        }

        $(".loader").hide()





         },



        });



}

function setSend(){

    if(!confirm('هل تريد إرسال الرسالة'))

        return;

    $(".loader").show()



    $.ajax({

        type: 'post', 

        url: "setSend",

        data: {

            val: $("#msg_id").val(),
            _token: '{{csrf_token()}}',
        },
   success:function(response){

            Swal.fire({

                position: 'top-center',

                icon: 'success',

                title: 'تمت العملية بنجاح',

                showConfirmButton: false,

                timer: 1500

            })
                $(".loader").hide();
                
                
		setTimeout(function() {
                    self.location=document.URL
			
		},1500)





         },



        });



}
function StarMsg(){

    $(".loader").show()
    $.ajax({

        type: 'post', 

        url: "StarMsg",

        data: {

            val: $("#msg_id").val(),
            _token: '{{csrf_token()}}',
        },
   success:function(response){

            Swal.fire({

                position: 'top-center',

                icon: 'success',

                title: 'تمت العملية بنجاح',

                showConfirmButton: false,

                timer: 1500

            })
                $(".loader").hide();
                setTimeout(function(){
                    self.location=document.URL
                },1500)





         },



        });



}


$("#formDataaa").on("submit",function(){
$("#summary-ckeditor").val(cerIn.getData())
$("#summaryCkeditor").val(cerIn.getData())
    
	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide');
        var formData = new FormData($("#formDataaa")[0]);
        $.ajax({

            url: 'storeMessage',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {
                
            Swal.fire({

                position: 'top-center',

                icon: 'success',

                title: 'تمت العملية بنجاح',

                showConfirmButton: false,

                timer: 1500

            })
            setTimeout(function(){
                self.location=document.URL
            },2000)
            
                $("#to").select2("destroy");
                $("#cc").select2("destroy");
                $("#to").select2();
                $("#cc").select2();
                $("#subject").val('');
                cerIn.setData('')
                $("#formDataaa").trigger("reset");
                $(".formDataaaFilesArea").html('');
                console.log("Form is empty");
                $(".loader").hide();
                $(".form-actions").removeClass('hide');
                $("#AppModal").modal('hide')
            },
            error:function(){
                $(".alert-success").addClass("hide");
                $(".alert-danger").removeClass('hide');
                $("#errMsg").text(data.status.msg)
                $(".loader").addClass('hide');
                $(".form-actions").removeClass('hide');
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    })
$("#FolderFrm").on("submit",function(){
$("#summary-ckeditor").html(cerIn.getData())
$("#summaryCkeditor").html(cerIn.getData())
    
	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide');
        var formData = new FormData($("#FolderFrm")[0]);
        $.ajax({

            url: 'storeFolder',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {
                
            Swal.fire({

                position: 'top-center',

                icon: 'success',

                title: 'تمت العملية بنجاح',

                showConfirmButton: false,

                timer: 1500

            })
                $(".loader").hide();
                $("#FolderFrm").trigger("reset");
                setTimeout(function(){
                    self.location=document.URL
                },1500)
                $("#newFolder").modal('hide')
            },
            error:function(){
                $(".alert-success").addClass("hide");
                $(".alert-danger").removeClass('hide');
                $("#errMsg").text(data.status.msg)
                $(".loader").addClass('hide');
                $(".form-actions").removeClass('hide');
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    })
$("#moveFolderFrm").on("submit",function(){
$("#summary-ckeditor").html(cerIn.getData())
$("#summaryCkeditor").html(cerIn.getData())
    $("#movFolderMsgID").val($("#msg_id").val())
	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide');
        var formData = new FormData($("#moveFolderFrm")[0]);
        $.ajax({

            url: 'moveFolder',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {
                
            Swal.fire({

                position: 'top-center',

                icon: 'success',

                title: 'تمت العملية بنجاح',

                showConfirmButton: false,

                timer: 1500

            })
                $(".loader").hide();
                $("#moveFolderFrm").trigger("reset");
                setTimeout(function(){
                    self.location=document.URL
                },1500)
                $("#moveFolder").modal('hide')
            },
            error:function(){
                $(".alert-success").addClass("hide");
                $(".alert-danger").removeClass('hide');
                $("#errMsg").text(data.status.msg)
                $(".loader").addClass('hide');
                $(".form-actions").removeClass('hide');
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    })
    
function forwordMsg(){
    $("#modal_msg_related").val($("#msg_id").val())
    $("#subject").val($("#msg_title").html())
    cerIn.setData($("#msg_content").html())
    $('#AppModal').modal('show')
}
function ReplayMsg(){
    $("#modal_msg_related").val($("#msg_id").val())
    /*$("#subject").val($("#msg_title").html())
    cerIn.setData($("#msg_content").html())*/
    $('#to').val(arr);
    $('#to').trigger('change');
    $('#AppModal').modal('show')
}
function getSeqMsg(id,type){

                $(".loader").show();


    $.ajax({

        type: 'post', 

        url: type==1?"getNextMessage":"getPrevMessage",

        data: {

            val: id,

            _token: '{{csrf_token()}}',

            

        },



   success:function(response){

        console.log(response[0]);
response=response[0]

        if(response){
$("#msg_related_div").html('')
for(i=0;i<response.message_reciver.length;i++)
    arr[i]=response.message_reciver[i].i_receiver_id;

            $("#msg"+response.id).removeAttr('class')

            $("#msg"+response.id).attr('class','media  border-0')

            $("#msg_id").val(response.id)

            $("#msg_type").html(type)

            $("#msg_title").html('<b class="primary1">{{trans('admin.subject')}}</b>:'+ response.title)

            $("#msg_img").attr('src',response.admin.image)

            $("#msg_sender").html(response.admin.nick_name)

            $("#msg_reciver").html('{{Auth()->user()->nick_name}}')

            d=new Date(response.message_reciver[0].created_at)

            //console.log(d.getDay()+'/'+d.getMonth()+'/'+d.getFullYear())

            $("#msg_time").html('<i class="fa fa-calendar hidemob"></i>'+d.getDay()+'/'+d.getMonth()+'/'+d.getFullYear()

            +' <i class="fa fa-clock-o"></i>'+d.getHours()+':'+d.getMinutes())

            $("#msg_content").html('<b class="primary1">{{trans('admin.content')}}</b><hr />'+response.content)
            if(response.replaied_to>0)
                if(response.created_by=={{Auth()->user()->id}})
                    $("#msg_related_div").html('<b>مراسلة مرتبطة: </b><a style="color: #1E9FF2 !important; font-weight:bold;" onclick="getMsgByTypeID(2,'+response.replaied_to+')" >'+response.replaied.title+'</a>')
                else
                    $("#msg_related_div").html('<b>مراسلة مرتبطة: </b><a style="color: #1E9FF2 !important; font-weight:bold;" onclick="getMsgByTypeID(1,'+response.replaied_to+')" >'+response.replaied.title+'</a>')

             var i=1;
                $actionBtn="<div class='row' style='margin-left:0px;'>";
                response.files.forEach(file => {
                    shortCutName=file.real_name;
                    shortCutName=shortCutName.substring(0, 20);
                    urlfile='{{ asset('') }}';
                    urlfile+=file.url;
                    if(file.extension=="jpg"||file.extension=="png")
                    fileimage='{{ asset('assets/images/ico/image.png') }}';
                    else if(file.extension=="pdf")
                    fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                    else if(file.extension=="excel"||file.extension=="xsc")
                    fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                    else
                    fileimage='{{ asset('assets/images/ico/file.png') }}';
                    $actionBtn += '<div id="attach" class=" col-sm-4 ">'
                        +'<div class="attach">'                                        
                          +' <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank">'
                            +'  <span class="attach-text">'+shortCutName+'</span>'
                            +'    <img style="width: 20px;"src="'+fileimage+'">'
                            +'</a>'
                        +'</div>'
                        +'</div>'; 
                });
                $actionBtn += '</div>';
                $("#msg_attach").html($actionBtn)

        }
        else
        
            Swal.fire({

                position: 'top-center',

                icon: 'success',

                title: 'لا يوجد شيء للعرض',

                showConfirmButton: false,

                timer: 1500

            })

        $(".loader").hide()





         },



        });



}


        $(document).ready(function(){
            $("#iconLeft4").on("keydown",function(){
                var txt = $("#iconLeft4").val();
                //console.log(txt)
                $('a.media').each(function(){
                   if($(this).html().indexOf(txt) != -1){
                       $(this).show();
                   }
                else
                       $(this).hide();
                });
            })
            
        sidebarleft=$(".sidebar-left").height()
		contentright=$(".content-right").height()

		setTimeout(function() {
		    if(screen.width>600){
			if (sidebarleft > contentright)
				$(".content-right").attr("style", "min-height:" + ($(".sidebar-left").height() + "px"))
			else
				$(".sidebar-left").attr("style", "min-height:" + ($(".content-right").height() + "px"))
			
		    }
			
		},1000)
        })
</script>

@endsection



@endsection