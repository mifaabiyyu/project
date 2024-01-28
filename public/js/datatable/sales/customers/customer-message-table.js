"use strict";

// Class definition
var CustomerMessages = (function () {
    // Shared variables

    var oTable;
    var table;
    var filterData = {};

    // Private functions
    var initDatatable = function () {
        oTable = $("#customer_message_table").DataTable({
            processing: true,
            serverSide: true,
            retrieve: true,
            ajax: {
                data: (d) => Object.assign(d, filterData),
                url: route("customer-message-data.index"),
            },
            columns: [
                { data: "name" },
                { data: "company" },
                { data: "email" },
                {
                    data: "status",
                    render: function (data, type, row) {
                        var color = "";
                        if (data == 10) {
                            color = "success";
                        } else {
                            color = "danger";
                        }

                        return (
                            '<span class="font-bolder text-center badge badge-light-' +
                            color +
                            '">' +
                            row.get_status.name +
                            "</span>"
                        );
                    },
                },
                {
                    data: "count_email",
                    render: function (data, type, row) {
                        var color = "";
                        var message = "";
                        if (data != 0) {
                            color = "success";
                            message = "Sent";
                        } else {
                            color = "danger";
                            message = "Not Sent";
                        }

                        return (
                            '<span class="font-bolder text-center badge badge-light-' +
                            color +
                            '">' +
                            message +
                            "</span>"
                        );
                    },
                },
                { data: null, searchable: false },
            ],
            columnDefs: [
                {
                    targets: -1,
                    data: null,
                    orderable: false,
                    searchable: false,
                    className: "text-end",
                    render: function (data, type, row) {
                        return (
                            `
                        <div class="d-flex justify-content-center flex-shrink-0">
                           
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-id="` +
                            btoa(row.id) +
                            `" data-bs-target="#detail_customer_message" id="edit-data" class="btn btn-icon btn-bg-light btn-success btn-active-color-secondary btn-sm me-1">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
                                        <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                        </div>
                        `
                        );
                    },
                },
            ],
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
            '[data-kt-offering-letter-table-filter="search"]'
        );
        filterSearch.addEventListener("change", function (e) {
            oTable.search(e.target.value).draw();
        });
    };
    // Delete customer
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll(
            '[data-kt-offering-letter-table-filter="delete_row"]'
        );

        deleteButtons.forEach((d) => {
            // Delete button on click
            d.addEventListener("click", function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest("tr");

                // Get customer name
                const company = parent.querySelectorAll("td")[0].innerText;
                var kode = $(this).data("id");
                Swal.fire({
                    text: "Are you sure you want to delete " + company + "?",
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
                            url: route("offering-letter-data.destroy", kode),
                            data: {
                                _token: csrf,
                            },
                            success: function (response) {
                                Swal.fire({
                                    text: "You have deleted " + company + "!.",
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
    };

    var initFlatpickr = () => {
        const element = document.querySelector("#filterDate");
        flatpickr = $(element).flatpickr({
            altInput: true,
            altFormat: "d/m/Y",
            dateFormat: "Y-m-d",
            mode: "range",
            onChange: function (selectedDates, dateStr, instance) {
                handleFlatpickr(selectedDates, dateStr, instance);
            },
        });
    };
    // Export

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            handleDeleteRows();
            initFlatpickr();
        },
    };
})();

// On document ready

KTUtil.onDOMContentLoaded(function () {
    // Turbolinks.clearCache();
    CustomerMessages.init();
});
