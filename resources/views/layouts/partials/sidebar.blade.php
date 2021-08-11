<!-- Left Sidenav -->
<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{ route('admin') }}" class="logo">
                    <span style="color: #011592;">
{{--                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">--}}
                        <h4><strong>Al - Haram Furniture's</strong></h4>
                    </span>
            {{--<span>
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light">
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-dark">
            </span>--}}
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            <li class="menu-label mt-0">Main</li>
            <li>
                <a href="{{ route('admin') }}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="javascript: void(0);"> <i data-feather="grid" class="align-self-center menu-icon"></i><span>Chart of Account</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('head.index') }}"><i class="ti-control-record"></i>Heads</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('subHead.index') }}"><i class="ti-control-record"></i>Sub Heads</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('accountDetail.index') }}"><i class="ti-control-record"></i>Account Details</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- end left-sidenav-->
