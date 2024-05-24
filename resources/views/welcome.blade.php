<x-layout-base>
    
    <x-slot:titlePage>Home</x-slot:titlePage>

    <x-slot:headerFiles>
        
    </x-slot>

    <x-slot:renderContent>
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h4 class="mb-0">Hi, welcome back {{ auth()->user()->full_name }}!</h4>
                <p class="mb-0 text-muted">Jual Mobil Bekas monitoring dashboard application.</p>
            </div>
        </div>        
        @if (auth()->check() && auth()->user()->role === 'Admin')
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-primary-gradient">
                    <div class="px-3 pt-3  pb-2 pt-0">
                        <div>
                            <h6 class="mb-3 fs-12 text-fixed-white">TOTAL INCOME ({{ strtoupper(\Carbon\Carbon::now()->format('F')) }})</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div>
                                    <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{ $formattedTotalIncomeCurrMonth }}</h4>
                                </div>
                                <span class="float-end my-auto ms-auto">
                                    <i class="fas fa-calendar text-fixed-white"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-danger-gradient">
                    <div class="px-3 pt-3  pb-2 pt-0">
                        <div>
                            <h6 class="mb-3 fs-12 text-fixed-white">TOTAL INCOME ({{ date('Y') }})</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div>
                                    <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{ $formattedTotalIncomeCurrYear }}</h4>
                                </div>
                                <span class="float-end my-auto ms-auto">
                                    <i class="fas fa-dollar text-fixed-white"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-success-gradient">
                    <div class="px-3 pt-3  pb-2 pt-0">
                        <div>
                            <h6 class="mb-3 fs-12 text-fixed-white">TOTAL INCOME (ALL TIME)</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div>
                                    <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{ $formattedTotalIncomeAllTime }}</h4>
                                </div>
                                <span class="float-end my-auto ms-auto">
                                    <i class="fas fa-dollar text-fixed-white"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-warning-gradient">
                    <div class="px-3 pt-3  pb-2 pt-0">
                        <div>
                            <h6 class="mb-3 fs-12 text-fixed-white">TOTAL CAR SOLD (ALL TIME)</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div>
                                    <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{ $totalCarSold }}</h4>
                                </div>
                                <span class="float-end my-auto ms-auto">
                                    <i class="fas fa-car text-fixed-white"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </x-slot:renderContent>


    <x-slot:footerFiles>
        
    </x-slot>
</x-layout-base>
