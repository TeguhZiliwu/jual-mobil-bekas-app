<x-layout-base>

    <x-slot:titlePage>Unit of Measurement</x-slot:titlePage>
    <x-slot:headerFiles>
        <link href="{{ asset('assets/libs/dataTable/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/libs/dataTable/buttons.bootstrap5.min.css') }}" rel="stylesheet" />
    </x-slot:headerFiles>

    <x-slot:renderContent>
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div class="my-auto">
                <h5 class="page-title fs-21 mb-1">Unit of Measurement Master</h5>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Unit of Measurement</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-primary btn-wave waves-effect waves-light float-end mb-3" id="btnExportData">
                    <i class="fa-solid fa-download me-1"></i> Export Data
                </button>
                <button type="button" class="btn btn-primary btn-wave waves-effect waves-light float-end mb-3 me-2 button-action" id="btnImportData">
                    <i class="fa-solid fa-upload me-1"></i> Import Data
                </button>
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
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Remark</th>
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
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="txtName" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-field" id="txtName" placeholder="Enter Name" autocomplete="off" maxlength="50" />
                            <span class="badge bg-primary float-end mt-2 counter-char">0/50</span>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="txtDescription" class="form-label">Description <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-field" id="txtDescription" placeholder="Enter Description" autocomplete="off" maxlength="100" />
                            <span class="badge bg-primary float-end mt-2 counter-char">0/100</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="txtRemark" class="form-label">Remark</label>
                            <textarea class="form-control text-field" id="txtRemark" rows="4" placeholder="Enter Remark" autocomplete="off" maxlength="500"></textarea>
                            <span class="badge bg-primary float-end mt-2 counter-char">0/500</span>
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
        @vite(['resources/js/pages/masters/unit-of-measurement.js'])
    </x-slot>
</x-layout-base>
