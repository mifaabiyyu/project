"use strict";
var Checkout = (function () {
    // Turbolinks.clearCache();
    const addForm = document.getElementById("postData");
    var invoiceUrl = "";
    return {
        init: function () {
            (() => {
                var validation = FormValidation.formValidation(addForm, {
                    fields: {
                        username: {
                            validators: {
                                notEmpty: { message: "Username harus diisi" },
                            },
                        },
                        alamat: {
                            validators: {
                                notEmpty: { message: "Alamat harus diisi" },
                            },
                        },
                        company: {
                            validators: {
                                notEmpty: { message: "Company harus diisi" },
                            },
                        },
                        password: {
                            validators: {
                                notEmpty: { message: "Password harus diisi" },
                            },
                        },
                        whatsapp: {
                            validators: {
                                notEmpty: { message: "Whatsapp harus diisi" },
                            },
                        },
                        nama_depan: {
                            validators: {
                                notEmpty: { message: "Nama Depan harus diisi" },
                            },
                        },
                        nama_belakang: {
                            validators: {
                                notEmpty: {
                                    message: "Nama Belakang harus diisi",
                                },
                            },
                        },
                        business_type: {
                            validators: {
                                notEmpty: {
                                    message: "Tipe Bisnis harus diisi",
                                },
                            },
                        },
                        password_confirmation: {
                            validators: {
                                notEmpty: {
                                    message:
                                        "Password Confirmation harus diisi",
                                },
                                identical: {
                                    compare: function () {
                                        return addForm.querySelector(
                                            '[name="password"]'
                                        ).value;
                                    },
                                    message: "Password harus sama",
                                },
                            },
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: "Email address harus diisi",
                                },
                                emailAddress: {
                                    message: "Email tidak valid",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                });
                const onSubmit = document.getElementById(
                    "kt_ecommerce_add_quote_submit"
                );

                onSubmit.addEventListener("click", (t) => {
                    t.preventDefault(),
                        validation &&
                            validation.validate().then(function (t) {
                                if (t != "Invalid") {
                                    onSubmit.setAttribute(
                                        "data-kt-indicator",
                                        "on"
                                    );
                                    onSubmit.disabled = !0;
                                    var formData = new FormData(addForm);
                                    $.ajax({
                                        type: "POST",
                                        url: "/api/invoice",
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function (response) {
                                            setTimeout(function () {
                                                onSubmit.removeAttribute(
                                                    "data-kt-indicator"
                                                );
                                                invoiceUrl =
                                                    response.invoice_url;
                                                onSubmit.disabled = !1;
                                                window.location.replace(
                                                    invoiceUrl
                                                );
                                            }, 200);
                                        },
                                        error: function (error) {
                                            if (error.responseJSON.errors) {
                                                const errors = Object.values(
                                                    error.responseJSON.errors
                                                );

                                                errors.forEach((element) => {
                                                    toastr.error(
                                                        element[0],
                                                        options
                                                    );
                                                });
                                            } else {
                                                toastr.error(
                                                    error.responseJSON.message,
                                                    options
                                                );
                                            }
                                        },
                                    });
                                }
                            });
                });
            })();
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    Checkout.init();
});
