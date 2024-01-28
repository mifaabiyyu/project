"use strict";

KTUtil.onDOMContentLoaded(function () {
    var ShowProduct = (function () {
        const modal = document.getElementById("show_product");
        const editForm = modal.querySelector("#show_product_form");
        var kode = "";
        editForm.reset();
        $("body").on("click", "#show-data", function () {
            kode = $(this).data("id");
            $.ajax({
                type: "GET",
                url: route("product-data.show", kode),

                success: function (response) {
                    $("#headerModalShow").html(
                        "Detail Product " + response.data.name
                    );
                    $("#show_name").val(response.data.name);
                    $("#show_code").val(response.data.code);
                    $("#show_stock").val(response.data.stock);
                    $("#show_weight").val(response.data.weight);
                    $("#show_mesh").val(response.data.mesh);
                    $("#show_product_type").val(response.data.product_type);
                    $("#show_physical_appearance").val(
                        response.data.physical_appearance
                    );
                    $("#show_whiteness").val(response.data.whiteness);
                    $("#show_residue").val(response.data.residue);
                    $("#show_mean_particle_diameter	").val(
                        response.data.mean_particle_diameter
                    );
                    $("#show_moisture").val(response.data.moisture);
                    $("#show_description").val(response.data.description);
                    $("#show_packing_type_id").val(
                        response.data.packing_type_id
                    );
                    document.getElementById(
                        "image-input-wrapper-show"
                    ).style.backgroundImage =
                        "url('../../images/product/" +
                        response.data.photo +
                        "')";

                    $(
                        "input[name=status][value=" + response.data.status + "]"
                    ).prop("checked", true);
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
    })();
});
