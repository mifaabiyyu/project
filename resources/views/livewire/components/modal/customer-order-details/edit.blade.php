<div class="modal fade" id="edit_product_customerOrder" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="edit_product_customerOrder_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder" id="headerModal"></h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-products-customer-order-modal-action="close">
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
                <form id="edit_product_customerOrder_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @method('PUT')
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="edit_product_customerOrder_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#edit_product_customerOrder_header" data-kt-scroll-wrappers="#edit_product_customerOrder_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 text-center">
                            <!--begin::Label-->
                            <!--end::Label-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-125px h-125px" id="image-input-wrapper" style="background-image: url(./../img.png);"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <!--begin::Inputs-->
                                    <input type="file" id="edit_photo" name="photo" accept=".png, .jpg, .jpeg, .svg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                               
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <!--end::Hint-->
                        </div>
                        <!--end::Input group-->
                        <input type="hidden" name="customer_order_id" id="customer_order_id">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Code</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="code" id="edit_code" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Product name" />
                            <!--end::Input-->
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required form-label">Product Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-select" name="product_id" data-dropdown-parent="#edit_product_customerOrder" id="edit_product_id" data-control="select2" data-placeholder="-- Select product --">
                                        <option></option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-5 fv-row w-100  flex-md-root">
                                    <label class=" form-label">Spesifikasi</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-select spesificationData" name="spesification" id="edit_spesification" data-control="select2" data-placeholder="-- Select Spesification --">
                                        <option></option>
                                        @foreach ($spesification as $spek)
                                            <option value="{{ $spek->id }}">{{ $spek->get_product->name }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Product Total Price</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="input-group mb-5">
                                    <span class="input-group-text" id="basic-addon1">RP</span>
                                    <input type="number" name="product_price" id="edit_product_price" class="form-control qtyData" placeholder="Product Total Price" aria-label="Calcium Price" aria-describedby="basic-addon1"/>
                                </div>   
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Qty</label>
                                <div class="input-group mb-5">
                                    <input type="number" name="qty" id="edit_qty" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Qty" aria-label="Weight" aria-describedby="basic-addon1"/>
                                    <span class="input-group-text" id="basic-addon1">KG</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Ekspedisi Price</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="input-group mb-5">
                                    <span class="input-group-text" id="basic-addon1">RP</span>
                                    <input type="number" name="ekspedisi_price" id="edit_ekspedisi_price" class="form-control qtyData" placeholder="Ekspedisi Price" aria-label="Calcium Price" aria-describedby="basic-addon1"/>
                                </div>   
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Calcium Price</label>
                                <!--end::Label-->
                                <div class="input-group mb-5">
                                    <span class="input-group-text" id="basic-addon1">RP</span>
                                    <input type="number" name="price_calcium" id="edit_price_calcium" class="form-control qtyData" placeholder="Price" aria-label="Calcium Price" aria-describedby="basic-addon1"/>
                                </div>   
                                <!--begin::Input-->
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Price / KG</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="input-group mb-5">
                                    <span class="input-group-text" id="basic-addon1">RP</span>
                                    <input type="number" name="price" id="edit_price" class="form-control qtyData" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1"/>
                                </div>   
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Staple Price</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="input-group mb-5">
                                    <span class="input-group-text" id="basic-addon1">RP</span>
                                    <input type="number" name="staple_price" id="edit_staple_price" class="form-control qtyData" placeholder="Staple Price" aria-label="Price" aria-describedby="basic-addon1"/>
                                </div>   
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
                        <button type="reset" class="btn btn-light me-3" data-kt-products-customer-order-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-products-customer-order-modal-action="submit">
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
