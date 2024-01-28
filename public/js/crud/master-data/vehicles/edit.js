"use strict";
var VehicleEdit = (function () {
    const modal = document.getElementById("edit_vehicle");
    const editForm = modal.querySelector("#edit_vehicle_form");
    var kode = "";
    editForm.reset();
    $("body").on("click", "#edit-data", function () {
        kode = $(this).data("id");
        // showUrl.replace(":id", kode);
        $.ajax({
            type: "GET",
            url: route("vehicle-data.show", kode),

            success: function (response) {
                $("#edit_name").val(response.data.name);
                $("#edit_nopol_kendaraan").val(response.data.nopol_kendaraan);
                $("#edit_type_vehicle")
                    .val(response.data.type_vehicle)
                    .change();
                $("#edit_status").val(response.data.status).change();
                $("#edit_nomor_mesin").val(response.data.nomor_mesin);
                $("#edit_nomor_rangka").val(response.data.nomor_rangka);
                $("#edit_tahun_pembuatan").val(response.data.tahun_pembuatan);
                $("#edit_stnk_lifetime").val(response.data.stnk_lifetime);

                $("#file_stnk").attr(
                    "href",
                    baseUrl + "/images/vehicle/" + response.data.stnk
                );
            },
            error: function (error) {
                Swal.fire({
                    text: error.responseJSON.message,
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                });
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
                        code: {
                            validators: {
                                notEmpty: { message: "Code is required" },
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
                    '[data-kt-vehicles-edit-modal-action="submit"]'
                );

                onSubmit.addEventListener("click", (t) => {
                    t.preventDefault(),
                        validation &&
                            validation.validate().then(function (t) {
                                var formData = new FormData(editForm);
                                $.ajax({
                                    type: "POST",
                                    url: route("vehicles.updateData", kode),
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
                                                                "#vehicles_table"
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
                            '[data-kt-vehicles-edit-modal-action="cancel"]'
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
                            '[data-kt-vehicles-edit-modal-action="close"]'
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
    VehicleEdit.init();
});
