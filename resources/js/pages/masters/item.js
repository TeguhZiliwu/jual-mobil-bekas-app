import { initInputMask, validateForm, showAlert, showConfirmBox, showError, generateDataTable, generateDropdownOption, showLoading, hideLoading, callAPI, formatToRupiah, formatNumber } from "../../global/common";

const dataTab = new bootstrap.Tab($('[data-bs-target="#nav-data"]'));
const formTab = new bootstrap.Tab($('[data-bs-target="#nav-form"]'));
let imageFile;
let mainTable;
let isEdit = false;
let selectedId = "";

const disableForm = (isDisable) => {
    try {
        $(`.form-group input.text-field:not(.default-disable), .form-group textarea.text-field, .form-group input.number-field, .form-group input.radio-field, .form-group select.dropdown-field, .form-action-button`).prop("disabled", isDisable);
        $(`.form-group select.dropdown-field`).val("").trigger("change").removeClass("is-invalid");
        $(`button.button-action`).prop("disabled", !isDisable);
        $(`.form-group input.text-field.conditional-disable`).prop("disabled", true);
        imageFile.disabled = isDisable;
        mainTable.column(-1).nodes().to$().each(function (index) {
            $(this).find(`button[action="edit"]`).prop("disabled", !isDisable);
            $(this).find(`button[action="delete"]`).prop("disabled", !isDisable);
        });
        $(`#ddDiscountType`).val("").trigger("change");
    } catch (error) {
        showError(error);
    }
};

const clearForm = () => {
    try {
        $(`.form-group input:not([type="radio"]), .form-group textarea`).val("").removeClass("is-invalid").trigger("keyup");
        $(`.form-group input[type="radio"]`).prop("checked", false).removeClass("is-invalid-radio");
        $(`.form-control.text-field.price-field, .form-control.text-field.number-field`).val("");
        $(`#ddDiscountType`).val("").trigger("change");
        selectedId = "";
        imageFile.removeFiles();
        isEdit = false;
    } catch (error) {
        showError(error);
    }
};

const generateInputMask = () => {
    try {
        initInputMask($(".price-field"), {
            alias: 'numeric',
            groupSeparator: '.',
            autoGroup: true,
            digits: 0,
            radixPoint: ',',
            prefix: 'Rp ',
            positionCaretOnClick: "none"
        });

        initInputMask($(".number-field"), {
            alias: 'decimal',
            groupSeparator: '.',
            autoGroup: true,
            digits: 3,
            radixPoint: ',',
            positionCaretOnClick: "none"
        });
    } catch (error) {
        showError(error);
    }
};

const generateInputMaskForDiscount = () => {
    try {
        const discountType = $("#ddDiscountType").val();
        const optionFixed = {
            alias: 'numeric',
            groupSeparator: '.',
            autoGroup: true,
            digits: 0,
            radixPoint: ',',
            prefix: 'Rp ',
            positionCaretOnClick: "none"
        };

        const optionPercentage = {
            alias: 'decimal',
            groupSeparator: '.',
            autoGroup: true,
            max: 100,
            digits: 3,
            radixPoint: ',',
            suffix: ' %',
            positionCaretOnClick: "none"
        };

        let option = optionFixed;

        if (discountType === "Percentage") {
            option = optionPercentage;
        }

        initInputMask($("#txtDiscount"), option);
    } catch (error) {
        showError(error);
    }
};

const generateSelect2 = () => {
    $('.dropdown-field, .dropdown-field.filter-field').select2({
        theme: "bootstrap-5",
        placeholder: 'Select an Option'
    });
};

