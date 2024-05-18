<!-- Start::app-sidebar -->
<aside class="app-sidebar sticky" id="sidebar">
    <div class="main-sidebar-header">
        <a href="index.html" class="header-logo">
            <img src="{{ asset('assets/images/brand-logos/logo-long.jpg') }}" alt="logo" class="desktop-logo">
            <img src="{{ asset('assets/images/brand-logos/logo.jpg') }}" alt="logo" class="toggle-logo">
            <img src="{{ asset('assets/images/brand-logos/logo-long.jpg') }}" alt="logo" class="desktop-white">
            <img src="{{ asset('assets/images/brand-logos/logo.jpg') }}" alt="logo" class="toggle-white">
        </a>
    </div>
    <div class="main-sidebar" id="sidebar-scroll">
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <li class="slide__category"><span class="category-name">Main</span></li>
                <li class="slide">
                    <a href="{{ route('home') }}" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                        </svg>
                        <span class="side-menu__label">Home</span>
                    </a>
                </li>
                @if (auth()->check() && auth()->user()->role === 'Admin')
                <li class="slide__category"><span class="category-name">Transaction</span></li>
                <li class="slide">
                    <a href="{{ route('transaction.payment') }}" class="side-menu__item">
                        <i class="side-menu__icon fa-solid fa-money-bill-1-wave"></i>
                        <span class="side-menu__label">Payment</span>
                    </a>
                </li>
                <li class="slide__category"><span class="category-name">Management</span></li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="side-menu__icon fa-solid fa-database"></i>
                        <span class="side-menu__label">Master Data</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1 mega-menu">
                        <li class="slide">
                            <a href="{{ route('master.user') }}" class="side-menu__item">User</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('master.brand') }}" class="side-menu__item">Brand</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('master.item') }}" class="side-menu__item">Item</a>
                        </li>
                    </ul>
                </li>
                <li class="slide__category"><span class="category-name">Report</span></li>
                <li class="slide">
                    <a href="{{ route('report.sales') }}" class="side-menu__item">
                        <i class="side-menu__icon fa-solid fa-file-invoice-dollar"></i>
                        <span class="side-menu__label">Sales Report</span>
                    </a>
                </li>
                @endif
                @if (auth()->check() && auth()->user()->role === 'User')
                <li class="slide">
                    <a href="{{ route('transaction.car-for-sale') }}" class="side-menu__item">
                        <i class="side-menu__icon fa-solid fa-cars"></i>
                        <span class="side-menu__label">Cars for Sale</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('transaction.cart') }}" class="side-menu__item">
                        <i class="side-menu__icon fa-solid fa-cart-shopping"></i>
                        <span class="side-menu__label">Cart</span>
                    </a>
                </li>
                @endif
            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg>
            </div>
        </nav>
    </div>
</aside>
