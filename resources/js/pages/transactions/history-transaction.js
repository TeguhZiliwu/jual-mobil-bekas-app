import { initInputMask, validateForm, showAlert, showConfirmBox, showError, generateDataTable, generateDropdownOption, showLoading, hideLoading, callAPI, formatToRupiah } from "../../global/common";

const validation = [null, "", NaN, undefined];

let modalRating = new bootstrap.Modal('#modalRating', {
    backdrop: 'static'
});

const ratingReviewService = raterJs({
    starSize: 24,
    max: 5,
    rating: 0,
    element: document.querySelector("#ratingReviewService"),
    // disableText: "Custom disable text!",
    ratingText: "Star {rating}",
    showToolTip: true,
    rateCallback: function rateCallback(rating, done) {
        ratingReviewService.setRating(rating);
        done();
    }
});

const ratingReviewQuality = raterJs({
    starSize: 24,
    max: 5,
    rating: 0,
    element: document.querySelector("#ratingReviewQuality"),
    // disableText: "Custom disable text!",
    ratingText: "Star {rating}",
    showToolTip: true,
    rateCallback: function rateCallback(rating, done) {
        ratingReviewQuality.setRating(rating);
        done();
    }
});

const ratingReviewWebExperience = raterJs({
    starSize: 24,
    max: 5,
    rating: 0,
    element: document.querySelector("#ratingReviewWebExperience"),
    // disableText: "Custom disable text!",
    ratingText: "Star {rating}",
    showToolTip: true,
    rateCallback: function rateCallback(rating, done) {
        ratingReviewWebExperience.setRating(rating);
        done();
    }
});

const clearForm = () => {
    try {
        $(`.form-group input:not([type="radio"]), .form-group textarea`).val("").removeClass("is-invalid").trigger("keyup");
        $(`.form-group input[type="radio"]`).prop("checked", false).removeClass("is-invalid-radio");
        selectedId = "";
        isEdit = false;
    } catch (error) {
        showError(error);
    }
};

const generateInputMask = () => {
    try {
        initInputMask($("#txtPhoneNumber"), {
            mask: "9999-9999-9999[9]",
        });
    } catch (error) {
        showError(error);
    }
};

const generateSelect2 = () => {
    $('.dropdown-field, .dropdown-field.filter-field').select2({
        theme: "bootstrap-5",
        placeholder: 'All',
        allowClear: true,
        dropdownParent: $('#modalRating')
    });
};

const getBrand = async () => {
    try {
        const url = "/api/brand/list";
        const target = $("#ddBrand");

        await generateDropdownOption(url, null, target);

    } catch (e) {
        showError(e);
    }
};

const getPhoto = async (id) => {
    let result = [];
    try {
        const url = "/api/item/photo";

        const param = {
            id
        };

        const response = await callAPI(url, "GET", param);
        const { data, success, message, message_type, validation_message } = await response;

        if (success) {
            result = data;
        } else {
            if (validation_message) {
                let finalMessage = "";
                let numberValidation = 1;
                for (let key in validation_message) {
                    if (validation_message.hasOwnProperty(key)) {
                        finalMessage += `${numberValidation}. ${validation_message[key]} <br />`;
                        numberValidation++;
                    }
                }
                showAlert(message_type, finalMessage);
            } else {
                showAlert(message_type, message);
            }
        }

    } catch (e) {
        showError(e);
    } finally {
        return result;
    }
};

