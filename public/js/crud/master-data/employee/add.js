"use strict";
var EmployeeAdd = (function () {
    const modal = document.getElementById("add_employee");
    const addForm = modal.querySelector("#add_employee_form");
    $("#date_birth").flatpickr();
    $("#start_work").flatpickr();
    const initModal = new bootstrap.Modal(modal);

    return {
        init: function () {
            (() => {
                var validation = FormValidation.formValidation(addForm, {
                    fields: {
                        name: {
                            validators: {
                                notEmpty: { message: "Nama is required" },
                            },
                        },
                        nik: {
                            validators: {
                                notEmpty: { message: "NIK is required" },
                            },
                        },
                        company: {
                            validators: {
                                notEmpty: { message: "Company is required" },
                            },
                        },
                        division: {
                            validators: {
                                notEmpty: { message: "Division is required" },
                            },
                        },
                        position: {
                            validators: {
                                notEmpty: { message: "Position is required" },
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
                    '[data-kt-employee-modal-action="submit"]'
                );

                onSubmit.addEventListener("click", (t) => {
                    onSubmit.setAttribute("data-kt-indicator", "on");
                    t.preventDefault(),
                        validation &&
                            validation.validate().then(function (t) {
                                var formData = new FormData(addForm);
                                formData.append(
                                    "photo",
                                    $("input[type=file]")[0].files[0]
                                );
                                $.ajax({
                                    type: "POST",
                                    url: route("employee-data.store"),
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function (response) {
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
                                                                "#employee_table"
                                                            ).DataTable();
                                                        oTable.draw(false);
                                                    });
                                            }, 200);
                                    },
                                    error: function (error) {
                                        onSubmit.removeAttribute(
                                            "data-kt-indicator"
                                        );
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
                            '[data-kt-employee-modal-action="cancel"]'
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
                                        ? (addForm.reset(), initModal.hide())
                                        : "cancel" === t.dismiss &&
                                          toastr.error(
                                              "Your form has not been cancelled!.",
                                              options
                                          );
                                });
                        }),
                    modal
                        .querySelector(
                            '[data-kt-employee-modal-action="close"]'
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
    EmployeeAdd.init();
});
