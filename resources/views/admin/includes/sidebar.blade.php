<aside class="my-3 bg-white border-0 sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="top-0 p-3 cursor-pointer fas fa-times text-secondary opacity-5 position-absolute end-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="m-0 navbar-brand" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="../assets/img/logo-ct-dark.png" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Creative Tim</span>
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
              <i class="text-sm ni ni-single-02 text-dark opacity-10"></i>
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
    <div class="mx-3 sidenav-footer ">
      <div class="shadow-none card card-plain" id="sidenavCard">
        <img class="mx-auto w-50" src="../assets/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
        <div class="p-3 pt-0 text-center card-body w-100">
          <div class="docs-info">
            <h6 class="mb-0">Need help?</h6>
            <p class="mb-0 text-xs font-weight-bold">Please check our docs</p>
          </div>
        </div>
      </div>
      <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank" class="mb-3 btn btn-dark btn-sm w-100">Documentation</a>
      <a class="mb-0 btn btn-primary btn-sm w-100" href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
    </div>
  </aside>