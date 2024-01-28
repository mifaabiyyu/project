"use strict";

// Class definition
var CustomerDetailDataTable = (function () {
    var oTable;
    var filterData = {};
    var table;
    var filterData = {};
    // Private functions

    var start = moment().subtract(29, "days");
    var end = moment();

    function cb(start, end) {
        $("#dateFilter").html(
            start.format("MMMM D, YYYY") + "-" + end.format("MMMM D, YYYY")
        );
        $("#dateFilterPrd").html(
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
            },
        },
        cb
    );

    $("#dateFilterPrd").daterangepicker(
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
            },
        },
        cb
    );

    cb(start, end);

    var initDatatable = function () {
        oTable = $("#customer_detail_table").DataTable({
            processing: true,
            serverSide: true,
            retrieve: true,
            ajax: {
                data: (d) => Object.assign(d, filterData),
                url: route("customer.detail-table", customerId),
            },
            columns: [
                { data: "code" },
                {
                    data: "status",
                    render: function (data, type, row) {
                        var color = "";
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
                {
                    data: "created_at",
                    render: function (data, type) {
                        var time = moment(data).format("DD-MM-YYYY");
                        return time;
                    },
                },
                {
                    data: "total_price",
                    render: $.fn.dataTable.render.number(".", ",", 2, "Rp. "),
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
                            <a href="` +
                            route("customerOrder.print", row.code) +
                            `" target="_blank" class="btn btn-icon btn-bg-light btn-success btn-active-color-secondary btn-sm me-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <i class="fas fa-print"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            <a href="` +
                            route("customerOrder.edit", row.code) +
                            `" id="edit-data" class="btn btn-icon btn-bg-light btn-primary btn-active-color-secondary btn-sm me-1">
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
            footerCallback: function (row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === "string"
                        ? i.replace(/[\$,]/g, "") * 1
                        : typeof i === "number"
                        ? i
                        : 0;
                };

                // Total over all pages
                var total = api
                    .column(3)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                var pageTotal = api
                    .column(3, {
                        page: "current",
                    })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(3).footer()).html(
                    rupiah(pageTotal) + " ( " + rupiah(total) + " total)"
                );
            },
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
            KTMenu.createInstances();
        });
    };

    // Search Datatable --- official user reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector(
            '[data-kt-customer-orders-table-filter="search"]'
        );
        filterSearch.addEventListener("change", function (e) {
            oTable.search(e.target.value).draw();
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

    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            handleFilterDatatable();
        },
    };
})();

// On document ready

KTUtil.onDOMContentLoaded(function () {
    // Turbolinks.clearCache();

    CustomerDetailDataTable.init();
});
