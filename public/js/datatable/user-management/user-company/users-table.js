"use strict";

// Class definition
var UserDatatable = (function () {
    // Shared variables
    var table;
    var oTable;
    var filterRoles;
    var filterStatus;
    var filterData = {};
    // Turbolinks.clearCache();
    // Private functions
    var initDatatable = function () {
        oTable = $("#user_table").DataTable({
            processing: true,
            serverSide: true,
            retrieve: true,
            ajax: {
                data: (d) => Object.assign(d, filterData),
                url: route("user-company-data.index"),
            },
            columns: [
                {
                    data: "name",
                    render: function (data, type, row) {
                        return (
                            `<div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <span class="symbol-label bg-light">
                                        <img
                                            src="../images/user/` +
                            row.photo +
                            `"
                                            class="h-75 align-self-end"
                                            alt=""
                                        />
                                    </span>
                                </div>
                                <div class="d-flex justify-content-start flex-column">
                                    <a
                                        href="#"
                                        class="text-dark fw-bolder text-hover-primary mb-1 fs-6"
                                    >
                                        ` +
                            row.name +
                            `
                                    </a>
                                    
                                </div>
                            </div>`
                        );
                    },
                },
                { data: "email" },
                {
                    data: "status",
                    render: function (data, type) {
                        var color = "";
                        var status = "";
                        if (data == 1) {
                            color = "success";
                            status = "Active";
                        } else {
                            color = "danger";
                            status = "Non Active";
                        }

                        return (
                            '<span class="font-bolder text-center badge badge-light-' +
                            color +
                            '">' +
                            status +
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
                    className: "text-end",
                    render: function (data, type, row) {
                        return (
                            `
                        <div class="d-flex justify-content-center flex-shrink-0">
                         
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-id="` +
                            row.id +
                            `" data-bs-target="#kt_modal_edit_user" id="edit-data" class="btn btn-icon btn-bg-light btn-primary btn-active-color-secondary btn-sm me-1">
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
                            `" data-kt-user-table-filter="delete_row" class="btn btn-icon btn-bg-light btn-danger btn-active-color-secondary btn-sm">
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
            '[data-kt-user-table-filter="search"]'
        );
        filterSearch.addEventListener("change", function (e) {
            oTable.search(e.target.value).draw();
        });
    };

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        const filterButton = document.querySelector(
            '[data-kt-user-table-filter="filter"]'
        );
        // Filter datatable on submit
        filterButton.addEventListener("click", function () {
            filterRoles = document.getElementById("role").value;
            filterStatus = document.getElementById("statusFilter").value;

            if (filterRoles != null) {
                filterData.role = filterRoles;
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
            '[data-kt-user-table-filter="delete_row"]'
        );

        deleteButtons.forEach((d) => {
            // Delete button on click
            d.addEventListener("click", function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest("tr");

                // Get customer name
                const user = parent.querySelectorAll("td")[1].innerText;
                var kode = $(this).data("id");
                Swal.fire({
                    text: "Are you sure you want to delete " + user + "?",
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
                            url: route("user-company-data.destroy", kode),
                            data: {
                                _token: csrf,
                            },
                            success: function (response) {
                                Swal.fire({
                                    text: "You have deleted " + user + "!.",
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
                            text: user + " was not deleted.",
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
            '[data-kt-user-table-filter="reset"]'
        );

        // Reset datatable
        resetButton.addEventListener("click", function () {
            // Reset payment type
            $("option:selected").prop("selected", false);

            filterData = {};

            // Reset datatable --- official user reference: https://datatables.net/reference/api/search()
            oTable.draw(false);
        });
    };

    // Export

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            // handleFilterDatatable();
            handleDeleteRows();
            handleResetForm();
        },
    };
})();

// On document ready

KTUtil.onDOMContentLoaded(function () {
    UserDatatable.init();
});
