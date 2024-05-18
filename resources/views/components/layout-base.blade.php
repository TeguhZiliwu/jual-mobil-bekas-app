<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $titlePage }} | BMS Motor</title>
    <meta name="Description" content="Application POS for PetShop">
    <meta name="Author" content="TZDeveloper">
    <meta name="keywords" content="admin, shop, pos, petshop, reporting, cms">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    @vite(['resources/css/pre-loader.css'])
    @vite(['resources/css/app.css'])
    {{ $headerFiles }}
    @livewireStyles
</head>

<body>
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                {{-- <img src="{{ asset('assets/images/logo/dark_logo.png') }}" alt="logo" decoding="async"> --}}
                <img src="{{ asset('assets/images/brand-logos/logo-long.jpg') }}" alt="logo" decoding="async">
            </div>
            <div class="progress" id="progress_div">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="bar1"></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <!-- <p class="loading-text">
                Loading...
            </p> -->
        </div>
    </div>
    <div id="loader" class="loader">
        <img src="../assets/images/media/loader.svg" alt="">
    </div>
    <div class="page">
        <x-layout-header />
        <x-layout-sidebar />
        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                {{ $renderContent }}
            </div>
        </div>
        <!-- End::app-content -->
        <x-layout-footer />
    </div>
    <div class="scrollToTop">
        <span class="arrow"><i class="las la-angle-double-up"></i></span>
    </div>
    <div class="modal fade" id="modalChangePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"><i class="fa-solid fa-lock"></i> Change Password</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <div class="form-group">
                                <label for="txtOldPassword" class="form-label">Old Password <span class="text-danger">*</span></label>
                                <div class="position-relative password-section">
                                    <input type="password" class="form-control change-password-text-field" id="txtOldPassword" placeholder="Enter Old Password" autocomplete="off" maxlength="100" />
                                    <i class="password-icon fa-solid fa-eye"></i>
                                </div>
                                <span class="badge bg-primary float-end mt-2 counter-char">0/100</span>
                            </div>
                            <div class="form-group">
                                <label for="txtPassword" class="form-label">Password <span class="text-danger">*</span></label>
                                <div class="position-relative password-section">
                                    <input type="password" class="form-control change-password-text-field" id="txtPassword" placeholder="Enter Password" autocomplete="off" maxlength="100" />
                                    <i class="password-icon fa-solid fa-eye"></i>
                                </div>
                                <span class="badge bg-primary float-end mt-2 counter-char">0/100</span>
                            </div>
                            <div class="form-group">
                                <label for="txtConfirmPassword" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                <div class="position-relative password-section">
                                    <input type="password" class="form-control change-password-text-field" id="txtConfirmPassword" placeholder="Enter Confirm Password" autocomplete="off" maxlength="100" />
                                    <i class="password-icon fa-solid fa-eye"></i>
                                </div>
                                <span class="badge bg-primary float-end mt-2 counter-char">0/100</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="btnUploadReceipt" item-id="" transaction-id="">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <div id="responsive-overlay"></div>

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.js') }}"></script>
    <script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('assets/js/us-merc-en.js') }}"></script>
    <script src="{{ asset('assets/js/defaultmenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @vite(['resources/js/main.js'])
    {{ $footerFiles }}
    @livewireScripts
</body>

</html>
