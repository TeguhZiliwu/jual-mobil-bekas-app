import { windowOnResize } from "../js/global/helper";
import { signOut, preLoad, validateForm, showLoading, hideLoading, callAPI, showAlert, showError } from "./global/common";

window.onresize = windowOnResize;

let modalChangePassword = "";

$(".text-field, .change-password-text-field").on("keyup", function () {
    let bgColor = "bg-primary";
    let textLength = $(this).val().length;
    const maxLength = $(this).attr("maxlength");
    const counterChar = $(this).closest(".form-group").find(".counter-char");
    const remainingPercentage = ((parseInt(maxLength) - textLength) / parseInt(maxLength)) * 100;

    if (remainingPercentage > 20 && remainingPercentage <= 50) {
        bgColor = "bg-warning";
    } else if (remainingPercentage <= 20) {
        bgColor = "bg-danger";
    }

    counterChar.removeClass("bg-primary").removeClass("bg-warning").removeClass("bg-danger").addClass(bgColor);
    counterChar.text(`${textLength}/${maxLength}`);
});

preLoad();

const changePassword = async () => {
    try {
        const url = "/api/user/change-password";

        const old_password = $("#txtOldPassword").val();
        const password = $("#txtPassword").val();

        const param = {
            old_password,
            password
        };

        showLoading();
        const response = await callAPI(url, "POST", param);
        const { data, success, message, message_type, validation_message } = await response;

        if (success) {
            showAlert("success", message, 15000);
            modalChangePassword.hide();
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
        
    } catch (error) {
        showError(error);
    } finally {
        window.setTimeout(function () {
            hideLoading();
        }, 300);
    }
}

$(document).ready(function () {
    var url = window.location;
    var pathName = url.pathname.toLowerCase();
    const href = url.href.toLowerCase();

    $('ul.main-menu li.slide a[href="' + href + '"]').addClass('active');
    $('ul.main-menu li.slide a').filter(function () {
        return this.href.toLowerCase() == `${href}`;
    }).parents("li").addClass('active').children().addClass("active").parents("li").children("ul.slide-menu").css("display", "block").parents("li").addClass("open");


    $(`#btnSubmitChangePassword`).on("click", async function () {
        
        const oldPassword = $("#txtOldPassword");
        const password = $("#txtPassword");
        const confirmPassword = $("#txtConfirmPassword");

        let field = {
            oldPassword,
            password,
            confirmPassword

        };

        if (validateForm(field)) {
            if (password.val() == confirmPassword.val()) {
                await changePassword();
            } else {
                showAlert("warning", "Passwords do not match. Please try again.", 15000);
            }
        }
    });

    if ($("#modalChangePassword").length > 0) {

        modalChangePassword = new bootstrap.Modal('#modalChangePassword', {
            backdrop: 'static'
        });
    }
});

$(`input`).on("input", function () {
    $(this).removeClass("is-invalid");
});

$(`textarea`).on("input", function () {
    $(this).removeClass("is-invalid");
});

$(`select`).on("change", function () {
    $(this).removeClass("is-invalid");
});

$(`input[type="radio"]`).on("change", function () {
    const attrName = $(this).attr("name");
    $(`input[type="radio"][name="${attrName}"]`).removeClass("is-invalid-radio");
});

$(`.password-icon`).on("click", function () {
    const inputEle = $(this).siblings("input");
    const type = inputEle.attr("type");
    const isDisabled = inputEle.prop("disabled");

    if (!isDisabled) {
        if (type.toLowerCase() === "text") {
            $(this).removeClass("fa-eye-slash").addClass("fa-eye");
            inputEle.attr("type", "password");
        } else {
            $(this).removeClass("fa-eye").addClass("fa-eye-slash");
            inputEle.attr("type", "text");
        }
    }
});

$(`#btnSignOut`).on("click", async function () {
    await signOut();
});

$(`#btnChangePassword`).on("click", async function () {
    modalChangePassword.show();
});