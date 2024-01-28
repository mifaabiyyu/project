"use strict";
var UploadCustomerData = (function () {
    // Turbolinks.clearCache();
    const addExcel = document.getElementById("uploadCustomer");

    const uploadForm = document.getElementById("uploadCustomer");
    const modal = document.getElementById("excel_customer");

    const initModal = new bootstrap.Modal(modal);

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
                    '[data-kt-customer-excel-action="submit"]'
                );

                onSubmit.addEventListener("click", (t) => {
                    var actionRoute = "";

                    if ($("#option_import").val() == "Customer Data") {
                        actionRoute = route("customer.import");
                    } else {
                        actionRoute = route("customerAddress.import");
                    }
                    onSubmit.setAttribute("data-kt-indicator", "on");
                    t.preventDefault(),
                        validation &&
                            validation.validate().then(function (t) {
                                var formData = new FormData(addExcel);
                                $.ajax({
                                    type: "POST",
                                    url: actionRoute,
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
                                                                "#customers_table"
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
                });
            })();
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    UploadCustomerData.init();
});
