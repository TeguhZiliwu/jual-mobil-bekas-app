import { initInputMask, validateForm, showAlert, showConfirmBox, showError, generateDataTable, generateDropdownOption, showLoading, hideLoading, callAPI } from "../../global/common";

var swiper = new Swiper(".pagination-dynamic", {
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
        clickable: true,
    },
    slidesPerView: 1,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
        1024: {
            slidesPerView: 2,
            spaceBetween: 50,
        },
        1400: {
            slidesPerView: 3,
            spaceBetween: 50,
        },
    },
});

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

const getRatingReview = async () => {
    try {
        const url = "/api/history/get-rating-review";

        showLoading();
        const response = await callAPI(url, "GET");

        const { data, success, message, message_type, validation_message } = await response;

        if (success) {
            if (data.length > 0) {
                for (let i = 0; i < data.length; i++) {
                    const { full_name, comment, rating_service, rating_quality, rating_website_experience } = data[i];

                    let ratingServiceStar = '';
                    let ratingQualityStar = '';
                    let ratingWebSiteExperience = '';

                    for (let x = 0; x < 5; x++) {
                        if (x < rating_service) {
                            ratingServiceStar += '<i class="ri-star-fill"></i>';
                        } else {
                            ratingServiceStar += '<i class="ri-star-line"></i>';
                        }
                    }

                    for (let x = 0; x < 5; x++) {
                        if (x < rating_quality) {
                            ratingQualityStar += '<i class="ri-star-fill"></i>';
                        } else {
                            ratingQualityStar += '<i class="ri-star-line"></i>';
                        }
                    }

                    for (let x = 0; x < 5; x++) {
                        if (x < rating_website_experience) {
                            ratingWebSiteExperience += '<i class="ri-star-fill"></i>';
                        } else {
                            ratingWebSiteExperience += '<i class="ri-star-line"></i>';
                        }
                    }

                    const review = `<div class="swiper-slide">
                                        <div class="card custom-card testimonial-card shadow-none">
                                            <div class="card-body">
                                                <div class="testimonia text-center">
                                                    <span class="avatar avatar-xl avatar-rounded mb-1">
                                                        <img src="../assets/images/faces/11.jpg" alt="">
                                                    </span>
                                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                                        <span class="me-2">Rating Service</span>
                                                        <span class="text-warning d-block">
                                                            ${ratingServiceStar}
                                                        </span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                                        <span class="me-2">Rating Quality</span>
                                                        <span class="text-warning d-block">
                                                            ${ratingQualityStar}
                                                        </span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                                        <span class="me-2">Rating Website Experience</span>
                                                        <span class="text-warning d-block">
                                                            ${ratingWebSiteExperience}
                                                        </span>
                                                    </div>
                                                    <p class="op-8 mb-4">
                                                        <i class="fa fa-quote-left fs-22 text-primary op-6 me-2"></i>
                                                        ${comment}
                                                    </p>
                                                    <p class="mb-0 fw-semibold fs-16">${full_name}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                    $("#reviewRatingSection").append(review);
                }
            }
        } else {
            showAlert(message_type, message, 15000);
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
    } catch (e) {
        showError(e);
    } finally {
        window.setTimeout(function () {
            hideLoading();
        }, 300);
    }
};


// event start


// event end

//initial load
$(document).ready(async function () {
    await getRatingReview();
});
//end initial load