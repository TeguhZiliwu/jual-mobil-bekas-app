import { extend } from "../../js/global/helper";

const preLoad = () => {
    let width = 100,
        perfData = window.performance.timing,
        EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
        time = parseInt((EstimatedTime / 1000) % 20) * 100;

    let PercentageID = $("#percent1"),
        start = 0,
        end = 100,
        durataion = time;
    animateValue(PercentageID, start, end, durataion);

    function animateValue(id, start, end, duration) {
        let range = end - start,
            current = start,
            increment = end > start ? 1 : -1,
            stepTime = Math.abs(Math.floor(duration / range)),
            obj = $(id);

        let timer = setInterval(function () {
            current += increment;
            $(obj).text(current + "%");
            $("#bar1").css("width", current + "%");
            if (current == end) {
                clearInterval(timer);

                setTimeout(function () {
                    $(".pre-loader").fadeOut(400);
                }, 300);
            }
        }, stepTime);
    }

    // setTimeout(function () {
    //     $(".pre-loader").fadeOut(300);
    // }, time);
};

const showAlert = (notiftype, message, timer = 10000, position = "top-right") => {

    const toastAlert = Swal.mixin({
        toast: true,
        position,
        showConfirmButton: false,
        timer,
        timerProgressBar: true,
        showCloseButton: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    toastAlert.fire({
        icon: notiftype,
        title: message
    });

    if (notiftype.toLowerCase() == "error") {
        // console.log(message);
    }
};

const generateDropdownOption = async (url, param = {}, target) => {
    try {
        const response = await callAPI(url, "GET", param);
        const { success, data } = await response;

        if (success) {
            let option = "";
            option = '<option hidden disabled selected value=""n>Select Option</option>';
            for (let i = 0; i < data.length; i++) {
                option += `<option value="${data[i].value}">${data[i].description}</option>`;
            }

            $(target).html(option).show();

            if (data.length === 1) {
                $(target).val(data[0].value).trigger("change");
            }
        }

    } catch (e) {
        showError(e);
    }
};

const generateDataTable = (param) => {

    try {
        let { id, extOption, columns } = param;
        const defOptions = {
            columns: columns,
            paging: true,
            lengthChange: false,
            searching: false,
            ordering: true,
            info: true,
            scrollX: true,
            scrollY: 600,
            scrollCollapse: true,
            columnDefs: [{
                targets: -1,
                orderable: false
            }],
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row mt-2'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        };

        const options = extOption ? extend(defOptions, extOption) : defOptions;

        return $(`#${id}`).DataTable(options);

    } catch (e) {
        showError(e);
    }
};

const generateDateTimePicker = (target, extOption) => {
    try {
        const defaultOption = {
            allowInputToggle: true,
            container: undefined,
            dateRange: false,
            debug: false,
            defaultDate: undefined,
            display: {
                icons: {
                    type: 'icons',
                    time: 'fa-solid fa-clock',
                    date: 'fa-solid fa-calendar',
                    up: 'fa-solid fa-arrow-up',
                    down: 'fa-solid fa-arrow-down',
                    previous: 'fa-solid fa-chevron-left',
                    next: 'fa-solid fa-chevron-right',
                    today: 'fa-solid fa-calendar-check',
                    clear: 'fa-solid fa-trash',
                    close: 'fa-solid fa-xmark'
                },
                sideBySide: false,
                calendarWeeks: false,
                viewMode: 'calendar',
                toolbarPlacement: 'bottom',
                keepOpen: false,
                buttons: {
                    today: true,
                    clear: true,
                    close: true
                },
                components: {
                    calendar: true,
                    date: true,
                    month: true,
                    year: true,
                    decades: true,
                    clock: false,
                    hours: true,
                    minutes: true,
                    seconds: false,
                    useTwentyfourHour: undefined
                },
                inline: false,
                theme: 'light'
            },
            // keepInvalid: false,
            localization: {
                format: "yyyy-MM-dd",
                // clear: 'Clear selection',
                // close: 'Close the picker',
                // dateFormats: DefaultFormatLocalization.dateFormats,
                // dayViewHeaderFormat: { month: 'long', year: '2-digit' },
                // decrementHour: 'Decrement Hour',
                // decrementMinute: 'Decrement Minute',
                // decrementSecond: 'Decrement Second',
                // hourCycle: DefaultFormatLocalization.hourCycle,
                // incrementHour: 'Increment Hour',
                // incrementMinute: 'Increment Minute',
                // incrementSecond: 'Increment Second',
                // locale: DefaultFormatLocalization.locale,
                // nextCentury: 'Next Century',
                // nextDecade: 'Next Decade',
                // nextMonth: 'Next Month',
                // nextYear: 'Next Year',
                // ordinal: DefaultFormatLocalization.ordinal,
                // pickHour: 'Pick Hour',
                // pickMinute: 'Pick Minute',
                // pickSecond: 'Pick Second',
                // previousCentury: 'Previous Century',
                // previousDecade: 'Previous Decade',
                // previousMonth: 'Previous Month',
                // previousYear: 'Previous Year',
                // selectDate: 'Select Date',
                // selectDecade: 'Select Decade',
                // selectMonth: 'Select Month',
                // selectTime: 'Select Time',
                // selectYear: 'Select Year',
                // startOfTheWeek: 0,
                // today: 'Go to today',
                // toggleMeridiem: 'Toggle Meridiem'
            },
            meta: {},
            multipleDates: false,
            multipleDatesSeparator: '; ',
            promptTimeOnDateChange: false,
            promptTimeOnDateChangeTransitionDelay: 200,
            restrictions: {
                minDate: undefined,
                maxDate: undefined,
                disabledDates: [],
                enabledDates: [],
                daysOfWeekDisabled: [],
                disabledTimeIntervals: [],
                disabledHours: [],
                enabledHours: []
            },
            stepping: 1,
            useCurrent: false,
            // viewDate: new DateTime()
        };

        const options = extOption ? extend(defaultOption, extOption) : defaultOption;

        const dateTimePicker = new tempusDominus.TempusDominus(document.getElementById(target), options);

        return dateTimePicker;
    } catch (error) {
        showError(e);
    }
};

const callAPI = async (url, method, params = {}, uploadfile = false, headers = {}, generatefiledownload = false) => {
    try {
        const token = localStorage.getItem("token");
        headers = {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            "Authorization": `Bearer ${token}`,
        };


        let options = {
            method,
            // credentials: 'include',
            headers
        };

        if (method === "GET") {
            url += "?" + new URLSearchParams(params).toString();
        } else {
            options.body = uploadfile === false ? JSON.stringify(params) : params;
            if (uploadfile == false) {
                const defHeaders = {
                    "Accept": "application/json",
                    "Content-Type": "application/json",
                };
                options.headers = extend(defHeaders, headers);
            }
        }

        const result = await fetch(url, options);
        const statusCode = result.status;

        if (statusCode === 401) {
            if (url != "/api/auth/login") {
                window.location.href = "/login";
            }
        }
        else if (statusCode === 500) {
            const { message } = await result.json();
            throw message;
        } else if (statusCode === 400) {
            return await result.json();
        }

        if (result.ok) {
            if (generatefiledownload) {
                return result;
            } else {
                return await result.json();
            }
        }

        throw result.statusText;

    } catch (error) {
        throw error;
    }
};

const showConfirmBox = (customstyling = {}) => {

    let defStyling = {
        customClass: {
            actions: "my-actions",
            confirmButton: "order-2 custom-confrim-sweetalert2 btn btn-danger btn-wave waves-effect waves-light",
            cancelButton: "order-1 custom-confrim-sweetalert2 btn btn-secondary-light btn-wave waves-effect waves-light me-3",
        },
        buttonsStyling: false
    };
    defStyling = customstyling ? extend(defStyling, customstyling) : defStyling;

    const defaultConfirmBox = Swal.mixin(defStyling);

    return defaultConfirmBox;
};

const showLoading = () => {
    $("#loader").addClass("show");
};

const hideLoading = () => {
    $("#loader").removeClass("show");
};

const initInputMask = (elem, opt) => {
    try {

        const defaultOpt = {
            showMaskOnHover: false,
        };
        const attr = opt ? extend(defaultOpt, opt) : defaultOpt;
        elem.inputmask(attr);

    } catch (error) {
        showError(error);
    }
};

const validateForm = (field) => {

    try {
        let isValid = true;

        Object.keys(field).forEach(key => {
            const element = field[key];
            let tag = element.prop("tagName");
            tag = tag === undefined || tag === null ? "" : tag.toLowerCase();
            let type = "text";

            if (tag === "input") {
                type = element.prop("type");
            }

            if (type === "text" || type === "password") {
                const isInputMaskPrice = element.hasClass("price-field");
                const value = isInputMaskPrice ? element.inputmask('unmaskedvalue') : element.val();
                const validation = ["", null, undefined];

                if (validation.includes(value)) {
                    isValid = false;
                    element.addClass("is-invalid");
                }
                else if (!validation.includes(value) && isInputMaskPrice && value == "0") {
                    isValid = false;
                    element.addClass("is-invalid");
                }
            }
            else if (type === "radio") {
                const value = element.filter(':checked').val();
                const validation = ["", null, undefined];

                if (validation.includes(value)) {
                    isValid = false;
                    element.addClass("is-invalid-radio");
                }
            }
        });

        if (!isValid) {
            showAlert("warning", "Please fill highlighted form correctly!");
        }

        return isValid;

    } catch (error) {
        showError(error);
    }
};

const showError = (error) => {
    showAlert("error", "Something wrong! Please contact your administrator!", 20000);
    console.error(error);
};

const signOut = async () => {
    try {
        const url = "/api/auth/signout";

        const param = {
            userid: "teguh.ziliwu"
        };

        const response = await callAPI(url, "POST", param);
        const { success, message, message_type } = await response;

        if (success) {
            showAlert("success", message, 15000);
            localStorage.clear();
            window.setTimeout(function () { 
                window.location.href = `/signin`;
            }, 1000);
        }
        else {
            showAlert(message_type, message);
        }
    } catch (error) {
        showError(error);
    } finally {
        hideLoading();
    }
};

const formatToRupiah = (number, decimalPlaces = 0) => {
    try {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: decimalPlaces,
            maximumFractionDigits: decimalPlaces
        }).format(number);
    } catch (error) {
        showError(error);
    }
};

const formatNumber = (number, decimalPlaces) => {
    try {
        number = parseFloat(number);
        // Ensure the number is formatted to three decimal places
        let formattedNumber = number.toFixed(decimalPlaces);

        // Split the integer and decimal parts
        let parts = formattedNumber.split('.');

        // Add thousand separators to the integer part
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        // Join the integer part with thousand separators and the decimal part with a comma
        formattedNumber = parts.join(',');

        // Return the formatted number
        return formattedNumber;
    } catch (error) {
        showError(error);
    }
};

export { showAlert, showError, callAPI, showConfirmBox, showLoading, hideLoading, initInputMask, validateForm, generateDataTable, generateDropdownOption, signOut, preLoad, formatToRupiah, generateDateTimePicker, formatNumber };