const loadData = async () => {
    try {
        const url = "/api/history";

        showLoading();
        const response = await callAPI(url, "GET", null);

        $("#cartSection .cart-list").remove();
        const { data, success, message, message_type, validation_message } = await response;

        if (success) {
            if (data.length > 0) {
                for (let i = 0; i < data.length; i++) {
                    const { id, item_id, transacton_id, status, item_name, price, description, fuel_type, total_seat } = data[i];
                    const photo = await getPhoto(item_id);
                    let photoSlide = `<div class="carousel-item active">
                                          <img src="../assets/images/errors/no-image.png" class="d-block w-100" alt="..." loading="lazy">
                                      </div>`;
                    let photoIndicator = `<button type="button" data-bs-target="#carouselCarForSale_${id}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>`;
                    let buttonAction = `<div class="d-grid gap-2 mb-4">
                                            <button class="btn btn-success-light btn-wave waves-effect waves-light action-review" item-id="${item_id}" price="${price}" item-name="${item_name}"><i class="fa-solid fa-comments"></i> Review</button>
                                        </div>`;

                    if (photo.length > 0) {
                        photoSlide = "";
                        photoIndicator = "";
                        for (let i = 0; i < photo.length; i++) {
                            const { name } = photo[i];
                            photoSlide += ` <div class="carousel-item ${i === 0 ? "active" : ""}">
                                                <img src="../assets/images/items/${name}" class="d-block w-100" alt="${name}" loading="lazy">
                                            </div>`;

                            photoIndicator += `<button type="button" data-bs-target="#carouselCarForSale_${id}" data-bs-slide-to="${i}" class="${i === 0 ? "active" : ""}" aria-label="Slide ${i}"></button>`;
                        }
                    }

                    let statuColor = "bg-success";

                    if (status == "AWAITING PAYMENT") {
                        statuColor = "bg-warning";
                    } else if (status == "OPEN") {
                        statuColor = "bg-success";
                    } else if (status == "PROCESSING") {
                        statuColor = "bg-warning";
                    } else if (status == "CANCELLED" || status == "REJECTED") {
                        statuColor = "bg-danger";
                    }

                    const card = `
                                <div class="col-xl-12 col-lg-12 col-md-12 cart-list">
                                    <div class="card custom-card">
                                        <div class="card-header justify-content-between">
                                            <div class="card-title"><span class="badge ${statuColor} ms-auto fs-12">${status}</span> ${item_name}</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-3">
                                                    <div id="carouselCart_${id}" class="carousel slide mb-3" data-bs-ride="carousel">
                                                        <div class="carousel-indicators">
                                                            ${photoIndicator}
                                                        </div>
                                                        <div class="carousel-inner">
                                                            ${photoSlide}
                                                        </div>
                                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCart_${id}" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselCart_${id}" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xl-9">
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="d-flex justify-content-between mb-3">
                                                                <h4 class="fs-15 text-uppercase mb-0">Description</h4>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6">
                                                                    <div class="d-block">
                                                                        <p class="fs-15 text-muted">${description}</p>
                                                                    </div>
                                                                    <div class="d-flex flex-row mb-3">
                                                                        <p class="fs-15"><i class="fa-solid fa-gas-pump"></i> ${fuel_type}</p>
                                                                        <span class="ms-3 me-3">|</span>
                                                                        <p class="fs-15"><i class="fa-solid fa-person-seat-reclined"></i> ${total_seat} Seats</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="d-xl-flex d-md-flex d-sm-block justify-content-xl-end justify-content-md-end mb-3">
                                                                <div>
                                                                    <h4 class="h5 mb-3 text-center fw-bold text-danger">${formatToRupiah(price, 0)}</h4>
                                                                    ${buttonAction}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>`;

                    $("#cartSection").append(card);

                }
                $('.carousel').carousel({
                    interval: 3000
                });
                $(`a[action="addcart"]`).on("click", async function () {
                    const id = $(this).attr("item-id");
                    await addToCart(id);
                });

                $("button.action-upload-receipt").on("click", async function () {
                    const item_id = $(this).attr("item-id");
                    const transacton_id = $(this).attr("transacton-id");
                    const price = $(this).attr("price");
                    const item_name = $(this).attr("item-name");
                    const data = {
                        item_id,
                        transacton_id,
                        item_name,
                        price
                    };
                    setUploadReceipt(data);
                });

                $("button.action-review").on("click", async function () {
                    const item_id = $(this).attr("item-id");
                    const price = $(this).attr("price");
                    const item_name = $(this).attr("item-name");
                    const data = {
                        item_id,
                        item_name,
                        price
                    };
                    modalRating.show();
                    $("#lblItemName").text(item_name);
                    $("#btnPostReview").attr("item-id", item_id);
                });
            } else {
                let card = `<div class="card mb-4 text-center cart-list">
                                    <div class="card-body h-100"> 
                                        <img src="../assets/images/errors/no-data.svg" alt="not found" class="no-found-car">
                                        <h5 class="mt-3 tx-18">Cart is Empty</h5> 
                                    </div>
                                </div>`;

                $("#cartSection").append(card);
            }
        } else {
            if (validation_message) {
                let finalMessage = "";
                let numberValidation = 1;
                for (let key in validation_message) {
                    if (validation_message.hasOwnProperty(key)) {
                        finalMessage += `${numberValidation}. ${validation_message[key]} <br />`;
                        numberValidation++;
                    }
                }
                showAlert(message_type, finalMessage);
            } else {
                showAlert(message_type, message);
            }
        }
    } catch (e) {
        showError(e);
    } finally {
        window.setTimeout(function () {
            hideLoading();
        }, 300);
    }
};

const setUploadReceipt = (data) => {
    try {
        const { item_id, item_name, transacton_id, price } = data;
        $("#btnUploadReceipt").attr("item-id", item_id).attr("transacton-id", transacton_id);
    } catch (e) {
        showError(e);
    } finally {
        window.setTimeout(function () {
            // hideLoading();
        }, 300);
    }
};

