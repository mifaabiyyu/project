"use strict";
var KTRolesAdd = (function () {
    const modal = document.getElementById("add_permissions"),
        addForm = modal.querySelector("#add_permissions_form"),
        initModal = new bootstrap.Modal(modal);

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
                    '[data-kt-roles-modal-action="submit"]'
                );

                onSubmit.addEventListener("click", (t) => {
                    t.preventDefault(),
                        validation &&
                            validation.validate().then(function (t) {
                                var formData = new FormData(addForm);

                                $.ajax({
                                    type: "POST",
                                    url: route("permission-data.store"),
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
                                                                "#roles_table"
                                                            ).DataTable();
                                                        oTable.draw(false);
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
                }),
                    modal
                        .querySelector('[data-kt-roles-modal-action="cancel"]')
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
                                          Swal.fire({
                                              text: "Your form has not been cancelled!.",
                                              icon: "error",
                                              buttonsStyling: !1,
                                              confirmButtonText: "Ok, got it!",
                                              customClass: {
                                                  confirmButton:
                                                      "btn btn-primary",
                                              },
                                          });
                                });
                        }),
                    modal
                        .querySelector('[data-kt-roles-modal-action="close"]')
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
                                          Swal.fire({
                                              text: "Your form has not been cancelled!.",
                                              icon: "error",
                                              buttonsStyling: !1,
                                              confirmButtonText: "Ok, got it!",
                                              customClass: {
                                                  confirmButton:
                                                      "btn btn-primary",
                                              },
                                          });
                                });
                        });
            })();
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTRolesAdd.init();
});
