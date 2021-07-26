<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="{{ route('admin') }}">
            <img src="images/logo.gif" class="img-fluid" alt="">
            <span>Metorik</span>
        </a>
        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="line-menu half start"></div>
                <div class="line-menu"></div>
                <div class="line-menu half end"></div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="iq-menu-title"><i class="ri-separator"></i><span>Main</span></li>
                <li class="{{ (request()->is('admin')) ? 'active' : '' }}">
                    <a href="{{ route('admin') }}" class="iq-waves-effect collapsed" ><i class="las la-home"></i><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="#account" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-money-bill"></i><span>Accounts</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="account" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ (request()->is('head')) ? 'active' : '' }}"><a href="{{ route('head.index') }}">Head</a></li>
                        <li class="{{ (request()->is('subHead')) ? 'active' : '' }}"><a href="{{ route('subHead.index') }}">Sub Head</a></li>
                        <li class="{{ (request()->is('accountDetail')) ? 'active' : '' }}"><a href="{{ route('accountDetail.index') }}">Account Detail</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#inventory" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-boxes"></i><span>Inventory</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="inventory" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ (request()->is('head')) ? 'active' : '' }}"><a href="{{ route('category.index') }}">Category</a></li>
                        <li class="{{ (request()->is('subHead')) ? 'active' : '' }}"><a href="{{ route('subCategory.index') }}">Sub Category</a></li>
                        <li class="{{ (request()->is('manufacturer')) ? 'active' : '' }}"><a href="{{ route('manufacturer.index') }}">Manufacturer</a></li>
                        <li class="{{ (request()->is('item')) ? 'active' : '' }}"><a href="{{ route('item.index') }}">Item</a></li>
                        <li class="{{ (request()->is('barcode')) ? 'active' : '' }}"><a href="{{ route('barcode.index') }}">Barcode</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
