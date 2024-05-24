<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-click" data-menu-position="fixed" data-theme-mode="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jual Mobil Bekas | BMS Motor</title>
    <meta name="Description" content="Jual Mobil Bekas | BMS App">
    <meta name="Author" content="TZDeveloper">
    <meta name="keywords" content="admin, mobil, car, bekas, shop, jual-beli, sell, reporting, cms">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/images/brand-logos/logo.jpg') }}" type="image/x-icon">
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/styles.css?v=') . time() }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/node-waves/waves.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
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

<body class="landing-body">
    <div class="landing-page-wrapper">
        <header class="app-header">
            <div class="main-header-container container-fluid">
                <div class="header-content-left">
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="{{ route('home') }}" class="header-logo">
                                <img src="{{ asset('assets/images/brand-logos/logo-long.jpg') }}" alt="logo" class="toggle-logo">
                                <img src="{{ asset('assets/images/brand-logos/logo-long.jpg') }}" alt="logo" class="toggle-white">
                            </a>
                        </div>
                    </div>
                    <div class="header-element">
                        <a href="javascript:void(0);" class="sidemenu-toggle header-link" data-bs-toggle="sidebar">
                            <span class="open-toggle">
                                <i class="ri-menu-3-line fs-20"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="header-content-right">
                    <div class="header-element align-items-center">
                        <div class="btn-list d-lg-none d-block">
                            <a href="signup.html" class="btn btn-primary-light">
                                Sign Up
                            </a>
                            <button class="btn btn-icon btn-primary" data-bs-toggle="offcanvas" data-bs-target="#switcher-canvas">
                                <i class="fe fe-settings align-middle"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <aside class="app-sidebar sticky" id="sidebar">
            <div class="container p-0">
                <div class="main-sidebar">
                    <nav class="main-menu-container nav nav-pills sub-open">
                        <div class="landing-logo-container">
                            <div class="horizontal-logo">
                                <a href="{{ route('home') }}" class="header-logo">
                                    <img src="{{ asset('assets/images/brand-logos/logo-long.jpg') }}" alt="logo" class="desktop-logo">
                                    <img src="{{ asset('assets/images/brand-logos/logo-long.jpg') }}" alt="logo" class="desktop-white">
                                </a>
                            </div>
                        </div>
                        <div class="slide-left" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                            </svg></div>
                        <ul class="main-menu">
                            <li class="slide">
                                <a class="side-menu__item" href="#home">
                                    <span class="side-menu__label">Home</span>
                                </a>
                            </li>
                            <li class="slide">
                                <a href="#about" class="side-menu__item">
                                    <span class="side-menu__label">About</span>
                                </a>
                            </li>
                            <li class="slide">
                                <a href="#testimonials" class="side-menu__item">
                                    <span class="side-menu__label">Testimonials</span>
                                </a>
                            </li>
                            <li class="slide">
                                <a href="#contact" class="side-menu__item">
                                    <span class="side-menu__label">Contact</span>
                                </a>
                            </li>
                        </ul>
                        <div class="slide-right" id="slide-right">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                            </svg>
                        </div>
                        <div class="d-lg-flex d-none">
                            <div class="btn-list d-lg-flex d-none mt-lg-2 mt-xl-0 mt-0">
                                <a href="{{ route('signup') }}" class="btn btn-wave btn-primary">
                                    Sign Up
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </aside>
        <div class="main-content landing-main">
            <div class="landing-banner" id="home">
                <section class="section">
                    <div class="container main-banner-container">
                        <div class="row justify-content-center text-center">
                            <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-8">
                                <div class="py-5 pb-lg-0">
                                    <div class="mb-3">
                                        <h5 class="fw-semibold text-fixed-white op-9">BMS MOTOR</h5>
                                    </div>
                                    <p class="landing-banner-heading mb-3">Situs Jual Beli Mobil Bekas Batam</p>
                                    <div class="fs-16 mb-5 text-fixed-white op-7"> Selamat datang di platform terbaik untuk jual beli mobil bekas di Batam! Kami menyediakan berbagai pilihan mobil berkualitas dengan harga terbaik yang hanya dikelola oleh tim kami. Temukan mobil impian Anda, mulai dari mobil keluarga hingga SUV tangguh, semuanya telah melalui inspeksi ketat untuk menjamin kualitas dan keandalan.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <section class="section " id="about">
                <div class="container text-center">
                    <p class="fs-12 fw-semibold text-success mb-1"><span class="landing-section-heading">Tentang Kami - Jual Beli Mobil Bekas Batam</span>
                    </p>
                    <div class="landing-title"></div>
                    <h3 class="fw-semibold mb-2"> Ahli dalam Dunia Jual Beli Mobil Bekas di Batam </h3>
                    <div class="row justify-content-center">
                        <div class="col-xl-7">
                            <p class="text-muted fs-15 mb-3 fw-normal">Kami adalah ahli dalam dunia jual beli mobil bekas di Batam. Dengan pengalaman luas dan pengetahuan mendalam tentang pasar lokal, kami siap membantu Anda menemukan mobil impian atau menjual mobil Anda dengan cepat dan mudah. Percayakan kepada kami untuk pengalaman jual beli yang profesional dan tanpa ribet.
                            </p>
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center mx-0">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 pt-5 pb-0 px-lg-2 px-5 text-start">
                            <h4 class="text-lg-start fw-medium mb-4">Mengapa Memilih Kami? </h4>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="d-flex mb-2">
                                        <span>
                                            <i class='bx bxs-badge-check text-primary fs-18'></i>
                                        </span>
                                        <div class="ms-2">
                                            <h6 class="fw-medium mb-0">Kualitas Terjamin </h6>
                                            <p class=" text-muted mb-3">Kami berkomitmen untuk menyediakan mobil bekas yang telah melalui inspeksi ketat. Setiap mobil yang kami tawarkan diuji secara menyeluruh untuk memastikan kualitas dan keamanannya. Kami hanya menjual mobil yang memenuhi standar tinggi kami, sehingga Anda bisa membeli dengan percaya diri. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="d-flex mb-2">
                                        <span>
                                            <i class='bx bxs-badge-check text-primary fs-18'></i>
                                        </span>
                                        <div class="ms-2">
                                            <h6 class="fw-medium mb-0">Harga Terbaik</h6>
                                            <p class=" text-muted mb-3">Kami memahami bahwa membeli mobil bekas adalah keputusan besar. Oleh karena itu, kami menawarkan harga yang kompetitif dan transparan. Tanpa biaya tersembunyi, Anda mendapatkan penawaran terbaik di Batam.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="d-flex mb-2">
                                        <span>
                                            <i class='bx bxs-badge-check text-primary fs-18'></i>
                                        </span>
                                        <div class="ms-2">
                                            <h6 class="fw-medium mb-0">Proses Mudah dan Aman</h6>
                                            <p class=" text-muted">Kami membuat proses jual beli menjadi sederhana dan aman. Dengan layanan profesional kami, Anda bisa melakukan transaksi dengan mudah dan cepat. Tim kami siap membantu Anda setiap langkah, dari pemilihan mobil hingga penyelesaian dokumen.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="d-flex mb-2">
                                        <span>
                                            <i class='bx bxs-badge-check text-primary fs-18'></i>
                                        </span>
                                        <div class="ms-2">
                                            <h6 class="fw-medium mb-0">Layanan Kami</h6>
                                            <p class=" text-muted">Kami tidak hanya menjual mobil bekas, tetapi juga menyediakan berbagai layanan tambahan untuk memastikan Anda mendapatkan pengalaman terbaik. Mulai dari bantuan pembiayaan, layanan perawatan, hingga konsultasi penjualan mobil bekas, kami siap membantu Anda.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section landing-testimonials section-bg" id="testimonials">
                <div class="container text-center">
                    <p class="fs-12 fw-semibold text-success mb-1"><span class="landing-section-heading">Testimonials</span>
                    </p>
                    <div class="landing-title"></div>
                    <h3 class="fw-semibold mb-2">Apa Kata Mereka Tentang Pengalaman Mereka?</h3>
                    <div class="row justify-content-center">
                        <div class="col-xl-7">
                            <p class="text-muted fs-15 mb-5 fw-normal">Some of the reviews our clients gave which brings motivation to work for future projects.</p>
                        </div>
                    </div>
                    <div class="swiper pagination-dynamic text-start">
                        <div class="swiper-wrapper" id="reviewRatingSection">
                            {{-- <div class="swiper-slide">
                                <div class="card custom-card testimonial-card shadow-none">
                                    <div class="card-body">
                                        <div class="testimonia text-center">
                                            <span class="avatar avatar-xl avatar-rounded mb-1">
                                                <img src="../assets/images/faces/11.jpg" alt="">
                                            </span>
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <span class="text-warning d-block">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-fill"></i>
                                                </span>
                                            </div>
                                            <p class="op-8 mb-4">
                                                <i class="fa fa-quote-left fs-22 text-primary op-6 me-2"></i>
                                                Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Quod eos id
                                                officiis hic tenetur quae quaerat
                                                ad velit ab. Lorem ipsum dolor sit amet.
                                            </p>
                                            <p class="mb-0 fw-semibold fs-16">Json Taylor</p>
                                            <p class="mb-0 fs-11 text-muted">Web Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card custom-card testimonial-card shadow-none">
                                    <div class="card-body">
                                        <div class="testimonia text-center">
                                            <span class="avatar avatar-xl avatar-rounded mb-1">
                                                <img src="../assets/images/faces/15.jpg" alt="">
                                            </span>
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <span class="text-warning d-block">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-fill"></i>
                                                </span>
                                            </div>
                                            <p class="op-8 mb-4">
                                                <i class="fa fa-quote-left fs-22 text-primary op-6 me-2"></i>
                                                Nulla in nunc eu justo varius bibendum ac quis metus. Phasellus varius aliquam lorem quis sem vitae, pellentesque.
                                            </p>
                                            <p class="mb-0 fw-semibold fs-16">Harry Linson</p>
                                            <p class="mb-0 fs-11 text-muted">CEO</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card custom-card testimonial-card shadow-none">
                                    <div class="card-body">
                                        <div class="testimonia text-center">
                                            <span class="avatar avatar-xl avatar-rounded mb-1">
                                                <img src="../assets/images/faces/9.jpg" alt="">
                                            </span>
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <span class="text-warning d-block">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-fill"></i>
                                                </span>
                                            </div>
                                            <p class="op-8 mb-4">
                                                <i class="fa fa-quote-left fs-22 text-primary op-6 me-2"></i>
                                                In nec elit nec risus varius cursus vitae eget augue. Vestibulum bibendum, diam nec elementum imperdiet mollis in lacinia vitae.
                                            </p>
                                            <p class="mb-0 fw-semibold fs-16">Mathew Brown</p>
                                            <p class="mb-0 fs-11 text-muted">Project Manager</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card custom-card testimonial-card shadow-none">
                                    <div class="card-body">
                                        <div class="testimonia text-center">
                                            <span class="avatar avatar-xl avatar-rounded mb-1">
                                                <img src="../assets/images/faces/8.jpg" alt="">
                                            </span>
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <span class="text-warning d-block">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-fill"></i>
                                                </span>
                                            </div>
                                            <p class="op-8 mb-4">
                                                <i class="fa fa-quote-left fs-22 text-primary op-6 me-2"></i>
                                                Phasellus varius aliquam lorem ut fringilla. Proin lobortis ipsum in libero elementum rhoncus augue enim ac quam.
                                            </p>
                                            <p class="mb-0 fw-semibold fs-16">Ronne Gally</p>
                                            <p class="mb-0 fs-11 text-muted">Backend Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card custom-card testimonial-card shadow-none">
                                    <div class="card-body">
                                        <div class="testimonia text-center">
                                            <span class="avatar avatar-xl avatar-rounded mb-1">
                                                <img src="../assets/images/faces/7.jpg" alt="">
                                            </span>
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <span class="text-warning d-block">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-fill"></i>
                                                </span>
                                            </div>
                                            <p class="op-8 mb-4">
                                                <i class="fa fa-quote-left fs-22 text-primary op-6 me-2"></i>
                                                Vestibulum bibendum, diam nec elementum imperdiet, nisi odio mattis metus, ac ullamcorper Cras nec aliquet sem.
                                            </p>
                                            <p class="mb-0 fw-semibold fs-16">Jim Carilett</p>
                                            <p class="mb-0 fs-11 text-muted">UI Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card custom-card testimonial-card shadow-none">
                                    <div class="card-body">
                                        <div class="testimonia text-center">
                                            <span class="avatar avatar-xl avatar-rounded mb-1">
                                                <img src="../assets/images/faces/6.jpg" alt="">
                                            </span>
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <span class="text-warning d-block">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-fill"></i>
                                                </span>
                                            </div>
                                            <p class="op-8 mb-4">
                                                <i class="fa fa-quote-left fs-22 text-primary op-6 me-2"></i>
                                                Nullam dignissim velit ac libero varius facilisis. Pellentesque habitant morbi tristique senectus eget lorem metus.
                                            </p>
                                            <p class="mb-0 fw-semibold fs-16">Kami Johnson</p>
                                            <p class="mb-0 fs-11 text-muted">Web Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card custom-card testimonial-card shadow-none">
                                    <div class="card-body">
                                        <div class="testimonia text-center">
                                            <span class="avatar avatar-xl avatar-rounded mb-1">
                                                <img src="../assets/images/faces/3.jpg" alt="">
                                            </span>
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <span class="text-warning d-block">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-fill"></i>
                                                </span>
                                            </div>
                                            <p class="op-8 mb-4">
                                                <i class="fa fa-quote-left fs-22 text-primary op-6 me-2"></i>
                                                Sed dapibus risus eu nibh aliquet, et sodales libero vulputate. Nullam lacinia diam sem Sed dapibus risus eu nib.
                                            </p>
                                            <p class="mb-0 fw-semibold fs-16">Marina Rotior</p>
                                            <p class="mb-0 fs-11 text-muted">UI Designer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card custom-card testimonial-card shadow-none">
                                    <div class="card-body">
                                        <div class="testimonia text-center">
                                            <span class="avatar avatar-xl avatar-rounded mb-1">
                                                <img src="../assets/images/faces/2.jpg" alt="">
                                            </span>
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <span class="text-warning d-block">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-fill"></i>
                                                </span>
                                            </div>
                                            <p class="op-8 mb-4">
                                                <i class="fa fa-quote-left fs-22 text-primary op-6 me-2"></i>
                                                Nullam ultrices sem ut gravida ultricies. Suspendisse vitae felis sit amet dolor tempor lacinia Sed in lorem convallis, tempus nisi vel.
                                            </p>
                                            <p class="mb-0 fw-semibold fs-16">Elizabeth</p>
                                            <p class="mb-0 fs-11 text-muted">Backend Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card custom-card testimonial-card shadow-none">
                                    <div class="card-body">
                                        <div class="testimonia text-center">
                                            <span class="avatar avatar-xl avatar-rounded mb-1">
                                                <img src="../assets/images/faces/1.jpg" alt="">
                                            </span>
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <span class="text-warning d-block">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-fill"></i>
                                                </span>
                                            </div>
                                            <p class="op-8 mb-4">
                                                <i class="fa fa-quote-left fs-22 text-primary op-6 me-2"></i>
                                                Curabitur auctor purus et laoreet molestie. Sed eleifend scelerisque posuere. In ac vehicula turpis acinia diam sem aliquam lorem.
                                            </p>
                                            <p class="mb-0 fw-semibold fs-16">Williamson</p>
                                            <p class="mb-0 fs-11 text-muted">UI Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="swiper-pagination mt-4"></div>
                    </div>
                </div>
            </section>
            <section class="section section-bg" id="contact">
                <div class="container text-center">
                    <p class="fs-12 fw-semibold text-success mb-1"><span class="landing-section-heading">CONTACT US</span>
                    </p>
                    <div class="landing-title"></div>
                    <h3 class="fw-semibold mb-2">Have any questions ? We would love to hear from you.</h3>
                    <div class="row justify-content-center">
                        <div class="col-xl-9">
                            <p class="text-muted fs-15 mb-5 fw-normal">You can contact us anytime regarding any queries or deals,dont hesitate to clear your doubts before trying our product.</p>
                        </div>
                    </div>
                    <div class="text-start row justify-content-between">
                        <div class="col-lg-4">
                            <div class="card shadow-none">
                                <div class="card-body px-5 py-4">
                                    <div class="d-flex mb-3 mt-2">
                                        <div class="contact-icon border bg-primary-transparent m-0">
                                            <i class="fe fe-map-pin text-primary fs-17"></i>
                                        </div>
                                        <div class="ms-3 text-start">
                                            <h6 class="mb-1 fw-medium">Main Branch</h6>
                                            <p>San Francisco, CA </p>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="contact-icon border bg-danger-transparent">
                                            <i class="fe fe-mail text-danger fs-17"></i>
                                        </div>
                                        <div class="ms-3 text-start">
                                            <h6 class="mb-1 fw-medium">
                                                Email</h6>
                                            <p>georgeme@abc.com</p>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="contact-icon border bg-success-transparent">
                                            <i class="fe fe-headphones text-success fs-17"></i>
                                        </div>
                                        <div class="ms-3 text-start">
                                            <h6 class="mb-1 fw-medium">
                                                Contact</h6>
                                            <p>+125 254
                                                3562 </p>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <div class="contact-icon border bg-warning-transparent">
                                            <i class="fe fe-airplay text-warning fs-17"></i>
                                        </div>
                                        <div class="ms-3 text-start">
                                            <h6 class="mb-1 fw-medium">
                                                Working Hours</h6>
                                            <p class="mb-0">Mon -
                                                Fri: 9am - 6pm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card shadow-none">
                                <div class="card-body px-5 pt-4">
                                    <div class="row mt-1">
                                        <div class="col-xl-6">
                                            <div class="form-group ">
                                                <label for="cusName" class="form-label">Name
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="cusName" placeholder="Enter your name">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="cusEmail" class="form-label">Email
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="cusEmail" placeholder="Enter your email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cusMessage" class="form-label">Message <span class="text-danger">*</span></label>
                                        <textarea rows="4" class="form-control" id="cusMessage" placeholder="Type your message here..."></textarea>
                                    </div>
                                    <div class="form-group mb-2 pt-1">
                                        <button class="btn btn-primary">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End:: Section-9 -->

            <!-- Start:: Section-10 -->
            <section class="section landing-footer text-fixed-white">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="px-4">
                                <p class="fw-semibold mb-3"><a href="{{ route('home') }}"><img src="../assets/images/brand-logos/desktop-white.png" alt="" class="logo-img"></a></p>
                                <p class="mb-3 op-6 fw-normal">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit et magnam, fuga est mollitia eius, quo illum illo inventore optio aut quas omnis rem. Dolores accusantium aspernatur minus ea incidunt.
                                </p>
                                <div class="input-group">
                                    <input type="text" class="form-control bg-transparent text-fixed-white" placeholder="Enter your email" aria-label="Example text with button addon" aria-describedby="button-addon2">
                                    <button class="btn btn-primary" type="button" id="button-addon2">Submit</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="px-4">
                                <h6 class="fw-semibold mb-3 text-fixed-white">Pages</h6>
                                <ul class="list-unstyled fw-normal landing-footer-list">
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6">Email</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6">Profile</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6">Timeline</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6">Projects</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6">Contacts</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6">Portfolio</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="px-4">
                                <h6 class="fw-semibold text-fixed-white">Information</h6>
                                <ul class="list-unstyled fw-normal landing-footer-list">
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6">Our Team</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6">Contact US</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6">About</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6">Services</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6">Blog</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6">Terms & Conditions</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="px-4">
                                <h6 class="fw-semibold text-fixed-white">Contact</h6>
                                <ul class="list-unstyled fw-normal landing-footer-list">
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6"><i class="ri-home-4-line me-1 align-middle"></i> New York, NY 10012, US</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6"><i class="ri-mail-line me-1 align-middle"></i> info@fmail.com</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6"><i class="ri-phone-line me-1 align-middle"></i> +(555)-1920 1831</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="text-fixed-white op-6"><i class="ri-printer-line me-1 align-middle"></i> +(123) 1293 123</a>
                                    </li>
                                    <li class="mt-3">
                                        <p class="mb-2 fw-semibold op-8">FOLLOW US ON :</p>
                                        <div class="mb-0">
                                            <div class="btn-list">
                                                <button class="btn btn-sm btn-icon btn-wave waves-effect waves-light">
                                                    <i class="ri-facebook-line fw-bold"></i>
                                                </button>
                                                <button class="btn btn-sm btn-icon btn-wave waves-effect waves-light">
                                                    <i class="ri-twitter-line fw-bold"></i>
                                                </button>
                                                <button class="btn btn-sm btn-icon btn-wave waves-effect waves-light">
                                                    <i class="ri-instagram-line fw-bold"></i>
                                                </button>
                                                <button class="btn btn-sm btn-icon btn-wave waves-effect waves-light">
                                                    <i class="ri-github-line fw-bold"></i>
                                                </button>
                                                <button class="btn btn-sm btn-icon btn-wave waves-effect waves-light">
                                                    <i class="ri-youtube-line fw-bold"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End:: Section-10 -->

            <div class="text-center landing-main-footer py-3">
                <span class="text-muted fs-15"> Copyright © <span id="year"></span> <a href="javascript:void(0);" class="text-danger fw-semibold">BMS Motor</a>.
                    All rights reserved.
                </span>
            </div>

        </div>
        <!-- End::app-content -->

    </div>

    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/defaultmenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    @vite(['resources/js/pages/transactions/landing-page.js'])
</body>

</html>
