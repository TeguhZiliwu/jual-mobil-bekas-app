<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-click" data-menu-position="fixed" data-theme-mode="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jual Mobil Bekas | BMS Motor</title>
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
</head>

<body class="landing-body">
    <div class="landing-page-wrapper">
        <header class="app-header">
            <div class="main-header-container container-fluid">
                <div class="header-content-left">
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="index.html" class="header-logo">
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
                                <a href="index.html" class="header-logo">
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
                                <a href="#features" class="side-menu__item">
                                    <span class="side-menu__label">Features</span>
                                </a>
                            </li>
                            <li class="slide">
                                <a href="#about" class="side-menu__item">
                                    <span class="side-menu__label">About</span>
                                </a>
                            </li>
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <span class="side-menu__label me-2">More</span>
                                    <i class="fe fe-chevron-right side-menu__angle op-8"></i>
                                </a>
                                <ul class="slide-menu child1">
                                    <li class="slide">
                                        <a href="#statistics" class="side-menu__item">Statistics</a>
                                    </li>
                                    <li class="slide has-sub">
                                        <a href="javascript:void(0);" class="side-menu__item">Level-2
                                            <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                        <ul class="slide-menu child2">
                                            <li class="slide">
                                                <a href="javascript:void(0);" class="side-menu__item">Level-2-1</a>
                                            </li>
                                            <li class="slide has-sub">
                                                <a href="javascript:void(0);" class="side-menu__item">Level-2-2
                                                    <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                <ul class="slide-menu child3">
                                                    <li class="slide">
                                                        <a href="javascript:void(0);" class="side-menu__item">Level-2-2-1</a>
                                                    </li>
                                                    <li class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">Level-2-2-2</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a href="#faq" class="side-menu__item">
                                    <span class="side-menu__label">Faq's</span>
                                </a>
                            </li>
                            <li class="slide">
                                <a href="#testimonials" class="side-menu__item">
                                    <span class="side-menu__label">Clients</span>
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
                                        <h5 class="fw-semibold text-fixed-white op-9">Manage Your Business</h5>
                                    </div>
                                    <p class="landing-banner-heading mb-3">Build Your Dream Project with Valex !</p>
                                    <div class="fs-16 mb-5 text-fixed-white op-7"> Valex - Now you can use this admin template to design stunning dashboards that will wow your target viewers or users to no end. To create a good and well-structured dashboard, you need to start from scratch with HTML, SCSS, CSS, and JS and with lots of coding, but by using this Valex-Admin template.</div>
                                    <a href="index.html" class="m-1 btn btn-primary">
                                        Discover More
                                        <i class="fe fe-eye ms-2 align-middle"></i>
                                    </a>
                                    <a href="index.html" class="m-1 btn btn-info">
                                        Get Started
                                        <i class="fe fe-arrow-right ms-2 align-middle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <section class="section section-bg " id="features">
                <div class="container text-center position-relative">
                    <p class="fs-12 fw-semibold text-success mb-1">
                        <span class="landing-section-heading">Features</span>
                    </p>
                    <div class="landing-title"></div>
                    <h3 class="fw-semibold mb-2">Valex Main Features</h3>
                    <div class="row justify-content-center">
                        <div class="col-xl-7">
                            <p class="text-muted fs-15 mb-5 fw-normal">We are proud to have top class clients and customers,which motivates us to work more on projects.</p>
                        </div>
                    </div>
                    <div class="row  g-2 justify-content-center">
                        <div class="col-xl-12">
                            <div class="row justify-content-evenly">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="card features main-features main-features-4 p-4 active" data-wow-delay="0.1s">
                                        <div class="bg-img mb-2">
                                            <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128">
                                                <circle cx="64" cy="64" r="64" fill="#42A3DB"></circle>
                                                <path fill="#347CBE" d="M85.5 26.6 66.1 61 33.3 98.6 62.6 128H64c33.7 0 61.3-26 63.8-59.1L85.5 26.6z"></path>
                                                <path fill="#CD2F30" d="M73.1 57.7h-16c3.6 18.7 11.1 36.6 22.1 52.5.3-5 1-9.8 1.8-14.5 4.6 1.3 9.2 2.3 13.7 3-9.7-12.2-17-26.1-21.6-41z"></path>
                                                <path fill="#F04D45" d="M54.9 57.7c-4.6 15-11.9 28.9-21.6 40.9 4.5-.7 9.1-1.7 13.7-3 .9 4.7 1.5 9.5 1.8 14.5 11-15.9 18.4-33.8 22.1-52.5h-16z">
                                                </path>
                                                <path fill="#FFF" d="M93.5 52c1.8-1.8 1.8-4.7 0-6.5-1.3-1.3-1.7-3.3-1-5 1-2.4-.1-5-2.5-6-1.7-.7-2.8-2.4-2.8-4.3 0-2.5-2.1-4.6-4.6-4.6-1.9 0-3.5-1.1-4.3-2.8-1-2.4-3.7-3.5-6-2.5-1.7.7-3.7.3-5-1-1.8-1.8-4.7-1.8-6.5 0-1.3 1.3-3.3 1.7-5 1-2.4-1-5 .1-6 2.5-.7 1.7-2.4 2.8-4.3 2.8-2.5 0-4.6 2.1-4.6 4.6 0 1.9-1.1 3.5-2.8 4.3-2.4 1-3.5 3.7-2.5 6 .7 1.7.3 3.7-1 5-1.8 1.8-1.8 4.7 0 6.5 1.3 1.3 1.7 3.3 1 5-1 2.4.1 5 2.5 6 1.7.7 2.8 2.4 2.8 4.3 0 2.5 2.1 4.6 4.6 4.6 1.9 0 3.5 1.1 4.3 2.8 1 2.4 3.7 3.5 6 2.5 1.7-.7 3.7-.3 5 1 1.8 1.8 4.7 1.8 6.5 0 1.3-1.3 3.3-1.7 5-1 2.4 1 5-.1 6-2.5.7-1.7 2.4-2.8 4.3-2.8 2.5 0 4.6-2.1 4.6-4.6 0-1.9 1.1-3.5 2.8-4.3 2.4-1 3.5-3.7 2.5-6-.7-1.7-.3-3.7 1-5z"></path>
                                                <path fill="#FFCD0A" d="M64 70.8c-12.2 0-22.1-9.9-22.1-22.1 0-12.2 9.9-22.1 22.1-22.1 12.2 0 22.1 9.9 22.1 22.1 0 12.2-9.9 22.1-22.1 22.1z"></path>
                                                <path fill="#FFF" d="M59.9 61c-.6 0-1.1-.2-1.5-.7l-8.3-9.2c-.7-.8-.7-2.1.1-2.8.8-.7 2.1-.7 2.8.1l6.7 7.5 15.1-18.8c.7-.9 2-1 2.8-.3.9.7 1 2 .3 2.8L61.4 60.2c-.3.5-.9.8-1.5.8z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 class="fw-bold">Quality &amp; Clean Code</h5>
                                            <p class="mb-0">The Valex admin code is maintained very cleanly and well-structured with proper comments. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="card features main-features main-features-2 wow p-4">
                                        <div class="bg-img mb-2">
                                            <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 128 128" viewBox="0 0 128 128">
                                                <circle cx="64" cy="64" r="63.5" fill="#54C0EB"></circle>
                                                <path fill="#84DBFF" d="M19.2,109c11.5,11.4,27.3,18.5,44.8,18.5c17.5,0,33.3-7.1,44.8-18.5H19.2z"></path>
                                                <rect width="19.6" height="10.4" x="54.2" y="92.7" fill="#FFF"></rect>
                                                <rect width="19.6" height="2.3" x="54.2" y="92.7" fill="#E6E9EE"></rect>
                                                <path fill="#E6E9EE" d="M82.2,109H45.8l0,0c0-3.3,2.7-6,6-6h24.4C79.5,103.1,82.2,105.7,82.2,109L82.2,109z"></path>
                                                <path fill="#324A5E" d="M103,92.7H25c-2.4,0-4.4-2-4.4-4.4V34.7c0-2.4,2-4.4,4.4-4.4h78c2.4,0,4.4,2,4.4,4.4v53.7   C107.4,90.7,105.4,92.7,103,92.7z"></path>
                                                <path fill="#FFF" d="M20.6,84v4.4c0,2.4,1.9,4.3,4.3,4.3H103c2.4,0,4.3-1.9,4.3-4.3V84H20.6z"></path>
                                                <rect width="80.3" height="46.9" x="23.9" y="33.4" fill="#FFF"></rect>
                                                <circle cx="100.3" cy="88.3" r="2" fill="#FF7058"></circle>
                                                <circle cx="94.7" cy="88.3" r="2" fill="#4CDBC4"></circle>
                                                <circle cx="89.1" cy="88.3" r="2" fill="#54C0EB"></circle>
                                                <rect width="9.7" height="27.7" x="32.3" y="46.7" fill="#ACB3BA"></rect>
                                                <rect width="9.7" height="15.8" x="45.7" y="58.7" fill="#4CDBC4"></rect>
                                                <rect width="9.7" height="23.1" x="59.1" y="51.3" fill="#FFD05B"></rect>
                                                <rect width="9.7" height="35.7" x="72.6" y="38.7" fill="#84DBFF"></rect>
                                                <rect width="9.7" height="8.1" x="86" y="66.3" fill="#FF7058"></rect>
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 class="fw-bold">Multiple Demos</h5>
                                            <p class="mb-0"> We included multiple demos, preview video, and screen shots to give a quick overview of our Valex admin template.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="card features main-features main-features-3 wow p-4">
                                        <div class="bg-img mb-2">
                                            <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 128 128" viewBox="0 0 128 128">
                                                <circle cx="64" cy="64" r="63.5" fill="#54C0EB"></circle>
                                                <path fill="#FFF" d="M42.2,96H23.6c-1.6,0-2.8-1.3-2.8-2.8V34.8c0-1.6,1.3-2.8,2.8-2.8h18.6c1.6,0,2.8,1.3,2.8,2.8v58.3   C45.1,94.7,43.8,96,42.2,96z"></path>
                                                <rect width="18.7" height="36.8" x="23.6" y="35.8" fill="#4CDBC4"></rect>
                                                <circle cx="32.9" cy="83.9" r="7.2" fill="#E6E9EE"></circle>
                                                <circle cx="32.9" cy="83.9" r="5" fill="#324A5E"></circle>
                                                <path fill="#FFF" d="M68.8,96H50.2c-1.6,0-2.8-1.3-2.8-2.8V34.8c0-1.6,1.3-2.8,2.8-2.8h18.6c1.6,0,2.8,1.3,2.8,2.8v58.3   C71.6,94.7,70.4,96,68.8,96z"></path>
                                                <rect width="18.7" height="36.8" x="50.1" y="35.8" fill="#FF7058"></rect>
                                                <circle cx="59.5" cy="83.9" r="7.2" fill="#E6E9EE"></circle>
                                                <circle cx="59.5" cy="83.9" r="5" fill="#324A5E"></circle>
                                                <path fill="#FFF" d="M109,92.7l-18,4.6c-1.5,0.4-3.1-0.5-3.5-2.1L73.2,38.7c-0.4-1.5,0.5-3.1,2.1-3.5l18-4.6   c1.5-0.4,3.1,0.5,3.5,2.1l14.3,56.5C111.5,90.8,110.6,92.4,109,92.7z"></path>
                                                <rect width="18.7" height="36.8" x="80.4" y="36.1" fill="#FFD05B" transform="rotate(-14.193 89.778 54.551)"></rect>
                                                <circle cx="97" cy="83.2" r="7.2" fill="#E6E9EE"></circle>
                                                <circle cx="97" cy="83.2" r="5" fill="#324A5E"></circle>
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 class="fw-bold">Widgets</h5>
                                            <p class="mb-0"> 30+ widgets are included in this template. Please check out the best option that suits you. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="card features main-features main-features-4 wow fadeInUp reveal revealleft p-4">
                                        <div class="bg-img mb-2">
                                            <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 128 128" viewBox="0 0 128 128">
                                                <circle cx="64" cy="64" r="63.5" fill="#FFD05B"></circle>
                                                <path fill="#FFF" d="M30,103.8l0-79.7c0-1.8,1.5-3.3,3.3-3.3h50.1l0,11.4c0,1.8,1.5,3.3,3.3,3.3H98l0,68.3   c0,1.8-1.5,3.3-3.3,3.3H33.3C31.5,107.1,30,105.6,30,103.8z"></path>
                                                <path fill="#E6E9EE" d="M83.3,20.9h11.4c1.8,0,3.3,1.5,3.3,3.3l0,11.4H86.6c-1.8,0-3.3-1.5-3.3-3.3L83.3,20.9z"></path>
                                                <path fill="#CED5E0" d="M83.3,20.9h11.4c1.8,0,3.3,1.5,3.3,3.3l0,11.4L83.3,20.9z"></path>
                                                <rect width="54.6" height="2.4" x="36.7" y="50.7" fill="#E6E9EE"></rect>
                                                <rect width="54.6" height="2.4" x="36.7" y="58.2" fill="#E6E9EE"></rect>
                                                <rect width="54.6" height="2.4" x="36.7" y="65.8" fill="#E6E9EE"></rect>
                                                <rect width="54.6" height="2.4" x="36.7" y="73.4" fill="#E6E9EE"></rect>
                                                <rect width="23.5" height="2.4" x="67.8" y="80.9" fill="#84DBFF"></rect>
                                                <rect width="23.5" height="2.4" x="67.8" y="88.5" fill="#84DBFF"></rect>
                                                <rect width="54.6" height="2.4" x="36.7" y="43.1" fill="#E6E9EE"></rect>
                                                <rect width="29.6" height="2.4" x="36.7" y="35.6" fill="#84DBFF"></rect>
                                                <path fill="#FF7058" d="M41.1,83.3c-4.4,4.4-4.4,11.5,0,15.9s11.5,4.4,15.9,0c4.4-4.4,4.4-11.5,0-15.9   C52.6,78.9,45.5,78.9,41.1,83.3z M41.9,84.1c3.4-3.4,8.7-3.8,12.6-1.3l-1.6,1.6c-3-1.7-6.9-1.3-9.5,1.2c-2.6,2.6-3,6.5-1.2,9.5   l-1.6,1.6C38.1,92.8,38.5,87.5,41.9,84.1z M43.1,94.3c-1.3-2.5-0.9-5.7,1.2-7.7c2.1-2.1,5.2-2.5,7.7-1.2L43.1,94.3z M54.9,88.2   c1.3,2.5,0.9,5.7-1.2,7.7c-2.1,2.1-5.2,2.5-7.7,1.2L54.9,88.2z M56.1,98.3c-3.4,3.4-8.7,3.8-12.6,1.3l1.6-1.6   c3,1.7,6.9,1.3,9.5-1.2c2.6-2.6,3-6.5,1.2-9.5l1.6-1.6C60,89.6,59.5,94.9,56.1,98.3z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 class="fw-bold">Validation Forms</h5>
                                            <p class="mb-0"> Different types of “Form Validation” are implemented in this Valex admin template and used strict validation rules. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <section class="section landing-Features">
                <div class="container text-center">
                    <p class="fs-12 fw-semibold text-success mb-1"><span class="landing-section-heading text-fixed-white">Features</span>
                    </p>
                    <div class="landing-title"></div>
                    <h3 class="fw-semibold mb-2 text-fixed-white ">Features Used in Valex</h3>
                    <div class="row justify-content-center">
                        <div class="col-xl-7">
                            <p class="text-fixed-white op-8 fs-15 mb-3 fw-normal">Some of the reviews our clients gave which brings motivation to work for future projects.</p>
                        </div>
                    </div>
                    <div class="text-start">
                        <div class="justify-content-center">
                            <div class="">
                                <div class="feature-logos mt-sm-5 flex-wrap">
                                    <div class="ms-sm-5 ms-2 text-center">
                                        <img src="../assets/images/media/landing/web/1.png" alt="image" class="featur-icon">
                                        <h5 class="mt-3 text-fixed-white ">Bootstrap5</h5>
                                    </div>
                                    <div class="ms-sm-5 ms-2 text-center">
                                        <img src="../assets/images/media/landing/web/2.png" alt="image" class="featur-icon">
                                        <h5 class="mt-3 text-fixed-white ">HTML5</h5>
                                    </div>
                                    <div class="ms-sm-5 ms-2 text-center">
                                        <img src="../assets/images/media/landing/web/3.png" alt="image" class="featur-icon">
                                        <h5 class="mt-3 text-fixed-white ">Sass</h5>
                                    </div>
                                    <div class="ms-sm-5 ms-2 text-center">
                                        <img src="../assets/images/media/landing/web/4.png" alt="image" class="featur-icon">
                                        <h5 class="mt-3 text-fixed-white ">Gulp</h5>
                                    </div>
                                    <div class="ms-sm-5 ms-2 text-center">
                                        <img src="../assets/images/media/landing/web/5.png" alt="image" class="featur-icon">
                                        <h5 class="mt-3 text-fixed-white ">NPM</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination mt-4"></div>
                    </div>
                </div>
            </section>
            <section class="section " id="about">
                <div class="container text-center">
                    <p class="fs-12 fw-semibold text-success mb-1"><span class="landing-section-heading">Our Mission</span>
                    </p>
                    <div class="landing-title"></div>
                    <h3 class="fw-semibold mb-2"> Our mission is to make work meaningful. </h3>
                    <div class="row justify-content-center">
                        <div class="col-xl-7">
                            <p class="text-muted fs-15 mb-3 fw-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut est dui, rutrum in nulla eu,</p>
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center mx-0">
                        <div class="col-xxl-4 col-xl-5 col-lg-5 text-center text-lg-start">
                            <img src="../assets/images/media/pngs/9.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-xxl-8 col-xl-7 col-lg-7 pt-5 pb-0 px-lg-2 px-5 text-start">
                            <h4 class="text-lg-start fw-medium mb-4">We are a creative agency with a passion for design. </h4>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="d-flex mb-2">
                                        <span>
                                            <i class='bx bxs-badge-check text-primary fs-18'></i>
                                        </span>
                                        <div class="ms-2">
                                            <h6 class="fw-medium mb-0">Quality & Clean Code </h6>
                                            <p class=" text-muted mb-3"> The Valex admin code is maintained very cleanly and well-structured with proper comments. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="d-flex mb-2">
                                        <span>
                                            <i class='bx bxs-badge-check text-primary fs-18'></i>
                                        </span>
                                        <div class="ms-2">
                                            <h6 class="fw-medium mb-0">Well Documented</h6>
                                            <p class=" text-muted mb-3"> The documentation provides clear-cut material for the Valex admin template. The documentation is explained or instructed in such a way that every user can understand. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="d-flex mb-2">
                                        <span>
                                            <i class='bx bxs-badge-check text-primary fs-18'></i>
                                        </span>
                                        <div class="ms-2">
                                            <h6 class="fw-medium mb-0">Switch Easily From One Color to Another Color style</h6>
                                            <p class=" text-muted">lorem ipsum, dolor sit var ameto condesetrat aiatel varen or damsenlel verman code Lorem ipsum, dolor sit amet consectetur </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section section-bg " id="statistics">
                <div class="container text-center">
                    <p class="fs-12 fw-semibold text-success mb-1"><span class="landing-section-heading">Statistics</span>
                    </p>
                    <div class="landing-title"></div>
                    <h3 class="fw-semibold mb-2">More than 120+ projects completed.</h3>
                    <div class="row justify-content-center mb-5">
                        <div class="col-xl-7">
                            <p class="text-muted fs-15mb-0 fw-normal">We are proud to have top class clients and customers,which motivates us to work more on projects.</p>
                        </div>
                    </div>
                    <div class="row  g-2 justify-content-center">
                        <div class="col-xl-12">
                            <div class="row justify-content-evenly">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="p-3 text-center rounded-2 bg-white border">
                                        <span class="mb-3 avatar avatar-lg rounded-2 bg-primary-transparent">
                                            <i class='fs-20 fe fe-grid'></i>
                                        </span>
                                        <h3 class="fw-semibold mb-0 text-dark">120+</h3>
                                        <p class="mb-1 fs-14 op-7 text-muted ">
                                            Projects
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="p-3 text-center rounded-2 bg-white border">
                                        <span class="mb-3 avatar avatar-lg rounded-2 bg-primary-transparent">
                                            <i class='fs-20 fe fe-user-plus'></i>
                                        </span>
                                        <h3 class="fw-semibold mb-0 text-dark">20K+</h3>
                                        <p class="mb-1 fs-14 op-7 text-muted ">
                                            Clients
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="p-3 text-center rounded-2 bg-white border">
                                        <span class="mb-3 avatar avatar-lg rounded-2 bg-primary-transparent">
                                            <i class='fs-20 fe fe-users'></i>
                                        </span>
                                        <h3 class="fw-semibold mb-0 text-dark">854</h3>
                                        <p class="mb-1 fs-14 op-7 text-muted ">
                                            Employees
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="p-3 text-center rounded-2 bg-white border">
                                        <span class="mb-3 avatar avatar-lg rounded-2 bg-primary-transparent">
                                            <i class='fs-20 fe fe-calendar'></i>
                                        </span>
                                        <h3 class="fw-semibold mb-0 text-dark">5+</h3>
                                        <p class="mb-1 fs-14 op-7 text-muted ">
                                            Years of Experience
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- End:: Section-5 -->

            <!-- Start:: Section-6 -->
            <section class="section  " id="pricing">
                <div class="container">
                    <p class="fs-12 fw-semibold text-success mb-1 text-center"><span class="landing-section-heading">PRICING</span>
                    </p>
                    <div class="landing-title"></div>
                    <h3 class="fw-semibold mb-2 text-center">Valex comes with most affordable pricing range.</h3>
                    <div class="row justify-content-center">
                        <div class="col-xl-9">
                            <p class="text-muted fs-15 mb-5 fw-normal">Our plans are most affordable and are mainly placed by focussing every category in the sector even basic plan helps better.</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-4">
                        <ul class="nav nav-tabs mb-3 tab-style-6 bg-primary-transparent" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pricing-monthly" data-bs-toggle="tab" data-bs-target="#pricing-monthly-pane" type="button" role="tab" aria-controls="pricing-monthly-pane" aria-selected="true">Monthly</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pricing-yearly" data-bs-toggle="tab" data-bs-target="#pricing-yearly-pane" type="button" role="tab" aria-controls="pricing-yearly-pane" aria-selected="false">Yearly</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card custom-card overflow-hidden shadow-none border-0">
                        <div class="card-body p-0">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane border-0 show active p-0" id="pricing-monthly-pane" role="tabpanel" aria-labelledby="pricing-monthly" tabindex="0">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-4 col-xl-4 col-md-8 col-sm-12">
                                            <div class="card p-3 border-primary pricing-card advanced shadow-none">
                                                <div class="p-4 bg-primary rounded-3 d-block text-justified pt-2 text-fixed-white">
                                                    <p class="fs-18 fw-semibold mb-1 pe-0">Advanced<span class="badge bg-white text-primary float-end font-weight-normal fs-11">Limited
                                                            Deal</span></p>
                                                    <p class="text-justify fw-semibold mb-1"> <span class="fs-15 me-2">$</span><span class="fs-22 me-1">199</span><span class="fs-13"><span class="op-5 text-fixed-white text-20">/</span>
                                                            month</span></p>
                                                    <p class="fs-13 mb-2">Lorem ipsum dolor sit amet
                                                        consectetur adipisicing elit. Iure quos debitis
                                                        aliquam .</p>
                                                    <p class="fs-13 mb-1 text-fixed-white op-7">Billed monthly on
                                                        regular basis!</p>
                                                </div>
                                                <div class="card-body pt-2">
                                                    <ul class="text-justify pricing-body ps-0 list-unstyled mt-3">
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary fs-16 me-2"></i>
                                                            <strong> 5 Free</strong> Domain Name
                                                        </li>
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary fs-16 me-2"></i><strong>5
                                                            </strong> One-Click Apps</li>
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary fs-16 me-2"></i><strong>
                                                                3 </strong> Databases</li>
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary fs-16 me-2"></i><strong>
                                                                Unlimited </strong> Cloud Storage</li>
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary fs-16 me-2"></i><strong>
                                                                Money </strong> BackGuarantee</li>
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary fs-16 me-2"></i><strong>
                                                                24/7</strong> support</li>
                                                    </ul>
                                                </div>
                                                <div class="card-footer text-center border-top-0 py-0">
                                                    <button class="btn btn-primary w-100">
                                                        <span class="ms-4 me-4">Select</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4 col-md-8 col-sm-12">
                                            <div class="card p-3 pricing-card shadow-none">
                                                <div class="card-header d-block text-justified pt-2">
                                                    <p class="fs-18 fw-semibold mb-1">Basic</p>
                                                    <p class="text-justify fw-semibold mb-1"> <span class="fs-15 me-2">$</span><span class="fs-22 me-1">39</span><span class="fs-13"><span class="op-0-5 text-muted text-20">/</span>
                                                            month</span></p>
                                                    <p class="fs-13 mb-1">Lorem ipsum dolor sit amet
                                                        consectetur adipisicing elit. Iure quos debitis
                                                        aliquam .</p>
                                                    <p class="fs-13 mb-1 text-secondary">Billed monthly
                                                        on regular basis!</p>
                                                </div>
                                                <div class="card-body pt-2">
                                                    <ul class="text-justify pricing-body ps-0 mt-3 list-unstyled">
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline me-2 fs-16 text-secondary"></i><strong>
                                                                2 Free</strong> Domain Name</li>
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline me-2 fs-16 text-secondary"></i>
                                                            <strong>3 </strong> One-Click Apps
                                                        </li>
                                                        <li class="text-muted"><i class="mdi mdi-close-circle-outline me-2 fs-16 text-gray"></i><strong>
                                                                1 </strong> Databases</li>
                                                        <li class="text-muted"><i class="mdi mdi-close-circle-outline me-2 fs-16 text-gray"></i><strong>
                                                                Unlimited </strong> Cloud Storage</li>
                                                        <li class="text-muted"><i class="mdi mdi-close-circle-outline me-2 fs-16 text-gray"></i><strong>
                                                                Money </strong> BackGuarantee</li>
                                                        <li class="text-muted"><i class="mdi mdi-close-circle-outline me-2 fs-16 text-gray"></i><strong>
                                                                24/7</strong> support</li>
                                                    </ul>
                                                </div>
                                                <div class="card-footer text-center border-top-0 py-0">
                                                    <button class="btn btn-outline-info w-100">
                                                        <span class="ms-4 me-4">Select</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4 col-md-8 col-sm-12">
                                            <div class="card p-3 pricing-card shadow-none">
                                                <div class="card-header d-block text-justified pt-2">
                                                    <p class="fs-18 fw-semibold mb-1">Regular</p>
                                                    <p class="text-justify fw-semibold mb-1"> <span class="fs-15 me-2">$</span><span class="fs-22 me-1">69</span><span class="fs-13"><span class="op-0-5 text-muted text-20">/</span>
                                                            month</span></p>
                                                    <p class="fs-13 mb-1">Lorem ipsum dolor sit amet
                                                        consectetur adipisicing elit. Iure quos debitis
                                                        aliquam .</p>
                                                    <p class="fs-13 mb-1  text-danger">Billed monthly on
                                                        regular basis!</p>
                                                </div>
                                                <div class="card-body pt-2">
                                                    <ul class="text-justify pricing-body ps-0 mt-3 list-unstyled">
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-danger me-2 fs-16"></i><strong>
                                                                1 Free</strong> Domain Name</li>
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-danger me-2 fs-16"></i><strong>4
                                                            </strong> One-Click Apps</li>
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-danger me-2 fs-16"></i><strong>
                                                                2 </strong> Databases</li>
                                                        <li class="text-muted"><i class="mdi mdi-close-circle-outline text-gray me-2 fs-16"></i><strong>
                                                                Unlimited </strong> Cloud Storage</li>
                                                        <li class="text-muted"><i class="mdi mdi-close-circle-outline text-gray me-2 fs-16"></i><strong>
                                                                Money </strong> BackGuarantee</li>
                                                        <li class="text-muted"><i class="mdi mdi-close-circle-outline text-gray me-2 fs-16"></i><strong>
                                                                24/7</strong> support</li>
                                                    </ul>
                                                </div>
                                                <div class="card-footer text-center border-top-0 py-0">
                                                    <button class="btn btn-outline-info w-100">
                                                        <span class="ms-4 me-4">Select</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane border-0 p-0" id="pricing-yearly-pane" role="tabpanel" aria-labelledby="pricing-yearly" tabindex="0">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-4 col-xl-4 col-md-8 col-sm-12">
                                            <div class="card p-3 border border-primary pricing-card advanced reveal revealrotate shadow-none">
                                                <div class="p-4 bg-primary rounded-3 d-block text-justified pt-2 text-fixed-white">
                                                    <p class="fs-18 fw-semibold mb-1 pe-0">Advanced<span class="badge bg-white text-primary float-end font-weight-normal fs-11">Limited
                                                            Deal</span></p>
                                                    <p class="text-justify fw-semibold mb-1"> <span class="fs-15 me-2">$</span><span class="fs-22 me-1">1,299</span><span class="fs-13"><span class="op-5 text-fixed-white text-20">/</span>
                                                            year</span></p>
                                                    <p class="fs-13 mb-2">Lorem ipsum dolor sit amet
                                                        consectetur adipisicing elit. Iure quos debitis
                                                        aliquam .</p>
                                                    <p class="fs-13 mb-1 text-fixed-white op-7">Billed monthly on
                                                        regular basis!</p>
                                                </div>
                                                <div class="card-body pt-2">
                                                    <ul class="text-justify pricing-body ps-0 mt-3 list-unstyled">
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary fs-16 me-2"></i>
                                                            <strong> 5 Free</strong> Domain Name
                                                        </li>
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary fs-16 me-2"></i><strong>5
                                                            </strong> One-Click Apps</li>
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary fs-16 me-2"></i><strong>
                                                                3 </strong> Databases</li>
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary fs-16 me-2"></i><strong>
                                                                Unlimited </strong> Cloud Storage</li>
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary fs-16 me-2"></i><strong>
                                                                Money </strong> BackGuarantee</li>
                                                        <li class=""><i class="mdi mdi-checkbox-marked-circle-outline text-primary fs-16 me-2"></i><strong>
                                                                24/7</strong> support</li>
                                                    </ul>
                                                </div>
                                                <div class="card-footer text-center border-top-0 py-0">
                                                    <button class="btn btn-primary w-100">
                                                        <span class="ms-4 me-4">Select</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4 col-md-8 col-sm-12">
                                            <div class="card  border  p-3 pricing-card reveal revealrotate shadow-none">
                                                <div class="card-header d-block text-justified pt-2">
                                                    <p class="fs-18 fw-semibold mb-1">Basic</p>
                                                    <p class="text-justify fw-semibold mb-1"> <span class="fs-15 me-2">$</span><span class="fs-22 me-1">399</span><span class="fs-13"><span class="op-0-5 text-muted text-20">/</span>
                                                            year</span></p>
                                                    <p class="fs-13 mb-1">Lorem ipsum dolor sit amet
                                                        consectetur adipisicing elit. Iure quos debitis
                                                        aliquam .</p>
                                                    <p class="fs-13 mb-1 text-secondary">Billed monthly
                                                        on regular basis!</p>
                                                </div>
                                                <div class="card-body pt-2">
                                                    <ul class="text-justify pricing-body ps-0 mt-3 list-unstyled">
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline me-2 fs-16 text-secondary"></i><strong>
                                                                2 Free</strong> Domain Name</li>
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline me-2 fs-16 text-secondary"></i>
                                                            <strong>3 </strong> One-Click Apps
                                                        </li>
                                                        <li class="text-muted"><i class="mdi mdi-close-circle-outline me-2 fs-16 text-gray"></i><strong>
                                                                1 </strong> Databases</li>
                                                        <li class="text-muted"><i class="mdi mdi-close-circle-outline me-2 fs-16 text-gray"></i><strong>
                                                                Unlimited </strong> Cloud Storage</li>
                                                        <li class="text-muted"><i class="mdi mdi-close-circle-outline me-2 fs-16 text-gray"></i><strong>
                                                                Money </strong> BackGuarantee</li>
                                                        <li class="text-muted"><i class="mdi mdi-close-circle-outline me-2 fs-16 text-gray"></i><strong>
                                                                24/7</strong> support</li>
                                                    </ul>
                                                </div>
                                                <div class="card-footer text-center border-top-0 py-0">
                                                    <button class="btn btn-outline-info w-100">
                                                        <span class="ms-4 me-4">Select</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4 col-md-8 col-sm-12">
                                            <div class="card border  p-3 pricing-card reveal revealrotate shadow-none">
                                                <div class="card-header d-block text-justified pt-2">
                                                    <p class="fs-18 fw-semibold mb-1">Regular</p>
                                                    <p class="text-justify fw-semibold mb-1"> <span class="fs-15 me-2">$</span><span class="fs-22 me-1">899</span><span class="fs-13"><span class="op-0-5 text-muted text-20">/</span>
                                                            year</span></p>
                                                    <p class="fs-13 mb-1">Lorem ipsum dolor sit amet
                                                        consectetur adipisicing elit. Iure quos debitis
                                                        aliquam .</p>
                                                    <p class="fs-13 mb-1 text-danger">Billed monthly on
                                                        regular basis!</p>
                                                </div>
                                                <div class="card-body pt-2">
                                                    <ul class="text-justify pricing-body ps-0 mt-3 list-unstyled">
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-danger me-2 fs-16"></i><strong>
                                                                1 Free</strong> Domain Name</li>
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-danger me-2 fs-16"></i><strong>4
                                                            </strong> One-Click Apps</li>
                                                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-danger me-2 fs-16"></i><strong>
                                                                2 </strong> Databases</li>
                                                        <li class="text-muted"><i class="mdi mdi-close-circle-outline text-gray me-2 fs-16"></i><strong>
                                                                Unlimited </strong> Cloud Storage</li>
                                                        <li class="text-muted"><i class="mdi mdi-close-circle-outline text-gray me-2 fs-16"></i><strong>
                                                                Money </strong> BackGuarantee</li>
                                                        <li class="text-muted"><i class="mdi mdi-close-circle-outline text-gray me-2 fs-16"></i><strong>
                                                                24/7</strong> support</li>
                                                    </ul>
                                                </div>
                                                <div class="card-footer text-center border-top-0 py-0">
                                                    <button class="btn btn-outline-info w-100">
                                                        <span class="ms-4 me-4">Select</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End:: Section-6 -->

            <!-- Start:: Section-7 -->
            <section class="section landing-testimonials section-bg" id="testimonials">
                <div class="container text-center">
                    <p class="fs-12 fw-semibold text-success mb-1"><span class="landing-section-heading">TESTIMONIALS</span>
                    </p>
                    <div class="landing-title"></div>
                    <h3 class="fw-semibold mb-2">What People Are Saying About Our Product.</h3>
                    <div class="row justify-content-center">
                        <div class="col-xl-7">
                            <p class="text-muted fs-15 mb-5 fw-normal">Some of the reviews our clients gave which brings motivation to work for future projects.</p>
                        </div>
                    </div>
                    <div class="swiper pagination-dynamic text-start">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
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
                            </div>
                        </div>
                        <div class="swiper-pagination mt-4"></div>
                    </div>
                </div>
            </section>
            <!-- End:: Section-7 -->

            <!-- Start:: Section-8 -->
            <section class="section" id="faq">
                <div class="container text-center">
                    <p class="fs-12 fw-semibold text-success mb-1"><span class="landing-section-heading">F.A.Q</span>
                    </p>
                    <div class="landing-title"></div>
                    <h3 class="fw-semibold mb-2">Frequently asked questions ?</h3>
                    <div class="row justify-content-center">
                        <div class="col-xl-7">
                            <p class="text-muted fs-15 mb-5 fw-normal">We have shared some of the most frequently asked questions to help you out.</p>
                        </div>
                    </div>
                    <div class="row text-start">
                        <div class="col-xl-12">
                            <div class="row gy-2">
                                <div class="col-xl-6">
                                    <div class="accordion accordion-customicon1 accordion-primary accordions-items-seperate" id="accordionFAQ1">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingcustomicon1One">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsecustomicon1One" aria-expanded="true" aria-controls="collapsecustomicon1One">
                                                    Where can I subscribe to your newsletter?
                                                </button>
                                            </h2>
                                            <div id="collapsecustomicon1One" class="accordion-collapse collapse show" aria-labelledby="headingcustomicon1One" data-bs-parent="#accordionFAQ1">
                                                <div class="accordion-body">
                                                    <strong>This is the first item's accordion body.</strong> It is shown by
                                                    default, until the collapse plugin adds the appropriate classes that we
                                                    use to style each element. These classes control the overall appearance,
                                                    as well as the showing and hiding via CSS transitions. You can modify
                                                    any of this with custom CSS or overriding our default variables. It's
                                                    also worth noting that just about any HTML can go within the
                                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingcustomicon1Two">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsecustomicon1Two" aria-expanded="false" aria-controls="collapsecustomicon1Two">
                                                    Where can in edit my address?
                                                </button>
                                            </h2>
                                            <div id="collapsecustomicon1Two" class="accordion-collapse collapse" aria-labelledby="headingcustomicon1Two" data-bs-parent="#accordionFAQ1">
                                                <div class="accordion-body">
                                                    <strong>This is the first item's accordion body.</strong> It is shown by
                                                    default, until the collapse plugin adds the appropriate classes that we
                                                    use to style each element. These classes control the overall appearance,
                                                    as well as the showing and hiding via CSS transitions. You can modify
                                                    any of this with custom CSS or overriding our default variables. It's
                                                    also worth noting that just about any HTML can go within the
                                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingcustomicon1Three">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsecustomicon1Three" aria-expanded="false" aria-controls="collapsecustomicon1Three">
                                                    What are your opening hours?
                                                </button>
                                            </h2>
                                            <div id="collapsecustomicon1Three" class="accordion-collapse collapse" aria-labelledby="headingcustomicon1Three" data-bs-parent="#accordionFAQ1">
                                                <div class="accordion-body">
                                                    <strong>This is the first item's accordion body.</strong> It is shown by
                                                    default, until the collapse plugin adds the appropriate classes that we
                                                    use to style each element. These classes control the overall appearance,
                                                    as well as the showing and hiding via CSS transitions. You can modify
                                                    any of this with custom CSS or overriding our default variables. It's
                                                    also worth noting that just about any HTML can go within the
                                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingcustomicon1Four">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsecustomicon1Four" aria-expanded="false" aria-controls="collapsecustomicon1Four">
                                                    Do I have the right to return an item?
                                                </button>
                                            </h2>
                                            <div id="collapsecustomicon1Four" class="accordion-collapse collapse" aria-labelledby="headingcustomicon1Four" data-bs-parent="#accordionFAQ1">
                                                <div class="accordion-body">
                                                    <strong>This is the first item's accordion body.</strong> It is shown by
                                                    default, until the collapse plugin adds the appropriate classes that we
                                                    use to style each element. These classes control the overall appearance,
                                                    as well as the showing and hiding via CSS transitions. You can modify
                                                    any of this with custom CSS or overriding our default variables. It's
                                                    also worth noting that just about any HTML can go within the
                                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingcustomicon1Five">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsecustomicon1Five" aria-expanded="false" aria-controls="collapsecustomicon1Five">
                                                    General Terms & Conditions (GTC)
                                                </button>
                                            </h2>
                                            <div id="collapsecustomicon1Five" class="accordion-collapse collapse" aria-labelledby="headingcustomicon1Five" data-bs-parent="#accordionFAQ1">
                                                <div class="accordion-body">
                                                    <strong>This is the first item's accordion body.</strong> It is shown by
                                                    default, until the collapse plugin adds the appropriate classes that we
                                                    use to style each element. These classes control the overall appearance,
                                                    as well as the showing and hiding via CSS transitions. You can modify
                                                    any of this with custom CSS or overriding our default variables. It's
                                                    also worth noting that just about any HTML can go within the
                                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingcustomicon1Six">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsecustomicon1Six" aria-expanded="false" aria-controls="collapsecustomicon1Six">
                                                    Do I need to create an account to make an order?
                                                </button>
                                            </h2>
                                            <div id="collapsecustomicon1Six" class="accordion-collapse collapse" aria-labelledby="headingcustomicon1Six" data-bs-parent="#accordionFAQ1">
                                                <div class="accordion-body">
                                                    <strong>This is the first item's accordion body.</strong> It is shown by
                                                    default, until the collapse plugin adds the appropriate classes that we
                                                    use to style each element. These classes control the overall appearance,
                                                    as well as the showing and hiding via CSS transitions. You can modify
                                                    any of this with custom CSS or overriding our default variables. It's
                                                    also worth noting that just about any HTML can go within the
                                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="accordion accordion-customicon1 accordion-primary accordions-items-seperate" id="accordionFAQ2">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingcustomicon2Five">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsecustomicon2Five" aria-expanded="false" aria-controls="collapsecustomicon2Five">
                                                    General Terms & Conditions (GTC)
                                                </button>
                                            </h2>
                                            <div id="collapsecustomicon2Five" class="accordion-collapse collapse" aria-labelledby="headingcustomicon2Five" data-bs-parent="#accordionFAQ2">
                                                <div class="accordion-body">
                                                    <strong>This is the first item's accordion body.</strong> It is shown by
                                                    default, until the collapse plugin adds the appropriate classes that we
                                                    use to style each element. These classes control the overall appearance,
                                                    as well as the showing and hiding via CSS transitions. You can modify
                                                    any of this with custom CSS or overriding our default variables. It's
                                                    also worth noting that just about any HTML can go within the
                                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingcustomicon2Six">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsecustomicon2Six" aria-expanded="false" aria-controls="collapsecustomicon2Six">
                                                    Do I need to create an account to make an order?
                                                </button>
                                            </h2>
                                            <div id="collapsecustomicon2Six" class="accordion-collapse collapse" aria-labelledby="headingcustomicon2Six" data-bs-parent="#accordionFAQ2">
                                                <div class="accordion-body">
                                                    <strong>This is the first item's accordion body.</strong> It is shown by
                                                    default, until the collapse plugin adds the appropriate classes that we
                                                    use to style each element. These classes control the overall appearance,
                                                    as well as the showing and hiding via CSS transitions. You can modify
                                                    any of this with custom CSS or overriding our default variables. It's
                                                    also worth noting that just about any HTML can go within the
                                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingcustomicon2One">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsecustomicon2One" aria-expanded="true" aria-controls="collapsecustomicon2One">
                                                    Where can I subscribe to your newsletter?
                                                </button>
                                            </h2>
                                            <div id="collapsecustomicon2One" class="accordion-collapse collapse " aria-labelledby="headingcustomicon2One" data-bs-parent="#accordionFAQ2">
                                                <div class="accordion-body">
                                                    <strong>This is the first item's accordion body.</strong> It is shown by
                                                    default, until the collapse plugin adds the appropriate classes that we
                                                    use to style each element. These classes control the overall appearance,
                                                    as well as the showing and hiding via CSS transitions. You can modify
                                                    any of this with custom CSS or overriding our default variables. It's
                                                    also worth noting that just about any HTML can go within the
                                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingcustomicon2Two">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsecustomicon2Two" aria-expanded="false" aria-controls="collapsecustomicon2Two">
                                                    Where can in edit my address?
                                                </button>
                                            </h2>
                                            <div id="collapsecustomicon2Two" class="accordion-collapse collapse" aria-labelledby="headingcustomicon2Two" data-bs-parent="#accordionFAQ2">
                                                <div class="accordion-body">
                                                    <strong>This is the first item's accordion body.</strong> It is shown by
                                                    default, until the collapse plugin adds the appropriate classes that we
                                                    use to style each element. These classes control the overall appearance,
                                                    as well as the showing and hiding via CSS transitions. You can modify
                                                    any of this with custom CSS or overriding our default variables. It's
                                                    also worth noting that just about any HTML can go within the
                                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingcustomicon2Three">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsecustomicon2Three" aria-expanded="false" aria-controls="collapsecustomicon2Three">
                                                    What are your opening hours?
                                                </button>
                                            </h2>
                                            <div id="collapsecustomicon2Three" class="accordion-collapse collapse" aria-labelledby="headingcustomicon2Three" data-bs-parent="#accordionFAQ2">
                                                <div class="accordion-body">
                                                    <strong>This is the first item's accordion body.</strong> It is shown by
                                                    default, until the collapse plugin adds the appropriate classes that we
                                                    use to style each element. These classes control the overall appearance,
                                                    as well as the showing and hiding via CSS transitions. You can modify
                                                    any of this with custom CSS or overriding our default variables. It's
                                                    also worth noting that just about any HTML can go within the
                                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingcustomicon2Four">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsecustomicon2Four" aria-expanded="false" aria-controls="collapsecustomicon2Four">
                                                    Do I have the right to return an item?
                                                </button>
                                            </h2>
                                            <div id="collapsecustomicon2Four" class="accordion-collapse collapse show" aria-labelledby="headingcustomicon2Four" data-bs-parent="#accordionFAQ2">
                                                <div class="accordion-body">
                                                    <strong>This is the first item's accordion body.</strong> It is shown by
                                                    default, until the collapse plugin adds the appropriate classes that we
                                                    use to style each element. These classes control the overall appearance,
                                                    as well as the showing and hiding via CSS transitions. You can modify
                                                    any of this with custom CSS or overriding our default variables. It's
                                                    also worth noting that just about any HTML can go within the
                                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End:: Section-8 -->

            <!-- Start:: Section-9 -->
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
                                <p class="fw-semibold mb-3"><a href="index.html"><img src="../assets/images/brand-logos/desktop-white.png" alt="" class="logo-img"></a></p>
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
                <span class="text-muted fs-15"> Copyright © <span id="year"></span> <a href="javascript:void(0);" class="text-primary fw-semibold"><u>Valex</u></a>.
                    Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0);" class="text-primary fw-semibold"><u>
                            Spruko</u>
                    </a> All
                    rights
                    reserved
                </span>
            </div>

        </div>
        <!-- End::app-content -->

    </div>

    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    <!-- Popper JS -->
    <script src="../assets/libs/@popperjs/core/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Color Picker JS -->
    <script src="../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>

    <!-- Choices JS -->
    <script src="../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- Swiper JS -->
    <script src="../assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Defaultmenu JS -->
    <script src="../assets/js/defaultmenu.min.js"></script>

    <!-- Internal Landing JS -->
    <script src="../assets/js/landing.js"></script>

    <!-- Node Waves JS-->
    <script src="../assets/libs/node-waves/waves.min.js"></script>

    <!-- Sticky JS -->
    <script src="../assets/js/sticky.js"></script>

</body>

</html>