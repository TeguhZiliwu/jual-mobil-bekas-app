import { initInputMask, validateForm, showAlert, showConfirmBox, showError, generateDataTable, generateDropdownOption, showLoading, hideLoading, callAPI, formatToRupiah, formatNumber } from "../../global/common";

let mainTable;
let isEdit = false;
let selectedId = "";
let photoRemoved = [];

const disableForm = (isDisable) => {
    try {
        $(`.form-group input.text-field:not(.default-disable), .form-group textarea.text-field, .form-group input.number-field, .form-group input.radio-field, .form-group select.dropdown-field, .form-action-button`).prop("disabled", isDisable);
        $(`.form-group select.dropdown-field`).val("").trigger("change").removeClass("is-invalid");
        $(`button.button-action`).prop("disabled", !isDisable);
        $(`.form-group input.text-field.conditional-disable`).prop("disabled", true);
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
        window.setTimeout(function () {
            photoRemoved = [];
        }, 300);
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

            },
            columnDefs: [{
                targets: [-1],
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
                {
                    data: "date",
                    render: function (data, type, row, meta) {
                        if (data == null || data == "") {
                            return "";
                        }
                        return moment(data).format('YYYY-MM-DD HH:mm:ss');
                    }
                },
                { data: "item_name" },
                { data: "full_name" },
                {
                    data: "price",
                    render: function (data, type, row, meta) {
                        const finalResult = formatToRupiah(data, 0);
                        return `${finalResult}`;
                    },
                },
                {
                    data: "transaction_status",
                    render: function (data, type, row, meta) {
                        let color = "bg-success";
                        if (data == "AWAITING PAYMENT" || data == "PROCESSING") {
                            color = "bg-warning";
                        } else if (data == "CANCELLED" || data == "REJECTED") {
                            color = "bg-danger";
                        }

                        return `<span class="badge ${color} fs-12">${data}</span>`;
                    },
                    className: "text-center action-column",
                },
                {
                    data: "receipt_of_payment",
                    render: function (data, type, row, meta) {
                        if (data == null || data == "") {
                            return "Receipt not available";
                        }
                        return `<a class="text-primary receipt" href="../assets/images/receipts/${data}" download>Download Receipt</a>`;
                    },
                    className: "text-center",
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
        const url = "/api/brand/list";
        const target = $("#ddBrand");

        await generateDropdownOption(url, null, target);

    } catch (e) {
        showError(e);
    }
};

const loadData = async () => {
    try {
        const url = "/api/report/sales";

        const keyword = $("#txtKeyword").val();

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

// event start

$("#btnAddData").on("click", function () {
    formTab.show();
    disableForm(false);
});

$("#btnCancel").on("click", function () {
    disableForm(true);
    clearForm();
});

$("#btnSearch").on("click", async function () {
    await loadData();
});

$("#txtKeyword").on("keypress", async function (e) {
    if (e.which == 13) {
        await loadData();
    }
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