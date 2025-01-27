var rowIndex = "";
var editData = false;
var last = 0;
var products = "";

var datatable = $("#table_item").DataTable({
    paging: false,
    ordering: false,
    // scrollY: "500px",
    scrollCollapse: true,
});

$.ajax({
    url: route("product-data.index"),
    type: "get",
    dataType: "json",
    success: function (response) {
        products = response.data;

        detailData.forEach((el) => {
            datatable.row
                .add([
                    '<select id="product' +
                        last +
                        '" data-placeholder="-- Select Product --" name="product[]" onchange="countItemPrd(this)" data-control="select2" class="form-select products"  data-id=' +
                        last +
                        "><option></option>" +
                        products.map((element) => {
                            return `<option value="${element.id}" ${
                                element.id == el.get_product.id
                                    ? "selected"
                                    : ""
                            }>${element.name}</option>`;
                        }) +
                        `</select>`,
                    `<p id="user${last}">${el.get_product.user}</p>`,
                    `<input type="text" class="bg-transparent form-control" name="qty[]" id="qty${last}" value="${
                        el.qty * 1
                    }" onkeyup="countItem(this)" data-id=${last}>`,
                    `<input type="text" class="bg-transparent form-control" name="unit_price[]" value="${formatRupiah(
                        el.unit_price * 1
                    )}" onkeyup="countItem(this)" id="unit_price${last}" data-id=${last}>`,
                    `<input type="text" class="bg-secondary totalPrice form-control" readonly name="total_price[]" value="${formatRupiah(
                        el.total_price * 1
                    )}"  id="total_price${last}" data-id=${last}>`,

                    ` <a href="javascript:;"  class="btn btn-sm btn-light-danger deleteData " data-id=${last}>
                        <i class="la la-trash-o fs-3"></i>
                        </a>`,
                ])
                .draw(false);

            last++;
        });
        $(".products").select2();
    },
    error: (q, w, e) => {
        Swal.fire({
            title: q.responseJSON.message,
            icon: "error",
            confirmButtonText: "Ok",
        });
    },
});

$("#customer").select2({
    // placeholder: "-- Select Term --",
    // allowClear: true,
    // minimumInputLength: 2,
    ajax: {
        type: "get",
        url: route("customer-data.index"),
        dataType: "json",
        delay: 0,
        processResults: function (res) {
            return {
                results: $.map(res.data, function (item) {
                    return {
                        text: item.name,
                        id: item.id,
                    };
                }),
            };
        },
        cache: true,
    },
});

// $("#date").flatpickr({});

$("#addItem").on("click", function () {
    datatable.row
        .add([
            '<select id="product' +
                last +
                '" data-placeholder="-- Select Product --" name="product[]" onchange="countItem(this)" data-control="select2" class="form-select products"  data-id=' +
                last +
                "><option></option>" +
                products.map((element) => {
                    return `<option value="${element.id}">${element.name}</option>`;
                }) +
                `</select>`,
            `<p id="user${last}"></p>`,
            `<input type="text" class="bg-transparent form-control" name="qty[]" id="qty${last}" onkeyup="countItem(this)" data-id=${last}>`,
            `<input type="text" class="bg-transparent form-control" name="unit_price[]" onkeyup="countItem(this)" id="unit_price${last}" data-id=${last}>`,
            `<input type="text" class="bg-secondary totalPrice form-control" readonly name="total_price[]"  id="total_price${last}" data-id=${last}>`,

            ` <a href="javascript:;"  class="btn btn-sm btn-light-danger deleteData " data-id=${last}>
        <i class="la la-trash-o fs-3"></i>
    </a>`,
        ])
        .draw(false);

    last++;
    $(".products").select2();
});

$("#table_item tbody").on("click", ".deleteData", function () {
    let thisData = $(this).parents("tr");
    Swal.fire({
        text: "Are you sure you want to delete item ?",
        icon: "warning",
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: "Yes, delete !",
        cancelButtonText: "No, cancel",
        customClass: {
            confirmButton: "btn fw-bold btn-danger",
            cancelButton: "btn fw-bold btn-active-light-primary",
        },
    }).then(function (result) {
        if (result.value) {
            datatable.row(thisData).remove().draw(false);

            toastr.success("item deleted successfully !", options);
        }
    });
});

const countItemPrd = (t) => {
    var idData = t.getAttribute("data-id");
    var valueProduct = $("#product" + idData).val();

    if (
        $("#unit_price" + idData).val() == 0 ||
        $("#unit_price" + idData).val() == ""
    ) {
        const valPrd = products.find((element) => element.id == valueProduct);
        $("#unit_price" + idData).val(formatRupiah(valPrd.unit_price * 1));
        $("#user" + idData).html(valPrd.user);
    }

    var qtyData = $("#qty" + idData)
        .val()
        .split(".")
        .join("");
    var unitPriceData = $("#unit_price" + idData)
        .val()
        .split(".")
        .join("");
    var totalSub = qtyData * unitPriceData;
    // console.log(qtyData);
    totalSub = totalSub.toString();
    $("#total_price" + idData).val(formatRupiah(totalSub));

    var total = 0; //
    var list = document.getElementsByClassName("totalPrice");
    var values = [];
    for (var i = 0; i < list.length; ++i) {
        values.push(parseInt(list[i].value.split(".").join("")));
    }
    total = values.reduce(function (previousValue, currentValue, index, array) {
        return previousValue + currentValue;
    });

    $("#total_all").html(formatRupiah(total.toString(), "Rp. "));
    // document.getElementById("total_all").html = rupiah(total);
};

const countItem = (t) => {
    var idData = t.getAttribute("data-id");

    var qtyData = $("#qty" + idData)
        .val()
        .split(".")
        .join("");
    var unitPriceData = $("#unit_price" + idData)
        .val()
        .split(".")
        .join("");
    $("#unit_price" + idData).val(formatRupiah(unitPriceData.toString()));
    var totalSub = qtyData * unitPriceData;
    totalSub = totalSub.toString();

    $("#total_price" + idData).val(formatRupiah(totalSub));

    var total = 0; //
    var list = document.getElementsByClassName("totalPrice");
    var values = [];
    for (var i = 0; i < list.length; ++i) {
        values.push(parseInt(list[i].value.split(".").join("")));
    }
    total = values.reduce(function (previousValue, currentValue, index, array) {
        return previousValue + currentValue;
    });

    $("#total_all").html(formatRupiah(total.toString(), "Rp. "));
    // document.getElementById("total_all").html = rupiah(total);
};
