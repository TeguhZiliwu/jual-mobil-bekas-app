import { initInputMask, validateForm, showAlert, showConfirmBox, showError, generateDataTable, generateDropdownOption, showLoading, hideLoading, callAPI } from "../../global/common";

const dataTab = new bootstrap.Tab($('[data-bs-target="#nav-data"]'));
const formTab = new bootstrap.Tab($('[data-bs-target="#nav-form"]'));
let mainTable;
let isEdit = false;
let generatedCode = "";

const disableForm = (isDisable) => {
    try {
        $(`.form-group input.text-field, .form-group textarea.text-field, .form-group input.radio-field, .form-group select.dropdown-field, .form-action-button`).prop("disabled", isDisable);
        $(`.form-group select.dropdown-field`).val("").trigger("change").removeClass("is-invalid");
        $(`button.button-action`).prop("disabled", !isDisable);
        mainTable.column(-1).nodes().to$().each(function (index) {
            $(this).find(`button[action="edit"]`).prop("disabled", !isDisable);
            $(this).find(`button[action="delete"]`).prop("disabled", !isDisable);
        });
    } catch (error) {
        showError(error);
    }
};

const clearForm = () => {
    try {
        $(`.form-group input:not([type="radio"]), .form-group textarea`).val("").removeClass("is-invalid").trigger("keyup");
        $(`.form-group input[type="radio"]`).prop("checked", false).removeClass("is-invalid-radio");
        generatedCode = "";
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
        placeholder: 'Select an Option'
    });
};

const generateMainTable = () => {
    try {
        const extOption = {
            drawCallback: function () {
                const isDisable = $("#btnSubmit").prop("disabled");
                $("button.table-edit, button.table-delete").prop("disabled", !isDisable);
            },
            // responsive: {
            //     details: {
            //         display: $.fn.dataTable.Responsive.display.modal({
            //             header: function (row) {
            //                 var data = row.data();
            //                 return data[0] + ' ' + data[1];
            //             }
            //         }),
            //         renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            //             tableClass: 'table'
            //         })
            //     }
            // },
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
                { data: "supplier_name" },
                { data: "name" },
                { data: "phone_number" },
                { data: "email" },
                { data: "address" },
                { data: "remark" },
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

const loadData = async () => {
    try {
        const url = "/api/supplier-contact";

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
        const url = isEdit ? "/api/supplier-contact/update" : "/api/supplier-contact/create";

        const name = $("#txtName").val();
        const supplier_code = $("#ddSupplier").val();
        const email = $("#txtEmail").val();
        const phone_number = $("#txtPhoneNumber").inputmask('unmaskedvalue');
        const address = $("#txtAddress").val();
        const remark = $("#txtRemark").val();

        const param = {
            code: generatedCode,
            name,
            supplier_code,
            phone_number,
            address,
            email,
            remark
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

const deleteData = async (code) => {
    try {
        const url = `/api/supplier-contact/delete`;

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
        const supplier_code = $("#ddSupplier");
        const name = $("#txtName");
        const phoneNumber = $("#txtPhoneNumber");
        const email = $("#txtEmail");
        const address = $("#txtAddress");

        let field = {
            name,
            supplier_code,
            phoneNumber,
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
    isEdit = true;
    const { code, name, supplier_code, phone_number, email, address, remark } = data;
    formTab.show();

    disableForm(false);
    $("#txtName").val(name);
    $("#ddSupplier").val(supplier_code).trigger("change");
    $("#txtPhoneNumber").val(phone_number).trigger("keyup");
    $("#txtEmail").val(email).trigger("keyup");
    $("#txtAddress").val(address).trigger("keyup");
    $("#txtRemark").val(remark).trigger("keyup");
    generatedCode = code;
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

// event end

//initial load
$(document).ready(async function () {
    generateMainTable();
    generateInputMask();
    disableForm(true);
    generateSelect2();
    await getSupplier();
    // disableForm(true);
    // $('#maintTableSection').removeClass("d-none");
    // await getEducationOption();
    await loadData();

    // await getFilterEducationOption();

    $.fn.dataTable.moment('YYYY-MM-DD HH:mm:ss');
    $.fn.dataTable.moment('YYYY-MM-DD');
    // clearForm();
});
//end initial load