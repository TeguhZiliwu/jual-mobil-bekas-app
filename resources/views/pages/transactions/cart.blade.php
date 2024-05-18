<x-layout-base>

    <x-slot:titlePage>Cart</x-slot:titlePage>
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
                <h5 class="page-title fs-21 mb-1">Cart</h5>
            </div>
        </div>
        <div class="row" id="cartSection">
            
        </div>
    
        <div class="modal fade" id="modalPayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title"><i class="fa-solid fa-money-bill-1-wave"></i> Payment</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 col-12">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="price fs-14 mb-0"><span>Cars :</span>
                                                <pre><span class="h4 d-inline-block text-transform-none" id="lblItemName">Car Name</span></pre>
                                            </h6>`
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Payment Type <span class="text-danger">*</span></label>                                            
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="paymentType" id="rbCash" value="Cash">
                                                <label class="form-check-label" for="rbCash">
                                                    Cash
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="paymentType" id="rbTransfer" value="Transfer">
                                                <label class="form-check-label" for="rbTransfer">
                                                    Transfer
                                                </label>
                                            </div>
                                        </div>
                                        <p class="d-none label-payment-type" id="labelTransfer">Transfer to BCA Bank<br>
                                            Account Number: 324 445-4544<br>
                                        </p>
                                        <p class="d-none label-payment-type" id="labelCash">Please contact admin to this WhatsApp Number<br>
                                            WhatsApp: 0813003200<br>
                                        </p>
                                    </div>
                                </div>
                                <hr />
                                <div class="row d-flex flex-row-reverse">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                        <h6 class="price fs-14 mb-0 float-end"><span>Total :</span>
                                            <pre><span class="h4 d-inline-block text-transform-none" id="lblTotalPrice">Rp 178.000.000</span></pre>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="btnConfirmBuy" item-id="">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalUploadReceipt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title"><i class="fa-solid fa-receipt"></i> Upload Receipt</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <label for="fileUploadImageItem" class="form-label">Photo</label>
                                    <div class="text-center">                                
                                        <input type="file" class="multiple-filepond" name="filepond" id="fileUploadImageItem" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="btnUploadReceipt" item-id="" transaction-id="">Confirm</button>
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
        @vite(['resources/js/pages/transactions/cart.js'])
    </x-slot>
</x-layout-base>
