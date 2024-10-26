<div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="{{ asset('img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">{{ config('app.name') }}</span>
    </a>
</div>
<hr class="horizontal light mt-0 mb-2">
<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white
            @if (Request::is('*pages/dashboard*'))
            active bg-gradient-primary
            @endif" href="{{ route('pages.dashboard.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">dashboard</i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white
            @if (Request::is('*pages/couple*'))
            active bg-gradient-primary
            @endif
            " href="{{ route('pages.couple.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">group</i>
                </div>
                <span class="nav-link-text ms-1">Couples</span>
            </a>
        </li>

        {{-- Managing Roles --}}
        {{-- <li class="nav-item">
            <a class="nav-link text-white
            @if (Request::is('*pages/roles*'))
            active bg-gradient-primary
            @endif
            " href="{{ route('pages.role.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">manage_accounts</i>
                </div>
                <span class="nav-link-text ms-1">Roles</span>
            </a>
        </li> --}}


        {{-- Managing Events --}}
        <li class="nav-item">
            <a class="nav-link text-white
            @if (Request::is('*pages/events*'))
            active bg-gradient-primary
            @endif
            " href="{{ route('pages.event.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">event</i>
                </div>
                <span class="nav-link-text ms-1">events</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link text-white " href="../pages/tables.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">table_view</i>
                </div>
                <span class="nav-link-text ms-1">Tables</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white " href="{{ route('pages.billing.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">receipt_long</i>
                </div>
                <span class="nav-link-text ms-1">Billing</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">view_in_ar</i>
                </div>
                <span class="nav-link-text ms-1">Virtual Reality</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white " href="../pages/rtl.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                </div>
                <span class="nav-link-text ms-1">RTL</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white " href="../pages/notifications.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">notifications</i>
                </div>
                <span class="nav-link-text ms-1">Notifications</span>
            </a>
        </li> --}}
        {{-- <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white " href="{{ route('pages.auth.profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">person</i>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
            </a>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link text-white " href="../pages/sign-in.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">login</i>
                </div>
                <span class="nav-link-text ms-1">Sign In</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white " href="../pages/sign-up.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">assignment</i>
                </div>
                <span class="nav-link-text ms-1">Sign Up</span>
            </a>
        </li> --}}
    </ul>
</div>
</div>
