"use strict";
var AddCustomerList = (function () {
    // Turbolinks.clearCache();
    const addForm = document.getElementById("add_customer");

    return {
        init: function () {
            (() => {
                var validation = FormValidation.formValidation(addForm, {
                    fields: {
                        name: {
                            validators: {
                                notEmpty: { message: "Name is required" },
                            },
                        },
                        code: {
                            validators: {
                                notEmpty: { message: "Code is required" },
                            },
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: "Email address is required",
                                },
                                emailAddress: {
                                    message: "Valid email address is required",
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
                const onSubmit = addForm.querySelector(
                    '[data-kt-customers-action="submit"]'
                );

                onSubmit.addEventListener("click", (t) => {
                    t.preventDefault(),
                        validation &&
                            validation.validate().then(function (t) {
                                var formData = new FormData(addForm);
                                $.ajax({
                                    type: "POST",
                                    url: route("customer-data.store"),
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function (response) {
                                        onSubmit.setAttribute(
                                            "data-kt-indicator",
                                            "on"
                                        ),
                                            (onSubmit.disabled = !0),
                                            setTimeout(function () {
                                                onSubmit.removeAttribute(
                                                    "data-kt-indicator"
                                                ),
                                                    (onSubmit.disabled = !1),
                                                    Swal.fire({
                                                        text: response.message,
                                                        icon: "success",
                                                        buttonsStyling: !1,
                                                        confirmButtonText:
                                                            "Ok, got it!",
                                                        customClass: {
                                                            confirmButton:
                                                                "btn btn-primary",
                                                        },
                                                    }).then(function (t) {
                                                        t.isConfirmed;
                                                        window.location.replace(
                                                            route(
                                                                "customer.index"
                                                            )
                                                        );
                                                    });
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
                            });
                });
            })();
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    AddCustomerList.init();
});
