"use strict";

// Class definition
var CompaniesDatatable = (function () {
    // Shared variables
    // Turbolinks.clearCache();
    var table;
    var oTable;
    var filterPayment;
    var filterData = {};
    // Private functions
    var initDatatable = function () {
        oTable = $("#companies_table").DataTable({
            processing: true,
            serverSide: true,
            retrieve: true,
            searchDelay: false,
            ajax: {
                data: (d) => Object.assign(d, filterData),
                url: route("company-data.index"),
            },
            columns: [
                { data: "code" },
                { data: "name" },
                { data: "type", searchable: false },
                { data: "address" },
                {
                    data: "status",
                    searchable: false,
                    render: function (data, type, row) {
                        var color = "";
                        var status = "";
                        if (data == 1) {
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
                        <a data-bs-toggle="modal" data-bs-target="#show_companies" id="show-data" data-id="` +
                            row.id +
                            `" href="javascript:void(0)"  class="btn btn-icon btn-bg-light btn-success btn-active-color-secondary btn-sm me-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
                                    <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-id="` +
                            row.id +
                            `" data-bs-target="#edit_companies" id="edit-data" class="btn btn-icon btn-bg-light btn-primary btn-active-color-secondary btn-sm me-1">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <a href="javascript:void(0)" data-id="` +
                            row.id +
                            `" data-kt-roles-table-filter="delete_row" class="btn btn-icon btn-bg-light btn-danger btn-active-color-secondary btn-sm">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
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
            '[data-kt-roles-table-filter="search"]'
        );
        filterSearch.addEventListener("change", function (e) {
            oTable.search(e.target.value).draw();
        });
    };

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        const filterButton = document.querySelector(
            '[data-kt-company-table-filter="filter"]'
        );
        // Filter datatable on submit
        filterButton.addEventListener("click", function () {
            var filterType = document.getElementById("typeFilter").value;
            var filterStatus = $("input[id='statusFilter']:checked").val();

            if (filterType != null) {
                filterData.type = filterType;
            }

            if (filterStatus != null) {
                filterData.status = filterStatus;
            }

            oTable.draw(false);
        });
    };

    // Delete customer
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll(
            '[data-kt-roles-table-filter="delete_row"]'
        );

        deleteButtons.forEach((d) => {
            // Delete button on click
            d.addEventListener("click", function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest("tr");

                // Get customer name
                const companyName = parent.querySelectorAll("td")[1].innerText;
                var kode = $(this).data("id");
                // SweetAlert2 pop up --- official user reference: https://sweetalert2.github.io/
                Swal.fire({
                    text:
                        "Are you sure you want to delete " + companyName + "?",
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
                            url: route("company-data.destroy", kode),
                            data: {
                                _token: csrf,
                            },
                            success: function (response) {
                                Swal.fire({
                                    text:
                                        "You have deleted " +
                                        companyName +
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
                            text: companyName + " was not deleted.",
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

    // Reset Filter
    var handleResetForm = () => {
        // Select reset button
        const resetButton = document.querySelector(
            '[data-kt-company-table-filter="reset"]'
        );

        // Reset datatable
        resetButton.addEventListener("click", function () {
            // Reset payment type
            filterData = {};

            // Reset datatable --- official user reference: https://datatables.net/reference/api/search()
            oTable.draw(false);
        });
    };

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            handleDeleteRows();
            handleResetForm();
            handleFilterDatatable();
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    CompaniesDatatable.init();
});
// On document ready
