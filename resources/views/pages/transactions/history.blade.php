<x-layout-base>

    <x-slot:titlePage>History Transaction</x-slot:titlePage>
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
                <h5 class="page-title fs-21 mb-1">History Transaction</h5>
            </div>
        </div>
        <div class="row" id="cartSection">
            
        </div>
    
        <div class="modal fade" id="modalRating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title"><i class="fa-solid fa-comments"></i> Review</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 col-12">
                                <h5 class="product-title mb-1" id="lblItemName">RED TSHIRT</h5>
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <p class="fs-14 mb-0">Rating Service :</p>
                                    <div id="ratingReviewService"></div>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <p class="fs-14 mb-0">Rating Quality :</p>
                                    <div id="ratingReviewQuality"></div>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <p class="fs-14 mb-0">Rating Web Experience :</p>
                                    <div id="ratingReviewWebExperience"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <textarea class="form-control text-field" id="txtComment" rows="4" placeholder="Enter Comment" autocomplete="off" maxlength="500"></textarea>
                                    <span class="badge bg-primary float-end mt-2 counter-char">0/500</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnPostReview" item-id="" transaction-id="">Add Review</button>
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
        <script src="{{ asset('assets/libs/rater-js/index.js') }}"></script>
        @vite(['resources/js/pages/transactions/history-transaction.js'])
    </x-slot>
</x-layout-base>
