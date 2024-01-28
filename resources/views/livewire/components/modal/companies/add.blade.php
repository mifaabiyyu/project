<div class="modal fade" id="add_companies" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_company_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Add Companies</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-companies-modal-action="close">
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
                <form id="add_companies_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_company_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_company_header" data-kt-scroll-wrappers="#kt_modal_add_company_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Company Code</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="code" id="code" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Code" />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Company Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="name" id="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Name" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Company Type</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-control form-control-solid mb-3 mb-lg-0" name="type" id="type" aria-label="Select example">
                                <option selected disabled>--- Select Type Company ---</option>
                                <option value="PT">PT</option>
                                <option value="CV">CV</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Company Address</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="address" id="address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Address"  />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Company Telefon Number</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" name="no_telfon" id="no_telfon" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Telefon Number" />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class=" fw-bold fs-6 mb-2">Company Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="description" id="description"></textarea>
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7 ">
                            <div class="form-group">
                                <label class="required fw-bold fs-6 mb-2">Status</label>
                            <!--begin::Label-->
                                <div class="radio-inline row">
                                    <div class="col-1"></div>
                                    <div class="form-check form-check-custom col-2 radio form-check-success form-check-solid form-check-md">
                                        <input class="form-check-input" type="radio" name="status" value="1" id="flexCheckboxSm"  />
                                        <label class="form-check-label" for="flexCheckboxSm">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom col-3 radio form-check-danger form-check-solid form-check-md">
                                        <input class="form-check-input" type="radio" name="status" value="0" id="flexCheckboxSm"  />
                                        <label class="form-check-label" for="flexCheckboxSm">
                                            Non Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                 
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-companies-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-companies-modal-action="submit">
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
