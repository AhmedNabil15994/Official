<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('assets/images/avatar.png') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-toggle="dropdown">{{ FULL_NAME }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="{{URL::to('/profile')}}" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>{{ trans('main.myAccount') }}</span>
                    </a>

                    <!-- item-->
                    <a href="{{ URL::to('/channels') }}" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>{{ trans('main.channels') }}</span>
                    </a>

                    <!-- item-->
                    <a href="{{URL::to('/logout')}}" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>{{ trans('main.logout') }}</span>
                    </a>

                </div>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">    
                <li>
                    <a href="{{ URL::to('/dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> {{ trans('main.dashboard') }} </span>
                    </a>
                </li>

                <li>
                    <a href="{{ URL::to('/channels') }}">
                        <i class="mdi mdi-whatsapp"></i>
                        <span> {{ trans('main.channels') }} </span>
                    </a>
                </li>

                <li>
                    <a href="{{ URL::to('/apiDocs') }}">
                        <i class="mdi mdi-file-alert-outline"></i>
                        <span> {{ trans('main.apiDocs') }} </span>
                    </a>
                </li>
    

                @if(\Helper::checkRules('list-users,list-groups'))
                <li class="{{ Active(URL::to('/users*'),'menuitem-active') }} {{ Active(URL::to('/groups*'),'menuitem-active') }}">
                    <a href="#sidebarUsers" data-toggle="collapse">
                        <i class="fa fa-user-tie"></i>
                        <span> {{ trans('main.users') }} </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse {{ Active(URL::to('/users*'),'show') }} {{ Active(URL::to('/groups*'),'show') }}" id="sidebarUsers">
                        <ul class="nav-second-level">
                            @if(\Helper::checkRules('list-users'))
                            <li class="{{ Active(URL::to('/users*'),'menuitem-active') }}">
                                <a href="{{ URL::to('/users') }}">{{ trans('main.users') }}</a>
                            </li>
                        @endif
                        </ul>
                    </div>
                </li>
                @endif
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->