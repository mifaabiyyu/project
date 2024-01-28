var filterData = {};
var apexChartOrder;
var myChart;
// Define colors
var primaryColor = KTUtil.getCssVariableValue("--bs-primary");
var dangerColor = KTUtil.getCssVariableValue("--bs-danger");
var successColor = KTUtil.getCssVariableValue("--bs-success");
var warningColor = KTUtil.getCssVariableValue("--bs-warning");
var infoColor = KTUtil.getCssVariableValue("--bs-info");

KTUtil.onDOMContentLoaded(function () {
    var chartOrders = () => {
        var year = $.ajax({
            type: "GET",
            data: { _token: csrf, filterData },
            url: route("customer.get-statistic", customerId),
            success: function (response) {
                var totalProfit = [];
                var monthYear = [];
                var dataSeries = [];
                var responseData = response.data;
                var responseYear = response.year;

                if (typeof responseYear === "object" && responseYear !== null) {
                    responseYear = Object.values(responseYear);
                }

                var month = [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December",
                ];

                responseYear.forEach((element) => {
                    var totalMonth = [];
                    month.forEach((mnth) => {
                        var price = 0;
                        responseData.forEach((data, index) => {
                            if (mnth == data.month) {
                                return (price = data.total_price);
                            }
                        });
                        totalMonth.push(price);
                    });
                    dataSeries.push({
                        name: element,
                        data: totalMonth,
                    });
                });

                var options = {
                    chart: {
                        height: 300,
                        type: "bar",
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: ["50%"],
                            endingShape: "rounded",
                            borderRadius: 10,
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ["transparent"],
                    },
                    series: dataSeries,
                    fill: {
                        opacity: 1,
                    },
                    xaxis: {
                        categories: month,
                    },
                    yaxis: {
                        labels: {
                            formatter: function (value) {
                                return rupiah(value);
                            },
                        },
                    },
                    tooltip: {
                        style: { fontSize: "12px" },
                        y: {
                            formatter: function (e) {
                                return rupiah(e);
                            },
                        },
                    },
                };

                apexChartOrder = new ApexCharts(
                    document.querySelector("#line_chart"),
                    options
                );

                apexChartOrder.render();
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
    };

    var updatChartOrders = () => {
        var year = $.ajax({
            type: "GET",
            data: { _token: csrf, date: filterData.date },
            url: route("customer.get-statistic", customerId),
            success: function (response) {
                var totalProfit = [];
                var monthYear = [];
                var dataSeries = [];
                var responseData = response.data;
                var responseYear = response.year;
                if (typeof responseYear === "object" && responseYear !== null) {
                    responseYear = Object.values(responseYear);
                }
                var month = [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December",
                ];

                responseYear.forEach((element) => {
                    var totalMonth = [];
                    month.forEach((mnth) => {
                        var price = 0;
                        responseData.forEach((data, index) => {
                            if (mnth == data.month && element == data.year) {
                                return (price = data.total_price);
                            }
                        });
                        totalMonth.push(price);
                    });
                    dataSeries.push({
                        name: element,
                        data: totalMonth,
                    });
                });

                apexChartOrder.updateSeries(dataSeries);
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
    };

    chartOrders();

    // Chart Profit
    $("#yearFilter").on("change", function () {
        const date = $("#yearFilter").val();
        filterData.date = date;
        updatChartOrders();
        // console.log(date);
    });

    // PIE CHART
    const createChartProduct = () => {
        var ctx = document.getElementById("piechart");

        // Define fonts
        var fontFamily = KTUtil.getCssVariableValue("--bs-font-sans-serif");

        $.ajax({
            type: "GET",
            data: { _token: csrf, date: filterData.dateprd },
            url: route("customer.getStatisticCustomerProduct", customerId),
            success: function (response) {
                var arrayResponse = Object.entries(response.data);

                var label = [];
                var value = [];
                arrayResponse.forEach((element) => {
                    $("#product_statistic_table").append(
                        "<tr><td>" +
                            element[0] +
                            "</td><td>" +
                            element[1] +
                            " KG</td></tr>"
                    );
                    label.push(element[0]);
                    value.push(element[1]);
                });

                // Chart labels
                const labels = label;

                // Chart data
                const data = {
                    labels: labels,
                    datasets: [
                        {
                            label: "My First Dataset",
                            data: value,
                            backgroundColor: [
                                primaryColor,
                                dangerColor,
                                successColor,
                                warningColor,
                                infoColor,
                            ],
                            hoverOffset: 4,
                        },
                    ],
                };

                // Chart config
                const config = {
                    type: "doughnut",
                    data: data,
                    options: {
                        plugins: {
                            title: {
                                display: false,
                            },
                        },
                        responsive: true,
                    },
                    defaults: {
                        global: {
                            defaultFont: fontFamily,
                        },
                    },
                };

                // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
                myChart = new Chart(ctx, config);
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
    };

    createChartProduct();

    const updateChartProduct = () => {
        $.ajax({
            type: "GET",
            data: { _token: csrf, date: filterData.dateprd },
            url: route("customer.getStatisticCustomerProduct", customerId),
            success: function (response) {
                var arrayResponse = Object.entries(response.data);
                $("#product_statistic_table > tbody").empty();
                var label = [];
                var value = [];
                arrayResponse.forEach((element) => {
                    $("#product_statistic_table").append(
                        "<tr><td>" +
                            element[0] +
                            "</td><td>" +
                            element[1] +
                            " KG</td></tr>"
                    );
                    label.push(element[0]);
                    value.push(element[1]);
                });

                // Chart labels
                const labels = label;

                // Chart data
                const data = {
                    labels: labels,
                    datasets: [
                        {
                            label: "My First Dataset",
                            data: value,
                            backgroundColor: [
                                primaryColor,
                                dangerColor,
                                successColor,
                                warningColor,
                                infoColor,
                            ],
                            hoverOffset: 4,
                        },
                    ],
                };

                myChart.data = data;

                // arrayResponse.forEach((element) => {
                //     myChart.data.labels.push(element[0]);
                //     myChart.data.datasets.forEach((dataset) => {
                //         dataset.data.push(element[1]);
                //     });
                // });

                myChart.update();
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
    };

    // Chart Profit
    $("#dateFilterPrd").on("change", function () {
        const date = $("#dateFilterPrd").val();
        filterData.dateprd = date;
        updateChartProduct();
        // console.log(date);
    });

    $("#clearDatePrd").on("click", function () {
        $("#dateFilterPrd").val("");
        const date = $("#dateFilterPrd").val();
        filterData.date = date;

        updateChartProduct();
    });
});
