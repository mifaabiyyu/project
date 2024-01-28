<div class="modal fade" id="edit_product" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="edit_product_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder" id="headerModal"></h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-products-modal-action="close">
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
                <form id="edit_product_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->

                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="edit_product_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#edit_product_header" data-kt-scroll-wrappers="#edit_product_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 text-center">
                            <!--begin::Label-->
                            <label class="d-block fw-bold fs-6 mb-5">Image</label>
                            <!--end::Label-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-125px h-125px" id="image-input-wrapper" style="background-image: url(./../img.png);"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" id="edit_photo" name="photo" accept=".png, .jpg, .jpeg, .svg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Product Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="name" id="edit_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Product name" />
                            <!--end::Input-->
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Product Code</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="code" id="edit_code" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Product code" />
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Stock</label>
                                <div class="input-group mb-5">
                                    <input type="number" name="stock" id="edit_stock" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Stock" aria-label="Weight" aria-describedby="basic-addon1"/>
                                    <span class="input-group-text" id="basic-addon1">Sack</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Product Type</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="product_type" id="edit_product_type" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Product Type"/>
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Weight</label>
                                <div class="input-group mb-5">
                                    <input type="number" name="weight" id="edit_weight" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Weight" aria-label="Weight" aria-describedby="basic-addon1"/>
                                    <span class="input-group-text" id="basic-addon1">KG</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Mesh</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="mesh" id="edit_mesh" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Mesh"/>
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">SSA</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="ssa" id="edit_ssa" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="SSA"/>
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">D-50</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="d_50" id="edit_d_50" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="D-50"/>
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">D-98</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="d_98" id="edit_d_98" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="D-98"/>
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">CIE 86</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="cie_86" id="edit_cie_86" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="CIE 86"/>
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">ISO 2470</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="iso_2470" id="edit_iso_2470" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="ISO 2470"/>
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Residue</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="residue" id="edit_residue" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Residue"/>
                                <!--end::Input-->
                            </div>
                            <!--begin::Input group-->
                     
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Moisture</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="moisture" id="edit_moisture" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Moisture"/>
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <div class="form-group">
                                    <label class="required fw-bold fs-6 mb-2">Status</label>
                                    <!--begin::Label-->
                                    <div class="radio-inline mt-1 row">
                                        <div class="col-1"></div>
                                        <div class="form-check form-check-custom col-3 radio form-check-success form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" name="status" value="1" id="edit_status"  />
                                            <label class="form-check-label" for="flexCheckboxSm">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom col-4 radio form-check-danger form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" name="status" value="0" id="edit_status"  />
                                            <label class="form-check-label" for="flexCheckboxSm">
                                                Non Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="fv-row mb-7 ">
                            <label class="required fw-bold fs-6 mb-2">Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea type="text" name="description" id="edit_description" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Description"></textarea>
                            <!--end::Input-->
                           
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                 
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-products-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-products-modal-action="submit">
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
