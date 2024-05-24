<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In | Jual Mobil Bekas</title>
    <meta name="Description" content="Jual Mobil Bekas | BMS App">
    <meta name="Author" content="TZDeveloper">
    <meta name="keywords" content="admin, mobil, car, bekas, shop, jual-beli, sell, reporting, cms">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/images/brand-logos/logo.jpg') }}" type="image/x-icon">
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/styles.css?v=') . time() }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/node-waves/waves.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/fontawesome-6.1.0/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
    @vite(['resources/css/app.css'])
</head>

<body>
    <div class="container-fluid custom-page">
        <div class="row bg-white">
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent-3">
                <div class="row w-100 mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto w-100">
                        <img src="{{ asset('assets/images/logins/login-left-image.png') }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex">
                                        <a href="{{ route('home') }}" class="header-logo">
                                            <img src="{{ asset('assets/images/brand-logos/logo-long.jpg') }}" class="desktop-logo ht-40" alt="logo">
                                            <img src="{{ asset('assets/images/brand-logos/logo-long.jpg') }}" class="desktop-white ht-40" alt="logo">
                                        </a>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h3>Welcome back!</h3>
                                            <h6 class="fw-medium mb-4 fs-17">Please sign in to continue.</h6>
                                            <div class="form-group mb-3">
                                                <label for="txtUserID" class="form-label">User ID</label>
                                                <input type="text" class="form-control text-field" id="txtUserID" placeholder="Enter your User ID" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="txtPassword" class="form-label">Password</label>
                                                <div class="position-relative password-section">
                                                    <input type="password" class="form-control text-field" id="txtPassword" placeholder="Enter your Password" autocomplete="off" />
                                                    <i class="password-icon fa-solid fa-eye"></i>
                                                </div>
                                            </div>
                                            <button id="btnSignIn" class="btn btn-primary btn-block w-100">Sign In</button>
                                        </div>
                                        <div class="main-signin-footer mt-5">
                                            {{-- <p class="mb-1"><a href="forgot.html">Forgot password?</a></p> --}}
                                            <p>Don't have an account? <a href="{{ route('signup') }}">Create an Account</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    @vite(['resources/js/main.js'])
    @vite(['resources/js/pages/auth/signin.js'])
</body>

</html>