const generateMainTable = () => {
    try {
        const extOption = {
            drawCallback: function () {
                const isDisable = $("#btnSubmit").prop("disabled");
                $("button.table-edit, button.table-delete").prop("disabled", !isDisable);
                JsBarcode(".barcode").init();
            },
            columnDefs: [{
                targets: [-1, 10, 11],
                orderable: false
            }],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            },
            pageLength: 10,
        };

        const param = {
            id: "mainTable",
            columns: [
                {
                    data: "",
                    render: function (data, type, row, meta) {
                        return `${meta.row + meta.settings._iDisplayStart + 1}.`;
                    },
                    className: "col-no-table"
                },
                { data: "brand_name" },
                { data: "name" },
                { data: "description" },
                {
                    data: "cc",
                    render: function (data, type, row, meta) {
                        const finalResult = formatNumber(data, 2);
                        return `${finalResult}`;
                    },
                },
                { data: "fuel_type" },
                { data: "total_seat" },
                {
                    data: "status",
                    render: function (data, type, row, meta) {
                        return `<span class="badge bg-success fs-12">${data}</span>`;
                    },
                    className: "text-center action-column",
                },
                {
                    data: "price",
                    render: function (data, type, row, meta) {
                        const finalResult = formatToRupiah(data, 0);
                        return `${finalResult}`;
                    },
                },
                { data: "created_by_name" },
                {
                    data: "created_at",
                    render: function (data, type, row, meta) {
                        if (data == null || data == "") {
                            return "";
                        }
                        return moment(data).format('YYYY-MM-DD HH:mm:ss');
                    }
                },
                { data: "updated_by_name" },
                {
                    data: "updated_at",
                    render: function (data, type, row, meta) {
                        if (data == null || data == "") {
                            return "";
                        }
                        return moment(data).format('YYYY-MM-DD HH:mm:ss');
                    }
                },
                {
                    data: "",
                    render: function (data, type, row, meta) {
                        const buttonAction = `<button class="btn btn-primary me-2 table-edit" action="edit"><i class="far fa-edit"></i> Edit</button><button class="btn btn-danger table-delete" action="delete"><i class="far fa-trash"></i> Delete</button>`;
                        return buttonAction;
                    },
                    className: "text-center action-column",
                },
            ],
            extOption
        };

        mainTable = generateDataTable(param);
    } catch (error) {
        showError(error);
    }
};

const getBrand = async () => {
    try {
        try {
            const url = "/api/brand/list";
            const target = $("#ddBrand");

            await generateDropdownOption(url, null, target);
        } catch (e) {
            showError(e);
        }

    } catch (e) {
        showError(e);
    }
};

const getUOM = async () => {
    try {
        try {
            const url = "/api/unit-of-measurement/list";
            const target = $("#ddUOM");

            await generateDropdownOption(url, null, target);
        } catch (e) {
            showError(e);
        }

    } catch (e) {
        showError(e);
    }
};

const loadData = async () => {
    try {
        const url = "/api/item";

        const keyword = $("#txtKeyword").val();
        // const education = $("#ddFilterEducation").val();
        // const batch = $("#ddFilterBatch").val();
        // const startDate = $("#txtFilterStartDate").val();
        // const endDate = $("#txtFilterEndDate").val();

        const param = {
            keyword
        };

        showLoading();
        const response = await callAPI(url, "GET", param);
        mainTable.clear().draw();

        const { data, success, message, message_type } = await response;

        if (success) {
            mainTable.rows.add(data).draw();
        } else {
            showAlert(message_type, message, 15000);
        }
    } catch (e) {
        showError(e);
    } finally {
        window.setTimeout(function () {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            hideLoading();
        }, 300);
    }
};

