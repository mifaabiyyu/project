<div class="modal fade" id="edit_omset_sales" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered " style="max-width: 1700px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="packingType_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Edit Omset</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-omset-action="close">
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
            <div class="modal-body scroll-y  my-7">
                <!--begin::Form-->
                <form id="edit_omset_sales_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_company_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#packingType_header" data-kt-scroll-wrappers="#kt_modal_add_company_scroll" data-kt-scroll-offset="300px">
                        <table id="edit_omset_table" class="table table-row-bordered table-row-dashed">
                            <thead>
                                <tr class="fw-bolder fs-7 text-gray-800 text-center">
                                    <th class="min-w-50px">No SJ</th>
                                    <th class="min-w-50px">Customer</th>
                                    <th class="min-w-25px">Product</th>
                                    <th class="min-w-70px">No Invoice</th>
                                    <th>Top</th>
                                    <th class="min-w-70px">Jatuh Tempo</th>
                                    <th class="min-w-50px">DPP</th>
                                    <th class="min-w-50px">PPN</th>
                                    <th class="min-w-50px">Amount</th>
                                    <th class="min-w-50px">QTY</th>
                                    <th class="min-w-50px">Price</th>
                                    <th class="min-w-50px">Diskon</th>
                                    <th class="min-w-50px">Sub Amount</th>
                                </tr>
                            </thead>
                            <tbody class="text-center input-group-sm">
                            </tbody>
                        </table>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-omset-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-omset-action="submit">
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
</div>
