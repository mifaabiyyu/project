"use strict";
var EditEmployee = (function () {
    const modal = document.getElementById("edit_employee");
    const editForm = modal.querySelector("#edit_employee_form");
    var kode = "";
    $("#edit_date_birth").flatpickr();
    $("#edit_start_work").flatpickr();

    editForm.reset();
    $("body").on("click", "#edit-data", function () {
        kode = $(this).data("id");
        $.ajax({
            type: "GET",
            url: route("employee-data.show", kode),

            success: function (response) {
                $("#headerForm").html(
                    "Edit Data Employee " + response.data.name
                );
                $("#edit_name").val(response.data.name);
                $("#edit_email").val(response.data.email);
                $("#edit_nik").val(response.data.nik);
                $("#edit_company").val(response.data.company_id).change();
                $("#edit_division").val(response.data.division_id).change();
                $("#edit_position").val(response.data.position);
                $("#edit_start_work").val(response.data.start_work);
                $("#edit_phone").val(response.data.phone);
                $("#edit_date_birth").val(response.data.date_birth);
                $("#edit_address").val(response.data.address);
                document.getElementById("preview-image-before-upload").src =
                    "../../images/employee/" + response.data.photo;
                $(
                    "input[name=status][value=" + response.data.status + "]"
                ).prop("checked", true);
                $(
                    "input[name=bpjs_tk][value=" + response.data.bpjs_tk + "]"
                ).prop("checked", true);
                $(
                    "input[name=bpjs_ks][value=" + response.data.bpjs_ks + "]"
                ).prop("checked", true);
                $(
                    "input[name=gender][value=" + response.data.gender + "]"
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
                    '[data-kt-edit-employee-modal-action="submit"]'
                );

                onSubmit.addEventListener("click", (t) => {
                    onSubmit.setAttribute("data-kt-indicator", "on");
                    t.preventDefault(),
                        validation &&
                            validation.validate().then(function (t) {
                                var formData = new FormData(editForm);
                                $.ajax({
                                    type: "POST",
                                    url: route("employee.update", kode),
                                    contentType: false,
                                    data: formData,
                                    processData: false,
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
                                                        editForm.reset();
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
                            '[data-kt-edit-employee-modal-action="cancel"]'
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
                            '[data-kt-edit-employee-modal-action="close"]'
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
    EditEmployee.init();
});
