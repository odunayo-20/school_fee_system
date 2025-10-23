<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel='shortcut icon' type='image/x-icon' href='{{ asset('images/logo/logo.png') }}' />
    <title>

    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('admin/assets/css/argon-dashboard.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-bx1L3A6U4gJqZ1+l8KdxFmqxN6XcRfK3LXLhF9bH1LUjVpg6U+G3Z2t98oG4clm6z1Xpgw6mD6ztxM0jvU3zug=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">

</head>

<body class="">

    <main class="mt-0 main-content">
        <div class="pt-5 m-3 overflow-hidden page-header align-items-start min-vh-50 pb-11 border-radius-lg position-relative">
    <img src="{{ asset('admin/assets/img/class-background.jpg') }}"
         alt="Background"
         class="top-0 position-absolute start-0 w-100 h-100 object-fit-cover" />
    <span class="top-0 mask bg-gradient-dark opacity-6 position-absolute start-0 w-100 h-100"></span>
</div>

        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="mx-auto col-xl-4 col-lg-5 col-md-7">
                    <div class="card z-index-0">
                        <div class="pt-4 text-center card-header">
                            <h5>Login</h5>
                        </div>
@if (session('error'))
    <div class="col-md-12">
        <div class="text-sm alert alert-danger">{{ session('error') }}</div>
    </div>

@endif
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
                                    <label class="control-label">Password</label>
                                    <div class="input-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                        <div class="input-group-append" style="border: 1px solid #ced4da; border-left: none; border-radius: 0 .375rem .375rem 0;">
                                            <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                                <i class="fa fa-eye" id="eyeIcon"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-check form-check-info text-start">
                                    <input class="form-check-input" name="remember" type="checkbox" value=""
                                        id="flexCheckDefault">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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


        // Password visibility toggle
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            const eyeIcon = document.querySelector('#eyeIcon');

            togglePassword.addEventListener('click', function() {
                // Toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                // Toggle the eye icon
                eyeIcon.classList.toggle('fa-eye');
                eyeIcon.classList.toggle('fa-eye-slash');
            });
        });
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('admin/assets/js/argon-dashboard.min.js') }}"></script>
</body>

</html>
