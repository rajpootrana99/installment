<!-- Left Sidenav -->
<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{ route('admin') }}" class="logo">
                    <span style="color: #011592;">
{{--                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">--}}
                        <h4><strong>Installment</strong></h4>
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
                <a href="javascript: void(0);"> <i data-feather="dollar-sign" class="align-self-center menu-icon"></i><span>Accounts</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('head.index') }}"><i class="ti-control-record"></i>Heads</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('subHead.index') }}"><i class="ti-control-record"></i>Sub Heads</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('accountDetail.index') }}"><i class="ti-control-record"></i>Account Details</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);"> <i data-feather="box" class="align-self-center menu-icon"></i><span>Inventory</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('category.index') }}"><i class="ti-control-record"></i>Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('subCategory.index') }}"><i class="ti-control-record"></i>Sub Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('manufacturer.index') }}"><i class="ti-control-record"></i>Manufacturers</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('warehouse.index') }}"><i class="ti-control-record"></i>Warehouses</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('item.index') }}"><i class="ti-control-record"></i>Items</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('barcode.index') }}"><i class="ti-control-record"></i>Barcodes</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);"> <i data-feather="settings" class="align-self-center menu-icon"></i><span>Application Setting</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('financialYear.index') }}"><i class="ti-control-record"></i>Financial Years</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('company.index') }}"><i class="ti-control-record"></i>Companies</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('site.index') }}"><i class="ti-control-record"></i>Sites</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);"> <i data-feather="grid" class="align-self-center menu-icon"></i><span>General Setting</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('city.index') }}"><i class="ti-control-record"></i>Cities</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('area.index') }}"><i class="ti-control-record"></i>Areas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('route.index') }}"><i class="ti-control-record"></i>Routes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('employee.index') }}"><i class="ti-control-record"></i>Employees</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('vendor.index') }}"><i class="ti-control-record"></i>Vendors</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('customer.index') }}"><i class="ti-control-record"></i>Customers</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('guaranter.index') }}"><i class="ti-control-record"></i>Guaranters</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('tax.index') }}"><i class="ti-control-record"></i>Taxes</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);"> <i data-feather="credit-card" class="align-self-center menu-icon"></i><span>Multi Currency Module</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('purchase.index') }}"><i class="ti-control-record"></i>Purchase Invoice</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('sale.index') }}"><i class="ti-control-record"></i>Sales Invoice</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);"> <i data-feather="shopping-bag" class="align-self-center menu-icon"></i><span>Installment</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('installmentPlan.index') }}"><i class="ti-control-record"></i>Installment Plans</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('installment.index') }}"><i class="ti-control-record"></i>Installment</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- end left-sidenav-->
