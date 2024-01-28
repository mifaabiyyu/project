"use strict";
var KTShowCompany = (function () {
    const modal = document.getElementById("show_companies");
    const showForm = modal.querySelector("#show_companies_form");
    var kode = "";
    showForm.reset();
    $("body").on("click", "#show-data", function () {
        kode = $(this).data("id");
        $.ajax({
            type: "GET",
            url: route("company-data.show", kode),

            success: function (response) {
                $("#modalShowHeader").html(
                    "Show Detail Company " + response.data.name
                );
                $("#show_name").val(response.data.name);
                $("#show_code").val(response.data.code);
                $("#show_type").val(response.data.type);
                $("#show_address").val(response.data.address);
                $("#show_no_telfon").val(response.data.no_telfon);
                $("#show_description").val(response.data.description);
                $(
                    "input[id=show_status][value=" + response.data.status + "]"
                ).prop("checked", true);
            },
            error: function (error) {
                Swal.fire({
                    text: "Sorry, looks like there are some errors detected, please try again.",
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
                modal
                    .querySelector('[data-kt-companies-modal-action="close"]')
                    .addEventListener("click", (t) => {
                        t.preventDefault(), showForm.reset(), initModal.hide();
                    });
            })();
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTShowCompany.init();
});
