<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../build/assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="../../build/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../build/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../build/assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../build/assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h1 class="font-weight-light" style="text-align: center; font-size:40px">REGISTER</h1>
              <form class="pt-3" method="POST" action="{{ route('register') }}">
                @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input id="name" class="form-control form-control-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Username -->
                    <div class="form-group">
                      <label for="">Username</label>
                      <input id="username" class="form-control form-control-lg" type="text" name="username" :value="old('username')" required autofocus autocomplete="name" />
                      <x-input-error :messages="$errors->get('username')" class="mt-2" />
                  </div>
            
                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="">Email</label>
                        <input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="">Password</label>
                        <input id="password" class="form-control form-control-lg"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="form-control form-control-lg"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
            
                        <button class="btn btn-primary ml-4">
                            {{ __('Register') }}
                        </button>
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../build/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../build/assets/js/off-canvas.js"></script>
  <script src="../../build/assets/js/hoverable-collapse.js"></script>
  <script src="../../build/assets/js/template.js"></script>
  <script src="../../build/assets/js/settings.js"></script>
  <script src="../../build/assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
