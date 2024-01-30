"use strict";

// Class definition
var QuotationDataTable = (function () {
    // Shared variables
    // Turbolinks.clearCache();
    var table;
    var oTable;
    var filterPayment;
    var filterData = {};
    // Private functions
    var initDatatable = function () {
        oTable = $("#quotation_table").DataTable({
            processing: true,
            serverSide: true,
            retrieve: true,
            searchDelay: false,
            order: [[1, "asc"]],
            ajax: {
                data: (d) => Object.assign(d, filterData),
                url: route("quotation-data.index"),
            },
            columns: [
                {
                    data: "code",
                    render: function (data, type, row) {
                        return (
                            `
                        <a
                        href="` +
                            route("quotation.detail", btoa(row.code)) +
                            `"
                        class="text-primary fw-bold text-hover-dark mb-1 fs-6" 
                    >
                        ` +
                            data +
                            `
                    </a>
                       `
                        );
                    },
                },
                { data: "customer_name" },
                {
                    data: "total",
                    searchable: false,
                    render: function (data, type, row) {
                        var price = rupiah(data);

                        return (
                            `
                        <a
                        href="javascript:void(0)"
                        class="text-dark fw-bold text-hover-primary mb-1 fs-6"
                    >
                        ` +
                            price +
                            `
                    </a>
                       `
                        );
                    },
                },
                // { data: "date" },
                // { data: "valid_until" },
                {
                    data: "status",
                    render: function (data, type, row) {
                        var color = "success";
                        if (data == 2) {
                            color = "danger";
                        }
                        var status = "";
                        status = row.get_status.name;

                        return (
                            '<span class="font-bolder text-center badge badge-light-' +
                            color +
                            '">' +
                            status +
                            "</span>"
                        );
                    },
                    searchable: false,
                },
                // { data: null, searchable: false },
            ],
            columnDefs: [],
            // Add data-filter attribute
            createdRow: function (row, data, dataIndex) {
                $(row)
                    .find("td:eq(4)")
                    .attr("data-filter", data.CreditCardType);
            },
        });

        table = oTable.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        oTable.on("draw", function () {
            handleDeleteRows();
            KTMenu.createInstances();
        });
    };

    // Search Datatable --- official user reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector(
            '[data-kt-quotation-table-filter="search"]'
        );
        filterSearch.addEventListener("change", function (e) {
            oTable.search(e.target.value).draw(false);
        });
    };

    // Delete customer
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll(
            '[data-kt-quotation-table-filter="delete_row"]'
        );

        deleteButtons.forEach((d) => {
            // Delete button on click
            d.addEventListener("click", function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest("tr");

                // Get customer name
                const quotationName =
                    parent.querySelectorAll("td")[1].innerText;
                var kode = $(this).data("id");
                // SweetAlert2 pop up --- official user reference: https://sweetalert2.github.io/
                Swal.fire({
                    text:
                        "Are you sure you want to delete " +
                        quotationName +
                        "?",
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
                        // Simulate delete request -- for demo purpose only
                        $.ajax({
                            type: "DELETE",
                            url: route("quotation-data.destroy", kode),
                            data: {
                                _token: csrf,
                            },
                            success: function (response) {
                                Swal.fire({
                                    text:
                                        "You have deleted " +
                                        quotationName +
                                        "!.",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton:
                                            "btn fw-bold btn-primary",
                                    },
                                }).then(function () {
                                    // delete row data from server and re-draw datatable
                                    oTable.draw(false);
                                });
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
                            text: quotationName + " was not deleted.",
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
    };

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            handleDeleteRows();
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    QuotationDataTable.init();
});
// On document ready
