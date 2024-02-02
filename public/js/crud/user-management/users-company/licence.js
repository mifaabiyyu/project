"use strict";

KTUtil.onDOMContentLoaded(function () {
    const modal = document.getElementById("setLicence");
    const licenceForm = modal.querySelector("#update_licence_form");
    const initModal = new bootstrap.Modal(modal);
    var kode = "";
    licenceForm.reset();
    $("body").on("click", "#set-licence", function () {
        kode = $(this).data("id");
    });

    $("#licence").select2({
        // placeholder: "-- Select Term --",
        // allowClear: true,
        // minimumInputLength: 2,
        ajax: {
            type: "get",
            url: route("user-company.getLicence"),
            dataType: "json",
            delay: 0,
            processResults: function (res) {
                return {
                    results: $.map(res.data, function (item) {
                        var dataText = "";
                        dataText =
                            item.code +
                            " (" +
                            (item.total_licence - item.total_usage) +
                            " / " +
                            item.total_licence +
                            ")";
                        return {
                            text: dataText,
                            id: item.code,
                        };
                    }),
                };
            },
            // cache: false,
        },
    });

    var validation = FormValidation.formValidation(licenceForm, {
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
        onSubmit.setAttribute("data-kt-indicator", "on");
        onSubmit.disabled = !0;
        t.preventDefault(),
            validation &&
                validation.validate().then(function (t) {
                    var formData = new FormData(licenceForm);

                    $.ajax({
                        type: "Post",
                        url: route("user-company-data.updateLicence", kode),
                        contentType: false,
                        data: formData,
                        processData: false,
                        success: function (response) {
                            $("#licence").empty();
                            // $("#licence").select2("data", null);
                            onSubmit.removeAttribute("data-kt-indicator");
                            onSubmit.disabled = !1;
                            toastr.success(response.message, options);
                            initModal.hide();
                            licenceForm.reset();
                            var oTable = $("#user_table").DataTable();
                            oTable.draw(false);
                            $("#licence").val("").change();
                        },
                        error: function (error) {
                            onSubmit.removeAttribute("data-kt-indicator");
                            onSubmit.disabled = !1;
                            if (error.responseJSON.errors) {
                                const errors = Object.values(
                                    error.responseJSON.errors
                                );

                                errors.forEach((element) => {
                                    toastr.error(element[0], options);
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
});
