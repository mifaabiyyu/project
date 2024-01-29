const deleteButtons = document.querySelectorAll(
    '[data-kt-quote-table-filter="delete_row"]'
);

deleteButtons.forEach((d) => {
    // Delete button on click
    d.addEventListener("click", function (e) {
        e.preventDefault();

        var kode = $(this).data("id");
        Swal.fire({
            text: "Are you sure you want to delete data ?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary",
            },
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: route("quotation-data.destroy", kode),
                    data: {
                        _token: csrf,
                    },
                    success: function (response) {
                        toastr.success(response.message, options);
                        window.location.replace(route("quotation.index"));
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
            } else if (result.dismiss === "cancel") {
                Swal.fire({
                    text: product + " was not deleted.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary",
                    },
                });
            }
        });
    });
});
