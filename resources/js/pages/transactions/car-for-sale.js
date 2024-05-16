import { initInputMask, validateForm, showAlert, showConfirmBox, showError, generateDataTable, generateDropdownOption, showLoading, hideLoading, callAPI, formatToRupiah } from "../../global/common";

const validation = [null, "", NaN, undefined];

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
        allowClear: true
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
        const { data, success, message, message_type } = await response;

        if (success) {
            result = data;
        } else {
            showAlert(message_type, message, 15000);
        }

    } catch (e) {
        showError(e);
    } finally {
        return result;
    }
};

const loadData = async () => {
    try {
        const url = "/api/item/car-for-sale";

        const brand_id = validation.includes($("#ddBrand").val()) ? "" : $("#ddBrand").val();
        const fuel_type = validation.includes($("#ddFuelType").val()) ? "" : $("#ddFuelType").val();
        const seat_type = validation.includes($("#ddSeat").val()) ? "" : $("#ddSeat").val();
        const keyword = $("#txtKeyword").val();

        const param = {
            brand_id,
            fuel_type,
            seat_type,
            keyword
        };

        showLoading();
        const response = await callAPI(url, "GET", param);

        $("#carList .car-card-section").remove();
        const { data, success, message, message_type } = await response;

        if (success) {
            if (data.length > 0) {
                for (let i = 0; i < data.length; i++) {
                    const { id, status, name, price, description, fuel_type, total_seat } = data[i];
                    const photo = await getPhoto(id);
                    let photoSlide = `<div class="carousel-item active">
                                          <img src="../assets/images/errors/no-image.png" class="d-block w-100" alt="...">
                                      </div>`;
                    let photoIndicator = `<button type="button" data-bs-target="#carouselCarForSale_${id}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>`;

                    if (photo.length > 0) {
                        photoSlide = "";
                        photoIndicator = "";
                        for (let i = 0; i < photo.length; i++) {
                            const { name } = photo[i];
                            photoSlide += ` <div class="carousel-item ${i === 0 ? "active" : ""}">
                                                <img src="../assets/images/items/${name}" class="d-block w-100" alt="${name}">
                                            </div>`;

                            photoIndicator += `<button type="button" data-bs-target="#carouselCarForSale_${id}" data-bs-slide-to="${i}" class="${i === 0 ? "active" : ""}" aria-label="Slide ${i}"></button>`;
                        }
                    }

                    const card = `<div class="col-md-6 col-lg-6 col-xl-4 col-sm-6 car-card-section">
                                    <div class="card">
                                        <div class="card-body h-100">
                                            <div class="pro-img-box">
                                                <div class="product-sale">
                                                    <span class="badge bg-success fs-12">${status}</span>
                                                </div>
                                                <div id="carouselCarForSale_${id}" class="carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-indicators">
                                                        ${photoIndicator}
                                                    </div>
                                                    <div class="carousel-inner">
                                                        ${photoSlide}
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselCarForSale_${id}" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselCarForSale_${id}" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                                <a href="javascript:void(0)" class="adtocart" action="addcart">
                                                    <i class="las la-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="text-center pt-3">
                                                <h3 class="h6 mb-2 mt-4 fw-bold text-uppercase">${name}</h3>
                                                <h3 class="h6 mb-2 fw-normal fs-13 text-base">${description}</h3>
                                                <div class="d-flex justify-content-between">
                                                    <span><i class="fa-solid fa-gas-pump"></i> ${fuel_type}</span>
                                                    <span><i class="fa-solid fa-person-seat-reclined"></i> ${total_seat} Seats</span>
                                                </div>
                                                <h4 class="h5 mb-0 mt-2 text-center fw-bold text-danger">
                                                    ${formatToRupiah(price, 0)}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

                    $("#carList").append(card);

                }
                $('.carousel').carousel({
                    interval: 3000
                });
                $(`a[action="addcart"]`).on("click", async function () {
                    alert("masukin cart")
                });
            } else {
                let card = `<div class="card mb-4 text-center">
                                    <div class="card-body h-100"> 
                                        <img src="../assets/images/errors/no-data.svg" alt="not found" class="no-found-car">
                                        <h5 class="mt-3 tx-18">Items Not Found</h5> 
                                        <a href="javascript:void(0);" class="text-muted">Check the filter!</a>
                                    </div>
                                </div>`;

                $("#carList").append(card);
            }
        } else {
            showAlert(message_type, message, 15000);
        }
    } catch (e) {
        showError(e);
    } finally {
        window.setTimeout(function () {
            hideLoading();
        }, 300);
    }
};

const submit = async () => {
    try {
        const url = isEdit ? "/api/brand/update" : "/api/brand/create";

        const name = $("#txtName").val();
        const description = $("#txtDescription").val();
        const remark = $("#txtRemark").val();

        const param = {
            id: selectedId,
            name,
            description
        };

        showLoading();

        const response = await callAPI(url, "POST", param);
        const { success, message, message_type } = await response;

        if (success) {
            showAlert("success", message, 15000);
            await loadData();
            clearForm();
            disableForm(true);
            dataTab.show();
        }
        else {
            showAlert(message_type, message);
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

$("#btnSubmit").on("click", async function () {
    try {
        const name = $("#txtName");
        const description = $("#txtDescription");

        let field = {
            name,
            description
        };

        if (validateForm(field)) {
            await submit();
        }

    } catch (error) {
        showError(error);
    }
});

$("#btnSearch").on("click", async function () {
    await loadData();
});

$("#txtKeyword").on("keypress", async function (e) {
    if (e.which == 13) {
        await loadData();
    }
});

// event end

//initial load
$(document).ready(async function () {
    generateSelect2();
    await getBrand();
    await loadData();
});
//end initial load