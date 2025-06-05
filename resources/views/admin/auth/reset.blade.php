
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Reset Password
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('admin/assets/css/argon-dashboard.css')}}" rel="stylesheet" />
</head>

<body class="">
  <!-- Navbar -->

  <!-- End Navbar -->
  <main class="mt-0 main-content">
    <div class="pt-2 m-3 page-header align-items-start min-vh-50 pb-11 border-radius-lg">
      <span class="mask bg-gradient-dark opacity-6"></span>

    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="mx-auto col-xl-4 col-lg-5 col-md-7">
          <div class="card z-index-0">
            <div class="pt-4 text-center card-header">
              <h5>Forget Password</h5>
            </div>

            <div class="card-body">
              <form role="form">
                <div class="mb-3">
                  <input type="email" class="form-control" placeholder="Email" aria-label="Email">
                </div>
                {{-- <div class="mb-3">
                  <input type="password" class="form-control" placeholder="Password" aria-label="Password">
                </div> --}}

                <div class="text-center">
                  <button type="button" class="my-4 mb-2 btn bg-gradient-dark w-100">Send</button>
                </div>
                <p class="mt-3 mb-0 text-sm">Already have an account? <a href="javascript:;" class="text-dark font-weight-bolder">Sign in</a></p>
                <p class="mt-3 mb-0 text-sm"><a href="{{ route('admin.forget') }}" class="text-dark font-weight-bolder">Forgot Password</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->

  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  {{-- <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script> --}}

   <!--   Core JS Files   -->
   <script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
   <script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>
   <script src="{{asset('admin/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
   <script src="{{asset('admin/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>

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
