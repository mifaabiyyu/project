<div class="modal fade" id="transaction_stone" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered " style="max-width :1200px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="machine_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder" id="modalHeaderTransaction"></h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-stone-modal-action="close" data-bs-dismiss="modal">
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
                <form id="transaction_stone_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @method('PUT')
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_company_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#machine_header" data-kt-scroll-wrappers="#kt_modal_add_company_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <table id="transaction_stone_table" class="table table-row-bordered table-row-dashed">
                                <thead>
                                    <tr class="fw-bolder fs-7 text-gray-800 text-center">
                                        <th class="min-w-100px">Date</th>
                                        <th class="min-w-100px">Stock Before</th>
                                        <th class="min-w-100px">QTY Transaction</th>
                                        <th class="min-w-100px">Stock After</th>
                                        <th class="min-w-100px">Reference</th>
                                        <th class="min-w-100px">Type Transaction</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center input-group-sm">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-stone-modal-action="cancel">Close</button>
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