const submit = async () => {
    try {
        const url = isEdit ? "/api/item/update" : "/api/item/create";

        const validation = [null, "", NaN, undefined];
        const name = $("#txtName").val();
        const description = $("#txtDescription").val();
        const brand_id = $("#ddBrand").val();
        const cc = $("#txtCC").inputmask('unmaskedvalue');
        const fuel_type = $("#ddFuelType").val();
        const total_seat = $("#ddSeat").val();
        const price = $("#txtPrice").inputmask('unmaskedvalue');
        const formData = new FormData();

        formData.append("id", selectedId);
        formData.append("name", name);
        formData.append("description", description);
        formData.append("brand_id", parseInt(brand_id));
        formData.append("cc", validation.includes(parseFloat(cc.replace(',', '.'))) ? 0 : parseFloat(cc.replace(',', '.')));
        formData.append("fuel_type", fuel_type);
        formData.append("total_seat", total_seat);
        formData.append("price", validation.includes(parseFloat(price.replace(',', '.'))) ? 0 : parseFloat(price.replace(',', '.')));

        if (imageFile.getFiles().length > 0) {
            const finalPhoto = imageFile.getFiles()[0].file;
            formData.append("photo", finalPhoto);
        }

        showLoading();

        const response = await callAPI(url, "POST", formData, true);
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

const deleteData = async (id) => {
    try {
        const url = `/api/item/delete`;

        const param = {
            id
        };

        showLoading();
        const response = await callAPI(url, "DELETE", param);

        const { success, message, message_type } = await response;

        if (success) {
            showAlert("success", message);
            await loadData();
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
        const brand = $("#ddBrand");
        const cc = $("#txtCC");
        const fuelType = $("#ddFuelType");
        const seat = $("#ddSeat");
        const price = $("#txtPrice");

        let field = {
            brand,
            name,
            description,
            cc,
            fuelType,
            seat,
            price

        };

        if (validateForm(field)) {
            await submit();
        }

    } catch (error) {
        showError(error);
    }
});

$("#btnAddData").on("click", function () {
    formTab.show();
    disableForm(false);
});

$("#btnCancel").on("click", function () {
    dataTab.show();
    disableForm(true);
    clearForm();
});

$("#btnCancel").on("click", function () {
    dataTab.show();
    disableForm(true);
    clearForm();
});

$("#mainTable").on("click", `button[action="edit"]`, function () {
    const row = $(this).parents("tr");
    const data = mainTable.row(row).data();
    const validation = [null, "", NaN, undefined];
    isEdit = true;
    const { id, name, brand_id, description, fuel_type, total_seat, price, cc } = data;
    formTab.show();

    disableForm(false);
    $("#ddBrand").val(brand_id).trigger("change");
    $("#txtName").val(name).trigger("keyup");
    $("#txtDescription").val(description).trigger("keyup");
    $("#ddFuelType").val(fuel_type).trigger("change");
    $("#ddSeat").val(total_seat).trigger("change");
    $("#txtPrice").val(price.toString().replace('.', ',')).trigger("keyup").trigger("input");
    $("#txtCC").val(cc.toString().replace('.', ',')).trigger("keyup").trigger("input");

    // if (!validation.includes(photo)) {
    //     imageFile.addFile(`../assets/images/items/${photo}`);
    // }
    selectedId = id;
});

$("#mainTable").on("click", `button[action="delete"]`, function () {
    const row = $(this).parents("tr");
    const data = mainTable.row(row).data();
    const { id } = data;
    const confirmBox = showConfirmBox();

    confirmBox.fire({
        title: "Delete Data",
        text: "Are you sure want to delete this data?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: `<i class="fa-regular fa-trash"></i> Delete`,
        cancelButtonText: `<i class="fa-regular fa-xmark"></i> Cancel`,
        allowOutsideClick: false,
    }).then(async (result) => {
        const { isConfirmed } = result;

        if (isConfirmed) {
            await deleteData(id);
        }
    });
});

$("#btnSearch").on("click", async function () {
    await loadData();
});

$("#txtKeyword").on("keypress", async function (e) {
    if (e.which == 13) {
        await loadData();
    }
});

$(".margin-price-set-up").on("input", function () {
    const validation = [null, "", NaN, undefined];
    const capitalPrice = $("#txtCapitalPrice").inputmask('unmaskedvalue');
    const price = $("#txtPrice").inputmask('unmaskedvalue');
    const margin = (validation.includes(price) ? 0 : price) - (validation.includes(capitalPrice) ? 0 : capitalPrice);
    $("#txtMarginPrice").val(margin);

    if ($(this).inputmask('unmaskedvalue') === "") {
        $(this).val("0");
    }
});

$("#ddDiscountType").on("change", function () {
    const value = $(this).val();
    const asterixMandatory = `<span class="text-danger">*</span>`;
    let label = `Discount`;
    let isDisabled = true;

    if (value !== "None") {
        label += ` ${asterixMandatory}`;
        isDisabled = false;
        generateInputMaskForDiscount();
    }
    $("#txtDiscount").val("").removeClass("is-invalid").prop("disabled", isDisabled).siblings(`label[for="txtDiscount"]`).html(label);
});

$(".dataTables_length select.form-control.dropdown-field").on("change", async function (e) {
    const length = $(this).val();
    mainTable.page.len(length).draw();
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

    imageFile = FilePond.create(
        document.querySelector('.multiple-filepond'),
        {
            labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`
        }
    );

    generateMainTable();
    generateInputMask();
    disableForm(true);
    generateSelect2();
    // $('#maintTableSection').removeClass("d-none");
    await getBrand();
    await loadData();

    $.fn.dataTable.moment('YYYY-MM-DD HH:mm:ss');
    $.fn.dataTable.moment('YYYY-MM-DD');
    clearForm();
});
//end initial load