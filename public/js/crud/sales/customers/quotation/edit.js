"use strict";
var KTaddQuote = (function () {
    const editForm = document.getElementById("edit_sales_quotation");

    return {
        init: function () {
            (() => {
                const onSubmit = document.querySelector(
                    '[data-kt-edit-quotation="submit"]'
                );

                onSubmit.addEventListener("click", (t) => {
                    onSubmit.setAttribute("data-kt-indicator", "on");
                    onSubmit.disabled = !0;
                    var formData = new URLSearchParams(new FormData(editForm));
                    $.ajax({
                        type: "PUT",
                        url: route("quotation-data.update", params),
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            toastr.success(response.message, options);
                            window.location.replace(
                                route("quotation.detail", btoa(response.data))
                            );
                        },
                        error: function (error) {
                            onSubmit.disabled = !1;
                            onSubmit.removeAttribute("data-kt-indicator");
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
            })();
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    // Turbo.clearCache();
    KTaddQuote.init();
});
