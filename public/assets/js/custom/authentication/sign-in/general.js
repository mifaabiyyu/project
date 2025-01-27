"use strict";
var KTSigninGeneral = (function () {
    var addForm, e, i;
    var options = {
        closeButton: false,
        debug: false,
        newestOnTop: false,
        progressBar: false,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };
    return {
        init: function () {
            (addForm = document.querySelector("#kt_sign_in_form")),
                (e = document.querySelector("#kt_sign_in_submit")),
                (i = FormValidation.formValidation(addForm, {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: "Email address is required",
                                },
                                emailAddress: {
                                    message:
                                        "The value is not a valid email address",
                                },
                            },
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "The password is required",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                        }),
                    },
                })),
                e.addEventListener("click", function (n) {
                    n.preventDefault(),
                        i.validate().then(function (i) {
                            var formData = new FormData(addForm);
                            e.setAttribute("data-kt-indicator", "on"),
                                (e.disabled = !0);
                            $.ajax({
                                type: "POST",
                                url: route("login"),
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function (response) {
                                    e.removeAttribute("data-kt-indicator"),
                                        (e.disabled = !1);
                                    toastr.success("Login success !", options);
                                    window.location.replace(route("dashboard"));
                                },
                                error: function (error) {
                                    const errors = Object.values(
                                        error.responseJSON.errors
                                    );
                                    e.removeAttribute("data-kt-indicator"),
                                        (e.disabled = !1);
                                    errors.forEach((element) => {
                                        toastr.error(element[0], options);
                                    });
                                },
                            });
                        });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
