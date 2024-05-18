<x-layout-base>

    <x-slot:titlePage>Report Sales</x-slot:titlePage>
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
                <h5 class="page-title fs-21 mb-1">Report Sales</h5>
            </div>
        </div>        
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header pb-1">
                        
                    </div>
                    <div class="card-body pt-2 mt-1">
                        <div class="row mb-2">
                            <div class="col-xl-8 col-lg-5 col-md-6 col-sm-12 col-12">
                                <div class="dataTables_length" id="mainTable_length">
                                    <label class="d-inline-flex align-items-center">
                                        Show
                                        <span class="length-change-dropdown mx-2">
                                            <select class="form-control dropdown-field filter-field mx-2">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </span>
                                        entries
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-7 col-md-6 col-sm-12 col-12">
                                <div class="input-group">
                                    <input id="txtKeyword" type="text" class="form-control" placeholder="Enter Keyword" aria-label="Enter Keyword" aria-describedby="button-addon2">
                                    <button id="btnSearch" class="btn btn-primary" type="button" id="button-addon2"><i class="fa-solid fa-search me-1"></i> Search</button>
                                </div>
                            </div>
                        </div>
                        <table id="mainTable" class="table table-bordered text-nowrap w-100 table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th class="table-no">No.</th>
                                    <th>Transaction Date</th>
                                    <th>Item Name</th>
                                    <th>Buyer</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th class="action-column">Receipt of Payment</th>
                                </tr>
                            </thead>
                        </table>
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
        @vite(['resources/js/pages/reports/sales.js'])
    </x-slot>
</x-layout-base>
