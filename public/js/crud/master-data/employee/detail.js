"use strict";

KTUtil.onDOMContentLoaded(function () {
    const modal = document.getElementById("detail_employee");
    const detailForm = modal.querySelector("#detail_employee_form");
    var kode = "";
    $("#detail_date_birth").flatpickr();
    $("#detail_start_work").flatpickr();

    detailForm.reset();
    $("body").on("click", "#detail-data", function () {
        kode = $(this).data("id");
        $.ajax({
            type: "GET",
            url: route("employee-data.show", kode),

            success: function (response) {
                $("#headerForm").html(
                    "Detail Data Employee " + response.data.name
                );
                $("#detail_name").val(response.data.name);
                $("#redirect-image").attr(
                    "href",
                    "../../images/employee/" + response.data.photo
                );
                $("#detail_email").val(response.data.email);
                $("#detail_nik").val(response.data.nik);
                $("#detail_company").val(response.data.company_id).change();
                $("#detail_division").val(response.data.division_id).change();
                $("#detail_position").val(response.data.position);
                $("#detail_start_work").val(response.data.start_work);
                $("#detail_phone").val(response.data.phone);
                $("#detail_date_birth").val(response.data.date_birth);
                $("#detail_address").val(response.data.address);
                document.getElementById(
                    "preview-image-before-upload-detail"
                ).src = "../../images/employee/" + response.data.photo;
                $(
                    "input[name=status_detail][value=" +
                        response.data.status +
                        "]"
                ).prop("checked", true);
                $(
                    "input[name=bpjs_tk_detail][value=" +
                        response.data.bpjs_tk +
                        "]"
                ).prop("checked", true);
                $(
                    "input[name=bpjs_ks_detail][value=" +
                        response.data.bpjs_ks +
                        "]"
                ).prop("checked", true);
                $(
                    "input[name=gender_detail][value=" +
                        response.data.gender +
                        "]"
                ).prop("checked", true);
            },
            error: function (error) {
                toastr.error(error.responseJSON.message, options);
            },
        });
    });
});
