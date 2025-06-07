{{-- <!DOCTYPE html>
<html lang="en">


<!-- molla/index-4.html  22 Nov 2019 09:53:08 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Mecbilltech">

    <title>Mecbill - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="@yield('meta_keyword')" name="keywords">
    <meta content="@yield('meta_title')" name="title">
    <meta content="@yield('meta_description')" name="description">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('frontend/')}} assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('frontend/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css')}} ">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/owl-carousel/owl.carousel.css')}} ">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/magnific-popup/magnific-popup.css')}} ">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/jquery.countdown.css')}} ">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}} ">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/skins/skin-demo-4.css')}} ">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/demos/demo-4.css')}} ">
</head>
<body>

    <div class="page-wrapper">
@include('frontend.includes.navbar')
@yield('content')
@include('frontend.includes.footer')
    </div>
     <!-- Plugins JS File -->
     <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
     <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{asset('frontend/assets/js/jquery.hoverIntent.min.js')}}"></script>
     <script src="{{asset('frontend/assets/js/jquery.waypoints.min.js')}}"></script>
     <script src="{{asset('frontend/assets/js/superfish.min.js')}}"></script>
     <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
     <script src="{{asset('frontend/assets/js/bootstrap-input-spinner.js')}}"></script>
     <script src="{{asset('frontend/assets/js/jquery.plugin.min.js')}}"></script>
     <script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
     <script src="{{asset('frontend/assets/js/jquery.countdown.min.js')}}"></script>
     <!-- Main JS File -->
     <script src="{{asset('frontend/assets/js/main.js')}}"></script>
     <script src="{{asset('frontend/assets/js/demos/demo-4.js')}}"></script>
</body>
</html> --}}




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <title>Mecbill - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="@yield('meta_keyword')" name="keywords">
    <meta content="@yield('meta_title')" name="title">
    <meta content="@yield('meta_description')" name="description">


    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('admin/assets/css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
</head>

<body class="bg-gray-100 g-sidenav-show">
    <div class="top-0 position-absolute w-100 min-height-300"
        style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
        <span class="mask bg-primary opacity-6"></span>
    </div>

    @include('admin.includes.sidebar')
    <div class="main-content position-relative max-height-vh-100 h-100">
        <nav class="px-0 mx-4 shadow-none navbar navbar-main navbar-expand-lg border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="px-3 py-1 container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="px-0 pt-1 pb-0 mb-0 bg-transparent breadcrumb me-sm-6 me-5">
                        <li class="text-sm breadcrumb-item"><a class="text-white opacity-5"
                                href="javascript:;">Pages</a></li>
                        <li class="text-sm text-white breadcrumb-item active" aria-current="page">@yield('title')</li>
                    </ol>
                    <h6 class="mb-0 text-white font-weight-bolder">@yield('title')</h6>
                </nav>
                <div class="mt-2 collapse navbar-collapse mt-sm-0 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div>
                    </div>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            @php
                                $admin = Auth::guard('admin')->user();
                            @endphp

                            @if ($admin)
                                <a href="{{ route('admin.logout') }}" class="px-0 text-white nav-link font-weight-bold">
                                    <i class="fa fa-user me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Logout</span>
                                </a>
                            @else
                                <a href="{{ route('admin.login') }}" class="px-0 text-white nav-link font-weight-bold">
                                    <i class="fa fa-user me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Sign In</span>
                                </a>
                            @endif


                        </li>


                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="p-0 text-white nav-link" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="bg-white sidenav-toggler-line"></i>
                                    <i class="bg-white sidenav-toggler-line"></i>
                                    <i class="bg-white sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="px-3 nav-item d-flex align-items-center">
                            <a href="javascript:;" class="p-0 text-white nav-link">
                                <i class="cursor-pointer fa fa-cog fixed-plugin-button-nav"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="p-0 text-white nav-link" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="cursor-pointer fa fa-bell"></i>
                            </a>
                            <ul class="px-2 py-3 dropdown-menu dropdown-menu-end me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="py-1 d-flex">
                                            <div class="my-auto">
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-1 text-sm font-weight-normal">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="mb-0 text-xs text-secondary">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="py-1 d-flex">
                                            <div class="my-auto">
                                                <img src="../assets/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm bg-gradient-dark me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-1 text-sm font-weight-normal">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="mb-0 text-xs text-secondary">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="py-1 d-flex">
                                            <div class="my-auto avatar avatar-sm bg-gradient-secondary me-3">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-1 text-sm font-weight-normal">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="mb-0 text-xs text-secondary">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        @yield('content')
    </div>

    @include('admin.includes.footer')

@livewireScripts
@stack('scripts')


</body>

</html>
