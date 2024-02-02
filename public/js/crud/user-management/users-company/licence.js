"use strict";
var KTUsersEditUser = (function () {
    const modal = document.getElementById("setLicence");
    const editForm = modal.querySelector("#update_licence_form");
    var kode = "";
    editForm.reset();
    $("body").on("click", "#set-licence", function () {
        kode = $(this).data("id");
    });

    const initModal = new bootstrap.Modal(modal);
    return {
        init: function () {
            (() => {
                var validation = FormValidation.formValidation(editForm, {
                    fields: {
                        licence: {
                            validators: {
                                notEmpty: { message: "Licence is required" },
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
                    '[data-kt-licence-modal-action="submit"]'
                );

                onSubmit.addEventListener("click", (t) => {
                    t.preventDefault(),
                        validation &&
                            validation.validate().then(function (t) {
                                var formData = new FormData(editForm);
                                onSubmit.setAttribute(
                                    "data-kt-indicator",
                                    "on"
                                );
                                onSubmit.disabled = !0;
                                $.ajax({
                                    type: "Post",
                                    url: route(
                                        "user-company-data.updateLicence",
                                        kode
                                    ),
                                    contentType: false,
                                    data: formData,
                                    processData: false,
                                    success: function (response) {
                                        onSubmit.removeAttribute(
                                            "data-kt-indicator"
                                        );
                                        onSubmit.disabled = !1;
                                        toastr.success(
                                            response.message,
                                            options
                                        );
                                        initModal.hide();
                                        editForm.reset();
                                        var oTable =
                                            $("#user_table").DataTable();
                                        oTable.draw(false);
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
                        .querySelector(
                            '[data-kt-edit-users-modal-action="cancel"]'
                        )
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
                                        ? (editForm.reset(), initModal.hide())
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
                        .querySelector(
                            '[data-kt-edit-users-modal-action="close"]'
                        )
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
                                        ? (editForm.reset(), initModal.hide())
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
    KTUsersEditUser.init();
});
