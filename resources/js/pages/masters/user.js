import { initInputMask, validateForm, showAlert, showConfirmBox, showError, generateDataTable, generateDropdownOption, showLoading, hideLoading, callAPI } from "../../global/common";

const dataTab = new bootstrap.Tab($('[data-bs-target="#nav-data"]'));
const formTab = new bootstrap.Tab($('[data-bs-target="#nav-form"]'));
let mainTable;
let isEdit = false;

const disableForm = (isDisable) => {
    try {
        $(`.form-group input.text-field, .form-group textarea.text-field, .form-group input.radio-field, .form-group select.dropdown-field, .form-action-button`).prop("disabled", isDisable);
        $(`.password-icon`).removeClass("fa-eye-slash").removeClass("fa-eye").addClass("fa-eye");
        $(`.password-section input`).attr("type", "password");
        $(`button.button-action`).prop("disabled", !isDisable);
        $(`#cbChangePassword`).prop("checked", false).closest(".form-check").addClass("d-none");
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
                { data: "userid" },
                { data: "full_name" },
                { data: "email" },
                { data: "phone_number" },
                { data: "role" },
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

const loadData = async () => {
    try {
        const url = "/api/user";

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
        const url = isEdit ? "/api/user/update" : "/api/user/create";

        const userid = $("#txtUserID").val();
        const password = $("#txtPassword").val();
        const full_name = $("#txtFullName").val();
        const email = $("#txtEmail").val();
        const phone_number = $("#txtPhoneNumber").inputmask('unmaskedvalue');
        const role = $("#ddRole").val();
        const is_change_password = $("#cbChangePassword").prop("checked");

        const param = {
            userid,
            password,
            full_name,
            email,
            phone_number,
            role,
            is_change_password
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

const deleteData = async (userid) => {
    try {
        const url = `/api/user/delete`;

        const param = {
            userid
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
        const userId = $("#txtUserID");
        const fullName = $("#txtFullName");
        const email = $("#txtEmail");
        const phoneNumber = $("#txtPhoneNumber");
        const password = $("#txtPassword");
        const role = $("#ddRole");
        const is_change_password = $("#cbChangePassword").prop("checked");

        let field = {
            userId,
            fullName,
            email,
            phoneNumber,
            role
        };

        if (!isEdit || (isEdit && is_change_password)) {
            field.password = password;
        }

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
    const { userid, full_name, email, phone_number, role } = data;
    formTab.show();

    $("#txtUserID").val(userid);
    $("#txtFullName").val(full_name).trigger("keyup");
    $("#txtEmail").val(email).trigger("keyup");
    $("#txtPhoneNumber").val(phone_number);
    $("#ddRole").val(role).trigger("change");

    disableForm(false);

    $(`#cbChangePassword`).closest(".form-check").removeClass("d-none");
    $("#txtUserID, #txtPassword").prop("disabled", true);
});

$("#mainTable").on("click", `button[action="delete"]`, function () {
    const row = $(this).parents("tr");
    const data = mainTable.row(row).data();
    const { userid } = data;
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
            await deleteData(userid);
        }
    });
});

$("#cbChangePassword").on("change", function () {
    const isChecked = $(this).prop("checked");
    $("#txtPassword").prop("disabled", !isChecked).removeClass("is-invalid");
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
    generateMainTable();
    generateInputMask();
    disableForm(true);
    generateSelect2();
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