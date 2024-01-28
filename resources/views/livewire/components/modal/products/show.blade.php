<div class="modal fade" id="show_product" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="show_product_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder" id="headerModalShow"></h2>
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
                <form id="show_product_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->

                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="show_product_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#show_product_header" data-kt-scroll-wrappers="#show_product_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 text-center">
                            <!--begin::Label-->
                            <label class="d-block fw-bold fs-6 mb-5">Products</label>
                            <!--end::Label-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-125px h-125px" id="image-input-wrapper-show" style="background-image: url(./../img.png);"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                               
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                   
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <!--end::Hint-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Product Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" readonly name="name" id="show_name" class="form-control form-control-transparent mb-3 mb-lg-0"  />
                            <!--end::Input-->
                        </div>
                        <!--begin::Input group-->
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Product Code</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="code" id="show_code" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Product code" />
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Stock</label>
                                <div class="input-group mb-5">
                                    <input type="number" name="stock" id="show_stock" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Stock" aria-label="Weight" aria-describedby="basic-addon1"/>
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
                                <input readonly type="text" name="product_type" id="show_product_type" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="-" />
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Weight</label>
                                <div class="input-group mb-5">
                                    <input readonly type="number" name="weight" id="show_weight" class="form-control form-control-transparent mb-3 mb-lg-0" aria-label="Weight" aria-describedby="basic-addon1"/>
                                    <span class="input-group-text transparent" id="basic-addon1">KG</span>
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
                                <input readonly type="text" name="mesh" id="show_mesh" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="-" />
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Physical Appearance</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input readonly type="text" name="physical_appearance" id="show_physical_appearance" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="-" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Whiteness</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input readonly type="text" name="whiteness" id="show_whiteness" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="-"/>
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Residue</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input readonly type="text" name="residue" id="show_residue" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="-" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Mean Particle Diameter</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input readonly type="text" name="mean_particle_diameter" id="show_mean_particle_diameter" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="-" />
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Moisture</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input readonly type="text" name="moisture" id="show_moisture" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="-" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <div class="form-group">
                                    <label class="required fw-bold fs-6 mb-2">Status</label>
                                    <!--begin::Label-->
                                    <div class="radio-inline mt-1 row">
                                        <div class="col-1"></div>
                                        <div class="form-check form-check-custom col-3 radio form-check-success form-check-transparent form-check-md">
                                            <input disabled class="form-check-input" type="radio" name="status" value="1" id="show_status"  />
                                            <label class="form-check-label" for="flexCheckboxSm">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom col-4 radio form-check-danger form-check-transparent form-check-md">
                                            <input disabled class="form-check-input" type="radio" name="status" value="0" id="show_status"  />
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
                            <textarea type="text" name="description" id="show_description" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="-"></textarea>
                            <!--end::Input-->
                           
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                 
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                       
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
