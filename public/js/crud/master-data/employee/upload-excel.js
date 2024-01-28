"use strict";
var ExcelEmployee = (function () {
    // Turbolinks.clearCache();
    const addExcel = document.getElementById("upload-employee-excel");

    const uploadForm = document.getElementById("upload-employee-excel");
    const modal = document.getElementById("excel_employee");

    const initModal = new bootstrap.Modal(modal);

    modal
        .querySelector('[data-kt-customer-employee-action="cancel"]')
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
                        ? (uploadForm.reset(), initModal.hide())
                        : "cancel" === t.dismiss &&
                          Swal.fire({
                              text: "Your form has not been cancelled!.",
                              icon: "error",
                              buttonsStyling: !1,
                              confirmButtonText: "Ok, got it!",
                              customClass: {
                                  confirmButton: "btn btn-primary",
                              },
                          });
                });
        });
    modal
        .querySelector('[data-kt-customer-employee-action="close"]')
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
                        ? (uploadForm.reset(), initModal.hide())
                        : "cancel" === t.dismiss &&
                          Swal.fire({
                              text: "Your form has not been cancelled!.",
                              icon: "error",
                              buttonsStyling: !1,
                              confirmButtonText: "Ok, got it!",
                              customClass: {
                                  confirmButton: "btn btn-primary",
                              },
                          });
                });
        });

    return {
        init: function () {
            (() => {
                var validation = FormValidation.formValidation(addExcel, {
                    fields: {
                        excel: {
                            validators: {
                                notEmpty: { message: "Excel is required" },
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
                const onSubmit = addExcel.querySelector(
                    '[data-kt-customer-employee-excel-action="submit"]'
                );

                onSubmit.addEventListener("click", (t) => {
                    onSubmit.setAttribute("data-kt-indicator", "on");
                    t.preventDefault(),
                        validation &&
                            validation.validate().then(function (t) {
                                var formData = new FormData(addExcel);
                                $.ajax({
                                    type: "POST",
                                    url: route("employee.upload_excel"),
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
                                                        addExcel.reset();
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
                                        Swal.fire({
                                            text: error.responseJSON.message,
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton:
                                                    "btn btn-primary",
                                            },
                                        });
                                    },
                                });
                            });
                });
            })();
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    ExcelEmployee.init();
});
