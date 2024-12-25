<x-layout-base>

    <x-slot:titlePage>Item</x-slot:titlePage>
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
                <h5 class="page-title fs-21 mb-1">Item Master</h5>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Item</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-primary btn-wave waves-effect waves-light float-end mb-3 me-2 button-action" id="btnAddData">
                    <i class="fa-solid fa-plus me-1"></i> Add Data
                </button>
            </div>
        </div>
        <x-masters.layout-tab-master>
            <x-slot:tabMasterDataRender>
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
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <table id="mainTable" class="table table-bordered text-nowrap w-100 table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th>No.</th>
                                    <th>Brand</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>CC</th>
                                    <th>Fuel Type</th>
                                    <th>Total Seat</th>
                                    <th>Transmission Type</th>
                                    <th>Year</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                    <th>Updated By</th>
                                    <th>Updated Date</th>
                                    <th class="action-column">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </x-slot:tabMasterDataRender>
            <x-slot:tabMasterFormRender>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4">
                        <div class="form-group">
                            <label for="ddBrand" class="form-label">Brand <span class="text-danger">*</span></label>
                            <select class="form-control dropdown-field" id="ddBrand"></select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4">
                        <div class="form-group">
                            <label for="txtName" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-field" id="txtName" placeholder="Enter Name" autocomplete="off" maxlength="50" />
                            <span class="badge bg-primary float-end mt-2 counter-char">0/50</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4">
                        <div class="form-group">
                            <label for="txtDescription" class="form-label">Description <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-field" id="txtDescription" placeholder="Enter Description" autocomplete="off" maxlength="100" />
                            <span class="badge bg-primary float-end mt-2 counter-char">0/100</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4">
                        <div class="form-group">
                            <label for="txtCC" class="form-label">CC <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-field number-field" id="txtCC" placeholder="Enter CC" autocomplete="off" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4">
                        <div class="form-group">
                            <label for="ddFuelType" class="form-label">Fuel Type <span class="text-danger">*</span></label>
                            <select class="form-control dropdown-field" id="ddFuelType">
                                <option value="" selected disabled>Select an Option</option>
                                <option value="Bensin">Bensin</option>
                                <option value="Solar">Solar</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4">
                        <div class="form-group">
                            <label for="ddSeat" class="form-label">Seat <span class="text-danger">*</span></label>
                            <select class="form-control dropdown-field" id="ddSeat">
                                <option value="" selected disabled>Select an Option</option>
                                <option value="2">2 Seat</option>
                                <option value="4">4 Seat</option>
                                <option value="6">6 Seat</option>
                                <option value="8">8 Seat</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4">
                        <div class="form-group">
                            <label for="ddTransmissionType" class="form-label">Transmission Type <span class="text-danger">*</span></label>
                            <select class="form-control dropdown-field" id="ddTransmissionType">
                                <option value="" selected disabled>Select an Option</option>
                                <option value="Manual">Manual</option>
                                <option value="Matic">Matic</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4">
                        <div class="form-group">
                            <label for="txtPrice" class="form-label">Price <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-field price-field margin-price-set-up" id="txtPrice" placeholder="Enter Price" autocomplete="off" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4">
                        <div class="form-group">
                            <label for="txtYear" class="form-label">Year <span class="text-danger">*</span></label>
                            <input type="number" class="form-control text-field" id="txtYear" placeholder="Enter Year" autocomplete="off" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="fileUploadImageItem" class="form-label">Photo</label>
                            <div class="text-center">                                
                                <input type="file" class="multiple-filepond" name="filepond" id="fileUploadImageItem" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="6" accept="image/png, image/jpeg, image/gif">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-3">
                        <button type="button" class="btn btn-primary btn-wave waves-effect waves-light float-end form-action-button" id="btnSubmit"><i class="fa-solid fa-floppy-disk me-1"></i> Submit</button>
                        <button type="button" class="btn btn-danger-light btn-wave waves-effect waves-light float-end me-2 form-action-button" id="btnCancel"><i class="fa-solid fa-xmark me-1"></i> Cancel</button>
                    </div>
                </div>
            </x-slot:tabMasterFormRender>
        </x-masters.layout-tab-master>
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
        @vite(['resources/js/pages/masters/item.js'])
    </x-slot>
</x-layout-base>
