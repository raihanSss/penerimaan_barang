<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text mx-3">PT Rajawali Otomotif Tirta Internasional</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    @if($authuser->role == "admin")
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Data:</h6>
                <a class="collapse-item" href="{{ url('users') }}">Users</a>
                <a class="collapse-item" href="{{ url('suppliers') }}">Suppliers</a>
                <a class="collapse-item" href="{{ url('barang') }}">Barang</a>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

    @elseif ($authuser->role == "warehouse")
    <li class="nav-item">
    <a class="nav-link" href="{{ url('suratjalan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Surat Jalan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('penerimaan') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Penerimaan</span></a>
        </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
    <a class="nav-link" href="{{ url('retur') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Retur</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
    <a class="nav-link" href="{{ url('report') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Report</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

@elseif ($authuser->role == "direktur")
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
    <a class="nav-link" href="{{ url('reportbarang') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Report</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
@endif