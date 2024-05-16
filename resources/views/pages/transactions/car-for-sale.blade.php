<x-layout-base>

    <x-slot:titlePage>Cars for Sale</x-slot:titlePage>
    <x-slot:headerFiles>
        <link href="{{ asset('assets/libs/dataTable/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/libs/dataTable/buttons.bootstrap5.min.css') }}" rel="stylesheet" />

        <link href="{{ asset('assets/libs/filepond/filepond.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css') }}" rel="stylesheet" />
    </x-slot:headerFiles>

    <x-slot:renderContent>
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div class="my-auto">
                <h5 class="page-title fs-21 mb-1">Cars for Sale</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-12 mb-3 mb-md-0">
                <div class="card">
                    <div class="card-header border-bottom border-top py-3 mb-0 fw-bold text-uppercase rounded-0">
                        Filter</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ddBrand" class="form-label">Brand</label>
                                    <select class="form-control dropdown-field" id="ddBrand">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ddFuelType" class="form-label">Fuel Type</label>
                                    <select class="form-control dropdown-field" id="ddFuelType">
                                        <option value="" selected disabled>Select an Option</option>
                                        <option value="Bensin">Bensin</option>
                                        <option value="Solar">Solar</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ddSeat" class="form-label">Seat</label>
                                    <select class="form-control dropdown-field" id="ddSeat">
                                        <option value="" selected disabled>Select an Option</option>
                                        <option value="2">2 Seat</option>
                                        <option value="4">4 Seat</option>
                                        <option value="6">6 Seat</option>
                                        <option value="8">8 Seat</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="txtKeyword" class="form-label">Keyword</label>
                                    <input id="txtKeyword" type="text" class="form-control" placeholder="Enter Keyword">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 d-grid">
                                <button type="button" class="btn btn-primary" id="btnSearch"><i class="fa-solid fa-magnifying-glass"></i> Seach</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-10 col-lg-9 col-md-12">
                <div class="row row-sm" id="carList">
                </div>
                {{-- <div class="row row-sm">
                    <ul class="pagination product-pagination ms-auto float-end mb-3 ps-2">
                        <li class="page-item page-prev disabled">
                            <a class="page-link" href="javascript:void(0);" tabindex="-1">Prev</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                        <li class="page-item page-next">
                            <a class="page-link" href="javascript:void(0);">Next</a>
                        </li>
                    </ul>
                </div> --}}
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
        <script src="{{ asset('assets/libs/filepond/filepond.min.js') }}"></script>
        <script src="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
        <script src="{{ asset('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
        <script src="{{ asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
        <script src="{{ asset('assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
        <script src="{{ asset('assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.js') }}"></script>
        <script src="{{ asset('assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}"></script>
        <script src="{{ asset('assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}"></script>
        <script src="{{ asset('assets/libs/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
        <script src="{{ asset('assets/libs/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}"></script>
        <script src="{{ asset('assets/libs/filepond-plugin-image-transform/filepond-plugin-image-transform.min.js') }}"></script>
        <script src="{{ asset('assets/libs/barcode/JsBarcode.all.min.js') }}"></script>
        @vite(['resources/js/pages/transactions/car-for-sale.js'])
    </x-slot>
</x-layout-base>
