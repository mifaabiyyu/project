<div class="modal fade" id="edit_stone_purchase_lab" wire:ignore.self tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered" style="max-width :1200px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="edit_stone_purchase_lab_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder" id="headerLab" wire:ignore></h2>
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
                <form id="edit_stone_purchase_lab_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="edit_stone_purchase_lab_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#edit_stone_purchase_lab_header" data-kt-scroll-wrappers="#edit_stone_purchase_lab_scroll" data-kt-scroll-offset="300px">
                        <div class="fv-row row mb-5">
                            <div class="col-md-6">
                                <label class=" fw-bold fs-6 mb-2">Supplier</label>
                                <input type="text" class="form-control form-control-transparent" readonly name="supplier" id="edit_supplier" placeholder="Supplier" />
                            </div>
                            <div class="col-md-6">
                                <label class=" fw-bold fs-6 mb-2">Nopol Kendaraan</label>
                                <input type="text" class="form-control form-control-transparent" readonly name="nopol_kendaraan" id="edit_nopol_kendaraan" placeholder="Nopol Kendaraan" />
                            </div>
                        </div>
                        <div class="fv-row row mb-5">
                            <div class="col-md-4">
                                <label class=" fw-bold fs-6 mb-2">CACO3</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-solid" name="caco3" id="edit_caco3" placeholder="CACO3" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class=" fw-bold fs-6 mb-2">MGCO3</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-solid" name="mgco3" id="edit_mgco3" value="0" placeholder="MGCO3" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class=" fw-bold fs-6 mb-2">CIE 85</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-solid" name="cie_85" id="edit_cie_85" placeholder="CIE 85" />
                                </div>
                            </div>
                        </div>
                        <div class="fv-row row mb-5">
                            <div class="col-md-4">
                                <label class=" fw-bold fs-6 mb-2">ISO 2470</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-solid" name="iso_2470" id="edit_iso_2470" placeholder="ISO 2470" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class=" fw-bold fs-6 mb-2">Moisture</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-solid" name="moisture" id="edit_moisture" placeholder="Moisture" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Description</label>
                                <!--end::Label-->
                                <textarea name="description" id="edit_description" class="form-control form-control-solid" data-kt-autosize="true"></textarea>
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                 
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-edit-stone-purchase-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-edit-stone-purchase-modal-action="submit">
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
