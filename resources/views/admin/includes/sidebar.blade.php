<aside class="my-3 bg-white border-0 sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="top-0 p-3 cursor-pointer fas fa-times text-secondary opacity-5 position-absolute end-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="m-0 navbar-brand" href="{{ route('admin.dashboard') }}" target="_blank">
        {{-- <img src="../assets/img/logo-ct-dark.png" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo"> --}}
        <span class="ms-1 font-weight-bold">Fee Payment</span>
      </a>
    </div>
    <hr class="mt-0 horizontal dark">
    <div class="w-auto collapse navbar-collapse " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="{{ route('admin.dashboard') }}">
            <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
              <i class="text-sm ni ni-tv-2 text-dark opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('admin.student') }}">
            <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
              <i class="text-sm ni ni-calendar-grid-58 text-dark opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Students</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('admin.class') }}">
            <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
              <i class="text-sm ni ni-calendar-grid-58 text-dark opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Class</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('admin.feeType') }}">
            <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
              <i class="text-sm ni ni-calendar-grid-58 text-dark opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Fee Type</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('admin.feeStructure') }}">
            <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
              <i class="text-sm ni ni-calendar-grid-58 text-dark opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Fee Structure</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('admin.feePayment') }}">
            <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
              <i class="text-sm ni ni-calendar-grid-58 text-dark opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Fee Payment</span>
          </a>
        </li>
        {{-- <li><a href="{{ route('admin.fee-payment.history') }}">Payment History</a></li> --}}

        <li class="nav-item">
          <a class="nav-link " href="{{ route('admin.fee-payment.history') }}">
            <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
              <i class="text-sm ni ni-credit-card text-dark opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Payment History</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/virtual-reality.html">
            <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
              <i class="text-sm ni ni-app text-dark opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Virtual Reality</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/rtl.html">
            <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
              <i class="text-sm ni ni-world-2 text-dark opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li>
        <li class="mt-3 nav-item">
          <h6 class="text-xs ps-4 ms-2 text-uppercase font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('admin.profile') }}">
            <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
              <i class="text-sm ni ni-single text-dark opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/sign-in.html">
            <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
              <i class="text-sm ni ni-single-copy-04 text-dark opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/sign-up.html">
            <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
              <i class="text-sm ni ni-collection text-dark opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li>
      </ul>
    </div>

  </aside>
