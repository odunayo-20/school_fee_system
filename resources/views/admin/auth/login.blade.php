<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>

    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('admin/assets/css/argon-dashboard.css') }}" rel="stylesheet" />
</head>

<body class="">

    <main class="mt-0 main-content">
        <div class="pt-5 m-3 page-header align-items-start min-vh-50 pb-11 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>

        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="mx-auto col-xl-4 col-lg-5 col-md-7">
                    <div class="card z-index-0">
                        <div class="pt-4 text-center card-header">
                            <h5>Login</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.loginConfirm') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                        aria-label="Email">
                                    @error('email')
                                        <span class="text-xs text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        aria-label="Password">
                                    @error('password')
                                        <span class="text-xs text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-check form-check-info text-start">
                                    <input class="form-check-input" name="remember" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label text-dark font-weight-bolder" for="flexCheckDefault">
                                        Remember Me
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="my-4 mb-2 btn bg-gradient-dark w-100">Login</button>
                                </div>

                                <p class="mt-3 mb-0 text-sm"><a href="{{ route('admin.forget') }}"
                                        class="text-dark font-weight-bolder">Forgot Password</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="py-5 footer">
        <div class="container">

            <div class="row">
                <div class="mx-auto mt-1 text-center col-8">
                    <p class="mb-0 text-secondary">
                        Copyright <a href="{{ route('admin.signup') }}"> ©</a> Winatech Solution Limited
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    {{-- <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script> --}}

    <!--   Core JS Files   -->
    <script src="{{ asset('admin/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>

    {{-- <link id="pagestyle" href="{{asset('admin/assets/css/argon-dashboard.css')}}" rel="stylesheet" /> --}}

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>
