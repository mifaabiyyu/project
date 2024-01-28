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

        datatable.row
            .add([
                '<select id="product' +
                    last +
                    '" data-placeholder="-- Select Product --" name="product[]" data-control="select2" class="form-select products"  data-id=' +
                    last +
                    "><option></option>" +
                    products.map((element) => {
                        return `<option value="${element.id}">${element.name}</option>`;
                    }) +
                    `</select>`,
                `<input type="text" class="bg-transparent form-control" name="qty[]" id="qty${last}" onchange="countItem(this)" data-id=${last}>`,
                `<input type="text" class="bg-transparent form-control" name="unit_price[]" onchange="countItem(this)" id="unit_price${last}" data-id=${last}>`,
                `<input type="text" class="bg-secondary totalPrice form-control" readonly name="total_price[]"  id="total_price${last}" data-id=${last}>`,

                ` <a href="javascript:;"  class="btn btn-sm btn-light-danger deleteData " data-id=${last}>
                    <i class="la la-trash-o fs-3"></i>
                    </a>`,
            ])
            .draw(false);

        last++;
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
                '" data-placeholder="-- Select Product --" name="product[]" data-control="select2" class="form-select products"  data-id=' +
                last +
                "><option></option>" +
                products.map((element) => {
                    return `<option value="${element.id}">${element.name}</option>`;
                }) +
                `</select>`,
            `<input type="text" class="bg-transparent form-control" name="qty[]" id="qty${last}" onchange="countItem(this)" data-id=${last}>`,
            `<input type="text" class="bg-transparent form-control" name="unit_price[]" onchange="countItem(this)" id="unit_price${last}" data-id=${last}>`,
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

const countItem = (t) => {
    var idData = t.getAttribute("data-id");
    var qtyData = $("#qty" + idData).val();
    var unitPriceData = $("#unit_price" + idData).val();

    $("#total_price" + idData).val(qtyData * unitPriceData);

    var total = 0; //
    var list = document.getElementsByClassName("totalPrice");
    var values = [];
    for (var i = 0; i < list.length; ++i) {
        values.push(parseFloat(list[i].value));
    }
    total = values.reduce(function (previousValue, currentValue, index, array) {
        return previousValue + currentValue;
    });
    $("#total_all").html(rupiah(total));
    // document.getElementById("total_all").html = rupiah(total);
};
