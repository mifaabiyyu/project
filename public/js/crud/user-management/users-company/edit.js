"use strict";
var KTUsersEditUser = (function () {
    const modal = document.getElementById("kt_modal_edit_user");
    const editForm = modal.querySelector("#kt_modal_edit_user_form");
    var kode = "";
    editForm.reset();
    $("body").on("click", "#edit-data", function () {
        kode = $(this).data("id");
        $.ajax({
            type: "GET",
            url: route("user-company-data.show", kode),

            success: function (response) {
                $("#headerForm").html("Edit Data User " + response.data.name);
                $("#edit_name").val(response.data.name);
                $("#edit_email").val(response.data.email);
                $("#edit_company").val(response.data.company);
                $("#edit_position").val(response.data.position);
                $("#edit_phone").val(response.data.phone);

                $(
                    "input[name=status][value=" + response.data.status + "]"
                ).prop("checked", true);
            },
            error: function (error) {
                toastr.error(error.responseJSON.message, options);
            },
        });
    });

    const initModal = new bootstrap.Modal(modal);
    return {
        init: function () {
            (() => {
                var validation = FormValidation.formValidation(editForm, {
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
                                stringLength: {
                                    min: 8,
                                    message: "Password length min 8 character",
                                },
                            },
                        },
                        password_confirmation: {
                            validators: {
                                identical: {
                                    compare: function () {
                                        return editForm.querySelector(
                                            '[name="password"]'
                                        ).value;
                                    },
                                    message: "Password not same as above",
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
                    '[data-kt-edit-users-modal-action="submit"]'
                );

                onSubmit.addEventListener("click", (t) => {
                    t.preventDefault(),
                        validation &&
                            validation.validate().then(function (t) {
                                var formData = new FormData(editForm);
                                $.ajax({
                                    type: "POST",
                                    url: route(
                                        "user-company-data.update",
                                        kode
                                    ),
                                    contentType: false,
                                    data: formData,
                                    processData: false,
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
                                                        editForm.reset();
                                                        var oTable =
                                                            $(
                                                                "#user_table"
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
