<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center navmob" style="height: 70px;">
  <div class="navbar-wrapper">
    <div class="navbar-header ">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" ><i class="fa fa-large font-large-1"></i></a></li>
        <li class="nav-item">
          <a class="navbar-brand" style="padding: 0px;padding-left:20px;" href="{{ route('admin.dashboard') }}">
            <img class="" alt="modern admin logo" src="{{$setting->logo}}" style="height:64px !important;margin-top: 7px;"  title="" >
          </a>
        </li>
        <li class="nav-item d-md-none">
          <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
              <!--<i class="la la-ellipsis-v"></i>-->
              <span class="avatar avatar-online ">
                
                  <img src="{{auth('admin') -> user() -> image}}" style="max-height: 45px;max-width: 90%;" alt="avatar">
               
              </span>
          </a>
        </li>
      </ul>
    </div>
    <div class="navbar-container container center-layout">
      <div class="collapse navbar-collapse show" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
          <li class="nav-item d-none d-md-block"><a id="nav_hover" class="nav-link nav-menu-main hidden-xs" onclick="
            if($('.navbar-expand-sm').hasClass('hide')) 
              $('.navbar-expand-sm').removeClass('hide');
            else 
              $('.navbar-expand-sm').addClass('hide');
              setTimeout(function(){
              $('.horizontal-menu.menu-collapsed #main-menu-navigation .nav-item a span').show()
              },100)
  
            "  ><i class="fa fa-bars" style="font-size: 1.9rem;margin-top: 7px; "></i></a></li>
            @can('dailyTasksReport')
          <li class="dropdown nav-item mega-dropdown hideMob" style="padding-top: 15px;">
            <a  href="{{ route('totalReport')}}">
              
                <img src="{{asset('assets/images/ico/rep.png')}}" style="height: 32px;">
            </a>
          </li>
          @endcan
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown" style="color:#000;">
                            <span class="mr-1">
                                <font class="hideMob">{{trans('admin.hello')}} ,</font>
                              <span class="user-name text-bold-700"> {{auth('admin') -> user() -> nick_name}} </span>
                            </span>
              <span class="avatar avatar-online hideMob">
                
                  <img src="{{auth('admin') -> user() -> image}}" style="    max-height: 35px;" alt="avatar">
               
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item " href="{{route('password_index')}}"><i class="ft-user"></i>  الملف الشخصي</a>
              <a class="dropdown-item " href="{{route('empArchive')}}"><img src="{{asset('assets/images/archives.png')}}" style="height: 13px;"></i> أرشيف الموظف </a>
              
            {{-- <a class="dropdown-item" style="    margin-top: 5px;" href=""><i class="ft-mail"></i>صندوق الوارد
            <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">0</span>
            </a> --}}
            <a class="dropdown-item hide" href="#"><i class="ft-check-square"></i> المهام</a>
            <a
              class="dropdown-item hide" href="#"><i class="ft-message-square"></i> دردشة</a>
            <div class="dropdown-divider hide"></div><a class="dropdown-item" href="{{route('admin.logout')}}"><i class="ft-power"></i> {{trans('admin.logout')}}</a>
            
          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
          @if(app()->getLocale()!=$localeCode) 
              <a class="dropdown-item"  rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                  <img src="{{asset('assets/images/translation.png')}}" style="height: 13px;"> {{ $properties['native'] }}</a>
          @endif
                                          @endforeach
            
          </div>
          </li>

         @can('orgEmail')
          <li class="dropdown dropdown-notification nav-item">
            <a class="nav-link nav-link-label" style="    margin-top: 5px;" href="{{route('mailPage')}}">
                <img src="{{asset('assets/images/ico/email.png')}}" style="height: 32px;margin-left: 14px;">
              <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">{{ count($rMsgemp)}}</span>
            </a>
          </li>
          @endcan
          @can('deptTasks')
           <li class="d-md-block showMob foatLeaftMobile" title="مهام الأقسام">
                <a class="nav-link nav-link-expand"
                    href="{{ route('alldeptticket') }}" style="padding-top: 21px;">
                    <span class="hideScreen" style="float:left;padding-top:10px;padding-right: 5px;"></span>
                    <img src="https://db.expand.ps/images/ByDept.png" style="height: 32px;">
                </a>
            </li>
          @endcan
        </ul>

        <ul class="nav navbar-nav float-right">
          @yield('search')
         @can('showNotificationList') 
        <li class="dropdown dropdown-notification  hideMob">
			<a class="nav-link nav-link-label" href="#" data-toggle="dropdown" style="color: #000;">
			    قائمة الاشعارات
			    <i class="fa fa-bell" style="font-size:18pt;"></i> 
				<span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow notiCntr" id="setAllAsRead">0</span>
			</a>
			<ul class="dropdown-menu dropdown-menu-media dropdown-menu-right" style="width: 500px;">
				<li class="scrollable-container media-list media-list1 w-100 ps-container ps-theme-dark noti_list" style="max-height: 600px !important;" data-ps-id="a5a8fe69-1beb-3d41-c5b0-8fed8c88f654">
				    
                </li>
				<!--<li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="/services/ticket/ShowAllNotification">هرض كافة الإشعارات</a></li>-->
			</ul>
			
		</li>
		@endcan
          <li class="dropdown dropdown-language nav-item" style="display:none; margin-top: 14px;"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">{{trans('admin.languages')}}<span class="selected-language"></span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown-flag">

                              <div class="dropdown-divider"></div>

              </div>
          </li>
          
        </ul>
      </div>
    </div>
  </div>
</nav>