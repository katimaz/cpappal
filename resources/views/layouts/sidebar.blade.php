<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-45">
            <i class="fas fa-times"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CPAPPAL</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @can('hasDashboardAccess',Auth::user())
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{--<div class="sidebar-heading">--}}
        {{--Setting--}}
    {{--</div>--}}

    <!-- Nav Item - Pages Collapse Menu -->
    {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="{{route('category')}}">--}}
            {{--<i class="fas fa-fw fa-list-alt"></i>--}}
            {{--<span>Categories</span></a>--}}
    {{--</li>--}}

    @can('hasCustomerAccess',Auth::user())
    <li class="nav-item">
        <a class="nav-link" href="{{route('customer')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span></a>
    </li>
    @endcan
    @can('hasProductAccess',Auth::user())
    <li class="nav-item">
        <a class="nav-link" href="{{route('product')}}">
            <i class="fas fa-fw fa-industry"></i>
            <span>Products</span></a>
    </li>
    @endcan
    @can('hasOrderAccess',Auth::user())
    <li class="nav-item">
        <a class="nav-link" href="{{route('order')}}">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Orders</span></a>
    </li>
    @endcan
    @can('hasUserAccess',Auth::user())
    <li class="nav-item">
        <a class="nav-link" href="{{route('user')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span></a>
    </li>
    @endcan

{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{route('role')}}">--}}
{{--            <i class="fas fa-fw fa-user"></i>--}}
{{--            <span>Roles</span></a>--}}
{{--    </li>--}}
    @can('hasReportAccess',Auth::user())
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Reports</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Reports:</h6>
                <a class="collapse-item" href="{{route('devicesales')}}">Device Sale List</a>
                <a class="collapse-item" href="{{route('sales')}}">Sale List</a>
            </div>
        </div>
    </li>
    @endcan
    @can('hasSettingAccess',Auth::user())
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Settings</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Settings:</h6>
                @can('hasRoleAccess',Auth::user())
                <a class="collapse-item" href="{{route('role')}}">Roles</a>
                @endcan
                @can('hasCategoryAccess',Auth::user())
                <a class="collapse-item" href="{{route('category')}}">Categories</a>
                @endcan
                @can('hasTemplateAccess',Auth::user())
                <a class="collapse-item" href="{{route('template')}}">Templates</a>
                @endcan
                @can('hasOrderTypeAccess',Auth::user())
                <a class="collapse-item" href="{{route('ordertype')}}">Order Type</a>
                @endcan
                @can('hasCountryAccess',Auth::user())
                <a class="collapse-item" href="{{route('country')}}">Countries</a>
                @endcan
                @can('hasCurrencyAccess',Auth::user())
                <a class="collapse-item" href="{{route('currency')}}">Currencies</a>
                @endcan
            </div>
        </div>
    </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->