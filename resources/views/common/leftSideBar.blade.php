<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i></button><!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center bg-logo">
            <a href="/home" class="logo"><i class="mdi mdi-bowling text-success"></i>Zainal
                Iraq</a><!-- <a href="index.html" class="logo"><img src="assets/images/logo.png" height="24" alt="logo"></a> -->
        </div>
    </div>
    <div class="sidebar-user">
        @if (auth()->check())
        <img
        src="assets/images/users/avatar-6.jpg"
        alt="user"
        class="rounded-circle img-thumbnail mb-1"
    />
            
        @else
          
        <img src="{{ asset('public/avatars/' . Auth::user()->avatar) }}" class="wd-80 ht-80 rounded-circle"
        style="object-fit: cover;" alt="Profile Picture">
       
        @endif

        <h6 class=""> {{ Auth::user()->name }}</h6>
        <p class="online-icon text-dark">
            <i class="mdi mdi-record text-success"></i>online
        </p>
        <ul class="list-unstyled list-inline mb-0 mt-2">
            {{-- <li class="list-inline-item">
                <a
                    href="#"
                    class=""
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Profile"
                    ><i class="dripicons-user text-purple"></i
                ></a>
            </li> --}}
            {{-- <li class="list-inline-item">
                <a
                    href="#"
                    class=""
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Settings"
                    ><i class="dripicons-gear text-dark"></i
                ></a>
            </li> --}}
            <li class="list-inline-item">
                <a href="{{ route('logout') }}" class="" data-toggle="tooltip" data-placement="top"
                    title="Log out"
                    onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><i
                        class="dripicons-power text-danger"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li>
                    <a href="{{ url('/home') }}" class="waves-effect"><i class="fa fa-dashboard"></i>
                        <span>Dashboard
                            <span class="badge badge-pill badge-primary float-right">7</span></span></a>
                </li>
                <li>
                    <a href="{{ url('/enquiry-list') }}" class="waves-effect"><i
                            class="fa fa-question-circle"></i><span> Enquiry</span></a>
                </li>
                @if(Auth::check() && Auth::user()->roles->contains('name', 'Admin') )
                <li>
                    <a href="{{ url('/addOn') }}" class="waves-effect"><i class="fa fa-plus"></i><span>
                            Add-On</span></a>
                </li>
               
                <li>
                    <a href="{{ url('/addZone') }}" class="waves-effect"><i class="fa fa-area-chart"></i><span> Add
                            Zone</span></a>
                </li>
                   
                <li class="menu-title">Roles & Permissions</li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-circle"></i>
                        <span>Users</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/users') }}">Users List</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-tasks"></i>
                        <span>Roles</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/roles') }}">Roles List</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cube"></i>
                        <span>Property</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/products') }}">Property List</a></li>
                        <li><a href="{{ url('/project') }}">Project List</a></li>
                    </ul>
                </li>
                <li class="menu-title">Components</li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-user-secret"></i>
                        <span>SalesMan</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/salesman') }}">Salesman List</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-receipt"></i>
                        <span>Auditor</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/auditor') }}">Auditor Lists</a></li>
                    </ul>
                </li>
                @endif
               
                @if(Auth::check() && Auth::user()->roles->contains('name', 'Admin') )
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-receipt"></i>
                        <span>Document</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/docs-view') }}">Add Docs</a></li>
                    </ul>
                </li>
            
               
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-comment-dollar"></i><span>
                            Accountant </span><span class="float-right"><i
                                class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">

                        <li>
                            <a href="{{ url('accountant') }}">Accountant List</a>
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-bank"></i>
                        <span>Bank </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ url('bank') }}">Bank List</a>
                        </li>
                    </ul>
                </li>
                    @endif
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- end sidebarinner -->
</div>
