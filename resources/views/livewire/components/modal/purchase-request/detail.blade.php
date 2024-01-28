<div class="modal fade" id="detail_purchase_request" data-bs-backdrop="static" wire:ignore.self tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered" style="max-width :1000px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="detail_purchase_request_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Detail Purchase Request</h2>
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
                <form id="detail_purchase_request_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="detail_purchase_request_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#detail_purchase_request_header" data-kt-scroll-wrappers="#detail_purchase_request_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="row">
                            <!--begin::Input group-->
                    
                            <div class="col-md-6 fv-row mb-7" wire:ignore>
                                    <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Division</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control form-control-solid mb-3 mb-lg-0" disabled data-control="select2" data-dropdown-parent="#detail_purchase_request" data-placeholder="--- Select Division ---" name="division" id="detail_division" aria-label="Select example">
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
                                <select disabled class="form-control form-control-solid mb-3 mb-lg-0" data-dropdown-parent="#detail_purchase_request" data-placeholder="--- Select Employee ---" name="applicant" id="applicant_detail" aria-label="Select example">
                                    <option ></option>
                                </select>                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Description</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea disabled class="form-control form-control-solid mb-3 mb-lg-0" name="description" data-kt-autosize="true" id="description_detail" cols="" rows="">-</textarea>
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Total</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input disabled class="form-control form-control-solid mb-3 mb-lg-0" name="total_all" id="total_all_detail" readonly >
                                <!--end::Input-->
                            </div>
                        </div>
                        <hr>
                        <h4>List Item</h4>
                       
                        <table class="table text-center m-1"  id="item-request-detail">
                            <!--begin::Table head-->
                            <thead wire:ignore>
                                 <tr class="fw-bolder text-muted text-center">
                                     {{-- <th class="min-w-50">No</th> --}}
                                     <th class="min-w-150px">Item</th>
                                     <th class="min-w-100px">Qty</th>
                                     <th class="min-w-100px">Price</th>
                                     <th class="min-w-100px">Total Price</th>
                                     {{-- <th class="min-w-50px"></th> --}}
                                 </tr>
                             </thead>
                            <!--begin::Table body-->
                            <tbody class="border-1" id="bodyData">
                               
                            </tbody>
                    
                        </table>
                    
                        <hr>
                        <h4>Approval</h4>
                       
                        <table class="table text-center m-1"  id="item-request-approval">
                            <!--begin::Table head-->
                            <thead wire:ignore>
                                 <tr class="fw-bolder text-muted text-center">
                                     {{-- <th class="min-w-50">No</th> --}}
                                     <th class="min-w-50px">No</th>
                                     <th class="min-w-150px">Description</th>
                                     <th class="min-w-100px">Status</th>
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
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-detail-purchase-request-action="cancel">Discard</button>
                        {{-- <button type="submit" class="btn btn-primary" data-kt-detail-purchase-request-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button> --}}
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

       

        $('#applicant_detail').select2({
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

        $('#detail_division').on('change', function (e) {
            $('#applicant_detail').select2({
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
        
        var tabledetail = $("#item-request-detail").DataTable({
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
            tabledetail.rows().eq(0).each( function ( index ) {

                let data    = $("input[name='total_price["+ index +"]").val();

                data        = data.replace(/[^0-9]/g, '');
                total       = parseInt(total) + parseInt(data);
            } );
            $('#total_all_detail').val(formatRupiah(total,'Rp. '));
        }

        var addData = () => {
            let index = tabledetail.rows().count();
            tabledetail.row.add([
                `<input disabled type="text" name="item[${index}]" id="item" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="-- Input Item --" />
                <input disabled type="hidden" name="id_detail[${index}]" `,
                `<input disabled type="text" name="qty[${index}]" id="qty" value="0" onkeyup="changeValue(${index})" class="form-control form-control-solid mb-3 mb-lg-0 qtyData" placeholder="-- Input Qty --" />`,
                `<input disabled type="text" name="price[${index}]" id="price" value="0" onkeyup="changeValue(${index})" class="form-control form-control-solid mb-3 mb-lg-0 priceData" placeholder="-- Input Price --" />`,
                `<input disabled type="text" name="total_price[${index}]" readonly id="total_price" value="0" class="form-control form-control-solid mb-3 mb-lg-0 totalData" placeholder="-- Input Total Price --" />`
               
            ])
            .draw(false);
            totalAll();
        };

        $('#item-request-detail tbody').on( 'click', '#delete-row', function () {
            tabledetail.row( $(this).parents('tr') ).remove().draw();
            totalAll();
        });

    </script>
</div>
