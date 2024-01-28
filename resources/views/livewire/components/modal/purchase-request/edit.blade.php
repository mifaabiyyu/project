<div class="modal fade" id="edit_purchase_request" data-bs-backdrop="static" wire:ignore.self tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered" style="max-width :1000px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="edit_purchase_request_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Edit Purchase Request</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-customer-card-modal-action="close" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="edit_purchase_request_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="edit_purchase_request_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#edit_purchase_request_header" data-kt-scroll-wrappers="#edit_purchase_request_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="row">
                            <!--begin::Input group-->
                    
                            <div class="col-md-6 fv-row mb-7" wire:ignore>
                                    <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Division</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control form-control-solid mb-3 mb-lg-0" data-control="select2" data-dropdown-parent="#edit_purchase_request" data-placeholder="--- Select Division ---" name="division" id="edit_division" aria-label="Select example">
                                    <option ></option>
                                    @foreach ($divisions as $divison)
                                        <option value="{{ $divison->id }}">{{ $divison->name }}</option>
                                    @endforeach
                                </select>                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7" wire:ignore>
                                    <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Applicant</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control form-control-solid mb-3 mb-lg-0" data-dropdown-parent="#edit_purchase_request" data-placeholder="--- Select Employee ---" name="applicant" id="applicant_edit" aria-label="Select example">
                                    <option ></option>
                                </select>                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Description</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="description" data-kt-autosize="true" id="description_edit" cols="" rows="">-</textarea>
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Total</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid mb-3 mb-lg-0" name="total_all" id="total_all_edit" readonly >
                                <!--end::Input-->
                            </div>
                        </div>
                        <hr>
                        <h4>List Item</h4>
                        <div class="text-end">
                            <button class="btn btn-success text-right" onclick="addDataEdit()">Add Item</button>
                        </div>
                        <table class="table text-center m-1"  id="item-request-edit">
                            <!--begin::Table head-->
                            <thead wire:ignore>
                                 <tr class="fw-bolder text-muted text-center">
                                     {{-- <th class="min-w-50">No</th> --}}
                                     <th class="min-w-150px">Item</th>
                                     <th class="min-w-100px">Qty</th>
                                     <th class="min-w-100px">Price</th>
                                     <th class="min-w-100px">Total Price</th>
                                     <th class="min-w-50px"></th>
                                 </tr>
                             </thead>
                            <!--begin::Table body-->
                            <tbody class="border-1" id="bodyData">
                               
                            </tbody>
                    
                        </table>
                    
             
                        <!--end::Input group-->
                       
                        <!--end::Input group-->
                        <!--begin::Input group-->
                 
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-edit-purchase-request-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-edit-purchase-request-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->

    <script>
        function formatRupiah(angka, prefix) {
            angka = angka.toString();

            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }

       

        $('#applicant_edit').select2({
            placeholder: "-- Select Applicant --",
            allowClear: true,
            ajax: {
                url: route("employee-data.index"),
                dataType: "json",
                delay: 0,
                processResults: function (response) {
                    return {
                        results: $.map(response.data, function (item) {
                            let text = item.name + ` ( ${item.get_division ? item.get_division.name : '-'} )`;
                            return {
                                text: text,
                                id: item.name,
                            };
                        }),
                    };
                },
                cache: true,
            },
        });

        $('#edit_division').on('change', function (e) {
            $('#applicant_edit').select2({
                placeholder: "-- Select Applicant --",
                allowClear: true,
                ajax: {
                    url: route("employee-data.index"),
                    dataType: "json",
                    data : {
                        'division' : e.target.value
                    },
                    delay: 0,
                    processResults: function (response) {
                        return {
                            results: $.map(response.data, function (item) {
                                let text = item.name + ` ( ${item.get_division ? item.get_division.name : '-'} )`;
                                return {
                                    text: text,
                                    id: item.name,
                                };
                            }),
                        };
                    },
                    cache: true,
                },
            });
        })
        
        var tableEdit = $("#item-request-edit").DataTable({
            paging: false,
            ordering: false,
            scrollY: "400px",
            scrollCollapse: true,
        });
        
        var changeValue = (index) => {
      
            let qty = $("input[name='qty["+ index +"]").val();
            let price = $("input[name='price["+ index +"]']").val();
        
            let count   = qty * price;

            $("input[name='total_price["+ index +"]").val(formatRupiah(count,'Rp. '));

            totalAll();
        };

        var totalAll = () => {
            let total   = 0;
            tableEdit.rows().eq(0).each( function ( index ) {

                let data    = $("input[name='total_price["+ index +"]").val();

                data        = data.replace(/[^0-9]/g, '');
                total       = parseInt(total) + parseInt(data);
            } );
            $('#total_all_edit').val(formatRupiah(total,'Rp. '));
        }

        var addDataEdit = () => {
            let index = tableEdit.rows().count();
            tableEdit.row.add([
                `<input type="text" name="item[${index}]" id="item" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="-- Input Item --" />
                <input type="hidden" name="id_detail[${index}]" `,
                `<input type="text" name="qty[${index}]" id="qty" value="0" onkeyup="changeValue(${index})" class="form-control form-control-solid mb-3 mb-lg-0 qtyData" placeholder="-- Input Qty --" />`,
                `<input type="text" name="price[${index}]" id="price" value="0" onkeyup="changeValue(${index})" class="form-control form-control-solid mb-3 mb-lg-0 priceData" placeholder="-- Input Price --" />`,
                `<input type="text" name="total_price[${index}]" readonly id="total_price" value="0" class="form-control form-control-solid mb-3 mb-lg-0 totalData" placeholder="-- Input Total Price --" />`,
                `<a href="javascript:void(0)" id="delete-row" class="btn btn-icon btn-bg-light btn-danger btn-active-color-secondary btn-sm">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>`
            ])
            .draw(false);
            totalAll();
        };

        $('#item-request-edit tbody').on( 'click', '#delete-row', function () {
            tableEdit.row( $(this).parents('tr') ).remove().draw();
            totalAll();
        });

    </script>
</div>
