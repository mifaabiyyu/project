<div class="modal fade" id="edit_customer_card" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="edit_customer_card_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Edit Customer Card</h2>
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
                <form id="edit_customer_card_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="edit_customer_card_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#edit_customer_card_header" data-kt-scroll-wrappers="#edit_customer_card_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="row">
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Customer</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control form-control-solid mb-3 mb-lg-0" data-dropdown-parent="#edit_customer_card" name="customer" data-control="select2" data-placeholder="-- Select Company --" id="edit_company" aria-label="Select example">
                                    <option value=""></option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Product</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control form-control-solid mb-3 mb-lg-0" data-dropdown-parent="#edit_customer_card" name="product" data-control="select2" data-placeholder="-- Select Product --" id="edit_product" aria-label="Select example">
                                    <option value=""></option>
                                    @foreach ($products as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">SSA</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="ssa" id="edit_ssa" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="SSA" />
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">D-50</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="d_50" id="edit_d_50" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="D-50" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">D-98</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="d_98" id="edit_d_98" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="D-98" />
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">CIE 86</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="cie_86" id="edit_cie_86" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="CIE 86" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">ISO 2470</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="iso_2470" id="edit_iso_2470" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="ISO 2470" />
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Moisture</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="moisture" id="edit_moisture" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Moisture" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Residue</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="residue" id="edit_residue" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Residue" />
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7 ">
                                <label class=" fw-bold fs-6 mb-2">Description</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea type="text" name="description" id="edit_description" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Description"></textarea>
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                       
                        <!--end::Input group-->
                        <!--begin::Input group-->
                 
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-customer-card-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-customer-card-edit-modal-action="submit">
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
