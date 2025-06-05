
@extends('Layouts.app')
@section('title', 'Profile')
@section('content')
<div class="mx-4 shadow-lg card card-profile-bottom">
    <div class="p-3 card-body">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="../assets/img/team-1.jpg" alt="profile_image" class="shadow-sm w-100 border-radius-lg">
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              Sayo Kravits
            </h5>
            <p class="mb-0 text-sm font-weight-bold">
              Public Relations
            </p>
          </div>
        </div>
        <div class="mx-auto mt-3 col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0">
          <div class="nav-wrapper position-relative end-0">
            <ul class="p-1 nav nav-pills nav-fill" role="tablist">
              <li class="nav-item">
                <a class="px-0 py-1 mb-0 nav-link active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                  <i class="ni ni-app"></i>
                  <span class="ms-2">App</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="px-0 py-1 mb-0 nav-link d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                  <i class="ni ni-email-83"></i>
                  <span class="ms-2">Messages</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="px-0 py-1 mb-0 nav-link d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                  <i class="ni ni-settings-gear-65"></i>
                  <span class="ms-2">Settings</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-4 container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="pb-0 card-header">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Profile</p>
              <button class="btn btn-primary btn-sm ms-auto">Settings</button>
            </div>
          </div>
          <div class="card-body">
            <p class="text-sm text-uppercase">User Information</p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Username</label>
                  <input class="form-control" type="text" value="lucky.jesse">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Email address</label>
                  <input class="form-control" type="email" value="jesse@example.com">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">First name</label>
                  <input class="form-control" type="text" value="Jesse">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Last name</label>
                  <input class="form-control" type="text" value="Lucky">
                </div>
              </div>
            </div>
            <hr class="horizontal dark">
            <p class="text-sm text-uppercase">Contact Information</p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Address</label>
                  <input class="form-control" type="text" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">City</label>
                  <input class="form-control" type="text" value="New York">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Country</label>
                  <input class="form-control" type="text" value="United States">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Postal code</label>
                  <input class="form-control" type="text" value="437300">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                  <button class="btn btn-primary btn-sm ms-auto">Submit</button>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- <div class="col-md-4">
        <div class="card card-profile">
          <img src="../assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
          <div class="row justify-content-center">
            <div class="col-4 col-lg-4 order-lg-2">
              <div class="mb-4 mt-n4 mt-lg-n6 mb-lg-0">
                <a href="javascript:;">
                  <img src="../assets/img/team-2.jpg" class="border border-2 border-white rounded-circle img-fluid">
                </a>
              </div>
            </div>
          </div>
          <div class="pt-0 pb-4 text-center border-0 card-header pt-lg-2 pb-lg-3">
            <div class="d-flex justify-content-between">
              <a href="javascript:;" class="mb-0 btn btn-sm btn-info d-none d-lg-block">Connect</a>
              <a href="javascript:;" class="mb-0 btn btn-sm btn-info d-block d-lg-none"><i class="ni ni-collection"></i></a>
              <a href="javascript:;" class="float-right mb-0 btn btn-sm btn-dark d-none d-lg-block">Message</a>
              <a href="javascript:;" class="float-right mb-0 btn btn-sm btn-dark d-block d-lg-none"><i class="ni ni-email-83"></i></a>
            </div>
          </div>
          <div class="pt-0 card-body">
            <div class="row">
              <div class="col">
                <div class="d-flex justify-content-center">
                  <div class="text-center d-grid">
                    <span class="text-lg font-weight-bolder">22</span>
                    <span class="text-sm opacity-8">Friends</span>
                  </div>
                  <div class="mx-4 text-center d-grid">
                    <span class="text-lg font-weight-bolder">10</span>
                    <span class="text-sm opacity-8">Photos</span>
                  </div>
                  <div class="text-center d-grid">
                    <span class="text-lg font-weight-bolder">89</span>
                    <span class="text-sm opacity-8">Comments</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-4 text-center">
              <h5>
                Mark Davis<span class="font-weight-light">, 35</span>
              </h5>
              <div class="h6 font-weight-300">
                <i class="mr-2 ni location_pin"></i>Bucharest, Romania
              </div>
              <div class="mt-4 h6">
                <i class="mr-2 ni business_briefcase-24"></i>Solution Manager - Creative Tim Officer
              </div>
              <div>
                <i class="mr-2 ni education_hat"></i>University of Computer Science
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
    <footer class="pt-3 footer ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="mb-4 col-lg-6 mb-lg-0">
            <div class="text-sm text-center copyright text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
              for a better web.
            </div>
          </div>

        </div>
      </div>
    </footer>
  </div>
@endsection