const postReview = async () => {
    try {
        const url = "/api/history/post-review";

        const item_id = $("#btnPostReview").attr("item-id");
        const rating_service = ratingReviewService.getRating();
        const rating_quality = ratingReviewQuality.getRating();
        const rating_website_experience = ratingReviewWebExperience.getRating();
        const comment = $(`#txtComment`).val();

        const param = {
            item_id,
            rating_service,
            rating_quality,
            rating_website_experience,
            comment
        };

        showLoading();

        const response = await callAPI(url, "POST", param);
        const { data, success, message, message_type, validation_message } = await response;

        if (success) {
            showAlert("success", message, 15000);
            await loadData();
            modalRating.hide();
        }
        else {
            if (validation_message) {
                let finalMessage = "";
                let numberValidation = 1;
                for (let key in validation_message) {
                    if (validation_message.hasOwnProperty(key)) {
                        finalMessage += `${numberValidation}. ${validation_message[key]} <br />`;
                        numberValidation++;
                    }
                }
                showAlert(message_type, finalMessage);
            } else {
                showAlert(message_type, message);
            }
        }
    } catch (error) {
        showError(error);
    } finally {
        window.setTimeout(function () {
            hideLoading();
        }, 300);
    }
};

const addToCart = async (item_id) => {
    try {
        const url = "/api/item/add-to-cart";

        const param = {
            item_id
        };

        const response = await callAPI(url, "POST", param);
        const { data, success, message, message_type, validation_message } = await response;

        if (success) {
            showAlert("success", message, 15000);
        }
        else {
            if (validation_message) {
                let finalMessage = "";
                let numberValidation = 1;
                for (let key in validation_message) {
                    if (validation_message.hasOwnProperty(key)) {
                        finalMessage += `${numberValidation}. ${validation_message[key]} <br />`;
                        numberValidation++;
                    }
                }
                showAlert(message_type, finalMessage);
            } else {
                showAlert(message_type, message);
            }
        }
    } catch (e) {
        showError(e);
    } finally {

    }
};

const uploadPayment = async () => {
    try {
        const url = "/api/cart/upload";

        const item_id = $("#btnUploadReceipt").attr("item-id");
        const transaction_id = $("#btnUploadReceipt").attr("transacton-id");
        const formData = new FormData();

        formData.append("item_id", item_id);
        formData.append("transaction_id", transaction_id);

        const finalReceipt = uploadReceipt.getFiles()[0].file;
        formData.append("receipt_of_payment", finalReceipt);

        showLoading();

        const response = await callAPI(url, "POST", formData, true);
        const { data, success, message, message_type, validation_message } = await response;

        if (success) {
            showAlert("success", message, 15000);      
            await loadData();      
        }
        else {
            if (validation_message) {
                let finalMessage = "";
                let numberValidation = 1;
                for (let key in validation_message) {
                    if (validation_message.hasOwnProperty(key)) {
                        finalMessage += `${numberValidation}. ${validation_message[key]} <br />`;
                        numberValidation++;
                    }
                }
                showAlert(message_type, finalMessage);
            } else {
                showAlert(message_type, message);
            }
        }
    } catch (error) {
        showError(error);
    } finally {
        window.setTimeout(function () {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            hideLoading();
        }, 300);
    }
};

// event start

$("#btnSearch").on("click", async function () {
    await loadData();
});

$("#btnPostReview").on("click", async function () {
    await postReview();
});

$("#btnUploadReceipt").on("click", async function () {
    let valid = true;

    if (uploadReceipt.getFiles().length <= 0) {
        showAlert("warning", "Please upload your Payment Receipt!", 15000);
        valid = false;
    }

    if (valid) {
        await uploadPayment();
    }
});

$("#txtKeyword").on("keypress", async function (e) {
    if (e.which == 13) {
        await loadData();
    }
});

$(`input[name="paymentType"]`).on("change", async function (e) {
    const value = $(this).val();
    $("p.label-payment-type").each(function () {
        const hasNone = $(this).hasClass("d-none");
        if (!hasNone) {
            $(this).addClass("d-none");
        }
    });
    if (value == "Cash") {
        $("#labelCash").removeClass("d-none");
    } else if (value == "Transfer") {
        $("#labelTransfer").removeClass("d-none");
    }
});

document.getElementById('modalRating').addEventListener('hidden.bs.modal', event => {
    $("#btnPostReview").attr("item-id", "");
    $("#lblItemName").text("");
    ratingReviewService.clear();
    ratingReviewQuality.clear();
    ratingReviewWebExperience.clear();
    $(`#txtComment`).val("");
});

// event end

//initial load
$(document).ready(async function () {
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginImageExifOrientation,
        FilePondPluginFileValidateSize,
        FilePondPluginFileEncode,
        FilePondPluginImageEdit,
        FilePondPluginFileValidateType,
        FilePondPluginImageCrop,
        FilePondPluginImageResize,
        FilePondPluginImageTransform
    );

    generateSelect2();
    await loadData();
});
//end initial load