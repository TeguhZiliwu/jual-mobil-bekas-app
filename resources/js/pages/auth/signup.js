import { validateForm, showAlert, showConfirmBox, showError, showLoading, hideLoading, callAPI, initInputMask } from "../../global/common";
const validation = [null, "", NaN, undefined];

const clearForm = () => {
    try {
        $(`.form-group input`).val("").removeClass("is-invalid").trigger("change");
        isEdit = false;
    } catch (error) {
        showError(error);
    }
};

const loadingButton = (isShow) => {
    try {
        let spinner = `<span class="spinner-border spinner-border-sm align-middle me-1" role="status" aria-hidden="true"></span> Loading...`;
        let text = `Sign In`;

        $("#btnSignIn").html(isShow ? spinner : text).prop("disabled", isShow ? true : false);

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

const signUp = async () => {
    try {
        const url = "/api/auth/signup";

        const userid = $("#txtUserID").val();
        const password = $("#txtPassword").val();
        const full_name = $("#txtFullName").val();
        const email = $("#txtEmail").val();
        const phone_number = $("#txtPhoneNumber").inputmask('unmaskedvalue');

        const param = {
            userid,
            password,
            full_name,
            email,
            phone_number
        };

        loadingButton(true);

        const response = await callAPI(url, "POST", param);
        const { data, success, message, message_type, validation_message } = await response;

        if (success) {
            showAlert("success", message, 15000);
            $("#signUpSuccessSection").removeClass("d-none");
            $("#signUpForm").addClass("d-none");
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
            loadingButton(false);
        }
    } catch (error) {
        showError(error);
    } finally {
        hideLoading();
    }
};

// event start

$("#btnRegister").on("click", async function () {
    try {
        const userId = $("#txtUserID");
        const password = $("#txtPassword");
        const fullName = $("#txtFullName");
        const email = $("#txtEmail");
        const phoneNumber = $("#txtPhoneNumber");
        const rePassword = $("#txtRePassword");

        let field = {
            userId,
            fullName,
            email,
            phoneNumber,
            password,
            rePassword
        };

        if (validateForm(field)) {
            if (password.val() != rePassword.val()) {
                showAlert("warning", "Password not matched!");
                $("#txtPassword").addClass("is-invalid");
                $("#txtRePassword").addClass("is-invalid");
            } else {
                await signUp();
            }
        }

    } catch (error) {
        showError(error);
    }
});

$("#txtUserID, #txtPassword").on("keypress", async function (e) {
    if (e.which == 13) {
        $("#btnSignIn").trigger("click");
    }
});

// event end

//initial load
$(document).ready(async function () {
    generateInputMask();
});
//end initial load