"use strict";

// Class definition
var OmsetDataTable = (function () {
    // Shared variables
    // Turbolinks.clearCache();
    var table;
    var oTable;
    var filterCompany;
    var filterStatus = "";
    var filterData = {};
    // Private functions

    var start = moment().subtract(29, "days");
    var end = moment();

    function cb(start, end) {
        $("#dateFilter").html(
            start.format("MMMM D, YYYY") + "-" + end.format("MMMM D, YYYY")
        );
    }

    $("#dateFilter").daterangepicker(
        {
            startDate: start,
            endDate: end,
            ranges: {
                Today: [moment(), moment()],
                Yesterday: [
                    moment().subtract(1, "days"),
                    moment().subtract(1, "days"),
                ],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [
                    moment().startOf("month"),
                    moment().endOf("month"),
                ],
                "Last Month": [
                    moment().subtract(1, "month").startOf("month"),
                    moment().subtract(1, "month").endOf("month"),
                ],
                "This Year": [moment().startOf("year"), moment().endOf("year")],
                "Last Year": [
                    moment().subtract(1, "year").startOf("year"),
                    moment().subtract(1, "year").endOf("year"),
                ],
            },
        },
        cb
    );

    cb(start, end);
    const date = $("#dateFilter").val();
    filterData.date = date;
    var initDatatable = function () {
        oTable = $("#omset_table").DataTable({
            processing: true,
            serverSide: true,
            retrieve: true,
            ajax: {
                data: (d) => Object.assign(d, filterData),
                url: route("omset-data.index"),
            },
            columns: [
                {
                    data: "delivery_date",

                    render: function (data, type) {
                        var time = moment(data).format("DD-MM-YYYY");
                        return time;
                    },
                },
                { data: "total_customer", searchable: false },
                {
                    data: "sub_total_qty",
                    searchable: false,
                    render: function (data, type, row) {
                        var weight = data / 1000;
                        return weight + " Ton";
                    },
                },
                {
                    data: "sub_total_price",
                    render: function (data, type, row) {
                        return rupiah(data);
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
                          
                            <a href="javascript:void(0)" id="edit-data" data-id="` +
                            row.delivery_date +
                            `" class="btn btn-icon btn-bg-light btn-primary btn-active-color-secondary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#edit_omset_sales">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
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

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options

        $("#dateFilter").on("change", function () {
            const date = $("#dateFilter").val();
            filterData.date = date;

            oTable.draw(false);
        });

        $("#kt_ecommerce_sales_flatpickr_clear").on("click", function () {
            $("#dateFilter").val("");
            const date = $("#dateFilter").val();
            filterData.date = date;

            oTable.draw(false);
        });
    };

    // Delete customer
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll(
            '[data-kt-delivery-orders-table-filter="delete_row"]'
        );

        deleteButtons.forEach((d) => {
            // Delete button on click
            d.addEventListener("click", function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest("tr");

                // Get customer name
                const deliveryOrder =
                    parent.querySelectorAll("td")[0].innerText;
                var kode = $(this).data("id");
                Swal.fire({
                    text:
                        "Are you sure you want to delete " +
                        deliveryOrder +
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
                        $.ajax({
                            type: "DELETE",
                            url: route("delivery-order-data.destroy", kode),
                            data: {
                                _token: csrf,
                            },
                            success: function (response) {
                                Swal.fire({
                                    text:
                                        "You have deleted " +
                                        deliveryOrder +
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

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleFilterDatatable();
            handleDeleteRows();
        },
    };
})();

// On document ready

KTUtil.onDOMContentLoaded(function () {
    OmsetDataTable.init();
});
