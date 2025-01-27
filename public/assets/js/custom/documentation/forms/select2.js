"use strict";
var KTFormsSelect2Demo = {
    init: function () {
        var e;
        (e = function (e) {
            if (!e.id) return e.text;
            var t = document.createElement("span"),
                n = "";
            return (
                (n +=
                    '<img src="' +
                    e.element.getAttribute("data-kt-select2-country") +
                    '" class="rounded-circle h-20px me-2" alt="image"/>'),
                (n += e.text),
                (t.innerHTML = n),
                $(t)
            );
        }),
            $("#kt_docs_select2_country").select2({
                templateSelection: e,
                templateResult: e,
            }),
            (function () {
                var e = function (e) {
                    if (!e.id) return e.text;
                    var t = document.createElement("span"),
                        n = "";
                    return (
                        (n +=
                            '<img src="' +
                            e.element.getAttribute("data-kt-select2-user") +
                            '" class="rounded-circle h-20px me-2" alt="image"/>'),
                        (n += e.text),
                        (t.innerHTML = n),
                        $(t)
                    );
                };
                $("#kt_docs_select2_users").select2({
                    templateSelection: e,
                    templateResult: e,
                });
            })();
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTFormsSelect2Demo.init();
});
