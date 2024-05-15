<x-layout-base>

    <x-slot:titlePage>Stock In</x-slot:titlePage>
    <x-slot:headerFiles>
        <link rel="stylesheet" href="{{ asset('assets/libs/tempusdominus/tempus-dominus.min.css') }}" crossorigin="anonymous">
    </x-slot:headerFiles>

    <x-slot:renderContent>
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div class="my-auto">
                <h5 class="page-title fs-21 mb-1">Stock In</h5>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Stock</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Stock In</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="ddSupplier" class="form-label">Supplier <span class="text-danger">*</span></label>
                                    <select class="form-control dropdown-field" id="ddSupplier"></select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="txtDateTransaction" class="form-label">Date of Transaction <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3" id="dateTransactionSection" data-td-target-input="nearest" data-td-target-toggle="nearest">
                                        <input type="text" id="txtDateTransaction" class="form-control date-field" placeholder="Enter Date of Transaction">
                                        <span class="input-group-text date-field-span" data-td-target="#dateTransactionSection" data-td-toggle="datetimepicker"><i class="fa-solid fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="txtReferenceNumber" class="form-label">Reference Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control text-field" id="txtReferenceNumber" placeholder="Enter Reference Number" autocomplete="off" maxlength="100" />
                                    <span class="badge bg-primary float-end mt-2 counter-char">0/100</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="txtBarcode" class="form-label">Barcode / Item Code / Item Name</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control text-field" id="txtBarcode" placeholder="Enter Barcode" autocomplete="off" maxlength="100" />
                                        <span class="input-group-text"><i class="fa-solid fa-barcode-read"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <table id="mainTable" class="table table-bordered text-nowrap w-100 table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="table-no">No.</th>
                                            <th>Item</th>
                                            <th>Capital Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row d-flex flex-row-reverse mt-3">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                <h6 class="price fs-14 mb-0 float-end"><span>Total :</span> <pre><span class="h4 d-inline-block text-transform-none" id="lblTotalStockInPrice">Rp 0</span></pre> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalStockIn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"><i class="fa-sharp fa-regular fa-box-open-full"></i> Item Detail</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-3 col-12">
                            <div class="text-center">
                                <img id="itemPhoto" src="{{ asset('assets/images/errors/no-image.png') }}" class="img-fluid rounded-pill stock-in-photo" alt="...">
                            </div>
                        </div>
                        <div class="col-xl-9 col-12">
                            <h5 class="product-title mb-1" id="lblItemName">ITEM NAME</h5>
                            <p class="text-muted fs-13 mb-3" id="lblItemDescription">ITEM DESCRIPTION</p>
                            <div class="d-flex justify-content-between">
                                <h6 class="price fs-14 mb-0"><span>current price :</span> <pre><span class="h4 d-inline-block text-transform-none" id="lblCurrentPrice">9.500,000</span></pre> </h6>
                                <h6 class="price fs-14 mb-0"><span>current stock :</span> <pre><span class="h4 d-inline-block text-transform-none" id="lblCyrrebtQuantity">1.000</span></pre> </h6>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="txtPrice" class="form-label">Current Selling Price <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control text-field price-field margin-price-set-up total-price-set-up" id="txtPrice" placeholder="Enter Price" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="txtCapitalPrice" class="form-label">Capital Price <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control text-field price-field margin-price-set-up" id="txtCapitalPrice" placeholder="Enter Capital Price" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="txtQuantity" class="form-label">Quantity <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control text-field number-field total-price-set-up" id="txtQuantity" placeholder="Enter Quantity" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="row d-flex flex-row-reverse">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                    <h6 class="price fs-14 mb-0 float-end"><span>Total :</span> <pre><span class="h4 d-inline-block text-transform-none" id="lblTotalPrice">Rp 0</span></pre> </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="btnAddStock">Add Stock</button>
                </div>
            </div>
        </div>
    </div>
    </x-slot:renderContent>

    <x-slot:footerFiles>
        <script src="{{ asset('assets/libs/dataTable/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/dataTable/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/libs/dataTable/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/libs/dataTable/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/libs/dataTable/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/libs/dataTable/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/libs/dataTable/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/libs/dataTable/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/libs/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/dataTable/datetime-moment.js') }}"></script>
        <script src="{{ asset('assets/libs/tempusdominus/tempus-dominus.min.js') }}"></script>
        @vite(['resources/js/pages/transactions/stock-in.js'])
    </x-slot>
</x-layout-base>
