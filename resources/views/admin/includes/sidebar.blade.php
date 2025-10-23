<aside class="my-3 bg-white border-0 sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="top-0 p-3 cursor-pointer fas fa-times text-secondary opacity-5 position-absolute end-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="m-0 navbar-brand" href="{{ route('admin.dashboard') }}">
            <span class="ms-1 font-weight-bold">Fee Payment</span>
        </a>
    </div>
    <hr class="mt-0 horizontal dark">

    <div class="w-auto collapse navbar-collapse" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            {{-- Dashboard --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active bg-gradient-primary text-white' : '' }}"
                   href="{{ route('admin.dashboard') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-tv-2 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-dark opacity-10' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            {{-- Students --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.student') ? 'active bg-gradient-primary text-white' : '' }}"
                   href="{{ route('admin.student') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-calendar-grid-58 {{ request()->routeIs('admin.student') ? 'text-white' : 'text-dark opacity-10' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Students</span>
                </a>
            </li>

            {{-- Class --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.class') ? 'active bg-gradient-primary text-white' : '' }}"
                   href="{{ route('admin.class') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-calendar-grid-58 {{ request()->routeIs('admin.class') ? 'text-white' : 'text-dark opacity-10' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Class</span>
                </a>
            </li>

            {{-- Fee Type --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.feeType') ? 'active bg-gradient-primary text-white' : '' }}"
                   href="{{ route('admin.feeType') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-calendar-grid-58 {{ request()->routeIs('admin.feeType') ? 'text-white' : 'text-dark opacity-10' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Fee Type</span>
                </a>
            </li>

            {{-- Fee Structure --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.feeStructure') ? 'active bg-gradient-primary text-white' : '' }}"
                   href="{{ route('admin.feeStructure') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-calendar-grid-58 {{ request()->routeIs('admin.feeStructure') ? 'text-white' : 'text-dark opacity-10' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Fee Structure</span>
                </a>
            </li>

            {{-- Fee Payment --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.feePayment') ? 'active bg-gradient-primary text-white' : '' }}"
                   href="{{ route('admin.feePayment') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-calendar-grid-58 {{ request()->routeIs('admin.feePayment') ? 'text-white' : 'text-dark opacity-10' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Fee Payment</span>
                </a>
            </li>

            {{-- Payment History --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.fee-payment.history') ? 'active bg-gradient-primary text-white' : '' }}"
                   href="{{ route('admin.fee-payment.history') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-credit-card {{ request()->routeIs('admin.fee-payment.history') ? 'text-white' : 'text-dark opacity-10' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Payment History</span>
                </a>
            </li>

            {{-- Divider --}}
            <li class="mt-3 nav-item">
                <h6 class="text-xs ps-4 ms-2 text-uppercase font-weight-bolder opacity-6">Account pages</h6>
            </li>

            {{-- Profile --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.profile') ? 'active bg-gradient-primary text-white' : '' }}"
                   href="{{ route('admin.profile') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-single {{ request()->routeIs('admin.profile') ? 'text-white' : 'text-dark opacity-10' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>

            {{-- Sign Out --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.logout') ? 'active bg-gradient-primary text-white' : '' }}"
                   href="{{ route('admin.logout') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="text-sm ni ni-single-copy-04 {{ request()->routeIs('admin.logout') ? 'text-white' : 'text-dark opacity-10' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Out</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
