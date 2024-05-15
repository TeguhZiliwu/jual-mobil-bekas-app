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
            <div class="main-dashboard-header-right">
                <div>
                    <label class="fs-13 text-muted">Customer Ratings</label>
                    <div class="main-star">
                        <i class="bi bi-star-fill fs-13 text-warning"></i>
                        <i class="bi bi-star-fill fs-13 text-warning"></i>
                        <i class="bi bi-star-fill fs-13 text-warning"></i>
                        <i class="bi bi-star-fill fs-13 text-warning"></i>
                        <i class="bi bi-star-fill fs-13 text-muted op-8"></i> <span>(14,873)</span>
                    </div>
                </div>
                <div>
                    <label class="fs-13 text-muted">Online Sales</label>
                    <h5 class="mb-0 fw-semibold">563,275</h5>
                </div>
                <div>
                    <label class="fs-13 text-muted">Offline Sales</label>
                    <h5 class="mb-0 fw-semibold">783,675</h5>
                </div>
            </div>
        </div>
    </x-slot:renderContent>


    <x-slot:footerFiles>
        
    </x-slot>
</x-layout-base>
