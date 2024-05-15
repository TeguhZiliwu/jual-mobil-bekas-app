import { initInputMask, validateForm, showAlert, showConfirmBox, showError, generateDataTable, generateDropdownOption, showLoading, hideLoading, callAPI, formatToRupiah, generateDateTimePicker, formatNumber } from "../../global/common";

let imageFile;
let mainTable;
let isEdit = false;
let generatedCode = "";
let dateTransaction;
let itemTransactionList = [];
let modalStockIn = new bootstrap.Modal('#modalStockIn', {
    backdrop: 'static'
});

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
        $(`#ddDiscountType`).val("None").trigger("change");
    } catch (error) {
        showError(error);
    }
};

const clearForm = () => {
    try {
        $(`.form-group input:not([type="radio"]), .form-group textarea`).val("").removeClass("is-invalid").trigger("keyup");
        $(`.form-group input[type="radio"]`).prop("checked", false).removeClass("is-invalid-radio");
        $(`.form-control.text-field.price-field`).val("0");
        $(`#ddDiscountType`).val("None").trigger("change");
        generatedCode = "";
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
            positionCaretOnClick: "none",
            allowMinus: false
        });

        initInputMask($(".number-field"), {
            alias: 'decimal',
            groupSeparator: '.',
            autoGroup: true,
            digits: 3,
            radixPoint: ',',
            positionCaretOnClick: "none",
            allowMinus: false
        });
    } catch (error) {
        showError(error);
    }
};

const generateSelect2 = () => {
    try {
        $('.dropdown-field, .dropdown-field.filter-field').select2({
            theme: "bootstrap-5",
            placeholder: 'Select an Option'
        });
    } catch (error) {
        showError(error);
    }
};

const generateInputDateTimePicker = () => {
    try {
        const option = {
            useCurrent: true,
        };

        dateTransaction = generateDateTimePicker('dateTransactionSection', option);
    } catch (error) {
        showError(error);
    }
};

