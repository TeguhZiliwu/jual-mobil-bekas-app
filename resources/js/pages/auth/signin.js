import { validateForm, showAlert, showConfirmBox, showError, showLoading, hideLoading, callAPI } from "../../global/common";

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

const signIn = async () => {
    try {
        const url = "/api/auth/signin";

        const userid = $("#txtUserID").val();
        const password = $("#txtPassword").val();

        const param = {
            userid,
            password
        };

        loadingButton(true);

        const response = await callAPI(url, "POST", param);
        const { data, success, message, message_type, validation_message } = await response;

        if (success) {
            localStorage.setItem("token", data.token);
            showAlert("success", message, 15000);
            window.location.href = `/`;
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

$("#btnSignIn").on("click", async function () {
    try {
        const userId = $("#txtUserID");
        const password = $("#txtPassword");

        let field = {
            userId,
            password
        };

        if (validateForm(field)) {
            await signIn();
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

});
//end initial load