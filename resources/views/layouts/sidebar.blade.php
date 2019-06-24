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
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

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

    <li class="nav-item">
        <a class="nav-link" href="{{route('customer')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('product')}}">
            <i class="fas fa-fw fa-industry"></i>
            <span>Products</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('order')}}">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Orders</span></a>
    </li>

    {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="{{route('template')}}">--}}
            {{--<i class="fas fa-fw fa-file-invoice"></i>--}}
            {{--<span>Templates</span></a>--}}
    {{--</li>--}}

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Reports</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Reports:</h6>
                <a class="collapse-item" href="{{route('exportDeviceSale')}}">Device Sale List</a>
                <a class="collapse-item" href="{{route('exportSales')}}">Sale List</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Settings</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Settings:</h6>
                <a class="collapse-item" href="{{route('category')}}">Categories</a>
                <a class="collapse-item" href="{{route('template')}}">Templates</a>
                <a class="collapse-item" href="{{route('ordertype')}}">Order Type</a>
                <a class="collapse-item" href="{{route('country')}}">Countries</a>
                <a class="collapse-item" href="{{route('currency')}}">Currencies</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->