const generateMainTable = () => {
    try {
        const extOption = {
            drawCallback: function () {
                const isDisable = $("#btnSubmit").prop("disabled");
                $("button.table-edit, button.table-delete").prop("disabled", !isDisable);
            },
            info: false,
            paging: false,
            scrollY: 400,
            columnDefs: [{
                targets: [-1],
                orderable: true
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
                { data: "name" },
                {
                    data: "capital_price",
                    render: function (data, type, row, meta) {
                        const finalResult = formatToRupiah(data, 0);
                        return `${finalResult}`;
                    },
                    className: "text-end"
                },
                {
                    data: "quantity",
                    render: function (data, type, row, meta) {
                        return `${formatNumber(data, 0)} Pcs`;
                    },
                    className: "text-end"
                },
                {
                    data: "total",
                    render: function (data, type, row, meta) {
                        const finalResult = formatToRupiah(data, 0);
                        return `${finalResult}`;
                    },
                    className: "text-end"
                },
            ],
            extOption
        };

        mainTable = generateDataTable(param);
    } catch (error) {
        showError(error);
    }
};

const getSupplier = async () => {
    try {
        try {
            const url = "/api/supplier/list";
            const target = $("#ddSupplier");

            await generateDropdownOption(url, null, target);
        } catch (e) {
            showError(e);
        }

    } catch (e) {
        showError(e);
    }
};

const scanItem = async (barcode) => {
    const barcodeElement = $("#txtBarcode");
    try {
        try {
            const url = "/api/item/scan";

            const param = {
                barcode
            };

            showLoading();
            const response = await callAPI(url, "GET", param);
            mainTable.clear().draw();

            const { data, success, message, message_type } = await response;

            if (success) {
                if (data.length == 1) {
                    showItem(data[0]);
                } else {
                    showAlert("warning", "Item not found!", 15000);
                    barcodeElement.val("");
                }
            } else {
                showAlert(message_type, message, 15000);
                barcodeElement.val("");
            }

        } catch (e) {
            showError(e);
            barcodeElement.val("");
        }

    } catch (e) {
        showError(e);
    } finally {
        hideLoading();
    }
};

const showItem = (data) => {
    try {
        const { code, name, description, stock_quantity, uom_name, capital_price, price, discount_type, discount, photo } = data;
        const barcodeElement = $("#txtBarcode");

        if (validationCart(data)) {
            modalStockIn.show();

            let photoPath = "../assets/images/";
            let image = `items/${photo}`;

            if (photo == null || photo == "") {
                image = "errors/no-image.png";
            }

            const capitalPriceElement = $("#txtCapitalPrice");
            const priceElement = $("#txtPrice");
            const quantityElement = $("#txtQuantity");

            $("#lblItemName").text(name);
            $("#lblItemDescription").text(description);
            $("#itemPhoto").attr("src", `${photoPath}${image}`);
            capitalPriceElement.val(capital_price.toString().replace('.', ','));
            priceElement.val(price.toString().replace('.', ','));
            $("#lblCurrentPrice").text(formatToRupiah(price, 0));
            $("#lblCyrrebtQuantity").text(`${formatNumber(stock_quantity)} ${uom_name}`);

            const itemValueObj = {
                code,
                name,
                capital_price: capitalPriceElement.val(),
                quantity: quantityElement.val(),
                price: priceElement.val(),
                discount,
                total: 0
            };

            // itemTransactionList.push(itemValueObj);

            // mainTable.clear().draw();
            // mainTable.rows.add(itemTransactionList).draw();
            barcodeElement.val("");
        }
    } catch (e) {
        showError(e);
    } finally {
        hideLoading();
    }
};

const addToChart = () => {
    try {
        const name = $("#lblItemName").text();
        const capitalPriceElement = $("#txtCapitalPrice");
        const priceElement = $("#txtPrice");
        const quantityElement = $("#txtQuantity");

        const itemValueObj = {
            code: name,
            name,
            capital_price: parseFloat(capitalPriceElement.inputmask('unmaskedvalue').replace(',', '.')),
            quantity: parseFloat(quantityElement.inputmask('unmaskedvalue').replace(',', '.')),
            price: parseFloat(priceElement.inputmask('unmaskedvalue').replace(',', '.')),
            total: parseFloat(quantityElement.inputmask('unmaskedvalue').replace(',', '.')) * parseFloat(capitalPriceElement.inputmask('unmaskedvalue').replace(',', '.'))
        };
        itemTransactionList.push(itemValueObj);

        mainTable.clear().draw();
        mainTable.rows.add(itemTransactionList).draw();

    } catch (e) {
        showError(e);
    } finally {

    }
};

const validationCart = (data) => {
    let isValid = true;
    let message = [];

    try {
        const { code, name, stock_quantity, price, discount_type, discount, photo } = data;
        const currentQuantityCart = 0;

        if (data.length == 0) {
            isValid = false;
            message.push("Item not found!");
        }
        // else {

        //     if (parseFloat(currentQuantityCart) <= parseFloat(stock_quantity)) {
        //         isValid = false;
        //         message.push("Insufficient Stock!");
        //     }
        // }

        if (!isValid) {
            showAlert("warning", message.join(", "), 15000);
        }

    } catch (e) {
        showError(e);
    } finally {
        return isValid;
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
        const item_type_code = $("#ddType").val();
        const unit_of_measurement_code = $("#ddUOM").val();
        const capital_price = $("#txtCapitalPrice").inputmask('unmaskedvalue');
        const price = $("#txtPrice").inputmask('unmaskedvalue');
        const discount_type = $("#ddDiscountType").val();
        const discount = $("#txtDiscount").inputmask('unmaskedvalue');
        const barcode = $("#txtBarcode").val();
        const remark = $("#txtRemark").val();
        const image = $(`#fileUploadImageItem input[type="file"].filepond--browser`);
        const minimum_quantity = $("#txtMinimumQuantity").inputmask('unmaskedvalue');
        const formData = new FormData();

        formData.append("code", generatedCode);
        formData.append("name", name);
        formData.append("description", description);
        formData.append("item_type_code", item_type_code);
        formData.append("unit_of_measurement_code", unit_of_measurement_code);
        formData.append("capital_price", validation.includes(parseFloat(capital_price.replace(',', '.'))) ? 0 : parseFloat(capital_price.replace(',', '.')));
        formData.append("price", validation.includes(parseFloat(price.replace(',', '.'))) ? 0 : parseFloat(price.replace(',', '.')));
        formData.append("discount_type", discount_type);
        formData.append("discount", validation.includes(parseFloat(discount.replace(',', '.'))) ? 0 : parseFloat(discount.replace(',', '.')));
        formData.append("barcode", barcode);
        formData.append("minimum_quantity", minimum_quantity);
        formData.append("remark", remark);

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

const deleteData = async (code) => {
    try {
        const url = `/api/item/delete`;

        const param = {
            code
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
        const type = $("#ddType");
        const uom = $("#ddUOM");
        const capitalPrice = $("#txtCapitalPrice");
        const price = $("#txtPrice");
        const discountType = $("#ddDiscountType");
        const discount = $("#txtDiscount");
        const minimum_quantity = $("#txtMinimumQuantity");

        let field = {
            name,
            description,
            type,
            uom,
            capitalPrice,
            price,
            discountType,
            minimum_quantity

        };

        if (discountType.val() !== "None") {
            field['discount'] = discount;
        }

        if (validateForm(field)) {
            await submit();
        }

    } catch (error) {
        showError(error);
    }
});

$("#btnAddStock").on("click", async function () {
    try {
        const price = $("#txtPrice");
        const capital_price = $("#txtCapitalPrice");
        const quantity = $("#txtQuantity");

        let field = {
            capital_price,
            price,
            quantity

        };

        if (validateForm(field)) {
            modalStockIn.hide();
            addToChart();
        }

    } catch (error) {
        showError(error);
    }
});

$("#txtQuantity").on("keypress", async function (e) {
    if (e.which == 13) {
        $("#btnAddStock").trigger("click");
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
    const { code, name, item_type_code, unit_of_measurement_code, capital_price, price, discount_type, discount, minimum_quantity, barcode, description, photo, remark } = data;
    formTab.show();

    disableForm(false);
    $("#txtName").val(name).trigger("keyup");
    $("#txtDescription").val(description).trigger("keyup");
    $("#ddType").val(item_type_code).trigger("change");
    $("#ddUOM").val(unit_of_measurement_code).trigger("change");
    $("#txtCapitalPrice").val(capital_price).trigger("keyup");
    $("#txtPrice").val(price).trigger("keyup").trigger("input");
    $("#txtMinimumQuantity").val(minimum_quantity).trigger("keyup").trigger("input");
    $("#ddDiscountType").val(discount_type).trigger("change");
    window.setTimeout(function () {
        $("#txtDiscount").val(parseFloat(discount)).trigger("keyup");
    }, 300);
    $("#txtBarcode").val(barcode).trigger("keyup");
    $("#txtRemark").val(remark).trigger("keyup");

    if (!validation.includes(photo)) {
        imageFile.addFile(`../assets/images/items/${photo}`);
    }
    generatedCode = code;

    $(`#cbChangePassword`).closest(".form-check").removeClass("d-none");
    $("#txtUserID, #txtPassword").prop("disabled", true);
});

$("#mainTable").on("click", `button[action="delete"]`, function () {
    const row = $(this).parents("tr");
    const data = mainTable.row(row).data();
    const { code } = data;
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
            await deleteData(code);
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

$("#txtBarcode").on("keypress", async function (e) {
    if (e.which == 13) {
        const item = $(this);
        const itemValue = item.val();
        await scanItem(itemValue);
    }
});

$(".total-price-set-up").on("input", function () {
    const validation = [null, "", NaN, undefined];
    const capitalPrice = parseFloat($("#txtCapitalPrice").inputmask('unmaskedvalue'));
    const quantity = parseFloat($("#txtQuantity").inputmask('unmaskedvalue'));
    const total = (validation.includes(capitalPrice) ? 0 : capitalPrice) * (validation.includes(quantity) ? 0 : quantity);

    $("#lblTotalPrice").text(formatToRupiah(total, 0));
});

$("body").on("keypress", function (event) {
    if (event.key.toUpperCase() == 'B') {
        // Check if the event target is not a textbox
        if (event.target.tagName !== 'INPUT' && event.target.tagName !== 'TEXTAREA') {
            // Display an alert
            alert('You pressed the "B" key!');
        }
    }
});

document.getElementById('modalStockIn').addEventListener('shown.bs.modal', event => {
    $("#txtQuantity").focus();
});

document.getElementById('modalStockIn').addEventListener('hidden.bs.modal', event => {
    $("#txtQuantity").val("");
    $("#lblTotalPrice").text("Rp 0,000");
});

// event end

//initial load
$(document).ready(async function () {
    generateMainTable();
    generateInputMask();
    generateSelect2();
    generateInputDateTimePicker();
    await getSupplier();

    $.fn.dataTable.moment('YYYY-MM-DD HH:mm:ss');
    $.fn.dataTable.moment('YYYY-MM-DD');
    clearForm();
});
//end initial load