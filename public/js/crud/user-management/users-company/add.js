"use strict";
var KTUsersAddUser = (function () {
    const modal = document.getElementById("kt_modal_add_user");
    const addForm = modal.querySelector("#kt_modal_add_user_form");

    const initModal = new bootstrap.Modal(modal);

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
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "Password is required",
                                },
                                stringLength: {
                                    min: 8,
                                    message: "Password length min 8 character",
                                },
                            },
                        },
                        password_confirmation: {
                            validators: {
                                notEmpty: {
                                    message:
                                        "Password Confirmation is required",
                                },
                                identical: {
                                    compare: function () {
                                        return addForm.querySelector(
                                            '[name="password"]'
                                        ).value;
                                    },
                                    message: "Password not same as above",
                                },
                            },
                        },
                        roles: {
                            validators: {
                                notEmpty: {
                                    message: "Roles is required",
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
                const onSubmit = modal.querySelector(
                    '[data-kt-users-modal-action="submit"]'
                );

                onSubmit.addEventListener("click", (t) => {
                    t.preventDefault(),
                        validation &&
                            validation.validate().then(function (t) {
                                var formData = new FormData(addForm);

                                $.ajax({
                                    type: "POST",
                                    url: route("user-company-data.store"),
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
                                                        t.isConfirmed &&
                                                            initModal.hide();
                                                        addForm.reset();
                                                        var oTable =
                                                            $(
                                                                "#user_table"
                                                            ).DataTable();
                                                        oTable.draw(false);
                                                    });
                                            }, 200);
                                    },
                                    error: function (error) {
                                        onSubmit.removeAttribute(
                                            "data-kt-indicator"
                                        );
                                        onSubmit.disabled = !1;
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
                }),
                    modal
                        .querySelector('[data-kt-users-modal-action="cancel"]')
                        .addEventListener("click", (t) => {
                            t.preventDefault(),
                                Swal.fire({
                                    text: "Are you sure you would like to cancel?",
                                    icon: "warning",
                                    showCancelButton: !0,
                                    buttonsStyling: !1,
                                    confirmButtonText: "Yes, cancel it!",
                                    cancelButtonText: "No, return",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                        cancelButton: "btn btn-active-light",
                                    },
                                }).then(function (t) {
                                    t.value
                                        ? (addForm.reset(), initModal.hide())
                                        : "cancel" === t.dismiss &&
                                          toastr.error(
                                              "Your form has not been cancelled!.",
                                              options
                                          );
                                });
                        }),
                    modal
                        .querySelector('[data-kt-users-modal-action="close"]')
                        .addEventListener("click", (t) => {
                            t.preventDefault(),
                                Swal.fire({
                                    text: "Are you sure you would like to cancel?",
                                    icon: "warning",
                                    showCancelButton: !0,
                                    buttonsStyling: !1,
                                    confirmButtonText: "Yes, cancel it!",
                                    cancelButtonText: "No, return",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                        cancelButton: "btn btn-active-light",
                                    },
                                }).then(function (t) {
                                    t.value
                                        ? (addForm.reset(), initModal.hide())
                                        : "cancel" === t.dismiss &&
                                          toastr.error(
                                              "Your form has not been cancelled!.",
                                              options
                                          );
                                });
                        });
            })();
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTUsersAddUser.init();
});
